

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
            case "bajar" :
                $this->bajar();
                break;
   
        }
    }
    
 
    public function crear(){
         
        if(isset($_POST["descripcion"])){
             $archivo=new Archivo($this->conexion);
             echo $_POST["descripcion"];
            $archivo->setDescripcion($_POST["descripcion"]);
            
             $archivo->setIdProyecto($_POST["idProyecto"]);
            
             $url=$archivo->archivo();
           
             $archivo->setUrl($url);
             $save=$archivo->save();

        }
       
        header('Location: index.php?controller=proyecto&action=proyectoVista&idProyecto='.$_POST["idProyecto"]);
       
    }
    
    public function bajar(){
        if(isset($_GET["idArchivo"])){
            $archivo=new Archivo($this->conexion);
            $archivos=$archivo->getAllByIdArchivo($_GET["idArchivo"]);
          
        }
        foreach ( $archivos as $archivo){
           
           $enlace=$archivo["url"];
          
        }
        
       $archi = basename($enlace);

$ruta = 'assets/arch/'.$archi;

   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$archi);
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: '.filesize($ruta));

   readfile($ruta);


    }

    //FUNCION DELETE
public function delete (){
    if(!isset($_GET["delete"])){
        if(isset($_GET["idArchivo"])){               
         $archivo=new Archivo($this->conexion);
         $archivo->setIdArchivo($_GET["idArchivo"]);
           $archivos=$archivo->delete();         
        }
       
    }
     header('Location: index.php?controller=proyecto&action=proyectoVista&idProyecto='.$_GET["idProyecto"]);
}

    
}

