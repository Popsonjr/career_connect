<?php

require  __DIR__ . '/../vendor/autoload.php';

use Framework\Router;
use Framework\Session;

Session::start();

require '../helpers.php';

// spl_autoload_register(function ($class) {
//     $path = basePath('Framework/' . $class . '.php');
//     if (file_exists($path)) {
//         require $path;
//     }
// });

// $config = require basePath('config/db.php');


//Instantiating the router
$router = new Router;

//get routes
$routes = require basePath('routes.php');

//get current URI and HTTP mrthod
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


// Route the request
$router->route($uri);