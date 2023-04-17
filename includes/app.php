<?php 
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require_once 'config/db.php';

$db = conectarDB();

use Model\Config;
Config::setDB($db);