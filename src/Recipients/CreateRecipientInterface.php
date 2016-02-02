<?php

namespace Enzyme\Axiom\Recipients;

interface CreateRecipientInterface
{
    public function onCreateSuccess();

    public function onCreateFailure();
}
