<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;

$router = new Router;


/* Páginas */
$router->get('/', [PaginasController::class, 'index']);
$router->get('/galeria', [PaginasController::class, 'galeria']);
$router->get('/galeria/*', [PaginasController::class, 'galeriaPics']);
$router->get('/clases', [PaginasController::class, 'clases']);
$router->get('/sesion', [PaginasController::class, 'sesion']);


$router->comprobarRutas(); 