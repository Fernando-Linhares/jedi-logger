<?php

namespace Jedi\Dependencies;

use Jedi\Contracts\IMessage;

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

        $memory = '4.00 MB';

        $fullrow = "[ $time ] RESULT : {$result} | MEMORY: {$memory}\n";

        return $fullrow;
    }

    public function __toString()
    {
        return $this->handle();
    }

}