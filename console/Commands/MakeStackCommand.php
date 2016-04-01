<?php

namespace Enzyme\Axiom\Console\Commands;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeStackCommand extends BaseCommand
{
    /**
     * {@inheritDoc}
     */
    protected function getGeneratorType()
    {
        return 'stack';
    }

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $generator_type = $this->getGeneratorType();

        $this
            ->setName("make:{$generator_type}")
            ->setDescription("Make a new resource stack.")
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                "The name to prefix on every generated class, eg: \"user\"."
            )
            ->addOption(
                'ignore',
                null,
                InputOption::VALUE_REQUIRED,
                'A comma separated list of class types to ignore.'
            );
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ignore_list = [];
        $ignore = $input->getOption('ignore');
        if (null !== $ignore) {
            $ignore_list = array_flip(explode(',', $ignore));
        }

        $classes = [
            'bag', 'factory', 'model', 'repository',
        ];

        $name = $input->getArgument('name');
        foreach ($classes as $class) {
            if (isset($ignore_list[$class]) === true) {
                continue;
            }

            $command = $this->getApplication()->find("make:{$class}");
            $arguments = array(
                'name' => $name,
            );
            $input = new ArrayInput($arguments);
            $command->run($input, $output);
        }
    }
}
