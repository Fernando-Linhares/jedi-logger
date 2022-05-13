<?php

namespace Jedi\Contracts;

interface IMessage
{
    public function handle(): string;
}