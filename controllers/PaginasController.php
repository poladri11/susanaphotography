<?php

namespace Controllers;

use MVC\Router;



class PaginasController {

    public static function index(Router $router) {


        $router->render('paginas/index', [
            
        ]);

    }

    public static function galeria(Router $router) {


        $router->render('paginas/galeria', [
            
        ]);

    }

    public static function galeriaPics(Router $router) {

        $x = ["halloween", "kids"];
        $requestedParam = explode("/", $_SERVER['REQUEST_URI'])[2];

        if(in_array($requestedParam, $x)) {
            
        } else {
            header("Location: /");
        }

        $router->render('paginas/galeriaPics', [
            
        ]);

    }

}