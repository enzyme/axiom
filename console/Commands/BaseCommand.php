<?php

namespace Enzyme\Axiom\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Enzyme\Axiom\Console\Stubs\Manager as StubManager;

class BaseCommand extends Command
{
    protected $stub_manager;
    protected $namespace;
    protected $location;

    public function __construct(StubManager $stub_manager)
    {
        parent::__construct();
        $this->stub_manager = $stub_manager;
    }

    protected function configure()
    {
        $this
            ->addArgument(
                'location',
                InputArgument::REQUIRED,
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
        $this->namespace = $input->getOption('namespace');
        if (null === $this->namespace) {
            $this->namespace = '// to be completed';
        }
    }
}
