<?php

if (!$loader = @include $_SERVER['VENDOR_PATH'].'/autoload.php') {
    die('You must set up the project dependencies, run the following commands:'.PHP_EOL.
        'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
        'php composer.phar install'.PHP_EOL);
}

$loader->add('Places', __DIR__);
$loader->add('../Places', __DIR__);