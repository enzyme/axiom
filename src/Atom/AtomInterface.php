<?php

namespace Enzyme\Axiom\Atom;

interface AtomInterface
{
    /**
     * Get the underlying value associated with this atom.
     *
     * @return mixed
     */
    public function getValue();
}
