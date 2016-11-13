<?php

require __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$config = require __DIR__ . '/../config/config.php';
$app = new \Slim\App($config);

$container = $app->getContainer();
$viewEngine = new \League\Plates\Engine(__DIR__ . '/../views');

$container['view'] = $viewEngine;

// Register routes
require __DIR__ . '/../config/routes.php';

// Run app
$app->run();
