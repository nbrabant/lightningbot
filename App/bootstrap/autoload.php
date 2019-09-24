<?php

require __DIR__ . '../../vendor/autoload.php';

use \Dotenv\Dotenv;
use \DI\ContainerBuilder;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . 'config.php');
$containerBuilder->useAutowiring(true);
$container = $containerBuilder->build();

return $container;
