<?php

namespace Enzyme\Axiom\Bags;

class ArrayBag implements BagInterface
{
    protected $store;

    public function __construct(array $store)
    {
        $this->store = $store;
    }

    public function get($key)
    {
        if ($this->has($key)) {
            return $this->store[$key];
        }

        return null;
    }

    public function getAll()
    {
        return $this->store;
    }

    public function has($key)
    {
        return isset($this->store[$key])
            && array_key_exists($key, $this->store);
    }
}
