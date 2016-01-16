<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Instances\InstanceInterface;
use Enzyme\Axiom\Reports\ReportInterface;

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
     * @param ReportInterface $report The associated failure report.
     *
     * @return mixed
     */
    public function onCreateFailure(ReportInterface $report);
}
