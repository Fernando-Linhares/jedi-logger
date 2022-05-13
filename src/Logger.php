<?php

namespace Jedi;

use Jedi\Contracts\ILogger;
use Jedi\Dependencies\BaseLogger;
use Jedi\Contracts\IMessage;

class Logger extends BaseLogger //implements ILogger
{
    public function __construct($diver=null)
    {
        parent::__construct($diver);
    }

    /**
     * @param IMessage|string $message
     */
    public function log($message): void
    {
        $this->dispatch($message);
    }

    /**
     * @param string $fileLog
     * @return void
     */
    public function driver($fileLog): void
    {
        $this->setDriver($fileLog);
    }

    /**
     * @param string|null $specify
     * @return string
     */
    public function get($specify=null)
    {
        return $this->getSpecify($specify);
    }
}