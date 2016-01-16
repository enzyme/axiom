<?php

namespace Enzyme\Axiom\Factories;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Carriers\CarrierInterface;

/**
 * Makes instances from the given data.
 */
interface FactoryInterface
{
    /**
     * Make a new instance from the given data.
     *
     * @param CarrierInterface $data
     *
     * @return Enzyme\Axiom\Instances\InstanceInterface
     */
    public function make(CarrierInterface $data);

    /**
     * Update the given instance with the data provided.
     *
     * @param InstanceInterface $instance Instance being updated.
     * @param CarrierInterface  $data     The new data.
     *
     * @return Enzyme\Axiom\Instances\InstanceInterface
     */
    public function update(InstanceInterface $instance, CarrierInterface $data);
}
