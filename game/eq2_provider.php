<?php
/**
 * EQ2 Game Provider
 *
 * Registers EverQuest 2 as a game plugin with bbGuild core.
 *
 * @package   bbguildeq2 v2.0
 * @copyright 2018 avathar.be
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 */

namespace avathar\bbguildeq2\game;

use avathar\bbguild\model\games\game_provider_interface;
use avathar\bbguild\model\games\specialization_provider_interface;

/**
 * Class eq2_provider
 *
 * @package avathar\bbguildeq2\game
 */
class eq2_provider implements game_provider_interface, specialization_provider_interface
{
	/** @var eq2_installer */
	private $installer;

	/** @var \phpbb\extension\manager */
	private $ext_manager;

	/**
	 * @param eq2_installer             $installer
	 * @param \phpbb\extension\manager  $ext_manager
	 */
	public function __construct(eq2_installer $installer, \phpbb\extension\manager $ext_manager)
	{
		$this->installer = $installer;
		$this->ext_manager = $ext_manager;
	}

	/**
	 * @inheritdoc
	 */
	public function get_game_id(): string
	{
		return 'eq2';
	}

	/**
	 * @inheritdoc
	 */
	public function get_game_name(): string
	{
		return 'EverQuest 2';
	}

	/**
	 * @inheritdoc
	 */
	public function get_installer(): \avathar\bbguild\model\games\game_install_interface
	{
		return $this->installer;
	}

	/**
	 * @inheritdoc
	 */
	public function get_boss_base_url(): string
	{
		return 'http://eq2.zam.com/db/mob.html?eq2mob=%s';
	}

	/**
	 * @inheritdoc
	 */
	public function get_zone_base_url(): string
	{
		return 'http://eq2.zam.com/db/zone.html?eq2zone=%s';
	}

	/**
	 * @inheritdoc
	 */
	public function get_images_path(): string
	{
		return $this->ext_manager->get_extension_path('avathar/bbguildeq2', true) . 'images/';
	}

	/**
	 * @inheritdoc
	 */
	public function has_api(): bool
	{
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function get_api(): ?\avathar\bbguild\model\games\game_api_interface
	{
		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function get_regions(): array
	{
		return array(
			'us' => 'US',
			'eu' => 'EU',
		);
	}

	/**
	 * @inheritdoc
	 */
	public function get_api_locales(): array
	{
		return array();
	}

	/**
	 * @inheritdoc
	 */
	public function get_armor_types(): array
	{
		return array(
			'CLOTH'   => 'Cloth',
			'LEATHER' => 'Leather',
			'MAIL'    => 'Mail',
			'PLATE'   => 'Plate',
		);
	}

	/**
	 * Specialization catalog (issue #6), keyed by class_id.
	 *
	 * Deliberately empty. EQ2's class list already seeded by
	 * eq2_installer::install_classes() (Assassin, Berserker, Bruiser, ...,
	 * Beastlord, Channeler) represents the terminal, most-granular class
	 * identity in the live game: each archetype (Fighter/Mage/Priest/Scout)
	 * branches through an intermediate base class (e.g. Fighter -> Warrior
	 * -> Guardian/Berserker) but the 24 subclasses plus the two standalone
	 * heroic classes (Beastlord, Channeler) already ARE the class the
	 * character plays as for the rest of the game — there is no further
	 * named layer beneath them analogous to WoW talent specs, GW2 Elite
	 * Specializations, or FFXIV Jobs. EQ2's post-class-choice customization
	 * (Alternate Advancement / AA trees) is a flexible point-allocation
	 * system without a fixed set of discrete, named specs per class, so it
	 * does not map onto bb_specializations' one-row-per-named-spec model.
	 *
	 * Confirmed via web research (EQ2 Fandom wiki class category, EQ2
	 * Classic Emulator wiki class list, Ardwulf's Lair class-choice guide,
	 * EQ2 Fandom "Alternate Advancement" article) rather than assumed from
	 * memory. Returning a real but empty catalog here (instead of skipping
	 * the interface, or inventing a spec layer that doesn't exist in the
	 * game) keeps eq2_provider a truthful, opt-in implementor of
	 * specialization_provider_interface: install_specs() below still runs
	 * and cleanly no-ops.
	 *
	 * @return array<int, list<array{spec_name:string,role_id:int,spec_icon:string,spec_order:int}>>
	 */
	public static function spec_catalog(): array
	{
		return array();
	}

	/**
	 * @inheritdoc
	 */
	public function get_spec_label(): string
	{
		return 'Specialization';
	}

	/**
	 * Interface implementation: delegates to the static catalog.
	 *
	 * @return array<int, list<array{spec_name:string,role_id:int,spec_icon:string,spec_order:int}>>
	 */
	public function get_specializations(): array
	{
		return self::spec_catalog();
	}
}
