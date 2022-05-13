<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class MakeLogTest extends TestCase
{
    /**
     * @test
     */
    public function make_log_has_created()
    {
        $logger = new \Jedi\Logger;

        $logger->driver('test/mock/file.log');

        $logger->log('ITS OK');
    }
}