<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Containers\BadNewsInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of a destroy operation.
 */
interface DestroyHandlerInterface
{
    /**
     * Called when the destroy operation was a success.
     *
     * @param InstanceInterface $instance A copy of the destroyed instance.
     *
     * @return mixed
     */
    public function onDestroySuccess(InstanceInterface $instance);

    /**
     * Called when the destroy operation was a failure.
     *
     * @param BadNewsInterface $container The associated bad news.
     *
     * @return mixed
     */
    public function onDestroyFailure(BadNewsInterface $container);
}
