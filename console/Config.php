<?php

namespace Enzyme\Axiom\Console;

use Enzyme\Parrot\File;
use Enzyme\Freckle\Dot;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

class Config
{
    /**
     * Reference to the Symfony YAML parser.
     *
     * @var \Symfony\Component\Yaml\Parser
     */
    protected $parser;

    /**
     * Reference to a parrot file wrapper.
     *
     * @var \Enzyme\Parrot\File
     */
    protected $file_dispatch;

    /**
     * The parsed YAML configuration.
     *
     * @var array
     */
    protected $config;

    /**
     * The dot array accessor.
     *
     * @var \Enzyme\Freckle\Dot
     */
    protected $dot;

    /**
     * Create a new configuration manager.
     *
     * @param \Symfony\Component\Yaml\Parser $parser
     * @param \Enzyme\Parrot\File            $file_dispatch
     * @param \Enzyme\Freckle\Dot            $dot
     */
    public function __construct(Parser $parser, File $file_dispatch, Dot $dot)
    {
        $this->parser = $parser;
        $this->file_dispatch = $file_dispatch;
        $this->dot = $dot;
        $this->config = [];
    }

    /**
     * Parse the given YAML file.
     *
     * @param string $file The path to the file.
     *
     * @throws Exception If the YAML file cannot be parsed.
     */
    public function parse($file)
    {
        if (false === $this->file_dispatch->exists($file)) {
            return;
        }

        try {
            $results = $this->parser->parse(
                $this->file_dispatch->getContents($file)
            );

            if (true === is_array($results)) {
                $this->config = $results;
            }
        } catch (ParseException $e) {
            throw new Exception(
                "The yaml configuration file [$file] is invalid."
            );
        }
    }

    /**
     * Get the value associated with the given key, if the key does not
     * exist, return null.
     *
     * @param string $key
     *
     * @return null|string
     */
    public function get($key)
    {
        if (count($this->config) < 1) {
            return null;
        }

        return $this->dot->get($this->config, $key);
    }
}
