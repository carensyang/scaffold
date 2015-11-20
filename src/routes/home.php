<?php
// Define named route
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.tpl', ['name' => 'Josh']);
});

