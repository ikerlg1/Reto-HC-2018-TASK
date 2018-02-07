<?php
class UsuariosController
{
    private $conectar;
    private $conexion;

    public function __construct()
    {
        require_once __DIR__ . "/../core/Conectar.php";
        require_once __DIR__ . "/../model/Usuario.php";

        $this->conectar = new Conectar();
        $this->conexion = $this->conectar->conexion();

    }

    /**
     * Ejecuta la acción correspondiente.
     *
     */
    public function run($accion)
    {
        switch ($accion) {
            case "index" :
                $this->index();
                break;
            case "alta" :
                $this->crear();
                break;
            case "baja" :
                $this->baja();
                break;
            case "detalle" :
                $this->detalle();
                break;
            case "update" :
                $this->update();
                break;
            case "buscarUsuario" :
                $this->buscarUsuario();
                break;
            case "login" :  
                $this->login();
                break;
            case "cerrar" :       
                $this->cerrarSesion();
                break;
              case "foto" :       
                $this->foto();
                break;
            default:
                $this->index();
                break;
        }
    }

    /**
     * Carga la página principal 
     *
     */
    public function index()
    {
        $this->view("index");
    }

    /**
     * Cerrar la seseion
     *
     */    
    public function cerrarSesion(){
         session_destroy();
         header('Location: index.php');
    }

    /**
     * Parfa eliminar a un usuario de la base de datos
     *
     */ 
    public function baja()
    {
        $email = $_POST["email"];
        //Creamos el objeto usuario
        $usuario = new Usuario($this->conexion);
        $usuario->borrarPorEmail($email);
        session_destroy();
        header('Location: index.php');
       
    }

    /**
     * Da detalles a partir del email del usuario
     */
    public function detalle()
    {
        $email = $_GET["email"];
        $usuario = new Usuario($this->conexion);
        $usu = $usuario->infoPorEmail($email);
        $variableretorno="";
        if(empty($usu)){
            $variableretorno=0;
            
        }else{
            
            $variableretorno=1;
        }
        
        echo $variableretorno;
    }
    
   /**
    * Funcion para localizar a u nusuario en la base de datos
    */    
    public function buscarUsuario()
    {
        $email = $_GET["email"];
        $usuario = new Usuario($this->conexion);
        $usu = $usuario->buscarPorEmail($email);
        $variableretorno="";
        if(empty($usu)){
            $variableretorno=0;            
        }else{
            $variableretorno=$usu;
            echo json_encode($variableretorno,JSON_FORCE_OBJECT);
        }
    }

 
    /**
     * Crea un nuevo usuario 
     * y vuelve a cargar el index.php.
     *
     */
    public function crear()
    {
        if (isset($_POST["nombre"])) {
           
            //Creamos un usuario
            $usuario = new Usuario($this->conexion);
            
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido1($_POST["apellido1"]);
            $usuario->setApellido2($_POST["apellido2"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setTelefono($_POST["telefono"]);
            $usuario->setContrasena($_POST["contrasena"]);
            $nombreFoto=$usuario->foto();
            $usuario->setFoto($nombreFoto);   
             
            $lastId = $usuario->registro();
            $usuario = new Usuario($this->conexion);
            $datos=$usuario->infoPorID($lastId);
            $_SESSION["usuario"]=$datos;
        }
        
            header('Location: index.php?controller=perfil&action=perfilUsuario&idUsuario='.$lastId);
                   
    }
    
    /**
     * Actualiza los datos de un usuario 
     * y vuelve a cargar el index.php.
     *
     */
    public function update()
    {
       
        $usuario = new Usuario($this->conexion);
        $usuario->setNombre($_POST["nombre"]);
        $usuario->setApellido1($_POST["apellido1"]);
        $usuario->setApellido2($_POST["apellido2"]);
        $usuario->setEmail($_POST["email"]);
        $usuario->setTelefono($_POST["telefono"]);
        $usuario->setContrasena($_POST["contrasena"]);
        $usuario->setId($_POST["id"]);
         $nombreFoto=$usuario->foto();
        $usuario->setFoto($nombreFoto);
        if($usuario->updateUsuario()){
            $usuario = new Usuario($this->conexion);
            $reNew=$usuario->infoPorEmail($_POST["email"]);     
            $_SESSION["usuario"]=$reNew;
            $lastId="";
                    foreach ($_SESSION["usuario"] as $usu){$lastId = $usu["idUsuario"];}
        }
          header('Location: index.php?controller=perfil&action=perfilUsuario&idUsuario='.$lastId);
    }
    
    /**
     * Login de inicio sesion
     */
    public function login() {  
       
        if (isset($_POST["contrasena"])) {
            $email=$_POST["email"];
            $pass=$_POST["contrasena"];
            $usuario = new Usuario($this->conexion);
            $usuar = $usuario->infoPorEmail($email);
         
           foreach ($usuar as $usu){
             
                if(strcmp($pass,$usu["contrasena"])==0){
                    //guardamos usuario en sesion y creamos vista
                    $_SESSION["usuario"]=$usuar;
                    $idUsuario="";
                    foreach ($_SESSION["usuario"] as $usu){$idUsuario= $usu["idUsuario"];}
                    
                    header('Location: index.php?controller=perfil&action=perfilUsuario&idUsuario='.$idUsuario);
                  
                }
                else {
                    header('Location:index.php');
                }   
            }
        }
    }
   
    /**
     * Crea la vista que le pasemos con los datos indicados.
     *
     */
    public function view($vista)
    {
      
        require_once __DIR__ . "/../view/" . $vista . "View.php";
    }
}
?>
