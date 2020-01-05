<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter;

use Laminas\Db\Adapter\Driver\DriverInterface;
use Laminas\Db\Adapter\Platform\PlatformInterface;

/**
 *
 * @property Driver\DriverInterface $driver
 * @property Platform\PlatformInterface $platform
 */
interface AdapterInterface
{
    /**
     * @return Driver\DriverInterface
     */
    public function getDriver(): DriverInterface;

    /**
     * @return Platform\PlatformInterface
     */
    public function getPlatform(): PlatformInterface;
}
