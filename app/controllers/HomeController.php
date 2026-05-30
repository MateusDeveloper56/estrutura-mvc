<?php 
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;

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


