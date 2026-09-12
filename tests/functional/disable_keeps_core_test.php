<?php
/**
 * bbGuild EQ2 Extension — disable keeps core alive test
 *
 * @package   bbguildeq2 v2.0
 * @copyright 2026 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

/**
 * Enables bbguild core + bbguildeq2, then disables bbguildeq2, and
 * asserts core keeps working for a guild that has nothing to do with
 * this plugin. Per bbguildwow's functional-tests.md, this is "the single
 * most important guardrail for non-flagship plugins" — it catches shared
 * service definitions accidentally moved into the plugin, or event
 * listeners that throw once the plugin is gone.
 *
 * The control guild is bbguild core's own seeded "Test Guild" (id=1,
 * game_id='custom'), inserted unconditionally by core's v200b3 migration
 * (insert_sample_data()) as soon as bbguild core itself is enabled — so
 * this test does not depend on any other game plugin being installed.
 *
 * @group functional
 */
class avathar_bbguildeq2_disable_keeps_core_test extends phpbb_functional_test_case
{
	static protected function setup_extensions()
	{
		return array('avathar/bbguild', 'avathar/bbguildeq2');
	}

	private function get_table_prefix(): string
	{
		return self::$config['table_prefix'];
	}

	public function test_disabling_eq2_does_not_break_core_control_guild()
	{
		// Sanity: core's own seeded control guild (id=1, game_id='custom')
		// must exist before we can rely on it.
		$db = $this->get_db();
		$sql = "SELECT COUNT(*) AS cnt FROM " . $this->get_table_prefix() . "bb_guild
			WHERE id = 1 AND game_id = 'custom'";
		$result = $db->sql_query($sql);
		$count = (int) $db->sql_fetchfield('cnt');
		$db->sql_freeresult($result);
		$this->assertSame(1, $count, "bbguild core's own seeded control guild (id=1, game_id='custom') should exist");

		$this->disable_ext('avathar/bbguildeq2');

		$this->create_user('bbguildeq2_disablecheck');
		$this->login('bbguildeq2_disablecheck');

		self::request('GET', 'app.php/guild/1', array(), false);
		self::assert_response_status_code(200);

		$this->logout();

		$this->login('admin');
		$this->admin_login();

		self::request('GET', 'adm/index.php?i=-avathar-bbguild-acp-game_module&mode=listgames&sid=' . $this->sid, array(), false);
		$status = (int) self::$client->getResponse()->getStatus();
		$this->assertLessThan(500, $status, "bbguild core's ACP game list must still load after bbguildeq2 is disabled");

		$this->logout();

		// Restore state for any tests that run after this one in the suite.
		$this->install_ext('avathar/bbguildeq2');
	}
}
