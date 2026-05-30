<?php 
require_once __DIR__.'/../vendor/autoload.php';

use App\Core\Router;

$url = $_GET['url'] ?? '';

try {
    $router = new Router();
    $router->dispatch($url);
    
} catch (Exception $e) {
    echo 'Error: '.$e->getMessage();
}


