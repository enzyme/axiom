<?php

use Enzyme\Axiom\Reports\FailureReport;
use Enzyme\Axiom\Atoms\StringAtom;

class FailureReportTest extends PHPUnit_Framework_TestCase
{
    public function test_failure_report_stores_correct_message()
    {
        $expected = 'Hello World';
        $container = new FailureReport(new StringAtom($expected));
        $this->assertEquals($expected, $container->getMessage());
    }

    public function test_failure_report_stores_correct_details()
    {
        $expected = ['Foo', 'Bar'];
        $container = new FailureReport(new StringAtom('Foo'), $expected);
        $this->assertEquals($expected, $container->getDetails());
    }

    public function test_failure_report_returns_no_details_if_not_given_any()
    {
        $expected = false;
        $container = new FailureReport(new StringAtom('Hello World'));
        $this->assertEquals($expected, $container->hasDetails());

        $expected = [];
        $container = new FailureReport(new StringAtom('Hello World'));
        $this->assertEquals($expected, $container->getDetails());
    }
}
