<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

class IntAtom implements AtomInterface
{
    protected $value;

    public function __construct($value)
    {
        if (is_numeric($value) === false) {
            throw new AtomException('IntAtom', $value);
        }

        $this->value = (int) $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
