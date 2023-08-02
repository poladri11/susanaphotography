<?php

namespace Controllers;

use MVC\Router;
use Model\Clases;

class ClasesController {

    public static function index(Router $router) {

        $clasesGrabadas = Clases::getGrabadas();
        $clasesGrupales = Clases::getGrupales();

        $router->render('admin/clases/index', [
            'clasesGrabadas'=>$clasesGrabadas,
            'clasesGrupales'=>$clasesGrupales
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

    public static function removeClase(Router $router) {

        $id = $_GET['id'];
        Clases::removeClase($id);
    }

}

?>