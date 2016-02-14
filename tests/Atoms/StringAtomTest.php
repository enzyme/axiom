<?php

use Enzyme\Axiom\Atoms\StringAtom;

class StringAtomTest extends PHPUnit_Framework_TestCase
{
    public function test_atom_stores_correct_base_value()
    {
        $expected = 'Foo Bar';
        $atom = new StringAtom($expected);
        $this->assertEquals($expected, $atom->getValue());

        $expected = '25';
        $atom = new StringAtom($expected);
        $this->assertEquals($expected, $atom->getValue());

        $expected = '';
        $atom = new StringAtom($expected);
        $this->assertEquals($expected, $atom->getValue());
    }

    /**
     * @expectedException \Enzyme\Axiom\Exceptions\AtomException
     */
    public function test_atom_throws_exception_when_initialised_with_invalid_value()
    {
        new StringAtom(5);
    }
}
