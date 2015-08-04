<?php
/**
 * Part of the Joomla Framework DI Package
 *
 * @copyright  Copyright (C) 2013 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\DI\Exception;

/**
 * Attempt to set the value of a protected key, which already is set
 */
class ProtectedKeyException extends \OutOfBoundsException implements \Interop\Container\Exception\ContainerException
{
}