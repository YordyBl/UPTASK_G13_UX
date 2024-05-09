<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }
    //Validar el Login de Usuarios
    public function validarLogin(){
        if(!$this-> email){
            self::$alertas['error'][]= 'EL Email del Usuario es Obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El campo contraseña no puede estar vacio';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            self::$alertas['error'][] = 'Email no válido';
        }

        return self::$alertas;
    }


    //Validacion para cuentas nuevas
    public function validarNuevaCuenta()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre del Usuario es Obligatorio';
        }
        if(!$this-> email){
            self::$alertas['error'][]= 'EL Email del Usuario es Obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El campo contraseña no puede estar vacio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'Password debe ser mayor a 6 caracteres';
        }
        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Las contraseñas no coinciden';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'El campo password esta vacio';
        }
        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Las contraseñas no son iguales';
        }
        return self::$alertas;
    }
    //Validar password
    public function validarPassword(){

        if (!$this->password) {
            self::$alertas['error'][] = 'El campo contraseña no puede estar vacio';
        }

        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'Password debe ser mayor a 6 caracteres';
        }
        return self::$alertas;
    }

    //Valida Email
    public function validadEmail()
    {

        if (!$this->email) {

            self::$alertas['error'][] = 'Email es obligatorio';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            self::$alertas['error'][] = 'Email no válido';
        }

        return self::$alertas;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken()
    {
        $this->token = uniqid();
    }
}
