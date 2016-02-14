<?php

use Enzyme\Axiom\Atoms\IntegerAtom;

class IntegerAtomTest extends PHPUnit_Framework_TestCase
{
    public function test_atom_stores_correct_base_value()
    {
        $expected = 5;
        $atom = new IntegerAtom($expected);
        $this->assertEquals($expected, $atom->getValue());

        $expected = 25;
        $atom = new IntegerAtom($expected);
        $this->assertEquals($expected, $atom->getValue());

        $expected = PHP_INT_MAX;
        $atom = new IntegerAtom($expected);
        $this->assertEquals($expected, $atom->getValue());
    }

    /**
     * @expectedException \Enzyme\Axiom\Exceptions\AtomException
     */
    public function test_atom_throws_exception_when_initialised_with_invalid_value()
    {
        new IntegerAtom('foobar');
    }

    /**
     * @expectedException \Enzyme\Axiom\Exceptions\AtomException
     */
    public function test_atom_throws_exception_when_initialised_with_floating_value()
    {
        new IntegerAtom(100.5);
    }
}
