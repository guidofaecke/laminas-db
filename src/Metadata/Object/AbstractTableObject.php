<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Metadata\Object;

abstract class AbstractTableObject
{
    /*
    protected $catalogName = null;
    protected $schemaName = null;
    */

    /**
     *
     * @var ?string
     */
    protected $name = null;

    /**
     *
     * @var ?string
     */
    protected $type = null;

    /**
     *
     * @var ?array
     */
    protected $columns = null;

    /**
     *
     * @var ?array
     */
    protected $constraints = null;

    /**
     * Constructor
     *
     * @param null|string $name
     */
    public function __construct(?string $name)
    {
        if ($name) {
            $this->setName($name);
        }
    }

    /**
     * Set columns
     *
     * @param array $columns
     */
    public function setColumns(array $columns): void
    {
        $this->columns = $columns;
    }

    /**
     * Get columns
     *
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Set constraints
     *
     * @param array $constraints
     */
    public function setConstraints(array $constraints): void
    {
        $this->constraints = $constraints;
    }

    /**
     * Get constraints
     *
     * @return array
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}
