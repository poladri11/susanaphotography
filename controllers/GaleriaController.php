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
            $nameCat = $_POST['nameCat'];
            $fotoCat = $_FILES['fotoCat'];
            $picstoAdd = $_FILES['imgInCats'];
            $picsToR = $_POST['imgRemoveCats'] ?? null;
            // echo "<pre>";
            // var_dump($_POST);
            // var_dump($picstoAdd);
            // echo "</pre>";
            $updateCat = Galeria::updateCat($nameCat, $fotoCat, $galeriaDats['name'], $galeriaDats['id'], $galeriaDats['imagenPrinc']);
            $addPics = Galeria::addPics($picstoAdd, $galeriaDats['id'], $galeriaDats['imagenPrinc']);
            $removePics = Galeria::removePics($picsToR);

            if($updateCat || $addPics || $removePics) {
                header("Location: /admin/galeria");
            }
        }

        $router->render('admin/galeria/edit', [
            'galeriaDats'=>$galeriaDats,
            'fotosCat'=>$fotosCat
        ]);
    }

    public static function removeGaleria(Router $router) {

        $id = $_GET['id'];
        $galeriaDats = Galeria::get($id);
        $removePicsDDBB = Galeria::removeGal($galeriaDats);

        $router->render('admin/galeria/remove', [

        ]);
    }
}