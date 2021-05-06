<?php 

require_once __DIR__ . '../../includes/app.php';

use MVC\Router;
use Controllers\ControllerWeb;
use Controllers\ControllerSeller;
use Controllers\ControllerProperty;

$router = new Router();

//Private Zone
$router->get('/admin', [ControllerProperty::class, 'index']);
$router->get('/property/create', [ControllerProperty::class, 'create']);
$router->get('/property/update', [ControllerProperty::class, 'update']);

$router->post('/property/create', [ControllerProperty::class, 'create']);
$router->post('/property/update', [ControllerProperty::class, 'update']);
$router->post('/property/delete', [ControllerProperty::class, 'delete']);


$router->get('/seller/create', [ControllerSeller::class, 'create']);
$router->get('/seller/update', [ControllerSeller::class, 'update']);

$router->post('/seller/create', [ControllerSeller::class, 'create']);
$router->post('/seller/update', [ControllerSeller::class, 'update']);
$router->post('/seller/delete', [ControllerSeller::class, 'delete']);

//Public Zone
$router->get('/', [ControllerWeb::class, 'index']);
$router->get('/nosotros', [ControllerWeb::class, 'nosotros']);
$router->get('/propiedades', [ControllerWeb::class, 'propiedades']);
$router->get('/propiedad', [ControllerWeb::class, 'propiedad']);
$router->get('/blog', [ControllerWeb::class, 'blog']);
$router->get('/entrada', [ControllerWeb::class, 'entrada']);
$router->get('/contacto', [ControllerWeb::class, 'contacto']);
$router->post('/contacto', [ControllerWeb::class, 'contacto']);

$router->checkRoutes();


?>