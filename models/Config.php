<?php

namespace Model;

include '../includes/app.php';

class Config {

    protected static $db;

    public static function setDB($db) {
        self::$db = $db;
    }

    public static function queryDB($query, $multiple = false) {
        
        $response = self::$db->prepare($query);
        $response->execute();
        if($response->columnCount() <= 0) {
            return $response;
        }
        if($multiple) {
            $data = $response->fetchAll();

        } else {

            $data = $response->fetch(self::$db::FETCH_ASSOC);
        }
        return $data;
    }

}


?>