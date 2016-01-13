<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Containers\BadNewsInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of an update operation.
 */
interface UpdateHandlerInterface
{
    /**
     * Called when the update operation was a success.
     *
     * @param InstanceInterface $instance The updated instance.
     *
     * @return mixed
     */
    public function onUpdateSuccess(InstanceInterface $instance);

    /**
     * Called when the update operation was a failure.
     *
     * @param BadNewsInterface $container The associated bad news.
     *
     * @return mixed
     */
    public function onUpdateFailure(BadNewsInterface $container);
}
