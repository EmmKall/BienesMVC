<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class ControllerLogin
{

    public static function login(Router $router)
    {
        $errores = [];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $auth = new Admin($_POST);
            $errores = $auth->validarDatos();
            
            if(empty($errores))
            {
                $resultado = $auth->existe();
                if(!$resultado)
                {
                    $errores = Admin::getErrores();
                } else {
                    $autenticado = $auth->checkPassword($resultado);

                    if($autenticado)
                    {
                        $auth->autenticar();
                    } else
                    {
                        $errores = Admin::getErrores();
                    }
                }
            }

        }

        $router->render('auth/login', ['errores' => $errores]);

    }

    public static function logout(Router $router)
    {
        session_start();
        $_SESSION = [];

        header('Location: /');
    }

}