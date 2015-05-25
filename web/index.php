<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$env = !empty($_ENV['PLATFORM_ENVIRONMENT']) ? $_ENV['PLATFORM_ENVIRONMENT'] : 'dev';

$app['debug'] = $env !== 'master';

// Service provider: Monolog.
$app->register(new Silex\Provider\MonologServiceProvider(), [
    'monolog.logfile' => __DIR__ . '/../logs/app.log',
]);

// Service provider: Twig.
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/views',
]);

// Route: home page.
$app->get('/', function () use ($app) {
    return $app['twig']->render('home.twig');
});

$app->run();
