<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Containers\BadNewsInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of a create operation.
 */
interface CreateHandlerInterface
{
    /**
     * Called when the create operation was a success.
     *
     * @param InstanceInterface $instance The newly created instance.
     *
     * @return mixed
     */
    public function onCreateSuccess(InstanceInterface $instance);

    /**
     * Called when the create operation was a failure.
     *
     * @param BadNewsInterface $container The associated bad news.
     *
     * @return mixed
     */
    public function onCreateFailure(BadNewsInterface $container);
}
