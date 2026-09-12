<?php
/**
 * bbGuild EQ2 Extension — game registry test
 *
 * @package   bbguildeq2 v2.0
 * @copyright 2026 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

/**
 * After enabling, asserts EverQuest 2's game provider is registered and
 * reachable through bbguild core's registry-backed ACP game list, and
 * that it reports has_api() === false (this plugin has no external API,
 * unlike bbguildwow's Battle.net integration).
 *
 * No DI container is reachable in-process (phpbb_functional_test_case's
 * HTTP-driven requests run in a separate PHP process — see
 * tests/integration-tests.md's "Notes for other plugins" / Conventions
 * sections in the bbguildwow reference suite), so avathar.bbguild.game_registry
 * can't be resolved directly here. Instead:
 *  - "registered and reachable" is asserted by GETting bbguild core's own
 *    ACP game list module (game_registry-backed via controller\admin_games::listgames())
 *    and asserting it renders EverQuest 2 without a server error.
 *  - "has_api() === false" is asserted via bb_games.armory_enabled, which
 *    abstract_game_install::install() sets directly from the installer's
 *    has_api_support() at install time — the same signal the provider's
 *    has_api() exposes (eq2_installer does not override has_api_support(),
 *    so both stay false).
 *
 * @group functional
 */
class avathar_bbguildeq2_game_registry_test extends phpbb_functional_test_case
{
	static protected function setup_extensions()
	{
		return array('avathar/bbguild', 'avathar/bbguildeq2');
	}

	public function test_eq2_provider_registered_and_reachable_via_acp_game_list()
	{
		$this->login('admin');
		$this->admin_login();

		self::request('GET', 'adm/index.php?i=-avathar-bbguild-acp-game_module&mode=listgames&sid=' . $this->sid, array(), false);
		$status = (int) self::$client->getResponse()->getStatus();
		$this->assertLessThan(500, $status, 'ACP game list returned a server error');

		$body = self::$client->getResponse()->getContent();
		$this->assertStringContainsString('EverQuest', $body, 'ACP game list should show the registered EverQuest 2 provider');

		$this->logout();
	}

	public function test_eq2_has_no_api()
	{
		$db = $this->get_db();
		$sql = "SELECT armory_enabled FROM " . $this->get_table_prefix() . "bb_games
			WHERE game_id = 'eq2'";
		$result = $db->sql_query($sql);
		$armory_enabled = (int) $db->sql_fetchfield('armory_enabled');
		$db->sql_freeresult($result);

		$this->assertSame(0, $armory_enabled, 'eq2 has no API — armory_enabled must be 0');
	}

	private function get_table_prefix(): string
	{
		return self::$config['table_prefix'];
	}
}
