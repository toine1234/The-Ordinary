<?php
require_once './app/core/Router.php';
require_once './routes.php';
require_once 'vendor/autoload.php';

$router = new Router();
defineRoutes($router); 
$router->dispatch();
