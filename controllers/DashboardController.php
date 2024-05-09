<? php 
namespace Controllers;

class DashboardController{
  public static function index(Router $router){

    session_start();
    isAuth();
    $router-> render('dashboard/index',[
      'titulo'=>'Proyectos'
    ]);
  } 

  public static function crear_proyecto (Router $router){
    session_start();
    $router-> render('dashboard/crear-proyecto',[
      'titulo'=>'Crear proyecto'
    ]);
  }

  public static function perfil (Router $router){
    session_start();
    $router-> render('dashboard/perfil',[
      'titulo'=>'Perfil'
    ]);
  }
}