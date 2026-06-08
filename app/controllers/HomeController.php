<?php 
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;
// use App\Core\Database;
// use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller {
    public function index() {
        // dd($this->request->query->get('teste'));

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

    public function teste() {
        // return $this->json(['Hello' => 'World!']);
        return $this->redirect('https://www.google.com');
    }
}


