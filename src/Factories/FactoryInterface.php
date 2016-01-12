<?php

namespace Enzyme\Axiom\Factories;

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
     * @return InstanceInterface
     */
    public function make(CarrierInterface $data);
}
