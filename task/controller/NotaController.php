<?php
class NotaController {          
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Nota.php";
        
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
            case "mostrarNotas" :
                $this->mostrarNotas();
                break;
   
        }
    }
    
   /**
    * Crea una Nota sobre una Tarea 
    *
    */
    public function crear(){
        if(isset($_POST["nota"])){
             $nota=new Nota($this->conexion);
             $nota->setDescripcion($_POST["nota"]);
             $nota->setIdTarea($_GET["idTarea"]);
             $save=$nota->save();

        }
        return $save;
       
    }
    
   /**
    * Recoge todas las notas 
    * sobre una Tarea
    *
    */
    public function mostrarNotas(){
        if(isset($_POST["idTarea"])){
             $nota=new Nota($this->conexion);
             $notas=$nota->getAllByIdTarea($_POST["idTarea"]);

        }
        echo json_encode($notas);
    }
    
   /**
    * Elimina una nota de una Tarea
    */
    public function delete (){
        if(!isset($_GET["delete"])){
            if(isset($_GET["idNota"])){
                $nota=new Nota($this->conexion);
                $nota->setIdNota($_GET["idNota"]);
                $notas=$nota->delete();

                echo $notas;
            }
        }
    }

    
}
