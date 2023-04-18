<?php

namespace Controllers;

use MVC\Router;
use Model\Login;


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

    public static function clases(Router $router) {

        $router->render('paginas/clases', [

        ]);
    }

    public static function sesion(Router $router) {

        $router->render('paginas/sesion', [

        ]);
    }

    public static function contacto(Router $router) {

        $router->render('paginas/contacto', [

        ]);
    }

    public static function login(Router $router) {

        if($_SESSION['auth']) {
            header("Location: /");
        }

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $exist = Login::userExist($email);
            if($exist) {
                
                $passVerified = Login::passVerify($pass, $email);
                if($passVerified) {
                    $_SESSION['auth'] = true;
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['admin'] = Login::isAdmin($email);
                    header("Location: /");
                }
            }
        }

        $router->render('paginas/login', [

        ]);
    }

    public static function logout(Router $router) {

        $_SESSION = [];

        header("Location: /");
    }


}