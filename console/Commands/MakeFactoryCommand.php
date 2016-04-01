<?php

namespace Enzyme\Axiom\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeFactoryCommand extends BaseCommand
{
    protected $namespace_affix = 'Factories';

    protected function configure()
    {
        parent::configure();

        $this
            ->setName('make:factory')
            ->setDescription('Make a new factory.')
            ->addArgument(
                'model',
                InputArgument::REQUIRED,
                'The name of the domain model to generate the factory for.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $model = ucfirst($input->getArgument('model'));

        $contents = $this->stub_manager->get('factory');
        $contents = $this->stub_manager->hydrate($contents, [
            'namespace' => $this->namespace,
            'model'     => $model,
        ]);

        $this->stub_manager->writeOut($contents, $this->location);

        $this->printResults($output, $model, 'Factory');
    }
}
