<?php
/**
 * bbGuild EQ2 Extension — seed data structural correctness
 *
 * @package   bbguildeq2 v2.0
 * @copyright 2026 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

/**
 * Fixture-loading correctness for the eq2 game seed data installed via
 * migrations/basics/data.php (no HTTP mocks apply here — this plugin has
 * no external API, unlike bbguildwow's Battle.net sync integration tests).
 *
 * Extends phpbb_functional_test_case rather than phpbb_database_test_case
 * per the 2026-09 correction documented in bbguildwow's
 * tests/integration-tests.md: phpbb_database_test_case doesn't fit —
 * phpbb_functional_test_case is what gives a real DB connection, a real
 * installed extension, and working get_db()/get_table_prefix() helpers
 * in this test framework. No DI container is reachable in-process, so
 * every query here goes straight at the tables via get_db().
 *
 * Goes deeper than the functional suite's extension_enable_test.php:
 * asserts every class_id has a valid class_armor_type, every race_id
 * references a valid faction_id, no duplicate class_id/race_id per
 * game_id, and every seeded class/race id has full bb_language coverage.
 *
 * @group integration
 */
class avathar_bbguildeq2_eq2_seed_data_test extends phpbb_functional_test_case
{
	static protected function setup_extensions()
	{
		return array('avathar/bbguild', 'avathar/bbguildeq2');
	}

	private function get_table_prefix(): string
	{
		return self::$config['table_prefix'];
	}

	private function fetch_all(string $sql): array
	{
		$db = $this->get_db();
		$result = $db->sql_query($sql);
		$rows = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$rows[] = $row;
		}
		$db->sql_freeresult($result);

		return $rows;
	}

	public function test_every_class_has_valid_armor_type()
	{
		$valid = array('CLOTH', 'LEATHER', 'MAIL', 'PLATE');
		$rows = $this->fetch_all("SELECT class_id, class_armor_type FROM " . $this->get_table_prefix() . "bb_classes WHERE game_id = 'eq2'");

		$this->assertNotEmpty($rows, 'expected eq2 classes to be seeded');
		foreach ($rows as $row)
		{
			$this->assertContains($row['class_armor_type'], $valid, "class_id {$row['class_id']} has an invalid class_armor_type");
		}
	}

	public function test_no_duplicate_class_id_per_game()
	{
		$rows = $this->fetch_all("SELECT class_id, COUNT(*) AS cnt FROM " . $this->get_table_prefix() . "bb_classes WHERE game_id = 'eq2' GROUP BY class_id HAVING COUNT(*) > 1");
		$this->assertEmpty($rows, 'no class_id should be duplicated for game_id=eq2');
	}

	public function test_every_race_references_a_valid_faction()
	{
		$faction_rows = $this->fetch_all("SELECT faction_id FROM " . $this->get_table_prefix() . "bb_factions WHERE game_id = 'eq2'");
		$valid_factions = array_map('intval', array_column($faction_rows, 'faction_id'));
		$valid_factions[] = 0;

		$rows = $this->fetch_all("SELECT race_id, race_faction_id FROM " . $this->get_table_prefix() . "bb_races WHERE game_id = 'eq2'");
		$this->assertNotEmpty($rows, 'expected eq2 races to be seeded');
		foreach ($rows as $row)
		{
			$this->assertContains((int) $row['race_faction_id'], $valid_factions, "race_id {$row['race_id']} references an unknown faction_id");
		}
	}

	public function test_no_duplicate_race_id_per_game()
	{
		$rows = $this->fetch_all("SELECT race_id, COUNT(*) AS cnt FROM " . $this->get_table_prefix() . "bb_races WHERE game_id = 'eq2' GROUP BY race_id HAVING COUNT(*) > 1");
		$this->assertEmpty($rows, 'no race_id should be duplicated for game_id=eq2');
	}

	public function test_every_class_has_full_language_coverage()
	{
		$class_ids = array_map('intval', array_column(
			$this->fetch_all("SELECT class_id FROM " . $this->get_table_prefix() . "bb_classes WHERE game_id = 'eq2'"),
			'class_id'
		));

		$languages = array_unique(array_column(
			$this->fetch_all("SELECT DISTINCT language FROM " . $this->get_table_prefix() . "bb_language WHERE game_id = 'eq2' AND attribute = 'class'"),
			'language'
		));

		$this->assertNotEmpty($languages, 'expected at least one language seeded for eq2 classes');

		foreach ($class_ids as $class_id)
		{
			$rows = $this->fetch_all("SELECT language FROM " . $this->get_table_prefix() . "bb_language
				WHERE game_id = 'eq2' AND attribute = 'class' AND attribute_id = " . $class_id);
			$seeded_languages = array_column($rows, 'language');

			foreach ($languages as $language)
			{
				$this->assertContains($language, $seeded_languages, "class_id $class_id is missing a '$language' bb_language row");
			}
		}
	}

	public function test_every_race_has_full_language_coverage()
	{
		$race_ids = array_map('intval', array_column(
			$this->fetch_all("SELECT race_id FROM " . $this->get_table_prefix() . "bb_races WHERE game_id = 'eq2'"),
			'race_id'
		));

		$languages = array_unique(array_column(
			$this->fetch_all("SELECT DISTINCT language FROM " . $this->get_table_prefix() . "bb_language WHERE game_id = 'eq2' AND attribute = 'race'"),
			'language'
		));

		$this->assertNotEmpty($languages, 'expected at least one language seeded for eq2 races');

		foreach ($race_ids as $race_id)
		{
			$rows = $this->fetch_all("SELECT language FROM " . $this->get_table_prefix() . "bb_language
				WHERE game_id = 'eq2' AND attribute = 'race' AND attribute_id = " . $race_id);
			$seeded_languages = array_column($rows, 'language');

			foreach ($languages as $language)
			{
				$this->assertContains($language, $seeded_languages, "race_id $race_id is missing a '$language' bb_language row");
			}
		}
	}
}
