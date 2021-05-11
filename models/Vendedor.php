<?php

namespace Model;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $id = 'V_Id';
    protected static $columnasDB = ['V_Id', 'V_Nombre', 'V_Apellido', 'V_Telefono'];

    public $V_Id;
    public $V_Nombre;
    public $V_Apellido;
    public $V_Telefono;

    public function __construct($args = [])
    {
        $this -> V_Id = $args['V_Id'] ?? null;
        $this -> V_Nombre = $args['V_Nombre'] ?? '';
        $this -> V_Apellido = $args['V_Apellido'] ?? '';
        $this -> V_Telefono = $args['V_Telefono'] ?? '';
    }

    //Métodos
    public function validarDatos(){
        //Comprobar que no esten vacias
        if($this->V_Nombre === '') {self::$errores[] = 'Nombre Obligatorio';}
        if($this->V_Apellido === ''){self::$errores[] = 'Apellido Obligatorio';}
        if($this->V_Telefono === '' || strlen($this->V_Telefono) < 10 || strlen($this->V_Telefono) > 15 ){self::$errores[] = 'Teléfono obligatorio';}
        if(!preg_match('/[0-9]{10}/', $this->V_Telefono)) {self::$errores[] = "Número teléfonico no valido";}
        return self::$errores;
    }

}

?>