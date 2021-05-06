<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;


class ControllerSeller{

    public static function create(Router $router)
    {
        $seller = new Vendedor;
        $errores = [];
        $res = 0;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $seller = new Vendedor($_POST);
            $errores = $seller->validarDatos();
            if(empty($errores)){
                $resultado = $seller -> guardar();
                
                if($resultado){
                    header('Location: /admin?res=1');
                }
            }
    
        }

        $router->render('sellers/create', ['seller' => $seller,
                                           'errores' => $errores,
                                           'res' => $res]);

        

    }

    public static function update(Router $router)
    {   
        $errores = [];
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if(!is_numeric($id)) header('location: /admin');
        $res = 0;

        if(!$id){header('Location: /admin');}

        $seller = Vendedor::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_POST['V_Id'] = $id;
            $seller->sincronizar($_POST);
    
    
            $errores = $seller->validarDatos();
            if(empty($errores)){
                //Guardar Registro
                $resultado = $seller -> guardar();
                if($resultado){
                    header('Location: /admin?res=2');
                }
            }
    
        }

        $router->render('/sellers/update', ['seller' => $seller,
                                            'errores' => $errores,
                                            'id' => $id,
                                            'res' => $res]);
  
    }

    public static function delete()
    {
        $res = 0;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            if( $id )
            {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo))
                {
                    $registro = Vendedor::find($id);
                    $resultado = $registro->eliminar();
                    if($resultado)
                    {
                        header('location: /admin?res=3');
                    } else
                    {
                        header('location: /admin?res=4');
                    }
                }

            }
        }
    }

}