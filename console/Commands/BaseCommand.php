<?php

namespace Enzyme\Axiom\Console\Commands;

use Exception;
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
    protected $stub_manager;
    protected $namespace;
    protected $location;

    public function __construct(StubManager $stub_manager, Config $config)
    {
        parent::__construct();

        $this->stub_manager = $stub_manager;
        $this->config = $config;
    }

    abstract protected function getGeneratorType();

    protected function configure()
    {
        $generator_type = $this->getGeneratorType();

        $this
            ->setName("make:{$generator_type}")
            ->setDescription("Make a new $generator_type.")
            ->addArgument(
                'model',
                InputArgument::REQUIRED,
                "The name of the domain model to generate the $generator_type for."
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

    protected function executeGeneration(
        InputInterface $input,
        OutputInterface $output
    ) {
        $uc_model = ucfirst($input->getArgument('model'));
        $uc_type = ucfirst($this->getGeneratorType());

        $contents = $this->stub_manager->get($this->getGeneratorType());
        $contents = $this->stub_manager->hydrate($contents, [
            'namespace' => $this->namespace,
            'model'     => $uc_model,
        ]);

        $this->stub_manager->writeOut(
            $contents,
            "{$this->location}/{$uc_model}{$uc_type}.php"
        );

        $this->printResults(
            $output,
            $uc_model,
            ucfirst($this->getGeneratorType())
        );
    }

    /**
     * Print the generation results to the console window.
     *
     * @param OutputInterface $output
     * @param string          $model The domain model.
     * @param string          $type  The generation type, eg: Factory.
     */
    protected function printResults(OutputInterface $output, $model)
    {
        $uc_type = ucfirst($this->getGeneratorType());
        $output->writeln("<info>$uc_type created for model [$model]</info>");

        if (true === $output->isVerbose()) {
            $output->writeln("<comment>    Namespace -> $this->namespace</comment>");
            $output->writeln("<comment>        Class -> {$model}{$uc_type}</comment>");
            $output->writeln("<comment>     Location -> $this->location</comment>");
        }
    }
}
