<?php 
namespace App\core;

use App\Controllers\Errors\HttpErrorController;
use App\Controllers\HomeController;

class Router {
    public function dispatch($url) {
        $url            = trim($url, '/');
        $parts          = $url ? explode('/', $url) : [];
        $controllerName = $parts[0] ?? 'Home';
        $controllerName = 'App\\Controllers\\'.ucfirst($controllerName).'Controller';
        $actionName     = $parts[1] ?? 'index';

        if(!class_exists($controllerName)) {
            throw new \Exception('Controller class not found: '.$controllerName);
        }

        $controller = new $controllerName();

        if(!method_exists($controller, $actionName)) {
            $controller = new HttpErrorController();
            $controller->notFound();
            return;
        }

        // Removendo os dois primeiros elementos (controller e action) para passar apenas os parâmetros restantes
        $params = array_slice($parts, 2);

        // Chamada dinâmica do método com parâmetros
        call_user_func_array([$controller, $actionName], $params);
    }
}


