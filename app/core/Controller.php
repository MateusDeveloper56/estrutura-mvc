<?php 
namespace App\Core;

class Controller {
    protected function view($view, $viewData = []) {
        $viewFile = __DIR__.'/../views/'.$view.'.php';

        if(!file_exists($viewFile)) {
            throw new \Exception('View not found: '.$view);
        }

        extract($viewData);

        require_once $viewFile;
    }
}


