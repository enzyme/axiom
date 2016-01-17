<?php

namespace Enzyme\Axiom\Handlers;

use Enzyme\Axiom\Models\ModelInterface;
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
     * @param ModelInterface $model A shallow copy of the destroyed model.
     *
     * @return mixed
     */
    public function onDestroySuccess(ModelInterface $model);

    /**
     * Called when the destroy operation was a failure.
     *
     * @param ReportInterface $report The associated failure message.
     *
     * @return mixed
     */
    public function onDestroyFailure(ReportInterface $report);
}
