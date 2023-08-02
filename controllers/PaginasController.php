<?php

namespace Controllers;

use MVC\Router;
use Model\Users;
use Model\Galeria;
use Model\Clases;


class PaginasController {

    public static function index(Router $router) {

        $router->render('paginas/index', [
            
        ]);

    }

    public static function galeria(Router $router) {

        $cats = Galeria::getAll();
        $router->render('paginas/galeria', [
            'cats'=>$cats
        ]);
        
    }
    
    public static function galeriaPics(Router $router) {
        $cats = Galeria::getAll();
        $requestedParam = explode("/", $_SERVER['REQUEST_URI'])[2];
        $x = [];
        $currentCat = '';
        foreach($cats as $cat) {
            array_push($x ,$cat['name']);
            if($cat['name'] === $requestedParam) {
                $currentCat = $cat;
            }
        }

        if(in_array($requestedParam, $x)) {
            
        } else {
            header("Location: /");
        }
        $pics = Galeria::getAllPics($currentCat['id']);
        
        $router->render('paginas/galeriaPics', [
            'pics'=>$pics,
            'currentCat'=>$currentCat
        ]);

    }

    public static function clases(Router $router) {

        $clasesGrupales = Clases::getGrupales();
        $clasesGrabadas = Clases::getGrabadas();

        $router->render('paginas/clases', [
            'clasesGrabadas'=>$clasesGrabadas,
            'clasesGrupales'=>$clasesGrupales
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
            $exist = Users::userExist($email);
            if($exist) {
                
                $passVerified = Users::passVerify($pass, $email);
                if($passVerified) {
                    $_SESSION['auth'] = true;
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['admin'] = Users::isAdmin($email);
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

    public static function cookies(Router $router) {


        $router->render('paginas/cookies');
    }


}