<?php

use Mockery as m;
use Enzyme\Axiom\Bags\ArrayBag;
use Enzyme\Axiom\Atoms\IntegerAtom;
use Enzyme\Axiom\Repositories\InMemoryRepository;

class InMemoryRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_repository_stores_models_as_expected()
    {
        $identity = 0;
        $factory = m::mock('Enzyme\Axiom\Factories\FactoryInterface');
        $model = m::mock('Enzyme\Axiom\Models\ModelInterface', function ($mock) use ($identity) {
            $mock->shouldReceive('identity')->once()->andReturn($identity);
        });

        $repo = new InMemoryRepository($factory);
        $repo->add($model);

        // Let's make sure the repo reports the new model as existing.
        $expected = true;
        $this->assertEquals($expected, $repo->has(new IntegerAtom($identity)));

        // And make sure it returns the new model as expected.
        $expected = $model;
        $this->assertEquals($expected, $repo->getById(new IntegerAtom($identity)));

        // And that the new model is the only model currently associated with this repo.
        $expected = [$model];
        $this->assertEquals($expected, $repo->getAll());
    }

    public function test_repository_removes_models_as_expected()
    {
        $identity = 0;
        $factory = m::mock('Enzyme\Axiom\Factories\FactoryInterface');
        $model = m::mock('Enzyme\Axiom\Models\ModelInterface', function ($mock) use ($identity) {
            $mock->shouldReceive('identity')->once()->andReturn($identity);
        });

        $repo = new InMemoryRepository($factory);
        $repo->add($model);
        $repo->removeById(new IntegerAtom($identity));

        // Let's make sure the repo reports the model as non-existent.
        $expected = false;
        $this->assertEquals($expected, $repo->has(new IntegerAtom($identity)));

        // And make sure it returns null if the model is requested.
        $expected = null;
        $this->assertEquals($expected, $repo->getById(new IntegerAtom($identity)));

        // And that the new model is not currently associated with this repo's collection.
        $expected = [];
        $this->assertEquals($expected, $repo->getAll());
    }

    public function test_repository_delegates_updates_to_factory_dependency_as_expected()
    {
        $identity = 0;
        $model = m::mock('Enzyme\Axiom\Models\ModelInterface', function ($mock) use ($identity) {
            $mock->shouldReceive('identity')->andReturn($identity);
        });
        $bag = new ArrayBag([]);
        $factory = m::mock('Enzyme\Axiom\Factories\FactoryInterface', function ($mock) use ($model, $bag) {
            $mock->shouldReceive('update')->once()->with($model, $bag)->andReturn($model);
        });

        $repo = new InMemoryRepository($factory);
        $repo->add($model);
        $repo->update($model, $bag);
    }
}
