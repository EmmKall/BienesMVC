<?php 

namespace Model;

class Propiedad extends ActiveRecord{ 

    protected static $tabla = 'propiedades';
    protected static $id = 'P_Id';
    protected static $columnasDB = ['P_Id', 'P_Titulo', 'P_Precio', 'P_Imagen', 'P_Descrip', 'P_Habitaciones', 'P_WC', 'P_Estacionamiento', 'P_Creado', 'P_VId'];

    //Atributos
    public $P_Id;
    public $P_Titulo;
    public $P_Precio;
    public $P_Imagen;
    public $P_Descrip;
    public $P_Habitaciones;
    public $P_WC;
    public $P_Estacionamiento;
    public $P_Creado;
    public $P_VId;

    //Constructor
    public function __construct($args = [])
    {
        $this -> P_Id = $args['P_Id'] ?? null;
        $this -> P_Titulo = $args['P_Titulo'] ?? '';
        $this -> P_Precio = $args['P_Precio'] ?? '';
        $this -> P_Imagen = '';
        $this -> P_Descrip = $args['P_Descrip'] ?? '';
        $this -> P_Habitaciones = $args['P_Habitaciones'] ?? '';
        $this -> P_WC = $args['P_WC'] ?? '';
        $this -> P_Estacionamiento = $args['P_Estacionamiento'] ?? '';
        $this -> P_Creado = date('Y/m/d');
        $this -> P_VId = $args['P_VId'] ?? '';

    }

    //Métodos
    //Validar
    public function validarDatos(){
        //Comprobar que no esten vacias
        if($this->P_Titulo === '') {self::$errores[] = 'Titulo Obligatorio';}
        if($this->P_Precio === 0){self::$errores[] = 'Precio no valido';}
        if($this->P_Descrip === '' || strlen($this->P_Descrip) < 30){self::$errores[] = 'Descripción obligatoria mayor a 30 caracteres';}
        if($this->P_Habitaciones === 0 || $this->P_Habitaciones === ''){self::$errores[] = 'Número de habitaciones no valido';}
        if($this->P_WC === 0 || $this->P_WC === ''){self::$errores[] = 'Número de WC no valido';}
        if($this->P_Estacionamiento === 0 || $this->P_Estacionamiento === ''){self::$errores[] = 'Número de estacionamientos no valido';}
        if($this->P_VId === 0 || $this->P_VId === ''){self::$errores = 'Seleccione vendedor';}
        if(!$this->P_Imagen) { self::$errores[] = 'Imagen obligatoria'; }
        return self::$errores;
    }

}

?>