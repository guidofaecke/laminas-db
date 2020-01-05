<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Metadata\Object;

class ViewObject extends AbstractTableObject
{
    protected $viewDefinition;
    protected $checkOption;
    protected $isUpdatable;

    /**
     * @return string $viewDefinition
     */
    public function getViewDefinition(): string
    {
        return $this->viewDefinition;
    }

    /**
     * @param string $viewDefinition to set
     * @return self Provides a fluent interface
     */
    public function setViewDefinition(string $viewDefinition): self
    {
        $this->viewDefinition = $viewDefinition;
        return $this;
    }

    /**
     * @return string $checkOption
     */
    public function getCheckOption(): string
    {
        return $this->checkOption;
    }

    /**
     * @param string $checkOption to set
     * @return self Provides a fluent interface
     */
    public function setCheckOption(string $checkOption): self
    {
        $this->checkOption = $checkOption;
        return $this;
    }

    /**
     * @return bool $isUpdatable
     */
    public function getIsUpdatable(): bool
    {
        return $this->isUpdatable;
    }

    /**
     * @param bool $isUpdatable to set
     * @return self Provides a fluent interface
     */
    public function setIsUpdatable(bool $isUpdatable): self
    {
        $this->isUpdatable = $isUpdatable;
        return $this;
    }

    public function isUpdatable(): bool
    {
        return $this->isUpdatable;
    }
}
