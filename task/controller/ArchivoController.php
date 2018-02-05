

<?php
class ArchivoController {
    //put your code here
              
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Archivo.php";
        
        $this->conectar=new Conectar();
        $this->conexion=$this->conectar->conexion();

    }
    
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
    
 
    public function crear(){
        if(isset($_POST["descripcion"])){
             $archivo=new Archivo($this->conexion);
            $archivo->setDescripcion($_POST["descripcion"]);
             $archivo->setIdProyecto($_POST["idProyecto"]);
            
             $archivo->setUrl($archivo->archivo());
             $save=$archivo->save();

        }
       
        header('Location: index.php?controller=proyecto&action=proyectoVista&idProyecto='.$_POST["idProyecto"]);
       
    }
    
    public function mostrar(){
        if(isset($_POST["idProyecto"])){
            $archivo=new Archivo($this->conexion);
            $archivos=$archivo->getAllById($_POST["idProyecto"]);

        }
        
        echo  $archivos;

    }

    //FUNCION DELETE
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

