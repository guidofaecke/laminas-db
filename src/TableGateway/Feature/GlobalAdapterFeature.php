<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\TableGateway\Feature;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\Exception;

class GlobalAdapterFeature extends AbstractFeature
{
    /**
     * @var Adapter[]
     */
    protected static $staticAdapters = [];

    /**
     * Set static adapter
     *
     * @param Adapter $adapter
     */
    public static function setStaticAdapter(Adapter $adapter): void
    {
        $class = get_called_class();

        static::$staticAdapters[$class] = $adapter;
        if ($class === __CLASS__) {
            static::$staticAdapters[__CLASS__] = $adapter;
        }
    }

    /**
     * Get static adapter
     *
     * @throws Exception\RuntimeException
     * @return Adapter
     */
    public static function getStaticAdapter(): Adapter
    {
        $class = get_called_class();

        // class specific adapter
        if (isset(static::$staticAdapters[$class])) {
            return static::$staticAdapters[$class];
        }

        // default adapter
        if (isset(static::$staticAdapters[__CLASS__])) {
            return static::$staticAdapters[__CLASS__];
        }

        throw new Exception\RuntimeException('No database adapter was found in the static registry.');
    }

    /**
     * after initialization, retrieve the original adapter as "master"
     */
    public function preInitialize(): void
    {
        $this->tableGateway->adapter = self::getStaticAdapter();
    }
}
