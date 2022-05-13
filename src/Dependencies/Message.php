<?php

namespace Jedi\Dependencies;

use Jedi\Contracts\IMessage;
use Jedi\Dependencies\Memory\MemoryDevice;

class Message implements IMessage
{
    private string $row;

    public function __construct($row='')
    {
        $this->row = $row;
    }

    public function handle(): string
    {
        $time = date('Y-m-d H:i:s');

        $result = $this->row;

        $fullrow = "[ $time ] {$result} \n";

        return $fullrow;
    }

    public function __toString()
    {
        return $this->handle();
    }

}