<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
use Classes\Email;

class LoginController
{
    public static function login(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
        //Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }
    public static function logout()
    {
    }
    public static function crear(Router $router)
    {
        $alertas = [];
        $usuario = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {

                $existeUsuario = Usuario::where('email', $usuario->email);
                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {

                    $usuario->hashPassword();

                    unset($usuario->password2); //Quita del set a passwrod 2
                    //Genera token
                    $usuario->crearToken();

                    //debuguear($usuario);
                    //enviar Email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();


                    //Crear nuevo usuario
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }
        //Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crear Usuario',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function olvide(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        //Renderizado - Muestra la vista
        $router->render('auth/olvide', ['titulo' => 'Olvide Contraseña']);
    }

    public static function reestablecer(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
        //Renderizado
        $router->render('auth/reestablecer', ['titulo' => 'Reestablecer Password']);
    }
    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje', ['titulo' => 'Cuenta creada exitosamente']);
    }
    public static function confirmar(Router $router)
    {
        $token = s($_GET['token']);
        if (!$token) header('Location: /');
        $usuario = Usuario::where('token', $token);
        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token No Valido');
        }else{
            //confirmar cuenta
            $usuario->confirmado = 1;
            $usuario->token=null;
            unset($usuario->password2);
            //Guardar en la BD
            $usuario -> guardar();
            Usuario::setAlerta('exito', 'Cuenta Validad Correctamente');
           // debuguear($usuario);
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar', 
        ['titulo' => 'Confirma tu cuenta UpTask',
         'alertas' => $alertas
        ]);
    }
}
