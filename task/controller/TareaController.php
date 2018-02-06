<?php
class TareaController {        
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Tarea.php";
        
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
      
   /**
    * Inserta una Tarea en la base de datos
    * y vuelve a cargar el index.php.
    */     
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
   
    
   /**
    * Elimina una Tarea de la base de datos
    * y vuelve a cargar el index.php.
    */   
    public function delete (){
        if(!isset($_GET["delete"])){
            $tarea=new Tarea($this->conexion);
            $tarea->delete($_GET["idTarea"]);
        }
        $id=$_GET["idProyecto"];
        header('Location: index.php?controller=proyecto&action=proyectoVista&idProyecto='.$id);
    }
    
    
   /**
    * Actualiza el estado de realizado de la Tarea en la base de datos
    *
    */   
    public function realizado(){
        if(!isset($_GET["realizado"])){
            $tarea=new Tarea($this->conexion);
            $idTarea=$tarea->realizado($_POST["idTarea"]);
        }    
        return $idTarea;
    }
    
}
