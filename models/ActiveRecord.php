<?php

namespace Model;

class ActiveRecord{

    //Variable de conexión DB
    protected static $db;
    protected static $columnasDB = [];
    protected static $errores = []; 
    protected static $tabla = '';
    protected static $id = '';

    //Métodos

    //Contactar a la DB
    public static function setDB($database){
        $resultado = self::$db = $database;
    }

    //Consultar todos los registros
    public static function all(){
        $sql = " SELECT * FROM " . static::$tabla;
        $resultado = static::consultarQuery($sql);
        return $resultado;
    }

    //Consultar determinados registros
    public static function get($limit){
        $sql = " SELECT * FROM " . static::$tabla . " LIMIT " . $limit . ";";
        $resultado = static::consultarQuery($sql);
        return $resultado;
    }

    //Identificar registro
    public static function find($id){
        $sql = " SELECT *  FROM " . static::$tabla;
        $sql .= " WHERE " . static::$id . " = $id ";
        $resultado = static::consultarQuery($sql);
        return array_shift($resultado);
    }

    public static function consultarQuery($sql){
        //Consultar DB 
        $resultado = static::$db->query($sql);
        //Iterar resultado
        $array = [];
        while($registro = $resultado -> fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        //Liberar Memoria
        $resultado->free();
        //Retornar los resultados
        return $array;
    }

    //Crear objetos
    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if(property_exists( $objeto, $key )){ //Comprobar que existe la llave en ambos objetos
                $objeto->$key = $value; //Asignar el valor
            }
        }
        return $objeto;
    }

    public function guardar(){
        
        $atributos = $this->sanitizar();
        
        if( isset($this->P_Id) || isset($this->V_Id) ){
            $sql = $this->actualizar($atributos);
        } else {
            if(isset($atributos['V_Id']) && $atributos['V_Id'] === ''){unset($atributos['V_Id']);}
            $sql = $this->crear($atributos);
        }
        $resultado = static::$db->query($sql);
        return $resultado;
    }

    //Crear
    public function crear($atributos){
        $sql = " INSERT INTO " . static::$tabla . " (" . join(', ', array_keys($atributos)) ." ) ";
        $sql .= " VALUES ('" . join("', '", array_values($atributos)) . "'); ";
        return $sql;
    }

    public function actualizar($atributos){
        //Query
        if(isset($atributos['V_Id']) && $atributos['V_Id'] !== ''){ unset($atributos['V_Id']);}
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "${key} = '${value}'";
        }
        $sql = "UPDATE " . static::$tabla ." SET ";
        $sql .= join(", ", $valores);
        $sql .= " WHERE " . static::$id . " = " . self::$db->escape_string($this->P_Id) ?? self::$db->escape_string($this->V_Id) . ";";
        return $sql;
    }

    public function eliminar(){ 
        $id = $this->getId();
        $sql = " DELETE FROM " . static::$tabla . " WHERE " . static::$id . " = " . static::$db->escape_string($id) . " ;";
        $resultado = self::$db->query($sql);
        return $resultado;
    }

    public function iterar(){
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if($columna === 'P_Id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function getId(){
        $clase = get_class($this);
        if($clase === 'App\Vendedor') $id = $this->V_Id;
        else if($clase === 'App\Propiedad') $id = $this->P_Id;
        return $id;    
    }

    public function sanitizar(){
        $atributos = $this->iterar();
        $sanitizados = [];

        foreach ($atributos as $key => $value) {
            $sanitizados[$key] = self::$db->escape_string($value); 
        }
        return $sanitizados;
    }

    public function validarDatos(){
    static::$errores = [];
        return static::$errores;
    }

    public static function getErrores(){
        return static::$errores;
    }   

    //Subir imagen
    public function setImagen($imagen){
        //Elimina imagen anterior
        if(isset($this->P_Id) && $this->P_Id !== null){
            $this->borrarImg();
        }
        //Asignar al atributo imagen
        if($imagen){
            $this->P_Imagen = $imagen;
        }
    }

    public function borrarImg(){
        //Comprobar si existe archivo
        $existeArchivo = file_exists(CARPETA_IMAGES . $this->P_Imagen);
        if($existeArchivo){ unlink(CARPETA_IMAGES . $this->P_Imagen);}
    }

    //Sincronizar el objeto en Memoria
    public function sincronizar( $args = []){
        foreach ($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}

?>