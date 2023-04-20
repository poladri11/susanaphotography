<?php

namespace Model;

include '../includes/app.php';

class Config {

    protected static $db;

    public static function setDB($db) {
        self::$db = $db;
    }

    public static function queryDB($query) {
       
        $response = self::$db->prepare($query);
        $response->execute();
        $data = $response->fetch(self::$db::FETCH_ASSOC);

        return $data;
    }
}


?>