<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Reports\ReportInterface;
use Enzyme\Axiom\Models\ModelInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of a create operation.
 */
interface CreateHandlerInterface
{
    /**
     * Called when the create operation was a success.
     *
     * @param ModelInterface $model The newly created model.
     *
     * @return mixed
     */
    public function onCreateSuccess(ModelInterface $model);

    /**
     * Called when the create operation was a failure.
     *
     * @param ReportInterface $report The associated failure report.
     *
     * @return mixed
     */
    public function onCreateFailure(ReportInterface $report);
}
