<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
use Classes\Email;

class LoginController
{
    public static function login(Router $router)
    {

        $alertas=[];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario= new Usuario($_POST);

            $alertas=$usuario -> validarLogin();

            if(empty($alertas)){
                // Verificar que el usuario exista
                $usuario = Usuario::where('email', $usuario->email);
                if(!$usuario || !$usuario->confirmado){
                    Usuario::setAlerta('error','El usuario No existe o no esta confirmado');
                } else{
                    //El usuario existe
                    if(password_verify($_POST['password'], $usuario->password)){
                        session_start();
                        $_SESSION['id']= $usuario->id;
                        $_SESSION['nombre']= $usuario->nombre;
                        $_SESSION['email']= $usuario->email;
                        $_SESSION['login']= true;

                        //Redireccionar
                        header('Location:/dashboard');
                    }else{
                        Usuario::setAlerta('error','Password incorrecto');
                    }
                } 

            }
        }
        $alertas=Usuario::getAlertas();
        //Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas'=> $alertas
        ]);
    }
    public static function logout()
    {
        session_start();
        $_SESSION=[];
        header('Location: /');
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
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = new Usuario($_POST);
            $alertas = $usuario->validadEmail();

            if(empty($alertas)){
                $usuario = Usuario::where('email', $usuario->email);
                if($usuario && $usuario->confirmado==="1"){

                    //Generar nuevo token
                    $usuario->crearToken();

                    unset($usuario->password2);

                    //$actualizar el usuario
                    $usuario->guardar();

                    //Enviar Correo

                    $email = new Email($usuario->nombre, $suario->email, $usuario->token);

                    $email ->enviarInstrucciones();

                    //imprimir alerta

                    Usuario::setAlerta('exito', 'Hemos enviado las instrucciones a tu email');

                }else{
                    Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado');
                    
                }
                $alertas = Usuario::getAlertas();
            }

        }



        //Renderizado - Muestra la vista
        $router->render('auth/olvide', [
            'titulo' => 'Olvide Contraseña',
            'alertas' => $alertas
        ]);
    }

    public static function reestablecer(Router $router)
    {
        $token =s($_GET['token']);
        $mostrar=true;
        
        if(!$token)header('Location: /');
        //Identificar el usuario con este token
        $usuario= Usuario::where('token', $token);
        

        if(empty($usuario)){
            Usuario::setAlerta('error', 'Token No válido');
            $mostrar=false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);

            $alertas=$usuario->validarPassword();

            if(empty($alertas)){
                //Hashear el nuevo password
                $usuario->hashPassword();
                //eliminar el token
                $usuario->token=null;
                //guardar el usuario
                $resultado=$usuario->guardar();
                //redireccionar
                if($resultado){
                    header('Location: /');
                }
                debuguear($usuario);
            }

        }
        $alertas=Usuario::getAlertas();
        //Renderizado
        $router->render('auth/reestablecer', ['titulo' => 'Reestablecer Password',
                                             'alertas' => $alertas,
                                            'mostrar' => $mostrar ]);
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
        } else {
            //confirmar cuenta
            $usuario->confirmado = 1;
            $usuario->token = null;
            unset($usuario->password2);
            //Guardar en la BD
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Validad Correctamente');
            // debuguear($usuario);
        }
        $alertas = Usuario::getAlertas();
        $router->render(
            'auth/confirmar',
            [
                'titulo' => 'Confirma tu cuenta UpTask',
                'alertas' => $alertas
            ]
        );
    }
}
