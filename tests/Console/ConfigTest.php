<?php

use Mockery as m;
use Enzyme\Freckle\Dot;
use Enzyme\Axiom\Console\Config;
use Symfony\Component\Yaml\Parser;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_config_returns_early_when_file_does_not_exist()
    {
        $file = 'fake.yaml';
        $file_dispatch = m::mock(
            'Enzyme\Parrot\File[exists]',
            function($mock) use($file) {
                $mock
                    ->shouldReceive('exists')
                    ->with($file)
                    ->times(1)
                    ->andReturn(false);
            }
        );

        $config = new Config(new Parser, $file_dispatch, new Dot);
        $config->parse($file);
    }

    public function test_config_stores_correct_values_from_valid_yaml_file()
    {
        $file = 'fake.yaml';
        $contents = "repositories:\n";
        $contents .= "    - location: ~/Code/Acme/src/Repos\n";
        $contents .= "    - namespace: Acme\Repos\n";
        $file_dispatch = m::mock(
            'Enzyme\Parrot\File[exists,getContents]',
            function($mock) use($file, $contents) {
                $mock
                    ->shouldReceive('exists')
                    ->with($file)
                    ->times(1)
                    ->andReturn(true);
                $mock
                    ->shouldReceive('getContents')
                    ->with($file)
                    ->times(1)
                    ->andReturn($contents);
            }
        );

        $config = new Config(new Parser, $file_dispatch, new Dot);
        $config->parse($file);
        $expected = '~/Code/Acme/src/Repos';
        $actual = $config->get('repositories.location');

        $this->assertEquals($expected, $actual);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_config_throws_exception_on_bad_yaml_parse()
    {
        $file = 'fake.yaml';
        $parser = m::mock(
            'Symfony\Component\Yaml\Parser[parse]',
            function($mock) {
                $mock
                    ->shouldReceive('parse')
                    ->andThrow(new InvalidArgumentException('oops'));
            }
        );
        $file_dispatch = m::mock(
            'Enzyme\Parrot\File[exists,getContents]',
            function($mock) use($file) {
                $mock
                    ->shouldReceive('exists')
                    ->with($file)
                    ->times(1)
                    ->andReturn(true);
                $mock
                    ->shouldReceive('getContents')
                    ->with($file)
                    ->times(1)
                    ->andReturn('bad');
            }
        );

        $config = new Config($parser, $file_dispatch, new Dot);
        $config->parse($file);
    }
}
