<?php

require __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$config = require __DIR__ . '/config.php';
$app = new \Slim\App($config);

$container = $app->getContainer();
$viewEngine = new \League\Plates\Engine(__DIR__ . '/../views');

$container['view'] = $viewEngine;
$container['db'] = function() use ($config) {
    $dsn = sprintf(
        '%s:dbname=%s;host=%s',
        getenv('DATABASE_DRIVER'),
        getenv('DATABASE_NAME'),
        getenv('DATABASE_HOST')
    );

    try {
        $db = new PDO($dsn, getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Throwable $e) {
        throw new \Exception('Can not connect to database');
    }

    return $db;
};

// Register routes
require __DIR__ . '/routes.php';

return $app;
