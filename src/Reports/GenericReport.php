<?php

namespace Enzyme\Axiom\Reports;

use Enzyme\Axiom\Atoms\StringAtom;

class GenericReport implements ReportInterface
{
    /**
     * The human readable message describing this report.
     * @var StringAtom
     */
    protected $message;

    /**
     * The optional details associated with this report.
     * @var array
     */
    protected $details;

    /**
     * Create a new generic report given the message and optional
     * details associated with it.
     *
     * @param StringAtom $message
     * @param array      $details
     */
    public function __construct(StringAtom $message, array $details = [])
    {
        $this->message = $message;
        $this->details = $details;
    }

    /**
     * @see ReportInterface
     */
    public function getMessage()
    {
        return $this->message->getValue();
    }

    /**
     * @see ReportInterface
     */
    public function hasDetails()
    {
        return count($this->details) > 0;
    }

    /**
     * @see ReportInterface
     */
    public function getDetails()
    {
        return $this->details;
    }
}
