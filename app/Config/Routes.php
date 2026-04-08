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
