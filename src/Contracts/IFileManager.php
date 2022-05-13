<?php

namespace Jedi\Contracts;

interface IFileManager
{
    public function write(IMessage $message);

    public function setDriver(string $driver): void;
    
    public function getLast();

    public function find($specify);
}