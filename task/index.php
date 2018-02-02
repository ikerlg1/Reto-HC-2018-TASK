<?php
//Configuración global
require_once 'config/global.php';
session_start();
//Cargamos el controlador y ejecutamos la accion
if(isset($_GET["controller"])){
    // Cargamos la instancia del controlador correspondiente
    $controllerObj=cargarControlador($_GET["controller"]);
    // Lanzamos la acción
    lanzarAccion($controllerObj);
}else{
    // Cargamos la instancia del controlador por defecto
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    // Lanzamos la acción
    lanzarAccion($controllerObj);
}


function cargarControlador($controller){

    switch ($controller) {
        
        case 'perfil':
            $strFileController='controller/PerfilController.php';
            require_once $strFileController;
            $controllerObj=new PerfilController();
            break;
        case 'proyecto':
            $strFileController='controller/ProyectoController.php';
            require_once $strFileController;
            $controllerObj=new ProyectoController();
            break;
        case 'tarea':
            $strFileController='controller/TareaController.php';
            require_once $strFileController;
            $controllerObj=new TareaController();
            break; 
        case 'mensaje':
            $strFileController='controller/MensajeController.php';
            require_once $strFileController;
            $controllerObj=new MensajeController();
            break; 
        case 'nota':
            $strFileController='controller/NotaController.php';
            require_once $strFileController;
            $controllerObj=new NotaController();
            break; 
         case 'usuarios':
            $strFileController='controller/UsuariosController.php';
            require_once $strFileController;
            $controllerObj=new UsuariosController();
            break;
        default:
            $strFileController='controller/UsuariosController.php';
            require_once $strFileController;
            $controllerObj=new UsuariosController();
            break; 
    }
    return $controllerObj;
}

function lanzarAccion($controllerObj){
    if(isset($_GET["action"])){
        $controllerObj->run($_GET["action"]);
    }else{
        $controllerObj->run(ACCION_DEFECTO);
    }
}