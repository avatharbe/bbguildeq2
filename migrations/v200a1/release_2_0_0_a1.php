<?php
/**
 *
 * @package bbGuild EQ2 Extension
 * @copyright (c) 2026 avathar.be
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Release 2.0.0-a1 version stamp
 */

namespace avathar\bbguildeq2\migrations\v200a1;

class release_2_0_0_a1 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return [
			'\avathar\bbguildeq2\migrations\basics\data',
		];
	}

	public function effectively_installed()
	{
		return isset($this->config['bbguildeq2_version'])
			&& version_compare($this->config['bbguildeq2_version'], '2.0.0-a1', '>=');
	}

	public function update_data()
	{
		return [
			['custom', [[$this, 'set_version']]],
		];
	}

	public function revert_data()
	{
		return [
			['config.remove', ['bbguildeq2_version']],
		];
	}

	public function set_version()
	{
		$this->config->set('bbguildeq2_version', '2.0.0-a1');
	}
}
