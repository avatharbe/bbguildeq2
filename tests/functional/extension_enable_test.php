<?php
/**
 * bbGuild EQ2 Extension — enable test
 *
 * @package   bbguildeq2 v2.0
 * @copyright 2026 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

/**
 * Enables bbguild core, then bbguildeq2 on top. Asserts:
 * - `eq2` row present in bb_games
 * - bbguildeq2's classes (Assassin, Berserker, ...) seeded in bb_classes
 *   for game_id='eq2'
 * - avathar\bbguildeq2\ext::BBGUILDEQ2_VERSION matches composer.json
 *
 * Unlike bbguildwow, this plugin ships no ACP module of its own, so
 * (unlike functional-tests.md's test #1 for the flagship plugin) there
 * is nothing ACP-related to assert here.
 *
 * Catches: migration regressions, services.yml misconfig, missing tables.
 *
 * @group functional
 */
class avathar_bbguildeq2_extension_enable_test extends phpbb_functional_test_case
{
	static protected function setup_extensions()
	{
		return array('avathar/bbguild', 'avathar/bbguildeq2');
	}

	public function test_eq2_game_row_present()
	{
		$db = $this->get_db();
		$sql = 'SELECT COUNT(*) AS cnt
			FROM ' . $this->get_table_prefix() . "bb_games
			WHERE game_id = 'eq2'";
		$result = $db->sql_query($sql);
		$count = (int) $db->sql_fetchfield('cnt');
		$db->sql_freeresult($result);

		$this->assertSame(1, $count, 'expected exactly one eq2 row in bb_games');
	}

	public function test_eq2_classes_seeded()
	{
		$db = $this->get_db();
		$sql = "SELECT class_id FROM " . $this->get_table_prefix() . "bb_classes
			WHERE game_id = 'eq2'
			ORDER BY class_id";
		$result = $db->sql_query($sql);
		$class_ids = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$class_ids[] = (int) $row['class_id'];
		}
		$db->sql_freeresult($result);

		$this->assertCount(27, $class_ids, 'expected 27 eq2 classes seeded (class_id 0-26)');
		$this->assertContains(1, $class_ids, 'Assassin (class_id=1) should be seeded');
		$this->assertContains(26, $class_ids, 'Channeler (class_id=26) should be seeded');
	}

	public function test_ext_version_matches_composer_json()
	{
		$composer = json_decode(file_get_contents(__DIR__ . '/../../composer.json'), true);
		$this->assertSame(
			$composer['version'],
			\avathar\bbguildeq2\ext::BBGUILDEQ2_VERSION,
			'ext.php::BBGUILDEQ2_VERSION must match composer.json version'
		);
	}

	private function get_table_prefix(): string
	{
		return self::$config['table_prefix'];
	}
}
