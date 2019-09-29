<?php

require __DIR__ . '/../../vendor/autoload.php';

use \Dotenv\Dotenv;
use \DI\ContainerBuilder;

$dotenv = new DotEnv(__DIR__ . '/../../');
$dotenv->load();

$builder = new ContainerBuilder();
$builder->useAnnotations(false);
$builder->useAutowiring(true);
$builder->addDefinitions(__DIR__ . '/config.php');
$container = $builder->build();

return $container;
