<?php 
class HttpErrorController extends Controller {
    /**
     * @method Retorna o status no cabeçalho HTTP 403 e exibe a página de erro 403
     */
    public function Unauthorized() {
        http_response_code(403);
        $this->view('errors/403');
    }
    
    /**
     * @method Retorna o status no cabeçalho HTTP 404 e exibe a página de erro 404
     */
    public function NotFound() {
        http_response_code(404);
        $this->view('errors/404');
    }

    /**
     * @method Retorna o status no cabeçalho HTTP 500 e exibe a página de erro 500
     */
    public function InternalServerError() {
        http_response_code(500);
        $this->view('errors/500');
    }
}


