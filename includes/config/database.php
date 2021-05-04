<?php

    function conectarDB(): mysqli
    {
        $conexion = new mysqli('localhost', 'root', 'root', 'bienes');
        if(!$conexion /* -> connect_error */){
            echo "Error de conexión";
            echo "errno de depuración: " . mysqli_connect_errno();
            echo "error de depuración: " . mysqli_connect_error();
            exit;
        } else{
            /* echo "Conexión Exitosa"; */
            return $conexion;
        }
        
    }

    
?>