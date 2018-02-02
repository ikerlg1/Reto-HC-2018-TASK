<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mensajeController
 *
 * @author 2gdaw01
 */
class MensajeController {
    //put your code here
      private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Mensaje.php";
        
        $this->conectar=new Conectar();
        $this->conexion=$this->conectar->conexion();

    }

   /**
    * Ejecuta la acción correspondiente.
    *
    */
    public function run($accion){
        switch($accion)
        { 
            case "proyectoVista" :
                $this->proyectoVista();
                break;
            case "alta" :
                $this->crear();
                break;
            case "actualizar" :
                $this->actualizar();
                break;
            case "delete" :
                $this->delete();
                break;
        }
    }
    

    public function proyectoVista(){
        include './model/Tarea.php';

        $proyecto=new Proyecto($this->conexion);
        $tarea=new Tarea($this->conexion);
        
        $listaTareas=$tarea->getAllByIdProyecto($_GET['idProyecto']);
        
        //Cargamos la vista index y le pasamos valores
        $this->view("proyecto",array(
                "tareas"=>$listaTareas
            ));
    }
    public function crear(){
        $mensaje=new Mensaje($this->conexion);
        $mensaje->setIdProyecto($_GET['idProyecto']);
        $mensaje->setDescripcion($_POST['mensaje']);
        $fecha= date("Y-m-d H:i:s");
        $mensaje->setFecha($fecha);
        
        $mensaje->save();
        
        
        header("Location: http://localhost/task/index.php?controller=proyecto&action=proyectoVista&idProyecto=".$_GET['idProyecto']);

    }
   
    //FUNCION ACTUALIZAR
    public function actualizar(){

        }
        
    //FUNCION DELETE
    public function delete (){
 
    }
    
    
   /**
    * Crea la vista que le pasemos con los datos indicados.
    *
    */
    public function view($vista,$datos){
        $data = $datos;  
        require_once  __DIR__ . "/../view/" . $vista . "View.php";

    }

}
