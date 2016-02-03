<?php

namespace Enzyme\Axiom\Factories;

use Enzyme\Axiom\Bags\BagInterface;
use Enzyme\Axiom\Models\ModelInterface;

interface FactoryInterface
{
    /**
     * Make a new model given the data provided.
     *
     * @param BagInterface $data
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function make(BagInterface $data);

    /**
     * Update the model provided with the given data.
     *
     * @param ModelInterface $model
     * @param BagInterface   $data
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function update(ModelInterface $model, BagInterface $data);
}
