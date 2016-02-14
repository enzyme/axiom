<?php

namespace Enzyme\Axiom\Recipients;

use Enzyme\Axiom\Models\ModelInterface;
use Enzyme\Axiom\Reports\ReportInterface;

interface OnCreateRecipientInterface
{
    /**
     * Called when the creation of a model was a success.
     *
     * @param ModelInterface $model The newly created model.
     *
     * @return mixed
     */
    public function onCreateSuccess(ModelInterface $model);

    /**
     * Called when the creation of a model was a failure.
     *
     * @param ReportInterface $report The failure report.
     *
     * @return mixed
     */
    public function onCreateFailure(ReportInterface $report);
}
