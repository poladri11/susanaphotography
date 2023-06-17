<?php

namespace Controllers;

use MVC\Router;
use Model\Clases;

class ClasesController {

    public static function index(Router $router) {

        $clases = Clases::getAll();

        $router->render('admin/clases/index', [
            'clases'=>$clases
        ]);

    }

    public static function addClase(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === "POST") {

            $response = Clases::saveClase($_POST, $_FILES);
            header("Location: /admin/clases");
        }

        $router->render('admin/clases/add', [

        ]);

    }

}

?>