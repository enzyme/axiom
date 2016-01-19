<?php

namespace Enzyme\Axiom\Arbiters;

use Enzyme\Axiom\Reports\ReportInterface;
use Enzyme\Axiom\Models\ModelInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of an update operation.
 */
interface UpdateArbiterInterface
{
    /**
     * Called when the update operation was a success.
     *
     * @param ModelInterface $model The updated model.
     *
     * @return mixed
     */
    public function onUpdateSuccess(ModelInterface $model);

    /**
     * Called when the update operation was a failure.
     *
     * @param ReportInterface $report The associated failure message.
     *
     * @return mixed
     */
    public function onUpdateFailure(ReportInterface $report);
}
