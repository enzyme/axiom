<?php

namespace Enzyme\Axiom\Carriers;

/**
 * Holds a collection of read-only data for instance creation/modification.
 */
interface CarrierInterface
{
    /**
     * Get all the values associated with this carrier.
     *
     * @return array
     */
    public function getAllValues();

    /**
     * Get the associated value for the given key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function getValueFor($key);

    /**
     * Check if there is an associated value for the given key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function hasValueFor($key);
}
