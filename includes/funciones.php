<?php

    define('TEMPLATE_URL', __DIR__ . '/templates');
    define('FUNCIONES_URL', __DIR__ . 'funciones.php');
    define('CARPETA_IMAGES', $_SERVER['DOCUMENT_ROOT'] . '/images/');

    function incluirTemplate(string $nombre, bool $inicio = false ){
        include_once TEMPLATE_URL . "/{$nombre}.php";
    }

    //Verificar si está autenticado
    function estaAutentificado(){
        session_start();
        if(!$_SESSION['login']) {
            header('Location: /');
        }
    }

    /* Debugear */
    function debugear($variable): void{
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
        exit;
    }
    
    //Sanitizar en HTML
    function limpiar($dato): string{
        $resultado = htmlspecialchars($dato);
        return $resultado;
    }

    //Validar
    function validarTipoContenido($tipo){
        $tipos = ['vendedor', 'propiedad'];
        return in_array($tipo, $tipos);
    }

?>