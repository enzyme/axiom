<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

class StringAtom implements AtomInterface
{
    protected $value;

    public function __construct($value)
    {
        if (is_string($value) === false || strlen($value) < 1) {
            throw new AtomException(get_class(), $value);
        }

        $this->value = (int) $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
