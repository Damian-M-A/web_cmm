<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('quienes-somos/', 'QSController::Index');
$routes->get('nuestro-equipo/', 'EquipoController::Index');
$routes->get('proyectos/', 'ProyectosController::Index');
$routes->get('proyectos/(:num)', 'ProyectosController::view/$1');
$routes->get('noticias/', 'NoticiasController::Index');
$routes->get('noticias/(:num)', 'NoticiasController::view/$1');
$routes->get('transparencia/', 'TransparenciaController::Index');
$routes->get('transparencia/(:num)', 'TransparenciaController::view/$1');

service('auth')->routes($routes);
$routes->group('admin', ['filter' => 'group:admin'], static function ($routes) {
    $routes->get('dashboard', 'DashboardController::Index');
    // noticias
    $routes->get('noticias', 'AdminNoticiasController::Index');
    $routes->get('noticias/nueva-noticia', 'AdminNoticiasController::New');
    $routes->post('noticias/guardar-noticia', 'AdminNoticiasController::Save');
    $routes->post('noticias/eliminar/(:num)', 'AdminNoticiasController::Delete/$1');
    $routes->get('noticias/actualizar-noticia/(:num)', 'AdminNoticiasController::Edit/$1');
    $routes->post('noticias/guardar-cambios/(:num)', 'AdminNoticiasController::Update/$1');
    // categorias
    $routes->get('categorias', 'AdminCategoriasController::Index');
    $routes->get('categorias/nueva-categoria', 'AdminCategoriasController::New');
    $routes->post('categorias/guardar', 'AdminCategoriasController::Save');
    $routes->get('categorias/actualizar/(:num)','AdminCategoriasController::Edit/$1');
    $routes->post('categorias/actualizar-categoria/(:num)', 'AdminCategoriasController::Update/$1');
    // colaboradores
    $routes->get('colaboradores', 'AdminColaboradorController::Index');
    
    
});