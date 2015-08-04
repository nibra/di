<?php
/**
 * @copyright  Copyright (C) 2013 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\DI\Tests;

use Joomla\DI\Container;

include_once 'Stubs/stubs.php';

/**
 * Tests for Container class.
 */
class DelegateLookupTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @testdox Child container has access to parent's resources
	 */
	public function testCreateChild()
	{
		$container = new Container();
		$container->set('Joomla\\DI\\Tests\\StubInterface', function ()
		{
			return new Stub1;
		});

		$child = $container->createChild();
		$this->assertInstanceOf('Joomla\\DI\\Tests\\Stub1', $child->get('Joomla\\DI\\Tests\\StubInterface'));
	}

	/**
	 * @testdox When registering a service provider, its register() method is called with the container instance
	 */
	public function testRegisterServiceProvider()
	{
		$container = new Container();

		$mock = $this->getMock('Joomla\\DI\\ServiceProviderInterface');
		$mock
			->expects($this->once())
			->method('register')
			->with($container);

		$container->registerServiceProvider($mock);
	}
}