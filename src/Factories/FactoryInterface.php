<?php

namespace Enzyme\Axiom\Factories;

use Enzyme\Axiom\Carriers\CarrierInterface;
use Enzyme\Axiom\Models\ModelInterface;

/**
 * Makes and updates models.
 */
interface FactoryInterface
{
    /**
     * Make a new model from the given data.
     *
     * @param CarrierInterface $data
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function make(CarrierInterface $data);

    /**
     * Update the given model with the data provided.
     *
     * @param ModelInterface   $model The model being updated.
     * @param CarrierInterface $data  The new data.
     *
     * @return \Enzyme\Axiom\Models\ModelInterface
     */
    public function update(ModelInterface $model, CarrierInterface $data);
}
