<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;
use Controllers\AdminController;
use Controllers\GaleriaController;

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

/* Admin Galeria */
$router->get('/admin/galeria', [GaleriaController::class, 'index']);
$router->get('/admin/galeria/add', [GaleriaController::class, 'addGaleria']);
$router->post('/admin/galeria/add', [GaleriaController::class, 'addGaleria']);
$router->get('/admin/galeria/edit', [GaleriaController::class, 'editGaleria']);
$router->post('/admin/galeria/edit', [GaleriaController::class, 'editGaleria']);

$router->comprobarRutas();