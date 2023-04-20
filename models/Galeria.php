<?php

namespace Model;

include '../includes/app.php';

class Galeria extends Config {

    public static function saveGallery($post, $files) {

        $noErrors = self::isEmptyName($post, $files);
        
        if($noErrors) {
            header("Location: /admin/galeria");
            return true;
        } else {
            return false;
        }
    }
    
    public static function getAll() {
        $query = "SELECT * FROM categoria";
        $response = self::queryDB($query, true);
        return $response;
    }
    
    public static function isEmptyName($post, $files) {
        $name = $post['name'] ?? '';
        if(empty($name) || (strlen(trim($name)) == 0)) {
            return false;
        } else {
            $isEmptyImage = self::isEmptyImage($name, $files);
            return $isEmptyImage;
        }
    }
    
    public static function isEmptyImage($name, $files) {
        if($files['imagenPrinc']['size'] === 0) {
            return false;
        } else {
            $nameSani = self::saniName($name);
            $carpetaSucced = self::createDir($nameSani) ?? false;
            if($carpetaSucced) {
                $savedImgPath = self::saveImg($files['imagenPrinc'], $carpetaSucced, $name);
                
                if($savedImgPath) {
                    return true;
                }
            } else {
                return false;
            }
            
        }
    }
    
    public static function saniName($name) {
        return htmlspecialchars($name);
    }
    
    public static function createDir($nameSani) {
        
        $directoryName = $nameSani . "_" . uniqid();
        $pathToDir = "galeriaPics/" . $directoryName;
        
        if(!file_exists($pathToDir)) {
            mkdir($pathToDir, 0777, true);
        }
        
        return $pathToDir;
    }
    
    public static function saveImg($image, $pathToDir, $name) {
        
        
        $imagenOptimized = self::converToWebp($image);
        $pathFotoPrinc = __DIR__ . '/../public/' . $pathToDir . '/Principal.webp';
        $imagenFinal = imagewebp($imagenOptimized, $pathFotoPrinc, 50);
        $pathPublic = "/" . $pathToDir . '/Principal.webp';
        
        if($imagenFinal) {
            
            $addedCat = self::queryAddCat($name, $pathPublic);
            if($addedCat) {
                return true;
            }
        } else {
            return false;
        }
    }

    protected static function queryAddCat($name, $pathFotoPrinc) {
        $query = "INSERT INTO categoria (name, imagenPrinc) VALUES ('$name', '$pathFotoPrinc')";
        $response = self::queryDB($query);
        var_dump($response);
        if($response) {
            return true;
        } else {
            return false;
        }
    }

    public static function converToWebp($aConvertir, $lista = false) {

        if (!$lista) {
            $extension = pathinfo($aConvertir['full_path'], PATHINFO_EXTENSION);
            if ($extension == 'jpeg' || $extension == 'jpg') {
                $image = imagecreatefromjpeg($aConvertir['tmp_name']);
                return $image;
                
            } else if ($extension == 'png') {
                $image = imagecreatefrompng($aConvertir['tmp_name']);
                
                return $image;
            }
        } else {
            $index = 0;
            $listaFotos = [];
            foreach ($aConvertir['full_path'] as $fotoPath) {
                
                $extension = pathinfo($fotoPath, PATHINFO_EXTENSION);
                if ($extension == 'jpeg' || $extension == 'jpg') {
                    $image = imagecreatefromjpeg($aConvertir['tmp_name'][$index]);

                    
                    
                    $index++;
                    array_push($listaFotos, $image);
                } else if ($extension == 'png') {
                    $image = imagecreatefrompng($aConvertir['tmp_name'][$index]);

                    $index++;
                    array_push($listaFotos, $image);
                }

            } 
            return $listaFotos;
        }
    }

}