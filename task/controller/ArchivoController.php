<?php
class ArchivoController {
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Archivo.php";
        
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
            case "delete" :
                $this->delete();
                break;
            case "mostrarArchivo" :
                $this->mostrar();
                break;
        }
    }
    
    /**
     * insertar un archivo a la base de datos
     * y vuelve a cargar el index.php.
     */
    public function crear(){
        if(isset($_POST["descripcion"])){
             $archivo=new Archivo($this->conexion);
             $archivo->setDescripcion($_POST["descripcion"]);
             $archivo->setIdProyecto($_GET["idProyecto"]);
             $id=$_GET["idProyecto"];
             $archivo->setUrl($archivo->archivo());
             $save=$archivo->save();

        }
       
        header('Location: index.php?controller=proyecto&action=proyectoVista&idProyecto='.$id);
       
    }

     /**
     * Recoge todos los datos sobre los archivos de un proyecto
     */
    public function mostrar(){
        if(isset($_POST["idProyecto"])){
            $archivo=new Archivo($this->conexion);
            $archivos=$archivo->getAllById($_POST["idProyecto"]);

        }
        
        echo  $archivos;

    }

    /**
     * Elimina de la base de datos el archivo de un proyecto
     */
    public function delete (){
        if(!isset($_GET["delete"])){
            if(isset($_GET["idArchivo"])){
                $archivo=new Archivo($this->conexion);
                $archivo->setIdArchivo($_GET["idArchivo"]);
                $archivos=$archivo->delete();
           
                echo $archivo;
            }
       
        }
    }

}

