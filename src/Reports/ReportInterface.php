<?php

namespace Enzyme\Axiom\Reports;

interface ReportInterface
{
    public function message();

    public function hasDetails();

    public function getDetails();
}
