<?php

namespace Enzyme\Axiom\Repositories;

use Enzyme\Axiom\Bags\BagInterface;
use Enzyme\Axiom\Atoms\IntegerAtom;
use Enzyme\Axiom\Models\ModelInterface;
use Enzyme\Axiom\Factories\FactoryInterface;

class InMemoryRepository implements RepositoryInterface
{
    protected $factory;
    protected $store;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
        $this->store = [];
    }

    public function add(ModelInterface $model)
    {
        $this->store[$model->identity()] = $model;
    }

    public function removeById(IntegerAtom $id)
    {
        if ($this->has($id)) {
            unset($this->store[$id->getValue()]);
        }
    }

    public function update(ModelInterface $model, BagInterface $data)
    {
        $updated_model = $this->factory->update($model, $data);
        $this->store[$model->identity()] = $updated_model;
    }

    public function getById(IntegerAtom $id)
    {
        return $this->has($id)
             ? $this->store[$id->getValue()]
             : null;
    }

    public function getAll()
    {
        return $this->store;
    }

    public function has(IntegerAtom $id)
    {
        return isset($this->store[$id->getValue()])
            && array_key_exists($id->getValue(), $this->store);
    }
}
