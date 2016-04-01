<?php

namespace Enzyme\Axiom\Console;

use Enzyme\Parrot\File;
use InvalidArgumentException;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;

class Config
{
    /**
     * Reference to the Symfony YAML parser.
     *
     * @var Symfony\Component\Yaml\Parser
     */
    protected $parser;

    /**
     * Reference to a parrot file wrapper.
     *
     * @var Enzyme\Parrot\File
     */
    protected $file_dispatch;

    /**
     * The local configuration store.
     *
     * @var array
     */
    protected $store;

    /**
     * The parsed YAML configuration.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new configuration manager.
     *
     * @param Parser $parser
     * @param File   $file_dispatch
     */
    public function __construct(Parser $parser, File $file_dispatch)
    {
        $this->parser = $parser;
        $this->file_dispatch = $file_dispatch;
    }

    /**
     * Parse the given YAML file.
     *
     * @param string $file The path to the file.
     */
    public function parse($file)
    {
        if (false === $this->file_dispatch->exists($file)) {
            return;
        }

        $parsed_config = null;
        try {
            $parsed_config = $this->parser->parse(
                $this->file_dispatch->getContents($file)
            );
        } catch (ParseException $e) {
            throw new InvalidArgumentException(
                "The yaml configuration file [$file] is invalid."
            );
        }

        $this->config = $parsed_config;
        $this->setupStore();
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
        return $this->extract($this->store, $key, null);
    }

    /**
     * Setup the internal configuration store.
     */
    protected function setupStore()
    {
        $this->store = [
            'namespaces' => $this->getStoreNamespaces(),
            'locations' => $this->getStoreLocations(),
        ];
    }

    /**
     * Return an array of store namespaces.
     *
     * @return array
     */
    protected function getStoreNamespaces()
    {
        return [
            'repository' => $this->dotGet($this->config, 'repositories.namespace'),
            'factory'    => $this->dotGet($this->config, 'factories.namespace'),
        ];
    }

    /**
     * Return an array of store locations.
     *
     * @return array
     */
    protected function getStoreLocations()
    {
        return [
            'repository' => $this->dotGet($this->config, 'repositories.location'),
            'factory'    => $this->dotGet($this->config, 'factories.location'),
        ];
    }

    /**
     * Extract the given key from the array and return its value. If the
     * key does not exist, return the default value instead.
     *
     * @param array  $data
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    protected function extract($data, $key, $default)
    {
        if (false === isset($data[$key])
            && false === array_key_exists($key, $data)) {
            return $default;
        }

        return $data[$key];
    }

    /**
     * This funky little method will get the value from a multidimensional
     * array using a dot-path notation. Eg: 'foo.bar' will return the value 'ok'
     * from the example array below. If the key cannot be found, it will return
     * null instead.
     * $arr = [
     *    'foo' => [
     *        'bar' => 'ok'
     *    ]
     * ];
     *
     * @param array  $array
     * @param string $path
     *
     * @return null|mixed
     */
    protected function dotGet(array $array, $path)
    {
        $parts = explode('.', $path);
        $top = count($parts) - 1;
        $current = $array;
        $index = 0;

        foreach ($array as $key => $value) {
            // If we have only one path item left and this array key matches
            // it, let's immediately return its value.
            if ($key === $parts[0] && $index === $top) {
                return $value;
            }

            // If this array key matches the path item we're currently on,
            // let's dig in deeper and hope to find the full path.
            if ($key === $parts[0]) {
                // The next iteration will continue on the next available path
                // item chain. Eg: if we were on 'foo.bar.xzy', we'll be passing
                // in 'bar.xyz' to the recursive call.
                $new_path = array_slice($parts, 1);
                $new_path = implode('.', $new_path);

                return $this->dotGet($value, $new_path, 1);
            }

            // If we're currently sitting on a numerical key, let's dig in
            // deeper in hopes to find some string keys to work with.
            if (true === is_int($key)) {
                // Keep our current path chain.
                $new_path = implode('.', $parts);
                $hit = $this->dotGet($value, $new_path, 1);

                // If we found a match futher down the rabbit hole, let's
                // return that value here, otherwise let's do another iteration.
                if (null !== $hit) {
                    return $hit;
                }
            }
        }

        return null;
    }
}
