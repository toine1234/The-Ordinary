<?php
require_once './core/Router.php';
require_once './routes.php';

$router = new Router();
defineRoutes($router); 
$router->dispatch();
