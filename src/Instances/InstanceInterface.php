<?php

namespace Enzyme\Axiom\Instances;

/**
 * A model/instance with an unique identifier.
 */
interface InstanceInterface
{
    /**
     * Get all the properties for this instance.
     *
     * @return array
     */
    public function getProperties();

    /**
     * Get the value associated with the given property.
     *
     * @param mixed $property
     *
     * @return mixed
     */
    public function getValueFor($property);

    /**
     * Whether this instance has a value for the given property.
     *
     * @param mixed $property
     *
     * @return boolean
     */
    public function hasValueFor($property);
}
