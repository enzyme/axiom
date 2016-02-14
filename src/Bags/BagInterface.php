<?php

namespace Enzyme\Axiom\Bags;

interface BagInterface
{
    /**
     * Get the value associated with the given key. If the key does not
     * exist, return null instead.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * Get all the key/value pairs for this bag.
     *
     * @return array
     */
    public function getAll();

    /**
     * Check whether there is a value associated with the given key.
     *
     * @param string $key
     *
     * @return boolean
     */
    public function has($key);
}
