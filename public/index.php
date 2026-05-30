<?php 
require_once __DIR__.'/../app/core/Router.php';
require_once __DIR__.'/../vendor/autoload.php';

$url = $_GET['url'] ?? '';

try {
    $router = new Router();
    $router->dispatch($url);
    
} catch (Exception $e) {
    echo 'Error: '.$e->getMessage();
}


