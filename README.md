# JEDI LOGGER

### logger for web applications, to generate log with performance and elegance


Usage:

    require_once 'vendor/autoload.php';

    $logger = new Jedi\Logger;

    $logger->setDriver('your_path_file_log');

    $logger->log('User changed passoword');


To see, go to file driver or use this command

    $logger->get()

> this command will get the last log

Your can modify the command get like this:

    $logger->get('00:38:31')

> this command will get the log on this hour