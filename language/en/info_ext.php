<?php
/**
 * EverQuest II game plugin for bbGuild.
 *
 * @copyright (c) 2026 avathar.be
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	// is_enableable() error messages
	'BBGUILDEQ2_PHP_VERSION_FAIL'	=> 'This extension requires PHP %1$s or higher. You are running PHP %2$s.',
	'BBGUILDEQ2_PHPBB_VERSION_FAIL'	=> 'This extension requires phpBB %1$s or higher. You are running phpBB %2$s.',
	'BBGUILDEQ2_REQUIRES_BBGUILD'	=> 'This extension requires the bbGuild core extension (avathar/bbguild) to be enabled first.',
));
