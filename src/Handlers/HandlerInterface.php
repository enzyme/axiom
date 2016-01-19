<?php

namespace Enzyme\Axiom\Commands;

use Enzyme\Axiom\Commands\CommandInterface;

/**
 * Handlers handle commands dispatched by controllers or other systems.
 */
interface HandlerInterface
{
    /**
     * Handles the given command.
     *
     * @param CommandInterface $command
     *
     * @return mixed
     */
    public function handle(CommandInterface $command);
}
