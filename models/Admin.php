<?php

namespace Model;

class Admin extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $id = 'User_Id';
    protected static $columnasBD = ['User_Id', 'User_Nombre', 'User_Password'];

    public $User_Id;
    public $User_Nombre;
    public $User_Password;

    public function __construct($args = [])
    {
        $this->User_Id = $args['User_Id'] ?? null;
        $this->User_Nombre = $args['User_Nombre'] ?? '';
        $this->User_Password = $args['User_Password'] ?? '';
    }

    public function validarDatos()
    {
        if($this->User_Nombre === '') {self::$errores[] = 'Usuario Obligtorio';}
        if($this->User_Password === '') {self::$errores[] = 'Password Obligatorio';}
        return self::$errores;
    }

    public function new()
    {
        $db = conectarDB();

        $email = 'correo@correo.com';
        $password = '123456';
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $query = " INSERT INTO " . self::$tabla . " (User_Nombre, User_Password) VALUES ('${email}', '${passwordHash}'); ";
        $resultado = self::$db->query($query);
        debugear($resultado);
    }

    public function existe()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE User_Nombre = '" . $this->User_Nombre ."' LIMIT 1;";
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows)
        {
            self::$errores[] = 'Datos invalidos';
            return;
        }
        return $resultado;
    }

    public function checkPassword($resultado)
    {
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->User_Password, $usuario->User_Password);
        if(!$autenticado)
        {
            self::$errores[] = "Datos incorrectos";
        }
        return $autenticado;
    }

    public function autenticar()
    {
        session_start();

        $_SESSION['usuario'] = $this->User_Nombre;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}