<?php
/**
 * EQ2 Installer
 *
 * Installs EverQuest 2 factions, classes, races, and roles.
 * Extends the abstract_game_install from bbGuild core.
 *
 * @package   bbguildeq2 v2.0
 * @copyright 2018 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace avathar\bbguildeq2\game;

use avathar\bbguild\model\games\abstract_game_install;

/**
 * Class eq2_installer
 *
 * @package avathar\bbguildeq2\game
 */
class eq2_installer extends abstract_game_install
{
	/**
	 * Installs EQ2 factions (Good, Evil, Neutral)
	 */
	protected function install_factions()
	{
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_factions_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "'");
		$sql_ary = array();
		$sql_ary[] = array('game_id' => $this->game_id, 'faction_id' => 1, 'faction_name' => 'Good');
		$sql_ary[] = array('game_id' => $this->game_id, 'faction_id' => 2, 'faction_name' => 'Evil');
		$sql_ary[] = array('game_id' => $this->game_id, 'faction_id' => 3, 'faction_name' => 'Neutral');
		$this->db->sql_multi_insert($this->table('bb_factions_table'), $sql_ary);
	}

	/**
	 * Installs EQ2 classes with translations (en, fr, de, it)
	 */
	protected function install_classes()
	{
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_classes_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "'");
		$sql_ary = array();
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 0,  'class_faction_id' => 3, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#DCD09A', 'imagename' => 'eq2_unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 1,  'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FFFF66', 'imagename' => 'eq2_assassin');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 2,  'class_faction_id' => 3, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FF1133', 'imagename' => 'eq2_berserker');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 3,  'class_faction_id' => 3, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FFCC33', 'imagename' => 'eq2_bruiser');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 4,  'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FFEE99', 'imagename' => 'eq2_brigand');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 5,  'class_faction_id' => 3, 'class_armor_type' => 'CLOTH',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#EE00DD', 'imagename' => 'eq2_coercer');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 6,  'class_faction_id' => 3, 'class_armor_type' => 'CLOTH',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#BB00AA', 'imagename' => 'eq2_conjuror');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 7,  'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#660099', 'imagename' => 'eq2_defiler');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 8,  'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FFEEBB', 'imagename' => 'eq2_dirge');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 9,  'class_faction_id' => 3, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#88FFCC', 'imagename' => 'eq2_fury');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 10, 'class_faction_id' => 3, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#996633', 'imagename' => 'eq2_guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 11, 'class_faction_id' => 3, 'class_armor_type' => 'CLOTH',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FF44BB', 'imagename' => 'eq2_illusionist');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 12, 'class_faction_id' => 3, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FF5599', 'imagename' => 'eq2_inquisitor');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 13, 'class_faction_id' => 3, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#00DD99', 'imagename' => 'eq2_monk');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 14, 'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FF88CC', 'imagename' => 'eq2_mystic');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 15, 'class_faction_id' => 3, 'class_armor_type' => 'CLOTH',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#550077', 'imagename' => 'eq2_necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 16, 'class_faction_id' => 3, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FF99CC', 'imagename' => 'eq2_paladin');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 17, 'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#99FF55', 'imagename' => 'eq2_ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 18, 'class_faction_id' => 3, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FF0077', 'imagename' => 'eq2_shadowknight');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 19, 'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#EEFF99', 'imagename' => 'eq2_swashbuckler');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 20, 'class_faction_id' => 3, 'class_armor_type' => 'PLATE',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#FFDDBB', 'imagename' => 'eq2_templar');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 21, 'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#BBFF44', 'imagename' => 'eq2_troubador');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 22, 'class_faction_id' => 3, 'class_armor_type' => 'CLOTH',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#2200BB', 'imagename' => 'eq2_warlock');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 23, 'class_faction_id' => 3, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#777777', 'imagename' => 'eq2_warden');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 24, 'class_faction_id' => 3, 'class_armor_type' => 'CLOTH',   'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#8888FF', 'imagename' => 'eq2_wizard');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 25, 'class_faction_id' => 3, 'class_armor_type' => 'LEATHER', 'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#CC6633', 'imagename' => 'eq2_beastlord');
		$sql_ary[] = array('game_id' => $this->game_id, 'class_id' => 26, 'class_faction_id' => 3, 'class_armor_type' => 'MAIL',    'class_min_level' => 1, 'class_max_level' => 99, 'colorcode' => '#33CCCC', 'imagename' => 'eq2_channeler');
		$this->db->sql_multi_insert($this->table('bb_classes_table'), $sql_ary);
		unset($sql_ary);

		// class names in multiple languages
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_language_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "' AND attribute='class' ");

		$sql_ary = array();
		// en
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'en', 'attribute' => 'class', 'name' => 'Unknown',       'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'en', 'attribute' => 'class', 'name' => 'Assassin',      'name_short' => 'Assassin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'en', 'attribute' => 'class', 'name' => 'Berserker',     'name_short' => 'Berserker');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'en', 'attribute' => 'class', 'name' => 'Bruiser',       'name_short' => 'Bruiser');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'en', 'attribute' => 'class', 'name' => 'Brigand',       'name_short' => 'Brigand');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'en', 'attribute' => 'class', 'name' => 'Coercer',       'name_short' => 'Coercer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'en', 'attribute' => 'class', 'name' => 'Conjuror',      'name_short' => 'Conjuror');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'en', 'attribute' => 'class', 'name' => 'Defiler',       'name_short' => 'Defiler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'en', 'attribute' => 'class', 'name' => 'Dirge',         'name_short' => 'Dirge');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'en', 'attribute' => 'class', 'name' => 'Fury',          'name_short' => 'Fury');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'en', 'attribute' => 'class', 'name' => 'Guardian',      'name_short' => 'Guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'en', 'attribute' => 'class', 'name' => 'Illusionist',   'name_short' => 'Illusionist');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'en', 'attribute' => 'class', 'name' => 'Inquisitor',    'name_short' => 'Inquisitor');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'en', 'attribute' => 'class', 'name' => 'Monk',          'name_short' => 'Monk');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'en', 'attribute' => 'class', 'name' => 'Mystic',        'name_short' => 'Mystic');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'en', 'attribute' => 'class', 'name' => 'Necromancer',   'name_short' => 'Necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'en', 'attribute' => 'class', 'name' => 'Paladin',       'name_short' => 'Paladin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'en', 'attribute' => 'class', 'name' => 'Ranger',        'name_short' => 'Ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'en', 'attribute' => 'class', 'name' => 'Shadowknight',  'name_short' => 'Shadowknight');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'en', 'attribute' => 'class', 'name' => 'Swashbuckler',  'name_short' => 'Swashbuckler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'en', 'attribute' => 'class', 'name' => 'Templar',       'name_short' => 'Templar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'en', 'attribute' => 'class', 'name' => 'Troubador',     'name_short' => 'Troubador');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'en', 'attribute' => 'class', 'name' => 'Warlock',       'name_short' => 'Warlock');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 23, 'language' => 'en', 'attribute' => 'class', 'name' => 'Warden',        'name_short' => 'Warden');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 24, 'language' => 'en', 'attribute' => 'class', 'name' => 'Wizard',        'name_short' => 'Wizard');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 25, 'language' => 'en', 'attribute' => 'class', 'name' => 'Beastlord',    'name_short' => 'Beastlord');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 26, 'language' => 'en', 'attribute' => 'class', 'name' => 'Channeler',    'name_short' => 'Channeler');

		// fr
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Unknown',                  'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Assassin',                 'name_short' => 'Assassin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Berserk',                  'name_short' => 'Berserker');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Baroudeur',                'name_short' => 'Bruiser');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Brigand',                  'name_short' => 'Brigand');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Subjugueur',               'name_short' => 'Coercer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Invocateur',               'name_short' => 'Conjuror');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Destructeur',              'name_short' => 'Defiler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Chante-sort',              'name_short' => 'Dirge');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'fr', 'attribute' => 'class', 'name' => 'Furie',                    'name_short' => 'Fury');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Gardien',                  'name_short' => 'Guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Illusioniste',             'name_short' => 'Illusionist');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Inquisiteur',              'name_short' => 'Inquisitor');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Moine',                    'name_short' => 'Monk');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Mystique',                 'name_short' => 'Mystic');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Necromancer',              'name_short' => 'Necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Paladin',                  'name_short' => 'Paladin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Chasseur',                 'name_short' => 'Ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Chevalier de l\'ombre',    'name_short' => 'Shadowknight');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Fier à bras',              'name_short' => 'Swashbuckler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Templier',                 'name_short' => 'Templar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Troubadour',               'name_short' => 'Troubador');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Envôuteur',                'name_short' => 'Warlock');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 23, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Surveillant',              'name_short' => 'Warden');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 24, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Sorcier',                  'name_short' => 'Wizard');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 25, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Seigneur des bêtes',    'name_short' => 'Beastlord');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 26, 'language' => 'fr', 'attribute' => 'class', 'name' => 'Canalisateur',          'name_short' => 'Channeler');

		// de
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'de', 'attribute' => 'class', 'name' => 'Unknown',        'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'de', 'attribute' => 'class', 'name' => 'Assassin',       'name_short' => 'Assassin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'de', 'attribute' => 'class', 'name' => 'Berserker',      'name_short' => 'Berserker');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'de', 'attribute' => 'class', 'name' => 'Raufbold',       'name_short' => 'Bruiser');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'de', 'attribute' => 'class', 'name' => 'Brigant',        'name_short' => 'Brigant');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'de', 'attribute' => 'class', 'name' => 'Erzwinger',      'name_short' => 'Coercer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'de', 'attribute' => 'class', 'name' => 'Elementalist',   'name_short' => 'Conjuror');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'de', 'attribute' => 'class', 'name' => 'Schänder',       'name_short' => 'Defiler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'de', 'attribute' => 'class', 'name' => 'Klagesänger',    'name_short' => 'Dirge');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'de', 'attribute' => 'class', 'name' => 'Zornesdruiden',  'name_short' => 'Fury');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'de', 'attribute' => 'class', 'name' => 'Wächter',        'name_short' => 'Guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'de', 'attribute' => 'class', 'name' => 'Thaumaturgist',  'name_short' => 'Illusionist');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'de', 'attribute' => 'class', 'name' => 'Inquisitor',     'name_short' => 'Inquisitor');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'de', 'attribute' => 'class', 'name' => 'Mönch',          'name_short' => 'Monk');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'de', 'attribute' => 'class', 'name' => 'Mystiker',       'name_short' => 'Mystic');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'de', 'attribute' => 'class', 'name' => 'Nekromant',      'name_short' => 'Necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'de', 'attribute' => 'class', 'name' => 'Paladin',        'name_short' => 'Paladin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'de', 'attribute' => 'class', 'name' => 'Waldlaufer',     'name_short' => 'Ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'de', 'attribute' => 'class', 'name' => 'Schattenritter', 'name_short' => 'Shadowknight');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'de', 'attribute' => 'class', 'name' => 'Abenteurer',     'name_short' => 'Swashbuckler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'de', 'attribute' => 'class', 'name' => 'Templer',        'name_short' => 'Templar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'de', 'attribute' => 'class', 'name' => 'Troubadoure',    'name_short' => 'Troubador');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'de', 'attribute' => 'class', 'name' => 'Hexenmeister',   'name_short' => 'Warlock');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 23, 'language' => 'de', 'attribute' => 'class', 'name' => 'Warter',         'name_short' => 'Warden');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 24, 'language' => 'de', 'attribute' => 'class', 'name' => 'Zauberer',       'name_short' => 'Wizard');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 25, 'language' => 'de', 'attribute' => 'class', 'name' => 'Bestienmeister', 'name_short' => 'Beastlord');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 26, 'language' => 'de', 'attribute' => 'class', 'name' => 'Kanalisierer',   'name_short' => 'Channeler');

		// it
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'it', 'attribute' => 'class', 'name' => 'Unknown',        'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'it', 'attribute' => 'class', 'name' => 'Assassin',       'name_short' => 'Assassin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'it', 'attribute' => 'class', 'name' => 'Berserker',      'name_short' => 'Berserker');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'it', 'attribute' => 'class', 'name' => 'Bruiser',        'name_short' => 'Bruiser');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'it', 'attribute' => 'class', 'name' => 'Brigand',        'name_short' => 'Brigand');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'it', 'attribute' => 'class', 'name' => 'Coercer',        'name_short' => 'Coercer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'it', 'attribute' => 'class', 'name' => 'Conjuror',       'name_short' => 'Conjuror');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'it', 'attribute' => 'class', 'name' => 'Defiler',        'name_short' => 'Defiler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'it', 'attribute' => 'class', 'name' => 'Dirge',          'name_short' => 'Dirge');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'it', 'attribute' => 'class', 'name' => 'Fury',           'name_short' => 'Fury');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'it', 'attribute' => 'class', 'name' => 'Guardian',       'name_short' => 'Guardian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'it', 'attribute' => 'class', 'name' => 'Illusionist',    'name_short' => 'Illusionist');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'it', 'attribute' => 'class', 'name' => 'Inquisitor',     'name_short' => 'Inquisitor');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'it', 'attribute' => 'class', 'name' => 'Monk',           'name_short' => 'Monk');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'it', 'attribute' => 'class', 'name' => 'Mystic',         'name_short' => 'Mystic');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'it', 'attribute' => 'class', 'name' => 'Necromancer',    'name_short' => 'Necromancer');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'it', 'attribute' => 'class', 'name' => 'Paladin',        'name_short' => 'Paladin');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'it', 'attribute' => 'class', 'name' => 'Ranger',         'name_short' => 'Ranger');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'it', 'attribute' => 'class', 'name' => 'Shadowknight',   'name_short' => 'Shadowknight');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'it', 'attribute' => 'class', 'name' => 'Swashbuckler',   'name_short' => 'Swashbuckler');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'it', 'attribute' => 'class', 'name' => 'Templar',        'name_short' => 'Templar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'it', 'attribute' => 'class', 'name' => 'Troubador',      'name_short' => 'Troubador');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'it', 'attribute' => 'class', 'name' => 'Warlock',        'name_short' => 'Warlock');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 23, 'language' => 'it', 'attribute' => 'class', 'name' => 'Warden',         'name_short' => 'Warden');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 24, 'language' => 'it', 'attribute' => 'class', 'name' => 'Wizard',         'name_short' => 'Wizard');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 25, 'language' => 'it', 'attribute' => 'class', 'name' => 'Beastlord',     'name_short' => 'Beastlord');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 26, 'language' => 'it', 'attribute' => 'class', 'name' => 'Channeler',     'name_short' => 'Channeler');

		$this->db->sql_multi_insert($this->table('bb_language_table'), $sql_ary);
	}

	/**
	 * Installs EQ2 races with translations (en, fr, de, it)
	 */
	protected function install_races()
	{
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_races_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "'");
		$sql_ary = array();
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 0,  'race_faction_id' => 2);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 1,  'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 2,  'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 3,  'race_faction_id' => 1);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 4,  'race_faction_id' => 1);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 5,  'race_faction_id' => 1);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 6,  'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 7,  'race_faction_id' => 2);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 8,  'race_faction_id' => 1);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 9,  'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 10, 'race_faction_id' => 2);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 11, 'race_faction_id' => 2);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 12, 'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 13, 'race_faction_id' => 2);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 14, 'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 15, 'race_faction_id' => 1);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 16, 'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 17, 'race_faction_id' => 2);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 18, 'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 19, 'race_faction_id' => 1);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 20, 'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 21, 'race_faction_id' => 3);
		$sql_ary[] = array('game_id' => $this->game_id, 'race_id' => 22, 'race_faction_id' => 3);
		$this->db->sql_multi_insert($this->table('bb_races_table'), $sql_ary);
		unset($sql_ary);

		// race names
		$this->db->sql_query('DELETE FROM ' . $this->table('bb_language_table') . " WHERE game_id = '" . $this->db->sql_escape($this->game_id) . "' AND attribute = 'race' ");

		$sql_ary = array();
		// en
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'en', 'attribute' => 'race', 'name' => 'Unknown',   'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'en', 'attribute' => 'race', 'name' => 'Gnome',     'name_short' => 'Gnome');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'en', 'attribute' => 'race', 'name' => 'Human',     'name_short' => 'Human');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'en', 'attribute' => 'race', 'name' => 'Barbarian', 'name_short' => 'Barbarian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'en', 'attribute' => 'race', 'name' => 'Dwarf',     'name_short' => 'Dwarf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'en', 'attribute' => 'race', 'name' => 'High Elf',  'name_short' => 'High Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'en', 'attribute' => 'race', 'name' => 'Dark Elf',  'name_short' => 'Dark Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'en', 'attribute' => 'race', 'name' => 'Wood Elf',  'name_short' => 'Wood Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'en', 'attribute' => 'race', 'name' => 'Half Elf',  'name_short' => 'Half Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'en', 'attribute' => 'race', 'name' => 'Kerra',     'name_short' => 'Kerra');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'en', 'attribute' => 'race', 'name' => 'Troll',     'name_short' => 'Troll');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'en', 'attribute' => 'race', 'name' => 'Ogre',      'name_short' => 'Ogre');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'en', 'attribute' => 'race', 'name' => 'Frog',      'name_short' => 'Frog');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'en', 'attribute' => 'race', 'name' => 'Iksar',     'name_short' => 'Iksar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'en', 'attribute' => 'race', 'name' => 'Erudite',   'name_short' => 'Erudite');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'en', 'attribute' => 'race', 'name' => 'Halfling',  'name_short' => 'Halfling');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'en', 'attribute' => 'race', 'name' => 'Ratonga',   'name_short' => 'Ratonga');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'en', 'attribute' => 'race', 'name' => 'Fae',       'name_short' => 'Fae');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'en', 'attribute' => 'race', 'name' => 'Froglok',   'name_short' => 'Froglok');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'en', 'attribute' => 'race', 'name' => 'Arasai',    'name_short' => 'Arasai');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'en', 'attribute' => 'race', 'name' => 'Sarnak',    'name_short' => 'Sarnak');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'en', 'attribute' => 'race', 'name' => 'Freeblood', 'name_short' => 'Freeblood');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'en', 'attribute' => 'race', 'name' => 'Aerakyn',   'name_short' => 'Aerakyn');

		// fr
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Unknown',       'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Gnome',         'name_short' => 'Gnome');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Humain',        'name_short' => 'Human');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Barbare',       'name_short' => 'Barbarian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Nain',          'name_short' => 'Dwarf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Haut Elfe',     'name_short' => 'High Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Elfe Noir',     'name_short' => 'Dark Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Elfe des Bois', 'name_short' => 'Wood Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Semi-Elfe',     'name_short' => 'Half Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'fr', 'attribute' => 'race', 'name' => 'Kerran',        'name_short' => 'Kerra');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Troll',         'name_short' => 'Troll');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Ogre',          'name_short' => 'Ogre');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Frog',          'name_short' => 'Frog');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Iksar',         'name_short' => 'Iksar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Erudit',        'name_short' => 'Erudite');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Halfelin',      'name_short' => 'Halfling');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Ratonga',       'name_short' => 'Ratonga');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Fae',           'name_short' => 'Fae');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Grelok',        'name_short' => 'Froglok');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Arasai',        'name_short' => 'Arasai');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Sarnak',        'name_short' => 'Sarnak');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Freeblood',     'name_short' => 'Freeblood');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'fr', 'attribute' => 'race', 'name' => 'Aerakyn',       'name_short' => 'Aerakyn');

		// de
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'de', 'attribute' => 'race', 'name' => 'Unbekannt',  'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'de', 'attribute' => 'race', 'name' => 'Gnome',      'name_short' => 'Gnome');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'de', 'attribute' => 'race', 'name' => 'Mensch',     'name_short' => 'Human');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'de', 'attribute' => 'race', 'name' => 'Barbare',    'name_short' => 'Barbarian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'de', 'attribute' => 'race', 'name' => 'Zwerg',      'name_short' => 'Dwarf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'de', 'attribute' => 'race', 'name' => 'Hochelf',    'name_short' => 'High Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'de', 'attribute' => 'race', 'name' => 'Dunkelelf',  'name_short' => 'Dark Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'de', 'attribute' => 'race', 'name' => 'Waldelf',    'name_short' => 'Wood Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'de', 'attribute' => 'race', 'name' => 'Halbelf',    'name_short' => 'Half Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'de', 'attribute' => 'race', 'name' => 'Kerraner',   'name_short' => 'Kerra');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'de', 'attribute' => 'race', 'name' => 'Trolle',     'name_short' => 'Troll');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'de', 'attribute' => 'race', 'name' => 'Oger',       'name_short' => 'Ogre');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'de', 'attribute' => 'race', 'name' => 'Froschlok',  'name_short' => 'Frog');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'de', 'attribute' => 'race', 'name' => 'Iksar',      'name_short' => 'Iksar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'de', 'attribute' => 'race', 'name' => 'Erudit',     'name_short' => 'Erudite');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'de', 'attribute' => 'race', 'name' => 'Halbling',   'name_short' => 'Halfling');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'de', 'attribute' => 'race', 'name' => 'Ratonga',    'name_short' => 'Ratonga');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'de', 'attribute' => 'race', 'name' => 'Feen',       'name_short' => 'Fae');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'de', 'attribute' => 'race', 'name' => 'Grelok',     'name_short' => 'Froglok');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'de', 'attribute' => 'race', 'name' => 'Arasai',     'name_short' => 'Arasai');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'de', 'attribute' => 'race', 'name' => 'Sarnak',     'name_short' => 'Sarnak');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'de', 'attribute' => 'race', 'name' => 'Freeblood',  'name_short' => 'Freeblood');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'de', 'attribute' => 'race', 'name' => 'Aerakyn',    'name_short' => 'Aerakyn');

		// it
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 0,  'language' => 'it', 'attribute' => 'race', 'name' => 'Unknown',    'name_short' => 'Unknown');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 1,  'language' => 'it', 'attribute' => 'race', 'name' => 'Gnome',      'name_short' => 'Gnome');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 2,  'language' => 'it', 'attribute' => 'race', 'name' => 'Human',      'name_short' => 'Human');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 3,  'language' => 'it', 'attribute' => 'race', 'name' => 'Barbarian',  'name_short' => 'Barbarian');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 4,  'language' => 'it', 'attribute' => 'race', 'name' => 'Dwarf',      'name_short' => 'Dwarf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 5,  'language' => 'it', 'attribute' => 'race', 'name' => 'High Elf',   'name_short' => 'High Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 6,  'language' => 'it', 'attribute' => 'race', 'name' => 'Dark Elf',   'name_short' => 'Dark Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 7,  'language' => 'it', 'attribute' => 'race', 'name' => 'Wood Elf',   'name_short' => 'Wood Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 8,  'language' => 'it', 'attribute' => 'race', 'name' => 'Half Elf',   'name_short' => 'Half Elf');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 9,  'language' => 'it', 'attribute' => 'race', 'name' => 'Kerra',      'name_short' => 'Kerra');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 10, 'language' => 'it', 'attribute' => 'race', 'name' => 'Troll',      'name_short' => 'Troll');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 11, 'language' => 'it', 'attribute' => 'race', 'name' => 'Ogre',       'name_short' => 'Ogre');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 12, 'language' => 'it', 'attribute' => 'race', 'name' => 'Frog',       'name_short' => 'Frog');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 13, 'language' => 'it', 'attribute' => 'race', 'name' => 'Iksar',      'name_short' => 'Iksar');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 14, 'language' => 'it', 'attribute' => 'race', 'name' => 'Erudite',    'name_short' => 'Erudite');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 15, 'language' => 'it', 'attribute' => 'race', 'name' => 'Halfling',   'name_short' => 'Halfling');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 16, 'language' => 'it', 'attribute' => 'race', 'name' => 'Ratonga',    'name_short' => 'Ratonga');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 17, 'language' => 'it', 'attribute' => 'race', 'name' => 'Fae',        'name_short' => 'Fae');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 18, 'language' => 'it', 'attribute' => 'race', 'name' => 'Froglok',    'name_short' => 'Froglok');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 19, 'language' => 'it', 'attribute' => 'race', 'name' => 'Arasai',     'name_short' => 'Arasai');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 20, 'language' => 'it', 'attribute' => 'race', 'name' => 'Sarnak',     'name_short' => 'Sarnak');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 21, 'language' => 'it', 'attribute' => 'race', 'name' => 'Freeblood',  'name_short' => 'Freeblood');
		$sql_ary[] = array('game_id' => $this->game_id, 'attribute_id' => 22, 'language' => 'it', 'attribute' => 'race', 'name' => 'Aerakyn',    'name_short' => 'Aerakyn');

		$this->db->sql_multi_insert($this->table('bb_language_table'), $sql_ary);
	}
}
