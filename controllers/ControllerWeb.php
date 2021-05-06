<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class ControllerWeb
{
    public static function index(Router $router)
    {
        $properties = Propiedad::get(3);

        $router->render('pages/index', ['properties' => $properties]);
    }

    public static function nosotros(Router $router)
    {
        debugear('Desde Nosotros');

        $router->render('nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $properties = Propiedad::all();

        $router->render('pages/propiedades', ['properties' => $properties]);
    }

    public static function propiedad(Router $router)
    {
        $property = new Propiedad;
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if(is_numeric($id))
        {
            $property = Propiedad::find($id);
        }

        $router->render('pages/propiedad', ['id' => $id,
                                      'property' => $property]);
    }

    public static function blog(Router $router)
    {
        debugear('Blog');

        $router->render('blog', []);
    }

    public static function entrada(Router $router)
    {
        debugear('Entrada');

        $router->render('entrada', []);
    }

    public static function contacto(Router $router)
    {
        debugear('Contacto');

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            debugear('Contacto POST');
        }

        $router->render('contacto', []);
    }

}