<?php

namespace Enzyme\Axiom\Repositories;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Atoms\AtomInterface;

/**
 * Manages a collection of instances.
 */
interface RepositoryInterface
{
    /**
     * Get a collection of all instances for this type.
     *
     * @return array
     */
    public function getAll();

    /**
     * Get an instance by the given id.
     *
     * @param AtomInterface $id The instance's id.
     *
     * @return Enzyme\Axiom\Instances\InstanceInterface
     */
    public function getById(AtomInterface $id);

    /**
     * Save the given instance to the underlying persistence layer.
     *
     * @param InstanceInterface $instance
     *
     * @return void
     */
    public function save(InstanceInterface $instance);
}
