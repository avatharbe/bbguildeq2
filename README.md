# bbGuild - EverQuest 2
[![Tests](https://github.com/avatharbe/bbguildeq2/actions/workflows/tests.yml/badge.svg)](https://github.com/avatharbe/bbguildeq2/actions/workflows/tests.yml)

Game plugin that adds EverQuest 2 support to [bbGuild](https://github.com/avandenberghe/bbguild).

## Features

- **EQ2 Classes** - 25 playable classes (Assassin, Berserker, Bruiser, Brigand, Coercer, Conjuror, Defiler, Dirge, Fury, Guardian, Illusionist, Inquisitor, Monk, Mystic, Necromancer, Paladin, Ranger, Shadowknight, Swashbuckler, Templar, Troubador, Warlock, Warden, Wizard)
- **EQ2 Races** - 22 playable races including Freeblood
- **Factions** - Good, Evil, and Neutral alignments
- **Localization** - Class and race names in English, French, German, and Italian
- **ZAM Links** - Boss and zone database URLs linked to EQ2 ZAM

## Requirements

- phpBB >= 3.3.0
- PHP >= 7.4.0
- **bbGuild core** (`avathar/bbguild`) must be installed and enabled

## Installation

1. Ensure bbGuild core (`avathar/bbguild`) is installed and enabled.
2. Copy the `bbguildeq2` folder to `/ext/avathar/bbguildeq2/`.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `bbGuild - EverQuest 2` under Disabled Extensions and click `Enable`.
5. Go to ACP > bbGuild > Games and install the **EverQuest 2** game.

## Uninstall

1. Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
2. Find `bbGuild - EverQuest 2` under Enabled Extensions and click `Disable`.
3. To permanently uninstall, click `Delete Data` and then delete the `/ext/avathar/bbguildeq2` folder.

**Note:** Disabling the extension does not delete existing guild or player data. Your roster and player records remain intact in bbGuild core.

## Game Data

### Factions

| ID | Faction |
|----|---------|
| 1 | Good |
| 2 | Evil |
| 3 | Neutral |

### Classes (25)

| ID | Class | Armor |
|----|-------|-------|
| 1 | Assassin | Mail |
| 2 | Berserker | Plate |
| 3 | Bruiser | Leather |
| 4 | Brigand | Mail |
| 5 | Coercer | Cloth |
| 6 | Conjuror | Cloth |
| 7 | Defiler | Mail |
| 8 | Dirge | Mail |
| 9 | Fury | Leather |
| 10 | Guardian | Plate |
| 11 | Illusionist | Cloth |
| 12 | Inquisitor | Plate |
| 13 | Monk | Leather |
| 14 | Mystic | Mail |
| 15 | Necromancer | Cloth |
| 16 | Paladin | Plate |
| 17 | Ranger | Mail |
| 18 | Shadowknight | Plate |
| 19 | Swashbuckler | Mail |
| 20 | Templar | Plate |
| 21 | Troubador | Mail |
| 22 | Warlock | Cloth |
| 23 | Warden | Leather |
| 24 | Wizard | Cloth |

### Races (22)

Gnome, Human, Barbarian, Dwarf, High Elf, Dark Elf, Wood Elf, Half Elf, Kerra, Troll, Ogre, Frog, Iksar, Erudite, Halfling, Ratonga, Fae, Froglok, Arasai, Sarnak, Freeblood

## License

[GNU General Public License v2](http://opensource.org/licenses/gpl-2.0.php)

## Links

- [bbGuild Core](https://github.com/avandenberghe/bbguild)
- [EQ2 ZAM](http://eq2.zam.com/)
- [Issue Tracker](https://github.com/avandenberghe/bbguild/issues)
