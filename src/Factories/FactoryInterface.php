<?php

namespace Enzyme\Axiom\Factories;

use Enzyme\Axiom\Carriers\CarrierInterface;

interface FactoryInterface
{
    public function make(CarrierInterface $data);
}
