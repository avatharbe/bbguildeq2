<?php
/**
 * @package bbGuild eq2 Extension
 * @copyright (c) 2026 avathar.be
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace avathar\bbguildeq2\tests\system;

use PHPUnit\Framework\TestCase;

class ext_test extends TestCase
{
	/** @var \PHPUnit\Framework\MockObject\MockObject|\Symfony\Component\DependencyInjection\ContainerInterface */
	protected $container;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\finder */
	protected $extension_finder;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\db\migrator */
	protected $migrator;

	protected function setUp(): void
	{
		parent::setUp();

		$ext_manager = $this->createMock(\phpbb\extension\manager::class);
		$ext_manager->method('is_enabled')
			->with('avathar/bbguild')
			->willReturn(true);

		$this->container = $this->createMock(\Symfony\Component\DependencyInjection\ContainerInterface::class);
		$this->container->method('get')
			->with('ext.manager')
			->willReturn($ext_manager);

		$this->extension_finder = $this->getMockBuilder(\phpbb\finder::class)
			->disableOriginalConstructor()
			->getMock();

		$this->migrator = $this->getMockBuilder(\phpbb\db\migrator::class)
			->disableOriginalConstructor()
			->getMock();
	}

	public function test_ext_is_enableable(): void
	{
		$ext = new \avathar\bbguildeq2\ext(
			$this->container,
			$this->extension_finder,
			$this->migrator,
			'avathar/bbguildeq2',
			''
		);

		$this->assertTrue($ext->is_enableable());
	}

	public function test_ext_requires_bbguild_core(): void
	{
		$ext_manager = $this->createMock(\phpbb\extension\manager::class);
		$ext_manager->method('is_enabled')
			->with('avathar/bbguild')
			->willReturn(false);

		$container = $this->createMock(\Symfony\Component\DependencyInjection\ContainerInterface::class);
		$container->method('get')
			->with('ext.manager')
			->willReturn($ext_manager);

		$ext = new \avathar\bbguildeq2\ext(
			$container,
			$this->extension_finder,
			$this->migrator,
			'avathar/bbguildeq2',
			''
		);

		$result = $ext->is_enableable();
		$this->assertIsArray($result);
		$this->assertStringContainsString('bbGuild core', $result[0]);
	}
}
