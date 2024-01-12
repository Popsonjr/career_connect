<?php
require '../helpers.php';
require basePath('Router.php');
require basePath('Database.php');


$config = require basePath('config/db.php');

//Instantiating the router
$router = new Router;

//get routes
$routes = require basePath('routes.php');

//get current URI and HTTP mrthod
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);