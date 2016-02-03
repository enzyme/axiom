<?php

namespace Enzyme\Axiom\Atoms;

interface AtomInterface
{
    /**
     * Get the underlying value associated with this atom.
     *
     * @return mixed
     */
    public function getValue();
}
