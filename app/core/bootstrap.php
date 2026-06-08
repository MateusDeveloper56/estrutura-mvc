<?php
namespace App\Core;

use Dotenv\Dotenv;
use App\Core\Router;
use Symfony\Component\HttpFoundation\Request;

class Bootstrap {
    public function run() : void {
        $request = Request::createFromGlobals();

        $this->configure();
        $this->callRouter($request);
    }

    private function configure() {
        $this->ini_configure();
        $this->timezone_configure();
        $this->environment_configure();
    }

    private function ini_configure() {
        ini_set('display_errors', '1');
        ini_set('default_charset', 'UTF-8');
    }

    private function timezone_configure() {
        date_default_timezone_set('America/Sao_Paulo');
    }

    private function callRouter(Request $request) {
       try {
            $router = new Router();
            $router->dispatch($request);
            
        } catch (\Exception $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

    private function environment_configure() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }
}


