<?php

namespace Enzyme\Axiom\Models;

/**
 * An object representing a model in your domain.
 */
interface ModelInterface
{
    /**
     * Get all the properties for this model.
     *
     * @return array
     */
    public function getAllProperties();

    /**
     * Get the value associated with the given property.
     *
     * @param mixed $property
     *
     * @return mixed
     */
    public function getValueFor($property);

    /**
     * Whether this model has a value for the given property.
     *
     * @param mixed $property
     *
     * @return boolean
     */
    public function hasValueFor($property);
}
