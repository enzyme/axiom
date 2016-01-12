<?php

namespace Enzyme\Axiom\Repositories;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Atoms\IntAtom;

interface RepositoryInterface
{
    public function all();

    public function getById(IntAtom $id);

    public function save(InstanceInterface $instance);
}
