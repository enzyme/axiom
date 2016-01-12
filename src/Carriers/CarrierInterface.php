<?php

namespace Enzyme\Axiom\Carriers;

/**
 * Holds a collection of read-only data for instance creation.
 */
interface CarrierInterface
{
    /**
     * Get the associated value for the given key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getValueFor($key);
}
