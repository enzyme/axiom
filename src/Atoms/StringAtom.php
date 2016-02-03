<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

class StringAtom implements AtomInterface
{
    protected $value;

    public function __construct($value)
    {
        if (is_string($value) === false) {
            throw new AtomException(get_class($this), $value);
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
