<?php 

require_once __DIR__ . '../../includes/app.php';

use MVC\Router;
use Controllers\ControllerProperty;

$router = new Router();

$router->get('/admin', [ControllerProperty::class, 'index']);
$router->get('/property/create', [ControllerProperty::class, 'create']);
$router->get('/property/update', [ControllerProperty::class, 'update']);
$router->get('/seller/create', [ControllerProperty::class, 'create']);
$router->get('/seller/update', [ControllerProperty::class, 'update']);

$router->post('/property/create', [ControllerProperty::class, 'create']);
$router->post('/property/update', [ControllerProperty::class, 'update']);
$router->post('/property/delte', [ControllerProperty::class, 'delete']);
$router->post('/seller/create', [ControllerProperty::class, 'create']);
$router->post('/seller/update', [ControllerProperty::class, 'update']);

$router->checkRoutes();


?>