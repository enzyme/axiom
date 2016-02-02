<?php

namespace Enzyme\Axiom\Recipients;

interface DeleteRecipientInterface
{
    public function onDeleteSuccess();

    public function onDeleteFailure();
}
