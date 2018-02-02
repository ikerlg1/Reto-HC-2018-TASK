<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProyectoController
 *
 * @author pcwin
 */
class ProyectoController {
    //put your code here
        
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Proyecto.php";
        
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
            default:
                $this->proyectoVista();
                break;
        }
    }
    
   /**
    * Carga la página principal de empleados con la lista de
    * empleados que consigue del modelo.
    *
    */ 
    public function proyectoVista(){
        include './model/Tarea.php';
        include './model/Mensaje.php';
    
        $proyecto=new Proyecto($this->conexion); 
        $datosProyecto=$proyecto->getAll($_GET['idProyecto']);
         $tarea=new Tarea($this->conexion);
        $listaTareas=$tarea->getAllByIdProyecto($_GET['idProyecto']);
         $mensaje=new Mensaje($this->conexion);
        $listaMensajes=$mensaje->getAllByIdProyecto($_GET['idProyecto']);
        
        //Cargamos la vista index y le pasamos valores
        $this->view("proyecto",array(
                "tareas"=>$listaTareas,
                "mensajes" =>$listaMensajes,
                "datosProyecto"=>$datosProyecto
            ));
    }
    
   /**
    * Crea un nuevo empleado a partir de los parámetros POST 
    * y vuelve a cargar el index.php.
    *
    */
    public function crear(){
        if(isset($_POST["nombre"])){

            include './model/UsuarioProyecto.php';
           
            $proyecto=new Proyecto($this->conexion);
            $proyecto->setNombre($_POST["nombre"]);
            $proyecto->setDescripcion($_POST["descripcion"]);
            $lastId=$proyecto->save();

            $usuarioProyecto = new UsuarioProyecto ($this->conexion);
            $usuarioProyecto->setIdProyecto($lastId);
            $usuarioProyecto->setIdUsuario($_GET["idUsuario"]);
            $usuarioProyecto->setTipo("creador");
            
            $save = $usuarioProyecto->save();
            
        }
        header('Location: index.php?controller=perfil&action=perfilUsuario&idUsuario='.$_GET["idUsuario"]);
    }
   
    //FUNCION ACTUALIZAR
    public function actualizar(){
        /*if(!isset($_GET["actualizar"])){          
             //Creamos un usuario
            $bodega=new Bodega($this->conexion);
            $bodega->setIdBodega($_GET["id"]);
            $bodega->setDireccion($_POST["direccion"]);
            $bodega->setNombre($_POST["nombre"]);
            $bodega->setEmail($_POST["email"]);
            $bodega->setTelefono($_POST["telefono"]);
            $bodega->setNombreContacto($_POST["nombrePersonaContacto"]);
            $bodega->setFechaFundacion($_POST["fechaFundacion"]);
            $bodega->setHasRestaurante($_POST["hasRestaurante"]);
            $bodega->setHasHotel($_POST["hasHotel"]);
            $actualizar=$bodega->actualizar();

            header('Location: index.php?controller=bodegas&action=detalleBodega&id='.$bodega->getIdBodega());

        }*/
        

    }

    //FUNCION DELETE
    public function delete (){
        if(!isset($_GET["delete"])){
            $proyecto=new Proyecto($this->conexion);
            $proyecto->delete($_GET["idProyecto"]);
        }

       header('Location: index.php?controller=perfil&action=perfilUsuario&idUsuario='.$_GET["idUsuario"]);
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
