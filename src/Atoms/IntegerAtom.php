<?php

namespace Enzyme\Axiom\Atoms;

use Enzyme\Axiom\Exceptions\AtomException;

class IntegerAtom implements AtomInterface
{
    protected $value;

    public function __construct($value)
    {
        if ($this->isInvalidOrFloat($value)) {
            throw new AtomException(get_class($this), $value);
        }

        $this->value = (int) $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    protected function isInvalidOrFloat($value)
    {
        return is_numeric($value) === false || is_float($value) === true;
    }
}
