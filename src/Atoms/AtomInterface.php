<?php

namespace Enzyme\Axiom\Atoms;

/**
 * Provides a wrapper around native types.
 */
interface AtomInterface
{
    /**
     * Get the underlying native value for this atom.
     *
     * @return mixed
     */
    public function getValue();
}
