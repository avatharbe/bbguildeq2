# Changelog

## 2.0.0-rc1 24/07/2026
  - [FIX] Migration dependency pointed at a since-removed bbguild core migration path (`basics\schema`, squashed into `v200b3` in an earlier core release) — this plugin could not install at all against current core
  - [FIX] `get_table_names()` was missing `bb_specializations_table`, which would have silently blocked any future specialization seeding (issue #331 Phase 4)
  - [FIX] `license.txt` file mode corrected to 644
  - [FIX] Stripped ICC color profiles from 3 PNG icons (EPV compliance)
  - [CHG] Namespace/composer/repo dropped to no-separator form (`bbguildeq2`); DB-stored config keys (`bbguild_eq2_version`) preserved with the original underscore form
  - [CHG] Version tracking moved out of `phpbb_config` into `ext::BBGUILDEQ2_VERSION`
  - [CHG] Soft-requires `avathar/bbguild >= 2.0.0-rc3`
  - [CHG] Provider return types use FQCN; removed unused `use` statements
  - [CHG] CI: unit tests now check out bbguild core alongside so plugin classes resolve core interfaces
  - [DOCS] README: fixed wrong GitHub org (bbGuild Core / Issue Tracker links pointed at `avandenberghe/bbguild` instead of `avatharbe/bbguildeq2`), stale PHP >= 7.4.0 requirement (actual has been 8.1.0), stale class/race counts — installer actually has 27 classes (Beastlord, Channeler were undocumented) and 23 races (Aerakyn was undocumented)

## 2.0.0-a1 02/03/2026
  - [NEW] Initial release as standalone phpBB extension
  - [NEW] Extracted from bbGuild core as part of the game plugin architecture
  - [NEW] Implements `game_provider_interface` — registers EQ2 with bbGuild via tagged services
  - [NEW] `eq2_installer` extends `abstract_game_install` with clean array-based table names
  - [NEW] `eq2_provider` supplies game metadata (factions, ZAM URLs)
  - [CHG] Installer uses `$this->table()` helper instead of direct property access
  - [FIX] Italian race #12 language code corrected from 'ti' to 'it'
  - [NEW] Game images served from plugin directory
