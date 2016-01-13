<?php

namespace Enzyme\Axiom\Containers;

use Enzyme\Axiom\Atoms\StringAtom;

class GenericBadNews implements BadNewsInterface
{
    /**
     * The message describing this bad news.
     * @var StringAtom
     */
    protected $message;

    /**
     * The optional reasons associated with this bad news.
     * @var array
     */
    protected $reasons;

    /**
     * Create a new generic bad news container given the message and optional
     * reasons associated with it.
     *
     * @param StringAtom $message
     * @param array $reasons
     */
    public function __construct(StringAtom $message, array $reasons = null)
    {
        $this->message = $message;
        $this->reasons = $reasons;
    }

    /**
     * @see BadNewsInterface
     */
    public function getMessage()
    {
        return $this->message->getValue();
    }

    /**
     * @see BadNewsInterface
     */
    public function hasReasons()
    {
        return $this->reasons !== null;
    }

    /**
     * @see BadNewsInterface
     */
    public function getReasons()
    {
        return $this->reasons;
    }
}
