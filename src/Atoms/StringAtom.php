<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

/**
 * A wrapper around string values.
 */
class StringAtom implements AtomInterface
{
    /**
     * Holds the underlying value.
     *
     * @var string
     */
    protected $value;

    /**
     * Create a new string atom. Accepts any non-empty string.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (is_string($value) === false || strlen($value) < 1) {
            throw new AtomException(get_class(), $value);
        }

        $this->value = $value;
    }

    /**
     * @see AtomInterface
     */
    public function getValue()
    {
        return $this->value;
    }
}
