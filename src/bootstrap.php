<?php
// Create Slim app
$app = new \Slim\App([
    'log' => function () {
        // create a log channel
        $log = new Monolog\Logger('main');
        $log->pushHandler(new Monolog\Handler\StreamHandler(LOGPATH, Monolog\Logger::DEBUG));
        return $log;
    },
]);

// Fetch DI Container
$container = $app->getContainer();

// set settings
$container['settings']['displayErrorDetails'] = true;

// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(TEMPLATEDIR, [
        // 'cache' => TEMPLATECACHEDIR
    ]);

    // Instantiate and add Slim specific extension
    $view->addExtension(new Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    return $view;
};

// Include all files located in routes directory
foreach(glob(ROUTEDIR . '*.php') as $router) {
    require_once $router;
}

// run
$app->log->addInfo('RUN_APP');

// Run the application
$app->run();

// end
$app->log->addInfo('END_APP');