<?php

namespace Controllers;

use MVC\Router;
use Model\Galeria;

class GaleriaController {

    public static function index(Router $router) {

        $cats = Galeria::getAll();

        $router->render('admin/galeria/index', [
            'cats'=>$cats
        ]);

    }

    public static function addGaleria(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            // echo "<pre>";
            // var_dump($_POST);
            // var_dump($_FILES);
            // echo "</pre>";
            $response = Galeria::saveGallery($_POST, $_FILES);
        }
        $router->render('admin/galeria/add', [
            
        ]);

    }

    public static function editGaleria(Router $router) {

        $id = intval($_GET['id']) ?? 0;
        $galeriaDats = Galeria::get($id);
        $fotosCat = Galeria::getImages($id);
        
        if($_SERVER['REQUEST_METHOD'] === "POST") {

            echo "<pre>";
            var_dump($_POST);
            // var_dump($_FILES);
            echo "</pre>";
            exit;
        }

        $router->render('admin/galeria/edit', [
            'galeriaDats'=>$galeriaDats,
            'fotosCat'=>$fotosCat
        ]);
    }
}