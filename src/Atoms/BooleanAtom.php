<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

/**
 * A wrapper around boolean values.
 */
class BooleanAtom implements AtomInterface
{
    /**
     * Holds the underlying value.
     *
     * @var boolean
     */
    protected $value;

    /**
     * Create a new boolean atom.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (is_bool($value) === false) {
            throw new AtomException(get_class(), $value);
        }

        $this->value = (boolean) $value;
    }

    /**
     * @see AtomInterface
     */
    public function getValue()
    {
        return $this->value;
    }
}
