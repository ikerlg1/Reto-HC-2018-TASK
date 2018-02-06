<?php
class ProyectoController {
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
            case "invitacion" :
                $this->invitacion();
                break;
            case "aceptarInvitacion" :
                $this->aceptarInvitacion();
                break;
            case "deleteInvitacion" :
                $this->rechazarInvitacion();
                break;
            default:
                $this->proyectoVista();
                break;
        }
    }
    
   /**
    * Carga la vita de proyectos
    */ 
    public function proyectoVista(){
        include './model/Tarea.php';
        include './model/Mensaje.php';
        include './model/Archivo.php';
    
        $proyecto=new Proyecto($this->conexion); 
        $datosProyecto=$proyecto->getAll($_GET['idProyecto']);
        
        $tarea=new Tarea($this->conexion);
        $listaTareas=$tarea->getAllByIdProyecto($_GET['idProyecto']);
        
        $tarea2=new Tarea($this->conexion);
        $numTareas=$tarea2->rowCountTareas($_GET['idProyecto']);
        
        $tarea3=new Tarea($this->conexion);
        $numTareasRealizadas=$tarea3->rowCountTareasRealizadas($_GET['idProyecto']);
        
        $mensaje=new Mensaje($this->conexion);
        $listaMensajes=$mensaje->getAllByIdProyecto($_GET['idProyecto']);
        
        $Archivo=new Archivo($this->conexion);
        $listaArchivo=$Archivo->getAllById($_GET['idProyecto']);
        
        $this->view("proyecto",array(
                "tareas"=>$listaTareas,
                "mensajes" =>$listaMensajes,
                "datosProyecto"=>$datosProyecto,
                "numeroTareas"=>$numTareas,
                "numeroTareasRealizadas"=>$numTareasRealizadas,
                "archivos"=>$listaArchivo
            ));
    }
    
   /**
    * Crea un nuevo proyecto a partir de los parámetros 
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
    
    /**
    * Modifica el estado del tipo en usuario_proyecto
    * y vuelve a cargar el index.php.
    *
    */ 
    public function aceptarInvitacion(){
        if(isset($_GET["idUsuario"])){

            include './model/UsuarioProyecto.php';

            $usuarioProyecto = new UsuarioProyecto ($this->conexion);
            $usuarioProyecto->setIdProyecto($_GET ['idProyecto']);
            $usuarioProyecto->setIdUsuario($_GET["idUsuario"]);
            $usuarioProyecto->setTipo("participante");
            
            $save = $usuarioProyecto->aceptarInvitacion();
            
        }
        header('Location: index.php?controller=perfil&action=perfilUsuario&idUsuario='.$_GET["idUsuario"]);
    }
    
    /**
    * Elimina de usuario_proyecto el insert con el tipo invitacion
    * y vuelve a cargar el index.php.
    *
    */ 
    public function rechazarInvitacion(){
        if(isset($_GET["idUsuario"])){

            include './model/UsuarioProyecto.php';

            $usuarioProyecto = new UsuarioProyecto ($this->conexion);
            $usuarioProyecto->setIdProyecto($_GET ['idProyecto']);
            $usuarioProyecto->setIdUsuario($_GET["idUsuario"]);

            $save = $usuarioProyecto->rechazarInvitacion();
            
        }
        header('Location: index.php?controller=perfil&action=perfilUsuario&idUsuario='.$_GET["idUsuario"]);
    }

    /**
    * Inserta en usuario_proyecto una columna del tipo invitacion
    *
    */     
    public function invitacion(){
        if(isset($_POST["idProyecto"])){

            include './model/UsuarioProyecto.php';
            
            echo 'idPRo: '.$_POST["idProyecto"];
            echo 'idUSU: '.$_POST["idUsuario"];

            $usuarioProyecto = new UsuarioProyecto ($this->conexion);
            $usuarioProyecto->setIdProyecto($_POST["idProyecto"]);
            $usuarioProyecto->setIdUsuario($_POST["idUsuario"]);
            $usuarioProyecto->setTipo("invitado");
            
            $save = $usuarioProyecto->save();
            
        }
 
    }

   /**
    * Eliminamos de la base de datos el proyecto
    *
    */ 
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
