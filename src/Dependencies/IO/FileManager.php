<?php

namespace Jedi\Dependencies\IO;

use Jedi\Contracts\{IFileManager, IMessage};
use Jedi\Dependencies\Message;

class FileManager implements IFileManager
{
    private static File $driver;

    public function __construct($filename=null)
    {
        if(!empty($filename)){
           $this->setDriver($filename);
        }
    }

    public function write(IMessage $message)
    {
        $row = $message->handle();

        self::$driver->write($row);
    }

    public function setDriver(string $driver): void
    {
        self::$driver = new File($driver, 'a+');
    }

    public function getLast()
    {
        $collection = [];

        foreach(self::$driver->read() as $item){
            $collection[] = $item;
        }
    
        $last = count($collection) - 2;

        return $collection[$last];
    }

    // public function getAll()
    // {
    //     $collection = [];

    //     foreach(self::$driver->read() as $item){
    //         $collection[] = $item;
    //     }

    //     return $collection;
    // }

    public function find($specify)
    {
        foreach(self::$driver->read() as $item){
            if(preg_match('/'.$specify. '/i', $item)){
                return$item;
            }
        }

    }
}