<?php

namespace Enzyme\Axiom\Recipients;

interface UpdateRecipientInterface
{
    public function onUpdateSuccess();

    public function onUpdateFailure();
}
