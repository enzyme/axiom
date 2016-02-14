<?php

use Enzyme\Axiom\Reports\SimpleReport;

class SimpleReportTest extends PHPUnit_Framework_TestCase
{
    public function test_report_stores_message_as_expected()
    {
        $expected = 'Something went wrong.';
        $report = new SimpleReport($expected);
        $this->assertEquals($expected, $report->getMessage());
    }

    public function test_report_stores_details_as_expected()
    {
        $expected = ['tests' => 'required'];
        $report = new SimpleReport('Foo Bar went pear shaped.', $expected);
        $this->assertEquals($expected, $report->getDetails());
    }

    public function test_report_reports_details_as_expected()
    {
        $expected = true;
        $report = new SimpleReport(
            'It went pear shaped again.', ['tests' => 'required']
        );
        $this->assertEquals($expected, $report->hasDetails());

        $expected = false;
        $report = new SimpleReport('Foo Bar went pear shaped.');
        $this->assertEquals($expected, $report->hasDetails());
    }
}
