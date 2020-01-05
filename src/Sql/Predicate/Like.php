<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Sql\Predicate;

use Laminas\Db\Sql\AbstractExpression;

class Like extends AbstractExpression implements PredicateInterface
{
    /**
     * @var string
     */
    protected $specification = '%1$s LIKE %2$s';

    /**
     * @var string
     */
    protected $identifier = '';

    /**
     * @var string
     */
    protected $like = '';

    /**
     * @param string $identifier
     * @param string $like
     */
    public function __construct($identifier = null, $like = null)
    {
        if ($identifier) {
            $this->setIdentifier($identifier);
        }
        if ($like) {
            $this->setLike($like);
        }
    }

    /**
     * @param  string $identifier
     * @return self Provides a fluent interface
     */
    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param  string $like
     * @return self Provides a fluent interface
     */
    public function setLike(string $like): self
    {
        $this->like = $like;
        return $this;
    }

    /**
     * @return string
     */
    public function getLike(): string
    {
        return $this->like;
    }

    /**
     * @param  string $specification
     * @return self Provides a fluent interface
     */
    public function setSpecification(string $specification): self
    {
        $this->specification = $specification;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpecification(): string
    {
        return $this->specification;
    }

    /**
     * @return array
     */
    public function getExpressionData(): array
    {
        list($values[], $types[]) = $this->normalizeArgument($this->identifier, self::TYPE_IDENTIFIER);
        list($values[], $types[]) = $this->normalizeArgument($this->like, self::TYPE_VALUE);
        return [
            [
                $this->specification,
                $values,
                $types,
            ]
        ];
    }
}
