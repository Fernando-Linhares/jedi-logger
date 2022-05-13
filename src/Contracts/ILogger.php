<?php

namespace Jedi\Contracts;

interface ILogger
{
 
    /**
     * @param IMessage|string $message
     */
    public function log($message): void;

    /**
     * @param string $fileLog
     * @return void
     */
    public function driver($fileLog): void;


    /**
     * @param string|null $specify
     * @return IMessage
     */
    public function get($specify=null): IMessage;
}