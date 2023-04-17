<?php

namespace Model;

include '../includes/app.php';

class Config {

    protected static $db;

    public static function setDB($db) {
        self::$db = $db;
    }
}


?>