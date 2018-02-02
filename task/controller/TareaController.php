<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TareaController
 *
 * @author 2gdaw01
 */
class TareaController {
    //put your code here
            
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Tarea.php";
        
        $this->conectar=new Conectar();
        $this->conexion=$this->conectar->conexion();

    }
    
    public function run($accion){
        switch($accion)
        { 
            case "alta" :
                $this->crear();
                break;
            case "actualizar" :
                $this->actualizar();
                break;
            case "delete" :
                $this->delete();
                break;
            case "realizado" :
                $this->realizado();
                break;
        }
    }
    
 
    public function crear(){
        if(isset($_POST["nombre"])){

            //Creamos un proyecto
            $tarea=new Tarea($this->conexion);
            $tarea->setNombre($_POST["nombre"]);
            $tarea->setFechaVencimiento($_POST["FechaVencimiento"]);
            $save=$tarea->save($_GET["idProyecto"]);
            
        }
        $id=$_GET["idProyecto"];
        header('Location: index.php?controller=proyecto&action=proyectoVista&idProyecto='.$id);
    }
   
    //FUNCION ACTUALIZAR
    public function actualizar(){
        
    }

    //FUNCION DELETE
    public function delete (){
        if(!isset($_GET["delete"])){
            $tarea=new Tarea($this->conexion);
            $tarea->delete($_GET["idTarea"]);
        }
        $id=$_GET["idProyecto"];
        header('Location: index.php?controller=proyecto&action=proyectoVista&idProyecto='.$id);
    }
    
     //FUNCION REALIZADO
    public function realizado(){
        if(!isset($_GET["realizado"])){
            $tarea=new Tarea($this->conexion);
            $idTarea=$tarea->realizado($_POST["idTarea"]);
        }    
        return $idTarea;
    }
    
}
