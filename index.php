<?php

require_once 'vendor/autoload.php';

$logger = new Jedi\Logger;

$logger->setDriver('test/mock/file.log');

// $logger->log('teste');
// $logger->log('teste');

echo $logger->get();
// echo $logger->get('00:38:31');