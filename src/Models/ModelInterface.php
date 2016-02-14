<?php

namespace Enzyme\Axiom\Models;

interface ModelInterface
{
    /**
     * Get the unique identity for this mode.
     *
     * @return int
     */
    public function identity();

    /**
     * Checks whether this model has the given attribute set.
     *
     * @param string $attribute
     *
     * @return boolean
     */
    public function hasAttribute($attribute);

    /**
     * Get the value associated with the given attribute.
     *
     * @param string $attribute
     *
     * @return mixed
     */
    public function getAttribute($attribute);

    /**
     * Get all the attributes associated with this model.
     *
     * @return array
     */
    public function getAllAttributes();
}
