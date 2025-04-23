<?php
require_once './app/core/Router.php';
require_once './routes.php';
require_once 'vendor/autoload.php';
use Cloudinary\Configuration\Configuration;

Configuration::instance([
    'cloud' => [
      'cloud_name' => 'dcvlgtx5a',
      'api_key'    => '389855911116332',
      'api_secret' => 'D-KXMXxpapxP361XllsIUgAneno'
    ],
    'url' => [
      'secure' => true
    ]
  ]);

$router = new Router();
defineRoutes($router); 
$router->dispatch();
