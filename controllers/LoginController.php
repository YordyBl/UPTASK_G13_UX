<?php
namespace Controllers;
use MVC\Router;
use Model\Usuario;


class LoginController {
    public static function login (Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
        //Render a la vista
        $router->render('auth/login', [
                'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout(){


    }

    public static function crear (Router $router){
        $alertas=[];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas=$usuario->validarNuevaCuenta();
            //debuguear($alertas);
        } else {
           // $usuario -> hashPassword ();
        }

        //Render a la vista
        $router->render('auth/crear', [
                'titulo' => 'Crear Usuario',
                'usuario' => $usuario,
                'alertas' => $alertas
        ]);
    }

    public static function olvide (Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }

        //Renderizado - Muestra la vista
        $router->render('auth/olvide', ['titulo' => 'Olvide Contraseña']);
    }

    public static function reestablecer (Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
         //Renderizado
        $router->render('auth/reestablecer', ['titulo' => 'Reestablecer Password']);

    }
    public static function mensaje(Router $router){
        $router->render('auth/mensaje', ['titulo' => 'Cuenta creada exitosamente']);

    }
    public static function confirmar(Router $router){

        $router->render('auth/confirmar', ['titulo' => 'Confirma tu cuenta UpTask']);
    }

}