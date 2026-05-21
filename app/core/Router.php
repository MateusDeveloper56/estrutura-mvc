<?php 
require_once __DIR__.'/Controller.php';
include_once __DIR__.'/../controllers/errors/HttpErrorController.php';

class Router {
    public function dispatch($url) {
        $url            = trim($url, '/');
        $parts          = $url ? explode('/', $url) : [];
        $controllerName = $parts[0] ?? 'Home';
        $controllerName = ucfirst($controllerName).'Controller';
        $actionName     = $parts[1] ?? 'index';

        if(!file_exists(__DIR__.'/../controllers/'.$controllerName.'.php')) {
            $controller = new HttpErrorController();
            $controller->NotFound();
            return;
        }

        include_once __DIR__.'/../controllers/'.$controllerName.'.php';

        if(!class_exists($controllerName)) {
            throw new Exception('Controller class not found: '.$controllerName);
        }

        $controller = new $controllerName();

        if(!method_exists($controller, $actionName)) {
            $controller = new HttpErrorController();
            $controller->NotFound();
            return;
        }

        // Removendo os dois primeiros elementos (controller e action) para passar apenas os parâmetros restantes
        $params = array_slice($parts, 2);

        // Chamada dinâmica do método com parâmetros
        call_user_func_array([$controller, $actionName], $params);
    }
}


