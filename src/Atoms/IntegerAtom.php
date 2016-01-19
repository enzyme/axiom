<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

/**
 * A wrapper around integer values. Will throw an
 * \Enzyme\Axiom\Exceptions\AtomException if the value passed during
 * initialization is not an integer.
 */
class IntegerAtom implements AtomInterface
{
    /**
     * Holds the underlying value.
     *
     * @var integer
     */
    protected $value;

    /**
     * Create a new integer atom. Accepts anything numeric and automatically
     * casts it to an integer.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (is_numeric($value) === false) {
            throw new AtomException(get_class(), $value);
        }

        $this->value = (int) $value;
    }

    /**
     * @see AtomInterface
     */
    public function getValue()
    {
        return $this->value;
    }
}
