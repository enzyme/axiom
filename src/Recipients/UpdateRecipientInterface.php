<?php

namespace Enzyme\Axiom\Recipients;

use Enzyme\Axiom\Models\ModelInterface;
use Enzyme\Axiom\Reports\ReportInterface;

interface UpdateRecipientInterface
{
    /**
     * Called when the modification of a model was a success.
     *
     * @param ModelInterface $model The updated model.
     *
     * @return mixed
     */
    public function onUpdateSuccess(ModelInterface $model);

    /**
     * Called when the modification of a model was a failure.
     *
     * @param ReportInterface $report The failure report.
     *
     * @return mixed
     */
    public function onUpdateFailure(ReportInterface $report);
}
