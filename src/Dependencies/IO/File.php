<?php

namespace Jedi\Dependencies\IO;

class File
{
    private $stream;

    public function __construct($name=null, $mode=null)
    {
        if(!empty($name) && !empty($mode)){
            $this->open($name, $mode);
        }
    }

    public function open($name, $mode): void
    {
        $this->stream = fopen($name, $mode);
    }

    public function write($content)
    {
        fwrite($this->stream, $content);   
    }

    public function read()
    {        
        while(!feof($this->stream)){
            yield fgets($this->stream, 1024);
        }
    }

    public function __destruct()
    {
        fclose($this->stream);
    }
}