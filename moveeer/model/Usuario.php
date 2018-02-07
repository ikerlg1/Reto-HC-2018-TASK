<?php
class Usuario {
    private $table = "usuario";
    private $conexion;

    private $id;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $email;
    private $telefono;
    private $contrasena;
    private $foto;
    
    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido1()
    {
        return $this->apellido1;
    }
    
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }
    
    public function getApellido2()
    {
        return $this->apellido2;
    }

    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }
    
    /**
     * Funcion registro()
     * Inserta en la base de datos
     * un suario nuevo
     *  
     */ 
    public function registro(){

        $consulta = $this->conexion->prepare("INSERT INTO ".$this->table." (nombre,apellido1,apellido2,email,telefono,contrasena,foto)
                                        VALUES (:nombre,:apellido1,:apellido2,:email,:telefono,:contrasena,:foto)");
        $registro = $consulta->execute(array(
            "nombre" => $this->nombre,
            "apellido1" => $this->apellido1,
            "apellido2"=>$this->apellido2,
            "email" => $this->email,
            "telefono" => $this->telefono,
            "contrasena"=>$this->contrasena,
            "foto"=> $this->foto

        ));
        
        $lastId=$this->conexion->lastInsertId();
        $this->conexion = null;

        return $lastId;
    }

    /**
     * Funcion infoTotal()
     * Obtenemos toda la informacion de todos los usuarios
     *  
     */     
    public function infoTotal(){

        $consulta = $this->conexion->prepare("SELECT idUsuario,nombre,apellido1,apellido2,email,telefono,contrasena,foto FROM " . $this->table);
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    }

    /**
     * Funcion borrarPorEmail()
     * Eliminamos a un usuario de la base de datos
     *  
     */  
    public function borrarPorEmail ($email){
         echo $email;
        $consulta = $this->conexion->prepare("DELETE FROM ".$this->table." WHERE email= :email " );
        $consulta->execute(array('email'=>$email));
        $this->conexion = null; 
        echo "Usuario eliminado";
    }
    
    /**
     * Funcion buscarPorEmail()
     * Obtenemos toda la informacion de un usuario
     *  
     */  
    public function buscarPorEmail($email){ 
        $consulta = $this->conexion->prepare("select idUsuario,nombre,apellido1,apellido2,email,telefono,contrasena FROM ".$this->table." WHERE email= :email " );
        $consulta->execute(array('email'=>$email));
        $usuario= $consulta->fetchObject();
        $this->conexion=null;
        return $usuario;
    }

    /**
     * Funcion infoPorEmail()
     * Obtenemos toda la informacion de un usuario
     *  
     */      
    public function infoPorEmail($email){ 
        $consulta = $this->conexion->prepare("select idUsuario,nombre,apellido1,apellido2,email,telefono,contrasena,foto FROM ".$this->table." WHERE email= :email " );
        $consulta->execute(array('email'=>$email));
        $usuario= $consulta->fetchAll();
        $this->conexion=null;
        return $usuario;
    }
    
    /**
     * Funcion infoPorID()
     * Obtenemos toda la informacion de un usuario
     *  
     */  
    public function infoPorID($id){
 
        $consulta = $this->conexion->prepare("select idUsuario,nombre,apellido1,apellido2,email,telefono,contrasena,foto FROM ".$this->table." WHERE idUsuario = ".$id );
        $consulta->execute();
        $usuario= $consulta->fetchAll();
        $this->conexion=null;
        return $usuario;
    }
    
    /**
     * Funcion updateUsuario()
     * Para actualizar la informacion de
     * un usuario 
     */  
    public function updateUsuario(){
        $consulta = $this->conexion->prepare("UPDATE ".$this->table." SET nombre=:nombre,apellido1=:apellido1,apellido2=:apellido2,email=:email,telefono=:telefono,contrasena=:contrasena,foto=:foto WHERE idUsuario=:id " );
        $update = $consulta->execute(array(
            "nombre" => $this->nombre,
            "apellido1" => $this->apellido1,
            "apellido2" => $this->apellido2,
            "email" => $this->email,
            "telefono" => $this->telefono,
            "contrasena"=>$this->contrasena,
            "id"=>$this->id,
            "foto"=>  $this->foto
        ));

        $this->conexion = null;
     
        return $update;

    }
    
    /**
     * Funcion foto()
     * Para subir la foto de perfil del usuario
     */      
    public function foto(){
        $conexion= $this->conexion;
        if($_POST){
            // Creamos la cadena aletoria
                $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
                $cad = "";
            for($i=0;$i<12;$i++) {
                $cad .= substr($str,rand(0,62),1);
            }
        // Fin de la creacion de la cadena aletoria
            $tamano = $_FILES [ 'file' ][ 'size' ]; // Leemos el tamaño del fichero
            $tamaño_max="50000000000"; // Tamaño maximo permitido
            if( $tamano < $tamaño_max){ // Comprobamos el tamaño 
                $destino = 'assets/img/' ; // Carpeta donde se guardata
                $sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/
                $tipo=$sep[1]; // Optenemos el tipo de imagen que es
                $nnombre= gettext($cad.'.'.$tipo);

        //para mostrar una imagen significativa para cuando el producto no la teng//
                if($tamano===0){ 
                        $nnombre="avatar.jpg";
                };
        // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen
                move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$nnombre);  // Subimos el archivo
                return $nnombre ;     
            }
            else{ 
                 echo "tamaño erroneo o imagen no seleccionada";        
            }// Si no es el tipo permitido lo decimos
        }

    } 
}