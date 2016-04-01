<?php

namespace Enzyme\Axiom\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeRepositoryCommand extends BaseCommand
{
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
            'uc_model'  => $model,
        ]);

        $this->stub_manager->writeOut($contents, $input->getArgument('location'));

        $output->writeln("<info>Repository created for model $model</info>");
        $output->writeln("<comment>\tNamespace -> $this->namespace</comment>");
        $output->writeln("<comment>\tClass -> {$model}Repository</comment>");
    }
}
