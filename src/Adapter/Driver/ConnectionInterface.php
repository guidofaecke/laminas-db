<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter\Driver;

interface ConnectionInterface
{
    /**
     * Get current schema
     *
     * @return string
     */
    public function getCurrentSchema(): string;

    /**
     * Get resource
     *
     * @return mixed
     */
    public function getResource();

    /**
     * Connect
     *
     * @return ConnectionInterface
     */
    public function connect(): ConnectionInterface;

    /**
     * Is connected
     *
     * @return bool
     */
    public function isConnected(): bool;

    /**
     * Disconnect
     *
     * @return ConnectionInterface
     */
    public function disconnect(): ConnectionInterface;

    /**
     * Begin transaction
     *
     * @return ConnectionInterface
     */
    public function beginTransaction(): ConnectionInterface;

    /**
     * Commit
     *
     * @return ConnectionInterface
     */
    public function commit(): ConnectionInterface;

    /**
     * Rollback
     *
     * @return ConnectionInterface
     */
    public function rollback(): ConnectionInterface;

    /**
     * Execute
     *
     * @param  string $sql
     * @return ResultInterface
     */
    public function execute(string $sql): ResultInterface;

    /**
     * Get last generated id
     *
     * @param  null $name Ignored
     * @return int
     */
    public function getLastGeneratedValue($name = null): int;
}
