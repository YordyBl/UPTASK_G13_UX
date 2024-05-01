<?php 

require_once __DIR__ . '/../includes/app.php';
use Controllers\LoginController;
use MVC\Router;
$router = new Router();

//Login

$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->post('/logout', [LoginController::class, 'logout']);

//Formulario crear cuenta
$router->get('/crear', [LoginController::class, 'crear']);
$router->post('/crear', [LoginController::class, 'crear']);

//olvide contraseña
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);


//Colocar el nuevo password
$router->get('/reestablecer', [LoginController::class, 'reestablecer']);
$router->post('/reestablecer', [LoginController::class, 'reestablecer']);

//Confirmacion de cuenta
$router->get('/mensaje', [LoginController::class, 'mensaje']);
$router->post('/confirmar', [LoginController::class, 'confirmar']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();