<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class ControllerProperty{

    public static function index(Router $router){

        $properties = Propiedad::all(); 
        $sellers = Vendedor::all();
        $res = 0;

        $router->render('properties/admin', ['properties' => $properties,
                                             'sellers' => $sellers,
                                             'res' => $res]);
    }

    public static function create(Router $router){
        $property = new Propiedad;
        $sellers = Vendedor::all();
        $errores = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Imagen
            $imagen = $_FILES['P_Imagen'];

            //Instancia de propiedad
            $property = new Propiedad($_POST);

            //Generar nombre unico
            $nombreImg = md5( uniqid(rand(), true) ) . '.jpg';
            $imagen = Image::make($_FILES['P_Imagen']['tmp_name'])->fit(800,600);
            $property->setImagen($nombreImg);

            $errores = $property->validarDatos();

            if(empty($errores)){

                $resultado = $property->guardar();
                //Realizar un resize a la imagen con Intervention
                if($_FILES['P_Imagen']['tmp_name']){

                    if(!is_dir(CARPETA_IMAGES)){
                        mkdir(CARPETA_IMAGES);
                    }
                    $imagen->save(CARPETA_IMAGES . $nombreImg);
                }

                if($resultado){
                    header('Location: /admin?res=1');
                }
            }
        }

        $router->render('properties/create', ['property' => $property,
                                              'sellers' => $sellers,
                                              'errores' => $errores
                                              ]);
    }

    public static  function update(Router $router){
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if(!is_numeric($id)) header('location: /admin');
        $property = Propiedad::find($id);

        if(!$property) header('location: /admin');
        $sellers = Vendedor::all();
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $imagen = $_FILES['P_Imagen'];
            $nombreImg = md5( uniqid(rand(), true) ) . '.jpg';
            $property->sincronizar($_POST);

            //Realizar un resize a la imagen con Intervention
            if($_FILES['P_Imagen']['tmp_name']){
                //Generar nombre unico de nueva imagen
                $imagen = Image::make($_FILES['P_Imagen']['tmp_name'])->fit(800,600);
                $property->setImagen($nombreImg);
            }
            
            $errores = $property->validarDatos();

            if(empty($errores)){

                $resultado = $property->guardar();
                
                if($_FILES['P_Imagen']['tmp_name']){
                    if(!is_dir(CARPETA_IMAGES)) mkdir(CARPETA_IMAGES); 
                    if($_FILES['P_Imagen']['tmp_name']) $imagen->save(CARPETA_IMAGES . $nombreImg);
                }
                if($resultado) header('Location: /admin?res=2');
            }


        }

        $router->render('properties/update', ['property' => $property,
                                              'sellers' => $sellers,
                                              'errores' => $errores,
                                              'id' => $id]);
    }

    public static function delete( )
    {
        $res = 0;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT); 
            if( $id )
            {
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    $registro = Propiedad::find($id);
                    $resultado = $registro->eliminar();
                    if($resultado){
                        header('location: /admin?res=3');
                    } else {
                        header('location: /admin?res=4');
                    }
                }
            }
        }
    }


}

?>