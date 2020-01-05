<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter;

class StatementContainer implements StatementContainerInterface
{
    /**
     * @var string
     */
    protected $sql = '';

    /**
     * @var ParameterContainer
     */
    protected $parameterContainer = null;

    /**
     * @param string|null $sql
     * @param ParameterContainer|null $parameterContainer
     */
    public function __construct(?string $sql = null, ?ParameterContainer $parameterContainer = null)
    {
        if ($sql) {
            $this->setSql($sql);
        }
        $this->parameterContainer = ($parameterContainer) ?: new ParameterContainer;
    }

    /**
     * @param $sql
     * @return self Provides a fluent interface
     */
    public function setSql($sql): self
    {
        $this->sql = $sql;
        return $this;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->sql;
    }

    /**
     * @param ParameterContainer $parameterContainer
     * @return self Provides a fluent interface
     */
    public function setParameterContainer(ParameterContainer $parameterContainer): self
    {
        $this->parameterContainer = $parameterContainer;
        return $this;
    }

    /**
     * @return null|ParameterContainer
     */
    public function getParameterContainer(): ?ParameterContainer
    {
        return $this->parameterContainer;
    }
}
