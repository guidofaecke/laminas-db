<?php

/**
 * @see       https://github.com/laminas/laminas-db for the canonical source repository
 * @copyright https://github.com/laminas/laminas-db/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-db/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Db\Adapter\Platform;

class IbmDb2 extends AbstractPlatform
{
    /**
     * @var string
     */
    protected $identifierSeparator = '.';

    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        if (isset($options['quote_identifiers'])
            && ($options['quote_identifiers'] == false
            || $options['quote_identifiers'] === 'false')
        ) {
            $this->quoteIdentifiers = false;
        }

        if (isset($options['identifier_separator'])) {
            $this->identifierSeparator = $options['identifier_separator'];
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return 'IBM DB2';
    }

    /**
     * {@inheritDoc}
     */
    public function quoteIdentifierInFragment(string $identifier, array $safeWords = []): string
    {
        if (! $this->quoteIdentifiers) {
            return $identifier;
        }
        $safeWordsInt = ['*' => true, ' ' => true, '.' => true, 'as' => true];
        foreach ($safeWords as $sWord) {
            $safeWordsInt[strtolower($sWord)] = true;
        }
        $parts = preg_split(
            '/([^0-9,a-z,A-Z$#_:])/i',
            $identifier,
            -1,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );
        $identifier = '';
        foreach ($parts as $part) {
            $identifier .= isset($safeWordsInt[strtolower($part)])
                ? $part
                : $this->quoteIdentifier[0]
                    . str_replace($this->quoteIdentifier[0], $this->quoteIdentifierTo, $part)
                    . $this->quoteIdentifier[1];
        }
        return $identifier;
    }

    /**
     * {@inheritDoc}
     */
    public function quoteIdentifierChain($identifierChain): string
    {
        if ($this->quoteIdentifiers === false) {
            if (is_array($identifierChain)) {
                return implode($this->identifierSeparator, $identifierChain);
            } else {
                return $identifierChain;
            }
        }
        $identifierChain = str_replace('"', '\\"', $identifierChain);
        if (is_array($identifierChain)) {
            $identifierChain = implode('"' . $this->identifierSeparator . '"', $identifierChain);
        }
        return '"' . $identifierChain . '"';
    }

    /**
     * {@inheritDoc}
     */
    public function quoteValue(string $value): string
    {
        if (function_exists('db2_escape_string')) {
            return '\'' . db2_escape_string($value) . '\'';
        }
        trigger_error(
            'Attempting to quote a value in ' . __CLASS__ . ' without extension/driver support '
            . 'can introduce security vulnerabilities in a production environment.'
        );
        return '\'' . str_replace("'", "''", $value) . '\'';
    }

    /**
     * {@inheritDoc}
     */
    public function quoteTrustedValue($value)
    {
        if (function_exists('db2_escape_string')) {
            return '\'' . db2_escape_string($value) . '\'';
        }
        return '\'' . str_replace("'", "''", $value) . '\'';
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentifierSeparator(): string
    {
        return $this->identifierSeparator;
    }
}
