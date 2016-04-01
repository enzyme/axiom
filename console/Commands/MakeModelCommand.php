<?php

namespace Enzyme\Axiom\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeModelCommand extends BaseCommand
{
    /**
     * {@inheritDoc}
     */
    protected function getGeneratorType()
    {
        return 'model';
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $dont_affix_type = true;
        $this->executeGeneration($input, $output, $dont_affix_type);
    }
}
