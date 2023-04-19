<?php
namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];
    public $rutasDinamicasGet = [];

    public function get($url, $fn) {
        if(substr($url, -1) == "*") {
            $this->rutasDinamicasGet[explode("/", $url)[1]] = $fn;
        } else {
            $this->rutasGET[$url] = $fn;
        }
    }

    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        session_start();
        $auth = $_SESSION['auth'] ?? null;
        $_SESSION['auth'] = $_SESSION['auth'] ?? null;
        $_SESSION['admin'] = $_SESSION['admin'] ?? null;


        // Array de rutas protegidas
        $rutas_protegidas = ['/admin'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') {

            if(isset($this->rutasDinamicasGet[explode("/", $urlActual)[1]]) != null && strlen(explode("/", $urlActual, 2)[1]) != strlen(explode("/", $urlActual)[1])) {
                $fn = $this->rutasDinamicasGet[explode("/", $urlActual)[1]] ?? null;
                
            } else {
                $fn = $this->rutasGET[$urlActual] ?? null;
            }
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger las rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
            return;
        }

        if($fn) {
            //La URL existe y hay una función asociada
            call_user_func($fn, $this);
        } else {
            header("Location: /");
        }
    }
    // Muetra una vista
    public function render($view, $datos = []) {

        foreach($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); // Almacena durante un momento en memoria

        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el buffer
        include_once __DIR__ . "/views/layout.php";
    }

}