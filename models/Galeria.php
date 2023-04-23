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
    
    public static function get($id) {
        $query = "SELECT * FROM categoria WHERE id = '$id'";
        $response = self::queryDB($query);
        return $response;
    }
    
    public static function getImages($id) {
        $query = "SELECT * FROM fotos WHERE categoriaId = '$id'";
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

    public static function updateCat($newName, $newPic, $oldName, $catId, $pathOldImage) {
        $updatedImg = true;
        $response = true;
        if($newPic['name'] !== '') {
            $updatedImg = self::updateCatImg($newPic, $pathOldImage);
        }
        if($newName !== $oldName) {
            $query = "UPDATE categoria SET name = '$newName' WHERE id = $catId;";
            $response = self::queryDB($query);
        }

        if($updatedImg && $response) {
            return true;
        } else { return false; }
    }

    public static function addPics($imagesList, $catId, $pathToCat) {
        

        if($imagesList['name'][0]  === '') { return true; }

        $pathPics = "/galeriaPics/"  . explode("/", $pathToCat)[2];

        $images = self::converToWebp($imagesList, true);
        $query = "INSERT INTO fotos (categoriaId, pathFoto, pathFotoFullres) VALUES";
        
        foreach($images as $image) {
            $uniqId = uniqid("_");
            $nameFullres = "/fullRes" . $uniqId . ".webp";
            $nameLowRes = "/lowRes" . $uniqId  . ".webp";
            
            $query .= ' ( ' . $catId .', ';
            $query .= '"' . $pathPics . $nameLowRes . '"' . ', ';
            $query .= '"' .$pathPics . $nameFullres . '"' . ' ';
            $query .= ') , ';
            
        
            imagewebp($image, __DIR__ . '/../public' . $pathPics . $nameFullres, 100);
            imagewebp($image, __DIR__ . '/../public' . $pathPics . $nameLowRes, 50);
            
        }
        $query = substr($query, 0, -2);
        $query .= ";";
        $response = self::queryDB($query);
        
    }
    
    public static function removePics($imagesList) {

        if($imagesList === null) { return true; }


        $listaImg = implode("','", $imagesList);
        $query = "DELETE FROM fotos WHERE pathFoto IN ('". $listaImg ."'); ";
        
        
        foreach($imagesList as $image) {
            
            $nameFullres = str_replace("lowRes", "fullRes", $image);
            unlink(__DIR__ . '/../public' . $image);
            unlink(__DIR__ . '/../public' . $nameFullres);
            
        }

        $response = self::queryDB($query);

        return $response;
    }

    public static function removeGal($datosGal) {

        $id = $datosGal['id'];
        $query = "DELETE FROM fotos WHERE id = $id";
        $response = self::queryDB($query);
        $query = "DELETE FROM categoria WHERE id = $id";
        $response = self::queryDB($query);

        $path = explode("/", $datosGal['imagenPrinc']);
        $path = "galeriaPics/" . $path[2];

        $files = glob(__DIR__ . "/../public/" . $path . "/*");
        foreach($files as $file) {
            if(is_file($file)) {
                unlink($file);
            }
        }

        rmdir(__DIR__ . "/../public/" . $path);

        header("Location: /admin/galeria");
        
    }

    public static function updateCatImg($image, $pathOldImage) {
        $imagenWebp = self::converToWebp($image);
        $imagenFinal = imagewebp($imagenWebp, __DIR__ . '/../public/' . $pathOldImage, 50);
        
        if($imagenFinal) {
            return true;
        } else {
            return false;
        }

    }


    protected static function queryAddCat($name, $pathFotoPrinc) {
        $query = "INSERT INTO categoria (name, imagenPrinc) VALUES ('$name', '$pathFotoPrinc')";
        $response = self::queryDB($query);
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