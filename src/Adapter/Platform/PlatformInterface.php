<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter\Platform;

interface PlatformInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Get quote identifier symbol
     *
     * @return array
     */
    public function getQuoteIdentifierSymbol(): array;

    /**
     * Quote identifier
     *
     * @param  string $identifier
     * @return string
     */
    public function quoteIdentifier($identifier): string;

    /**
     * Quote identifier chain
     *
     * @param string|string[] $identifierChain
     * @return string
     */
    public function quoteIdentifierChain($identifierChain): string;

    /**
     * Get quote value symbol
     *
     * @return string
     */
    public function getQuoteValueSymbol(): string;

    /**
     * Quote value
     *
     * Will throw a notice when used in a workflow that can be considered "unsafe"
     *
     * @param  string $value
     * @return string
     */
    public function quoteValue(string $value): string;

    /**
     * Quote Trusted Value
     *
     * The ability to quote values without notices
     *
     * @param $value
     * @return mixed
     */
    public function quoteTrustedValue($value);

    /**
     * Quote value list
     *
     * @param string|string[] $valueList
     * @return string
     */
    public function quoteValueList($valueList): string;

    /**
     * Get identifier separator
     *
     * @return string
     */
    public function getIdentifierSeparator(): string;

    /**
     * Quote identifier in fragment
     *
     * @param  string $identifier
     * @param  array $additionalSafeWords
     * @return string
     */
    public function quoteIdentifierInFragment($identifier, array $additionalSafeWords = []): string;
}
