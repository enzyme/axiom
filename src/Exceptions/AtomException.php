<?php

namespace Enzyme\Axiom\Exceptions;

class AtomException extends AxiomException
{
    public function __construct($class, $value)
    {
        parent::__construct(
            "The atom [{$class}] could not process the value [{$value}]."
        );
    }
}
