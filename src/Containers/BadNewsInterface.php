<?php

namespace Enzyme\Axiom\Containers;

/**
 * Represents a container with a message and optional reasons. Generally
 * used to report a failure to the class handling some operation. For example;
 * the validation of user supplied input failed, and we're passing along the
 * reasons why it failed.
 */
interface BadNewsInterface
{
    /**
     * Get the human readable message associated with this container.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Wether this container has some associated reasons that will futher
     * describe why it was returned.
     *
     * @return boolean
     */
    public function hasReasons();

    /**
     * Get the reasons associated with this container.
     *
     * @return mixed
     */
    public function getReasons();
}
