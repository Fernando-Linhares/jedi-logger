<?php

namespace Jedi\Dependencies;

use Jedi\Contracts\{ IMemoryDevice, IFileManager, IMessage};

abstract class BaseLogger
{
    protected IMemoryDevice $memoryDevice;

    protected IFileManager $fileManager;

    protected string $driver;

    public function __construct($driver=null, IMemoryDevice $memoryDevice=null, IFileManager $fileManager=null)
    {
        if(empty($memoryDevice))
            $memoryDevice = new \Jedi\Dependencies\Memory\MemoryDevice;

        if(empty($fileManager))
            $fileManager = new \Jedi\Dependencies\IO\FileManager;

        if(!empty($driver)){
            $this->setDriver($driver);
        }
        
        $this->setFileManager($fileManager);

        $this->setMemoryDevice($memoryDevice);
    }

    /**
     * @param void
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     * @return void
     */
    public function setDriver(string $driver): void
    {
        $this->fileManager->setDriver($driver);
    }

    /**
     * @param void
     * @return IMemoryDevice
     */
    public function getMemoryDevice(): IMemoryDevice
    {
        return $this->memoryDevice;
    }

    /**
     * @param IMemoryDevice $memoryDevice
     * @return void
     */
    public function setMemoryDevice(IMemoryDevice $memoryDevice): void
    {
        $this->memoryDevice = $memoryDevice;
    }

    /**
     * @param IFileManager $fileManager
     * @return void
     */
    public function setFileManager(IFileManager $fileManager): void
    {
        $this->fileManager = $fileManager;
    }

    /**
     * @param void
     * @return IFileManager $fileManager
     */
    public function getFileManager(): IFileManager
    {
        return $this->fileManager;
    }

    public function dispatch($message)
    {
        if(is_string($message)){
            $message = new Message($message);
        }

        if($message instanceof IMessage){
            $this->getFileManager()->write($message);
        }
    }

    public function getSpecify($specify=null)
    {
        if(empty($specify)){
            return $this->getFileManager()->getLast();
        }

        return $this->getFileManager()->find($specify);
    }
}