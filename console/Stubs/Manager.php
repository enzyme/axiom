<?php

namespace Enzyme\Axiom\Console\Stubs;

use Enzyme\Parrot\File;

class Manager
{
    /**
     * The location of the stubs directory.
     *
     * @var string
     */
    protected $stubs_dir;

    /**
     * An instance of a parrot file wrapper.
     *
     * @var \Enzyme\Parrot\File
     */
    protected $file_dispatch;

    /**
     * Create a new stub manager.
     *
     * @param \Enzyme\Parrot\File $file_dispatch
     */
    public function __construct(File $file_dispatch)
    {
        $this->stubs_dir = __DIR__ . '/';
        $this->file_dispatch = $file_dispatch;
    }

    /**
     * Get the contents for the provided stub. Will throw an
     * \InvalidArgumentException if the stub by the given name does not exist.
     *
     * @param string $stub
     *
     * @return string
     */
    public function get($stub)
    {
        $file = $this->stubs_dir . $stub . '.stub';

        if (false === $this->file_dispatch->exists($file)) {
            throw new InvalidArgumentException(
                "The stub [$stub] does not exist"
            );
        }

        return $this->file_dispatch->getContents($file);
    }

    /**
     * Hydrate the given contents, replacing the given keys with the values
     * provided in the associative array.
     *
     * @param string $contents
     * @param array  $data
     *
     * @return string
     */
    public function hydrate($contents, array $data)
    {
        foreach ($data as $key => $value) {
            $contents = str_replace('%' . $key . '%', $value, $contents);
        }

        return $contents;
    }

    /**
     * Write the given contents out to the specified file.
     *
     * @param string $contents
     * @param string $path
     */
    public function writeOut($contents, $path)
    {
        $this->file_dispatch->putContents($path, $contents);
    }
}
