<?php

use Enzyme\Axiom\Bags\ArrayBag;

class ArrayBagTest extends PHPUnit_Framework_TestCase
{
    public function test_bag_stores_value_as_expected()
    {
        $expected = 'Bar';
        $bag = new ArrayBag(['foo' => $expected]);
        $this->assertEquals($expected, $bag->get('foo'));
    }

    public function test_bag_returns_null_for_unknown_key()
    {
        $expected = null;
        $bag = new ArrayBag(['foo' => 'bar']);
        $this->assertEquals($expected, $bag->get('PHP'));
    }

    public function test_bag_stores_values_as_expected()
    {
        $expected = ['foo' => 'Bar', 'PHP' => 'Rulez'];
        $bag = new ArrayBag($expected);
        $this->assertEquals($expected, $bag->getAll());
    }

    public function test_bag_reports_stored_value_as_expected()
    {
        $expected = true;
        $bag = new ArrayBag(['foo' => 'bar']);
        $this->assertEquals($expected, $bag->has('foo'));
    }
}
