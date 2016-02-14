<?php

namespace Enzyme\Axiom\Recipients;

use Enzyme\Axiom\Models\ModelInterface;
use Enzyme\Axiom\Reports\ReportInterface;

interface OnDeleteRecipientInterface
{
    /**
     * Called when the deletion of a model was a success.
     *
     * @param ModelInterface $model A shell copy of the deleted model.
     *
     * @return mixed
     */
    public function onDeleteSuccess(ModelInterface $model);

    /**
     * Called when the deletion of a model was a failure.
     *
     * @param ReportInterface $report The failure report.
     *
     * @return mixed
     */
    public function onDeleteFailure(ReportInterface $report);
}
