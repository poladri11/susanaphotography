<?php

namespace Model;



include '../includes/app.php';

class Clases extends Config {

    public static function saveClase($post, $files) {

        $nombre = $post['name'];
        $descripcion = $post['descripcion'];
        $precio = $post['precio'];
        $descuento = $post['descontado'];
        $inicioFecha = $post['inicio'] . ' ' . $post['inicioHora'];
        $finalFecha = $post['final'] . ' ' . $post['finalHora'];

        if(!empty($descuento)) {
            $isDiscounted = 1;
        } else { $isDiscounted = 0; $descuento = 0; }

        
        $imagesData = self::saveImages($nombre, $files);
        
        $pathToAntes = '/' . $imagesData[0] . '/' . $imagesData[1] . '.webp';
        $pathToDespues = '/' .  $imagesData[0] . '/' . $imagesData[2] . '.webp';

        
        $query = "INSERT INTO clasesdisponibles (precio, discountedprecio, discounted, nombre, descripcion, fotoInicial, fotoFinal, fechaInicio, fechaFinal) VALUES ($precio, $descuento, $isDiscounted, '$nombre', '$descripcion', '$pathToAntes', '$pathToDespues', '$inicioFecha', '$finalFecha')";
        
        $response = self::queryDB($query);

    }

    public static function getAll() {
        $query = "SELECT * FROM clasesdisponibles";

        $response = self::queryDB($query, true);

        return $response;
    }

    protected static function saveImages($nombre, $files) {
        $pathToDir = self::createDir($nombre);

        $picNameAntes = "Antes-" . uniqid();
        self::saveImg($files["imgAntes"] , $pathToDir, $picNameAntes);
        
        $picNameDespues = "Despues-" . uniqid();
        self::saveImg($files["imgDespues"] , $pathToDir, $picNameDespues);
        
        return [$pathToDir, $picNameAntes, $picNameDespues];
    }

    protected static function createDir($nombre) {
        $uniqId = uniqid();
        $directoryName = str_replace(" ", "_", $nombre) . "_" . $uniqId;
        $directoryName = str_replace("ñ", "C3B1", $directoryName);
        $pathToDir = "clasesPics/" . $directoryName;
        
        if(!file_exists($pathToDir)) {
            mkdir($pathToDir, 0777, true);
        }
        
        return $pathToDir;
    }

    public static function saveImg($image, $pathToDir, $name) {
        
        
        $imagenOptimized = self::converToWebp($image);
        $pathFotoPrinc = __DIR__ . '/../public/' . $pathToDir . '/' . $name . ".webp";
        $imagenFinal = imagewebp($imagenOptimized, $pathFotoPrinc, 50);
        $pathPublic = "/" . $pathToDir . '/' . $name . ".webp";
        
    }

    public static function converToWebp($aConvertir, $lista = false) {

        if (!$lista) {
            $extension = pathinfo($aConvertir['full_path'], PATHINFO_EXTENSION);
            if ($extension == 'jpeg' || $extension == 'jpg') {
                var_dump($aConvertir);
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