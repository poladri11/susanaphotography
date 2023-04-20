<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;
use Controllers\AdminController;

$router = new Router;


/* Páginas */
$router->get('/', [PaginasController::class, 'index']);
$router->get('/galeria', [PaginasController::class, 'galeria']);
$router->get('/galeria/*', [PaginasController::class, 'galeriaPics']);
$router->get('/clases', [PaginasController::class, 'clases']);
$router->get('/sesion', [PaginasController::class, 'sesion']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->get('/login', [PaginasController::class, 'login']);
$router->post('/login', [PaginasController::class, 'login']);
$router->get('/logout', [PaginasController::class, 'logout']);

/* Admin */
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/galeria', [AdminController::class, 'galeria']);

$router->comprobarRutas(); 