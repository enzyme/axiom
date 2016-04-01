<?php

namespace Enzyme\Axiom\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeRepositoryCommand extends BaseCommand
{
    protected $namespace_affix = 'Repositories';

    protected function configure()
    {
        parent::configure();

        $this
            ->setName('make:repository')
            ->setDescription('Make a new repository.')
            ->addArgument(
                'model',
                InputArgument::REQUIRED,
                'The name of the domain model to generate the repository for.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $model = ucfirst($input->getArgument('model'));

        $contents = $this->stub_manager->get('repository');
        $contents = $this->stub_manager->hydrate($contents, [
            'namespace' => $this->namespace,
            'model'     => $model,
        ]);

        $this->stub_manager->writeOut($contents, $this->location);

        $this->printResults($output, $model, 'Repository');
    }
}
