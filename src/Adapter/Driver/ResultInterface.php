<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter\Driver;

use Countable;
use Iterator;

interface ResultInterface extends
    Countable,
    Iterator
{
    /**
     * Force buffering
     *
     * @return void
     */
    public function buffer(): void;

    /**
     * Check if is buffered
     *
     * @return bool|null
     */
    public function isBuffered(): ?bool;

    /**
     * Is query result?
     *
     * @return bool
     */
    public function isQueryResult(): bool;

    /**
     * Get affected rows
     *
     * @return int
     */
    public function getAffectedRows(): int;

    /**
     * Get generated value
     *
     * @return mixed|null
     */
    public function getGeneratedValue();

    /**
     * Get the resource
     *
     * @return mixed
     */
    public function getResource();

    /**
     * Get field count
     *
     * @return int
     */
    public function getFieldCount(): int;
}
