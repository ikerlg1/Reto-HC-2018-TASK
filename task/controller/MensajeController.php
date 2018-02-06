<?php
class MensajeController {
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
     
   /**
    * Inserta los mensajes sobre un proyecto 
    * en la base de datos y vuelve a cargar el index.php.
    */    
    public function crear(){
        $mensaje=new Mensaje($this->conexion);
        $mensaje->setIdProyecto($_GET['idProyecto']);
        $mensaje->setDescripcion($_POST['mensaje']);
        $fecha= date("Y-m-d H:i:s");
        $mensaje->setFecha($fecha);
        
        $mensaje->save();

        header("Location: http://localhost/task/index.php?controller=proyecto&action=proyectoVista&idProyecto=".$_GET['idProyecto']);

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
