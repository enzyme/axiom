<?php

namespace Enzyme\Axiom\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeReportCommand extends BaseCommand
{
    /**
     * {@inheritDoc}
     */
    protected function getGeneratorType()
    {
        return 'report';
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        $this->executeGeneration($input, $output);
    }
}
