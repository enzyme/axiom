<?php

namespace Enzyme\Axiom\Repositories;

use Enzyme\Axiom\Atoms\AtomInterface;
use Enzyme\Axiom\Models\ModelInterface;

/**
 * Manages a collection of models.
 */
interface RepositoryInterface
{
    /**
     * Get a collection of all models for this type.
     *
     * @return array
     */
    public function getAll();

    /**
     * Get a model with the given id.
     *
     * @param AtomInterface $id
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function getById(AtomInterface $id);

    /**
     * Save the given model to the underlying persistence layer
     * and return the model with any new properties set (such as ID).
     *
     * @param ModelInterface $model
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function save(ModelInterface $model);
}
