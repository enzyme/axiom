<?php

namespace Enzyme\Axiom\Console\Commands;

use ICanBoogie\Inflector;
use Enzyme\Axiom\Console\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Enzyme\Axiom\Console\Stubs\Manager as StubManager;

abstract class BaseCommand extends Command
{
    /**
     * Reference to the stub manager.
     *
     * @var \Enzyme\Axiom\Console\Stubs\Manager
     */
    protected $stub_manager;

    /**
     * The namespace this generated class falls under.
     *
     * @var string
     */
    protected $namespace;

    /**
     * The location this generated class will be saved at.
     *
     * @var string
     */
    protected $location;

    /**
     * The global configuration manager.
     *
     * @var \Enzyme\Axiom\Console\Config
     */
    protected $config;

    /**
     * Instantiate a new command.
     *
     * @param \Enzyme\Axiom\Console\Stubs\Manager $stub_manager
     * @param \Enzyme\Axiom\Console\Config        $config
     */
    public function __construct(StubManager $stub_manager, Config $config)
    {
        parent::__construct();

        $this->stub_manager = $stub_manager;
        $this->config = $config;
        $this->location = null;
        $this->namespace = null;
    }

    /**
     * The generator type this class is handling, eg: "factory".
     *
     * @return string
     */
    abstract protected function getGeneratorType();

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $generator_type = $this->getGeneratorType();

        $this
            ->setName("make:{$generator_type}")
            ->setDescription("Make a new {$generator_type}.")
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                "The name prefix on the generated {$generator_type}, eg: \"user\""
            )
            ->addOption(
                'location',
                null,
                InputOption::VALUE_REQUIRED,
                'The location for the generated file.'
            )
            ->addOption(
               'namespace',
               null,
               InputOption::VALUE_REQUIRED,
               'The namespace to fall under.'
            );
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inflector = Inflector::get(Inflector::DEFAULT_LOCALE);
        $type_plural = $inflector->pluralize($this->getGeneratorType());

        $this->namespace = $input->getOption('namespace') !== null
            ? $input->getOption('namespace')
            : $this->config->get("{$type_plural}.namespace");

        $this->location = $input->getOption('location') !== null
            ? $input->getOption('location')
            : $this->config->get("{$type_plural}.location");

        if (null === $this->namespace) {
            throw new Exception(
                "There is no namespace defined for {$type_plural}"
            );
        }

        if (null === $this->location) {
            throw new Exception(
                "There is no location defined for {$type_plural}"
            );
        }
    }

    /**
     * Execute a generation command - make a single usuable Axiom class. If
     * $dont_affix_type is true, do not add the class type to the end of the
     * name, this is useful for models which generally are just named as they
     * are and don't have "Model" affixed, eg: "User", not "UserModel".
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param bool                                              $dont_affix_type
     */
    protected function executeGeneration(
        InputInterface $input,
        OutputInterface $output,
        $dont_affix_type = false
    ) {
        $uc_name = ucfirst($input->getArgument('name'));
        $uc_type = ucfirst($this->getGeneratorType());

        $contents = $this->stub_manager->get($this->getGeneratorType());
        $contents = $this->stub_manager->hydrate($contents, [
            'namespace' => $this->namespace,
            'name'      => $uc_name,
        ]);

        $out_file = $dont_affix_type === true
            ? "{$this->location}/{$uc_name}.php"
            : "{$this->location}/{$uc_name}{$uc_type}.php";

        $this->stub_manager->writeOut($contents, $out_file);

        $this->printResults(
            $output,
            $uc_name,
            $dont_affix_type
        );
    }

    /**
     * Print the results of the generate operation to the console window.
     *
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param string                                            $name
     * @param bool                                              $dont_affix_type
     */
    protected function printResults(
        OutputInterface $output,
        $name,
        $dont_affix_type = false
    ) {
        $uc_type = ucfirst($this->getGeneratorType());
        $output->writeln("<info>{$uc_type} created for [{$name}]</info>");

        $class = $dont_affix_type === true
            ? $name
            : $name.$uc_type;

        if (true === $output->isVerbose()) {
            $output->writeln("<comment>    Namespace -> {$this->namespace}</comment>");
            $output->writeln("<comment>        Class -> {$class}</comment>");
            $output->writeln("<comment>     Location -> {$this->location}</comment>");
        }
    }
}
