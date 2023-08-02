<?php

namespace Model;



include '../includes/app.php';

class Clases extends Config {

    public static function saveClase($post, $files) {

        $nombre = $post['name'];
        $descripcion = $post['descripcion'];
        $precio = $post['precio'];
        $descuento = $post['descontado'];
        if(empty($post['inicio'])) { $inicioFecha = "2000-01-01 00:00"; } else { $inicioFecha = $post['inicio'] . ' ' . $post['inicioHora']; } 
        $grabado = intval($post['tipo']);

        if(!empty($descuento)) {
            $isDiscounted = 1;
        } else { $isDiscounted = 0; $descuento = 0; }

        
        $imagesData = self::saveImages($nombre, $files);
        
        $pathToAntes = '/' . $imagesData[0] . '/' . $imagesData[1] . '.webp';
        $pathToDespues = '/' .  $imagesData[0] . '/' . $imagesData[2] . '.webp';

        
        $query = "INSERT INTO clasesdisponibles (precio, discountedprecio, discounted, nombre, descripcion, fotoInicial, fotoFinal, fechaInicio, grabada) VALUES ($precio, $descuento, $isDiscounted, '$nombre', '$descripcion', '$pathToAntes', '$pathToDespues', '$inicioFecha', $grabado)";
        
        $response = self::queryDB($query);

    }

    public static function getAll() {
        $query = "SELECT id, precio, discountedprecio, discounted, nombre, descripcion, fotoInicial, fotoFinal, DATE_FORMAT(fechaInicio, '%d/%m/%Y - %k:%i') as fechaInicio FROM clasesdisponibles";

        $response = self::queryDB($query, true);

        return $response;
    }

    public static function getGrabadas() {
        $query = "SELECT id, precio, discountedprecio, discounted, nombre, descripcion, fotoInicial, fotoFinal FROM clasesdisponibles WHERE grabada = 1";

        $response = self::queryDB($query, true);

        return $response;
    }

    public static function getGrupales() {
        $query = "SELECT id, precio, discountedprecio, discounted, nombre, descripcion, fotoInicial, fotoFinal, DATE_FORMAT(fechaInicio, '%d/%m/%Y - %k:%i') as fechaInicio FROM clasesdisponibles WHERE grabada = 0";

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

    public static function removeClase($id) {
        $query = "SELECT fotoInicial FROM clasesdisponibles WHERE id = $id";

        $clase = self::queryDB($query);
        $path = explode('/', $clase['fotoInicial'])[2];

        $files = glob(__DIR__ . "/../public/clasesPics/" . $path . "/*");
        foreach($files as $file) {
            if(is_file($file)) {
                var_dump($file);
                unlink($file);
            }
        }

        rmdir(__DIR__ . "/../public/clasesPics/" . $path);

        $queryDelete = "DELETE FROM clasesdisponibles WHERE id = $id";
        $deleted = self::queryDB($queryDelete);

        header("Location: /admin/clases");
    }

}