<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;

$router = new Router;


/* Páginas */
$router->get('/', [PaginasController::class, 'index']);


$router->comprobarRutas(); 