<?php

namespace Enzyme\Axiom\Reports;

/**
 * Represents a report with a message and optional details. Generally
 * used to report a failure to the class handling some operation. For example;
 * the validation of user supplied input failed, and we're passing along the
 * reasons why it failed.
 */
interface ReportInterface
{
    /**
     * Get the human readable message associated with this container.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Wether this report has some associated details that will futher
     * describe why it was returned.
     *
     * @return boolean
     */
    public function hasDetails();

    /**
     * Get the details associated with this report.
     *
     * @return array
     */
    public function getDetails();
}
