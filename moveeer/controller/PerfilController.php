<?php
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
    
   /**
    * Carga la vita de Perfil
    */ 
    public function perfilUsuario(){
        
        include './model/Proyecto.php';

        $proyecto=new Proyecto($this->conexion);
        $proyecto2=new Proyecto($this->conexion);
        $proyecto3=new Proyecto($this->conexion);

        $listaProyectos=$proyecto->getAllById($_GET['idUsuario']);

        $invitaciones=$proyecto2->getAllInvitaciones($_GET['idUsuario']);
        $numeroDeInvitaciones=$proyecto3->rowCountInvitaciones($_GET['idUsuario']);
        
        //Cargamos la vista index y le pasamos valores
        $this->view("perfil",array(
                "proyectos"=>$listaProyectos,
                "numeroDeInvitaciones"=>$numeroDeInvitaciones,
                "invitaciones"=>$invitaciones
            ));
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
