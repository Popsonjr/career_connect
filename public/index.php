<?php
require '../helpers.php';
require basePath('Database.php');
$config = require basePath('config/db.php');

$db = new Database($config);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

require basePath('Router.php');

$router = new Router;

$routes = require basePath('routes.php');

$router->route($uri, $method);