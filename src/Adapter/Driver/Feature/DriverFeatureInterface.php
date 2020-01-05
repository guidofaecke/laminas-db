<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter\Driver\Feature;

interface DriverFeatureInterface
{
    /**
     * Setup the default features for Pdo
     *
     * @return DriverFeatureInterface
     */
    public function setupDefaultFeatures(): void;

    /**
     * Add feature
     *
     * @param string $name
     * @param mixed $feature
     * @return DriverFeatureInterface
     */
    public function addFeature(string $name, $feature): DriverFeatureInterface;

    /**
     * Get feature
     *
     * @param $name
     * @return mixed|false
     */
    public function getFeature($name);
}
