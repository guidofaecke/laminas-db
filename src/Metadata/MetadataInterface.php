<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Metadata;

use Laminas\Db\Metadata\Object\ColumnObject;
use Laminas\Db\Metadata\Object\ConstraintObject;
use Laminas\Db\Metadata\Object\TableObject;
use Laminas\Db\Metadata\Object\TriggerObject;
use Laminas\Db\Metadata\Object\ViewObject;

interface MetadataInterface
{
    /**
     * Get schemas.
     *
     * @return string[]
     */
    public function getSchemas(): array;

    /**
     * Get table names.
     *
     * @param null|string $schema
     * @param bool $includeViews
     * @return string[]
     */
    public function getTableNames($schema = null, $includeViews = false): array;

    /**
     * Get tables.
     *
     * @param null|string $schema
     * @param bool $includeViews
     * @return Object\TableObject[]
     */
    public function getTables(?string $schema = null, bool $includeViews = false): array;

    /**
     * Get table
     *
     * @param string $tableName
     * @param null|string $schema
     * @return Object\TableObject
     */
    public function getTable(string $tableName, ?string $schema = null): TableObject;

    /**
     * Get view names
     *
     * @param null|string $schema
     * @return string[]
     */
    public function getViewNames(?string $schema = null): array;

    /**
     * Get views
     *
     * @param null|string $schema
     * @return Object\ViewObject[]
     */
    public function getViews(?string $schema = null): array;

    /**
     * Get view
     *
     * @param string $viewName
     * @param null|string $schema
     * @return Object\ViewObject
     */
    public function getView(string $viewName, ?string $schema = null): ViewObject;

    /**
     * Get column names
     *
     * @param string $table
     * @param null|string $schema
     * @return string[]
     */
    public function getColumnNames(string $table, ?string $schema = null): array;

    /**
     * Get columns
     *
     * @param string $table
     * @param null|string $schema
     * @return Object\ColumnObject[]
     */
    public function getColumns(string $table, ?string $schema = null): array;

    /**
     * Get column
     *
     * @param string $columnName
     * @param string $table
     * @param null|string $schema
     * @return Object\ColumnObject
     */
    public function getColumn(string $columnName, string $table, ?string $schema = null): ColumnObject;

    /**
     * Get constraints
     *
     * @param string $table
     * @param null|string $schema
     * @return Object\ConstraintObject[]
     */
    public function getConstraints(string $table, ?string $schema = null): array;

    /**
     * Get constraint
     *
     * @param string $constraintName
     * @param string $table
     * @param null|string $schema
     * @return Object\ConstraintObject
     */
    public function getConstraint(string $constraintName, string $table, ?string $schema = null): ConstraintObject;

    /**
     * Get constraint keys
     *
     * @param string $constraint
     * @param string $table
     * @param null|string $schema
     * @return Object\ConstraintKeyObject[]
     */
    public function getConstraintKeys(string $constraint, string $table, ?string $schema = null): array;

    /**
     * Get trigger names
     *
     * @param null|string $schema
     * @return string[]
     */
    public function getTriggerNames(?string $schema = null): array;

    /**
     * Get triggers
     *
     * @param null|string $schema
     * @return Object\TriggerObject[]
     */
    public function getTriggers(?string $schema = null): array;

    /**
     * Get trigger
     *
     * @param string $triggerName
     * @param null|string $schema
     * @return Object\TriggerObject
     */
    public function getTrigger(string $triggerName, ?string $schema = null): TriggerObject;
}
