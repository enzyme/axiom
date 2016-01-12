<?php

use Enzyme\Axiom\Atoms\BooleanAtom;

class BooleanAtomTest extends PHPUnit_Framework_TestCase
{
    public function test_atom_stores_correct_base_value()
    {
        $expected = true;
        $atom = new BooleanAtom($expected);
        $this->assertEquals($expected, $atom->getValue());

        $expected = false;
        $atom = new BooleanAtom($expected);
        $this->assertEquals($expected, $atom->getValue());
    }

    /**
     * @expectedException \Enzyme\Axiom\Exceptions\AtomException
     */
    public function test_atom_throws_exception_when_initialised_with_invalid_value()
    {
        new BooleanAtom('false');
    }
}
