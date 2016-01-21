<?php

namespace Enzyme\Axiom\Arbiters;

use Enzyme\Axiom\Models\ModelInterface;
use Enzyme\Axiom\Reports\ReportInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of a create operation.
 */
interface CreateArbiterInterface
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
