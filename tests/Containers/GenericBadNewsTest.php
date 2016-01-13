<?php

use Enzyme\Axiom\Containers\GenericBadNews;
use Enzyme\Axiom\Atoms\StringAtom;

class GenericBadNewsTest extends PHPUnit_Framework_TestCase
{
    public function test_generic_bad_news_stores_correct_message()
    {
        $expected = 'Hello World';
        $container = new GenericBadNews(new StringAtom($expected));

        $this->assertEquals($expected, $container->getMessage());
    }

    public function test_generic_bad_news_stores_correct_reasons()
    {
        $expected = ['Foo', 'Bar'];
        $container = new GenericBadNews(new StringAtom('Foo'), $expected);

        $this->assertEquals($expected, $container->getReasons());
    }

    public function test_generic_bad_news_returns_no_reasons_if_not_given_any()
    {
        $expected = false;
        $container = new GenericBadNews(new StringAtom('Hello World'));
        $this->assertEquals($expected, $container->hasReasons());

        $expected = null;
        $container = new GenericBadNews(new StringAtom('Hello World'));
        $this->assertEquals($expected, $container->getReasons());
    }
}
