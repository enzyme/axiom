<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Reports\ReportInterface;

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
     * @param ReportInterface $report The associated failure message.
     *
     * @return mixed
     */
    public function onDestroyFailure(ReportInterface $report);
}
