<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'crud::selectCitas');

$routes->get('/conexion', 'crud::conect');


$routes->post('/Insertar', 'crud::insertCitas');

$routes->get('/Actualizar/(:any)', 'crud::extratablaCitas/$1');
$routes->post('/ActualizarCita', 'crud::actualizarCitas');

$routes->get('/Eliminar/(:any)', 'crud::eliminarCitas/$1');
