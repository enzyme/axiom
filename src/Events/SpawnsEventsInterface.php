<?php

namespace Enzyme\Events;

/**
 * Describes a class that may spawn events that will need to be dispatched
 * by the caller.
 */
interface SpawnsEventsInterface
{
    /**
     * Save a new event internally for later dispatch.
     *
     * @param EventInterface $event
     *
     * @return void
     */
    public function recordEvent(EventInterface $event);

    /**
     * Whether there are any events that need to be dispatched.
     *
     * @return boolean
     */
    public function hasEvents();

    /**
     * Return a collection all events that need to be dispatched.
     *
     * @return array
     */
    public function flushEvents();
}
