<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Metadata\Object;

class ColumnObject
{
    /**
     *
     * @var ?string
     */
    protected $name = null;

    /**
     *
     * @var ?string
     */
    protected $tableName = null;

    /**
     *
     * @var ?string
     */
    protected $schemaName = null;

    /**
     *
     * @var ?int
     */
    protected $ordinalPosition = null;

    /**
     *
     * @var ?string
     */
    protected $columnDefault = null;

    /**
     *
     * @var ?bool
     */
    protected $isNullable = null;

    /**
     *
     * @var ?string
     */
    protected $dataType = null;

    /**
     *
     * @var ?int
     */
    protected $characterMaximumLength = null;

    /**
     *
     * @var ?int
     */
    protected $characterOctetLength = null;

    /**
     *
     * @var ?int
     */
    protected $numericPrecision = null;

    /**
     *
     * @var ?int
     */
    protected $numericScale = null;

    /**
     *
     * @var ?bool
     */
    protected $numericUnsigned = null;

    /**
     *
     * @var array
     */
    protected $errata = [];

    /**
     * Constructor
     *
     * @param string $name
     * @param string $tableName
     * @param string $schemaName
     */
    public function __construct(string $name, string $tableName, ?string $schemaName = null)
    {
        $this->setName($name);
        $this->setTableName($tableName);
        $this->setSchemaName($schemaName);
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

    /**
     * Get table name
     *
     * @return string
     */
    public function getTableName(): ?string
    {
        return $this->tableName;
    }

    /**
     * Set table name
     *
     * @param string $tableName
     * @return self Provides a fluent interface
     */
    public function setTableName(string $tableName): self
    {
        $this->tableName = $tableName;
        return $this;
    }

    /**
     * Set schema name
     *
     * @param string $schemaName
     */
    public function setSchemaName(string $schemaName): void
    {
        $this->schemaName = $schemaName;
    }

    /**
     * Get schema name
     *
     * @return string
     */
    public function getSchemaName(): ?string
    {
        return $this->schemaName;
    }

    /**
     * @return int $ordinalPosition
     */
    public function getOrdinalPosition(): ?int
    {
        return $this->ordinalPosition;
    }

    /**
     * @param int $ordinalPosition to set
     * @return self Provides a fluent interface
     */
    public function setOrdinalPosition(int $ordinalPosition): self
    {
        $this->ordinalPosition = $ordinalPosition;
        return $this;
    }

    /**
     * @return null|string the $columnDefault
     */
    public function getColumnDefault(): ?string
    {
        return $this->columnDefault;
    }

    /**
     * @param mixed $columnDefault to set
     * @return self Provides a fluent interface
     */
    public function setColumnDefault($columnDefault): self
    {
        $this->columnDefault = $columnDefault;
        return $this;
    }

    /**
     * @return bool $isNullable
     */
    public function getIsNullable(): ?bool
    {
        return $this->isNullable;
    }

    /**
     * @param bool $isNullable to set
     * @return self Provides a fluent interface
     */
    public function setIsNullable(bool $isNullable): self
    {
        $this->isNullable = $isNullable;
        return $this;
    }

    /**
     * @return bool $isNullable
     */
    public function isNullable(): ?bool
    {
        return $this->isNullable;
    }

    /**
     * @return null|string the $dataType
     */
    public function getDataType(): ?string
    {
        return $this->dataType;
    }

    /**
     * @param string $dataType the $dataType to set
     * @return self Provides a fluent interface
     */
    public function setDataType(string $dataType): self
    {
        $this->dataType = $dataType;
        return $this;
    }

    /**
     * @return int|null the $characterMaximumLength
     */
    public function getCharacterMaximumLength(): ?int
    {
        return $this->characterMaximumLength;
    }

    /**
     * @param int $characterMaximumLength the $characterMaximumLength to set
     * @return self Provides a fluent interface
     */
    public function setCharacterMaximumLength(int $characterMaximumLength): self
    {
        $this->characterMaximumLength = $characterMaximumLength;
        return $this;
    }

    /**
     * @return int|null the $characterOctetLength
     */
    public function getCharacterOctetLength(): ?int
    {
        return $this->characterOctetLength;
    }

    /**
     * @param int $characterOctetLength the $characterOctetLength to set
     * @return self Provides a fluent interface
     */
    public function setCharacterOctetLength(int $characterOctetLength): self
    {
        $this->characterOctetLength = $characterOctetLength;
        return $this;
    }

    /**
     * @return int the $numericPrecision
     */
    public function getNumericPrecision(): ?int
    {
        return $this->numericPrecision;
    }

    /**
     * @param int $numericPrecision the $numericPrevision to set
     * @return self Provides a fluent interface
     */
    public function setNumericPrecision(int $numericPrecision): self
    {
        $this->numericPrecision = $numericPrecision;
        return $this;
    }

    /**
     * @return int the $numericScale
     */
    public function getNumericScale(): ?int
    {
        return $this->numericScale;
    }

    /**
     * @param int $numericScale the $numericScale to set
     * @return self Provides a fluent interface
     */
    public function setNumericScale(int $numericScale): self
    {
        $this->numericScale = $numericScale;
        return $this;
    }

    /**
     * @return bool
     */
    public function getNumericUnsigned(): ?bool
    {
        return $this->numericUnsigned;
    }

    /**
     * @param  bool $numericUnsigned
     * @return self Provides a fluent interface
     */
    public function setNumericUnsigned(bool $numericUnsigned): self
    {
        $this->numericUnsigned = $numericUnsigned;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNumericUnsigned(): ?bool
    {
        return $this->numericUnsigned;
    }

    /**
     * @return array the $errata
     */
    public function getErratas(): array
    {
        return $this->errata;
    }

    /**
     * @param array $erratas
     * @return self Provides a fluent interface
     */
    public function setErratas(array $erratas): self
    {
        foreach ($erratas as $name => $value) {
            $this->setErrata($name, $value);
        }
        return $this;
    }

    /**
     * @param string $errataName
     * @return mixed
     */
    public function getErrata(string $errataName)
    {
        if (array_key_exists($errataName, $this->errata)) {
            return $this->errata[$errataName];
        }
        return;
    }

    /**
     * @param string $errataName
     * @param mixed $errataValue
     * @return self Provides a fluent interface
     */
    public function setErrata(string $errataName, $errataValue): self
    {
        $this->errata[$errataName] = $errataValue;
        return $this;
    }
}
