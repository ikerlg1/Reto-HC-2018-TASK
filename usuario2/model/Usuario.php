<?php
/**
 * Created by PhpStorm.
 * User: 2gdaw07
 * Date: 15/01/2018
 * Time: 9:48
 */
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

    /**
     * Usuario constructor.
     * @param $conexion
     */
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @return mixed
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param mixed $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * @param mixed $apellido1
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }

    /**
     * @return mixed
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * @param mixed $apellido2
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    public function registro(){

        $consulta = $this->conexion->prepare("INSERT INTO usuario (nombre,apellido1,apellido2,email,telefono,contrasena)
                                        VALUES (:nombre,:apellido1,:apellido2,:email,:telefono,:contrasena)");
        $registro = $consulta->execute(array(
            "nombre" => $this->nombre,
            "apellido1" => $this->apellido1,
            "apellido2"=>$this->apellido2,
            "email" => $this->email,
            "telefono" => $this->telefono,
            "contrasena"=>$this->contrasena

        ));
        $this->conexion = null;

        return $registro;
    }

    public function infoTotal(){

        $consulta = $this->conexion->prepare("SELECT id,nombre,apellido1,apellido2,email,telefono,contrasena FROM " . $this->table);
        $consulta->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
        $this->conexion = null; //cierre de conexión
        return $resultados;

    }
    public function borrarPorEmail ($email){
         echo $email;
        $consulta = $this->conexion->prepare("DELETE FROM `usuario` WHERE email= :email " );
        $consulta->execute(array('email'=>$email));
        $this->conexion = null; //cierre de conexión
        echo "Usuario eliminado";
    }
    public function infoPorEmail($email){ 
        $consulta = $this->conexion->prepare("select id,nombre,apellido1,apellido2,email,telefono,contrasena FROM `usuario` WHERE email= :email " );
        $consulta->execute(array('email'=>$email));
        $usuario= $consulta->fetchAll();
       
        $this->conexion=null;
        return $usuario;
    }
    public function updateUsuario(){
        $consulta = $this->conexion->prepare("UPDATE usuario SET nombre=:nombre,apellido1=:apellido1,apellido2=:apellido2,email=:email,telefono=:telefono,contrasena=:contrasena WHERE id=:id " );
        $update = $consulta->execute(array(
            "nombre" => $this->nombre,
            "apellido1" => $this->apellido1,
            "apellido2" => $this->apellido2,
            "email" => $this->email,
            "telefono" => $this->telefono,
            "contrasena"=>$this->contrasena,
            "id"=>$this->id
        ));

        $this->conexion = null;
     
        return $update;

    }
}