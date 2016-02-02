<?php

namespace Enzyme\Axiom\Repositories;

interface RepositoryInterface
{
    public function add();

    public function remove();

    public function update();

    public function getById();

    public function getAll();
}
