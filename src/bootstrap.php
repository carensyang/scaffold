<?php
// Create Slim app
$app = new \Slim\App();

// Fetch DI Container
$container = $app->getContainer();
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

// Run the application
$app->run();
