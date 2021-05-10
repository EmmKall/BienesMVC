<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class ControllerWeb
{
    public static function index(Router $router)
    {
        $properties = Propiedad::get(3);
        $inicio = true;

        $router->render('pages/index', ['properties' => $properties,
                                        'inicio' => $inicio]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('pages/nosotros', []);
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
        $router->render('pages/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('pages/entrada', []);
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $respuesta = $_POST;

            //Crear instancia de phpmailer
            $mail = new PHPMailer();

            //COnfigurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'bea6e487775e06';
            $mail->Password = 'c0c15c1a0dba0c';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRacies.com');
            $mail->Subject = 'Consulta desde el sitio';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir Contenido
            $contenido = '<html>';
            $contenido .= '<h4> Solicitud de Información </h4>'; 
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';
            if( isset($respuesta['email']) && $respuesta['email'] !== '')
            {
                $contenido .= '<p>Contacto por correo: ' . $respuesta['email'] . '</p>';
            }

            if( isset($respuesta['telefono']) && $respuesta['telefono'] !== '')
            {
                $contenido .= '<p>Contacto por teléfono: ' . $respuesta['telefono'] . '</p>';
                $contenido .= '<p>El día ' . $respuesta['fecha'] . ' a la hora' . $respuesta['hora'] . '</p>';
                $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
            } 
            
            
            $contenido .= '<p>Interes en ' . $respuesta['opcion'] . '</p>';
            $contenido .= '<p>Presupuesto: $' . $respuesta['presupuesto'] . '</p>';
                        
            $contenido .= '</html>';
            $mail->Body = $contenido;
            $mail->AltBody = 'Texto alternativo sin HTML';

            if($mail->send()){
                $mensaje = true;
            }
        }

        $router->render('pages/contacto', ['mensaje' => $mensaje]);
    }

}