<?php

namespace Enzyme\Axiom\Arbiters;

use Enzyme\Axiom\Reports\ReportInterface;
use Enzyme\Axiom\Models\ModelInterface;

/**
 * Describes a class that will handle the positive or negative result
 * of a destroy operation.
 */
interface DestroyArbiterInterface
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
