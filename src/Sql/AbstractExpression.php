<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Sql;

abstract class AbstractExpression implements ExpressionInterface
{
    /**
     * @var string[]
     */
    protected $allowedTypes = [
        self::TYPE_IDENTIFIER,
        self::TYPE_LITERAL,
        self::TYPE_SELECT,
        self::TYPE_VALUE,
    ];

    /**
     * Normalize Argument
     *
     * @param mixed $argument
     * @param string $defaultType
     *
     * @return array
     *
     * @throws Exception\InvalidArgumentException
     */
    protected function normalizeArgument($argument, string $defaultType = self::TYPE_VALUE): array
    {
        if ($argument instanceof ExpressionInterface || $argument instanceof SqlInterface) {
            return $this->buildNormalizedArgument($argument, self::TYPE_VALUE);
        }

        if (is_scalar($argument) || $argument === null) {
            return $this->buildNormalizedArgument($argument, $defaultType);
        }

        if (is_array($argument)) {
            $value = current($argument);

            if ($value instanceof ExpressionInterface || $value instanceof SqlInterface) {
                return $this->buildNormalizedArgument($value, self::TYPE_VALUE);
            }

            $key = key($argument);

            if (is_integer($key) && ! in_array($value, $this->allowedTypes)) {
                return $this->buildNormalizedArgument($value, $defaultType);
            }

            return $this->buildNormalizedArgument($key, $value);
        }

        throw new Exception\InvalidArgumentException(sprintf(
            '$argument should be %s or %s or %s or %s or %s, "%s" given',
            'null',
            'scalar',
            'array',
            ExpressionInterface::class,
            SqlInterface::class,
            is_object($argument) ? get_class($argument) : gettype($argument)
        ));
    }

    /**
     * @param mixed  $argument
     * @param string $argumentType
     *
     * @return array
     *
     * @throws Exception\InvalidArgumentException
     */
    private function buildNormalizedArgument($argument, string $argumentType): array
    {
        if (! in_array($argumentType, $this->allowedTypes)) {
            throw new Exception\InvalidArgumentException(sprintf(
                'Argument type should be in array(%s)',
                implode(',', $this->allowedTypes)
            ));
        }

        return [
            $argument,
            $argumentType,
        ];
    }
}