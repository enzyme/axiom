<?php

namespace Enzyme\Axiom\Reports;

class SimpleReport implements ReportInterface
{
    protected $message;
    protected $details;

    public function __construct($message, $details = [])
    {
        $this->message = $message;
        $this->details = $details;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function hasDetails()
    {
        return count($this->details) > 0;
    }

    public function getDetails()
    {
        return $this->details;
    }
}
