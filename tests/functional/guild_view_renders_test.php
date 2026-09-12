<?php
/**
 * bbGuild EQ2 Extension — guild view render test
 *
 * @package   bbguildeq2 v2.0
 * @copyright 2026 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

/**
 * Inserts a guild fixture with game_id='eq2' (guild + rank + roster portal
 * module, mirroring the shape bbguild core's own v200b3 migration
 * insert_sample_data()/seed_portal_layout() use for its "Test Guild") and
 * one player with a valid eq2 class/race. GETs /guild/{guild_id} as an
 * authenticated user and asserts:
 * - Response is 200
 * - The roster module rendered the player row (player name present)
 * - The class image path resolves under ext/avathar/bbguildeq2/images/
 *   (bbguild core's roster module builds CLASS_IMAGE from the game
 *   provider's get_images_path(), see portal/modules/roster.php)
 *
 * Catches: guild_context wiring, image path resolution, provider
 * registration not reaching the roster module.
 *
 * @group functional
 */
class avathar_bbguildeq2_guild_view_renders_test extends phpbb_functional_test_case
{
	/** @var int */
	private $guild_id;

	static protected function setup_extensions()
	{
		return array('avathar/bbguild', 'avathar/bbguildeq2');
	}

	private function get_table_prefix(): string
	{
		return self::$config['table_prefix'];
	}

	/**
	 * Inserts a guild + rank + roster portal module + one player, all
	 * scoped to a guild_id not already used by bbguild core's own seeded
	 * "Test Guild" (id=1) or any other fixture in this suite.
	 */
	private function create_eq2_guild_fixture(): int
	{
		$db = $this->get_db();

		$sql = 'SELECT MAX(id) AS max_id FROM ' . $this->get_table_prefix() . 'bb_guild';
		$result = $db->sql_query($sql);
		$guild_id = (int) $db->sql_fetchfield('max_id') + 1;
		$db->sql_freeresult($result);

		$db->sql_query('INSERT INTO ' . $this->get_table_prefix() . 'bb_guild ' . $db->sql_build_array('INSERT', array(
			'id'             => $guild_id,
			'name'           => 'EQ2 Test Guild',
			'realm'          => 'Test Realm',
			'region'         => 'us',
			'roster'         => 1,
			'players'        => 1,
			'emblemurl'      => '',
			'game_id'        => 'eq2',
			'game_edition'   => 'retail',
			'min_armory'     => 0,
			'rec_status'     => 0,
			'guilddefault'   => 0,
			'armory_enabled' => 0,
			'armoryresult'   => '',
			'recruitforum'   => 0,
			'faction'        => 3,
		)));

		$db->sql_query('INSERT INTO ' . $this->get_table_prefix() . 'bb_ranks ' . $db->sql_build_array('INSERT', array(
			'guild_id'    => $guild_id,
			'rank_id'     => 0,
			'rank_name'   => 'Guild Master',
			'rank_hide'   => 0,
			'rank_prefix' => '',
			'rank_suffix' => '',
		)));

		$db->sql_query('INSERT INTO ' . $this->get_table_prefix() . 'bb_portal_modules ' . $db->sql_build_array('INSERT', array(
			'module_classname'     => '\avathar\bbguild\portal\modules\roster',
			'module_column'        => 2,
			'module_order'         => 1,
			'module_name'          => 'BBGUILD_PORTAL_ROSTER',
			'guild_id'             => $guild_id,
			'module_image_src'     => '',
			'module_icon'          => '',
			'module_icon_size'     => 16,
			'module_image_width'   => 16,
			'module_image_height'  => 16,
			'module_group_ids'     => '',
			'module_status'        => 1,
		)));

		$db->sql_query('INSERT INTO ' . $this->get_table_prefix() . 'bb_players ' . $db->sql_build_array('INSERT', array(
			'game_id'             => 'eq2',
			'player_name'         => 'Eq2Testassassin',
			'player_region'       => 'us',
			'player_realm'        => 'Test Realm',
			'player_title'        => '',
			'player_level'        => 99,
			'player_race_id'      => 1,
			'player_class_id'     => 1,
			'player_rank_id'      => 0,
			'player_role'         => 'DPS',
			'player_comment'      => '',
			'player_joindate'     => time(),
			'player_outdate'      => 0,
			'player_guild_id'     => $guild_id,
			'player_gender_id'    => 0,
			'player_achiev'       => 0,
			'player_armory_url'   => '',
			'player_portrait_url' => '',
			'player_spec'         => '',
			'phpbb_user_id'       => 0,
			'player_status'       => 1,
			'deactivate_reason'   => '',
			'last_update'         => time(),
		)));

		return $guild_id;
	}

	public function test_guild_page_renders_roster_with_class_image()
	{
		$this->guild_id = $this->create_eq2_guild_fixture();

		$this->create_user('bbguildeq2_guildview');
		$this->login('bbguildeq2_guildview');

		self::request('GET', 'app.php/guild/' . $this->guild_id, array(), false);
		self::assert_response_status_code(200);

		$body = self::$client->getResponse()->getContent();
		$this->assertStringContainsString('Eq2Testassassin', $body, 'roster module should render the fixture player row');
		$this->assertStringContainsString('ext/avathar/bbguildeq2/images/', $body, 'class image should resolve under this plugin\'s images/ path');

		$this->logout();
	}
}
