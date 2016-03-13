<?php

namespace Enzyme\Axiom\Repositories;

use Enzyme\Axiom\Bags\BagInterface;
use Enzyme\Axiom\Atoms\AtomInterface;
use Enzyme\Axiom\Models\ModelInterface;

interface RepositoryInterface
{
    /**
     * Add the given model to the repository.
     *
     * @param ModelInterface $model
     */
    public function add(ModelInterface $model);

    /**
     * Remove the model with the given ID from the repository.
     *
     * @param AtomInterface $id
     *
     * @return void
     */
    public function removeById(AtomInterface $id);

    /**
     * Update the given model with the supplied data.
     *
     * @param ModelInterface $model
     * @param BagInterface   $data
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function update(ModelInterface $model, BagInterface $data);

    /**
     * Get the model associated with the given ID.
     *
     * @param AtomInterface $id
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function getById(AtomInterface $id);

    /**
     * Get all models from this repository.
     *
     * @return array
     */
    public function getAll();

    /**
     * Check whether this repository has a model associated with the given ID.
     *
     * @param AtomInterface $id
     *
     * @return boolean
     */
    public function has(AtomInterface $id);
}
