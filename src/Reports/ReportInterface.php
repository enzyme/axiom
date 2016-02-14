<?php

namespace Enzyme\Axiom\Reports;

interface ReportInterface
{
    /**
     * Get the human readable message associated with this report.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Whether this report has additional details.
     *
     * @return boolean
     */
    public function hasDetails();

    /**
     * Get the additional details associated with this report.
     *
     * @return array
     */
    public function getDetails();
}
