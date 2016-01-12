<?php

namespace Enzyme\Axiom\Exceptions;

use Exception;

class AtomException extends Exception
{
    public function __construct($atom_type, $value)
    {
        parent::__construct("The atom {$atom_type} does not support the value {$value}");
    }
}
