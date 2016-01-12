<?php

namespace Enzyme\Axiom\Instances;

/**
 * A model/instance with an unique identifier.
 */
interface InstanceInterface
{
    /**
     * Get this instance's unique identifier.
     *
     * @return Enzyme\Axiom\Atoms\IntAtom
     */
    public function getId();
}
