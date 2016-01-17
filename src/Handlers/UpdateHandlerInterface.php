<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Models\ModelInterface;
use Enzyme\Axiom\Reports\ReportInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of an update operation.
 */
interface UpdateHandlerInterface
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
