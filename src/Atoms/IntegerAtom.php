<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

class IntegerAtom implements AtomInterface
{
    protected $value;

    public function __construct($value)
    {
        if (is_integer((int) $value) === false) {
            throw new AtomException(get_class($this), $value);
        }

        $this->value = (int) $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
