<?php 
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;
use App\Core\Database;

class HomeController extends Controller {
    public function index() {
        $usuario = new Usuario();
        $userData = $usuario->getUserData();

        #$usuario->createUser('Mateus R. '.rand(1, 100));
        #$usuarios = $usuario->getUserById(1);

        $this->view('home/index', $userData);
        return;
    }

    public function contact() {
        $this->view('home/contact');
        return;
    }
}


