<?php

function conectarDB() : PDO {
    $dbName = $_ENV['DB_BD'];
    $host = $_ENV['DB_HOST'];
    $des = "mysql:dbname=$dbName;host=$host;charset=UTF8";
    $db = new PDO($des, $_ENV['DB_USER'], $_ENV['DB_PASS']);

    if(!$db) {
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}