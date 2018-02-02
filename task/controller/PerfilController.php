<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilController
 *
 * @author 2gdaw01
 */
class PerfilController {
     private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Usuario.php";
        
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
            case "perfilUsuario" :
                $this->perfilUsuario();
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
    

    public function perfilUsuario(){
        
        include './model/Proyecto.php';
        //include './model/Usuario.php';
        
        //$usuario=new Usuario($this->conexion);
        $proyecto=new Proyecto($this->conexion);
        
        //$listaDatosUsuario=$usuario->infoPorEmail($_GET['idUsuario']);
        $listaProyectos=$proyecto->getAllById($_GET['idUsuario']);
        //$listaProyectosNoParticipante=$proyecto->getAllNoParticipante();
        
        //Cargamos la vista index y le pasamos valores
        $this->view("perfil",array(
                "proyectos"=>$listaProyectos//,
                //"proyectosDisponibles"=>$listaProyectosNoParticipante
            ));
    }

    public function crear(){

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
