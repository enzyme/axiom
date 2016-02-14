<?php

namespace Enzyme\Axiom\Repositories;

use Enzyme\Axiom\Bags\BagInterface;
use Enzyme\Axiom\Atoms\IntegerAtom;
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
     * @param IntegerAtom $id
     *
     * @return void
     */
    public function removeById(IntegerAtom $id);

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
     * @param IntegerAtom $id
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function getById(IntegerAtom $id);

    /**
     * Get all models from this repository.
     *
     * @return array
     */
    public function getAll();

    /**
     * Check whether this repository has a model associated with the given ID.
     *
     * @param IntegerAtom $id
     *
     * @return boolean
     */
    public function has(IntegerAtom $id);
}
