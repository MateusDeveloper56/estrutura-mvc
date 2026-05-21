<?php 
require_once __DIR__.'/../models/Usuario.php';

class HomeController extends Controller {
    public function index() {
        $usuario = new Usuario();
        $userData = $usuario->getUserData();

        $this->view('home/index', $userData);
        return;
    }

    public function contact() {
        $this->view('home/contact');
        return;
    }
}


