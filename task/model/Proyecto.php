<?php
class Proyecto {
    private $table = "proyecto";
    private $conexion;
    
    private $idProyecto;
    private $nombre;
    private $descripcion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    function getIdProyecto() {
        return $this->idProyecto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    /**
     * Funcion getAll()
     * Para recoger todos los datos del proyecto
     * y poder mostrarlo en la vista  
     * 
     */
    public function getAll($idProyecto){

        $consulta = $this->conexion->prepare("SELECT idProyecto, nombre, descripcion FROM ".$this->table." WHERE idProyecto =".$idProyecto) ;
        $consulta->execute();
        $resultados = $consulta->fetchObject();
        $this->conexion = null; 
        return $resultados;

    }   
    
    /**
     * Funcion getAllById()
     * Para recoger todos los datos de los proyectos
     * que sea el usuario creador o participante
     * 
     */   
    public function getAllById($idUsuaro){

        $consulta = $this->conexion->prepare("SELECT * FROM ".$this->table." p, usuario_proyecto up WHERE up.idProyecto = p.idProyecto and up.idUsuario = ".$idUsuaro." AND tipo NOT IN ('invitado')" ) ;
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    } 
    
    /**
     * Funcion getAllInvitaciones()
     * Para recoger toda la informacion de los proyectos
     * que el usuario este invitado  
     * 
     */  
    public function getAllInvitaciones($idUsuaro){

        $consulta = $this->conexion->prepare("SELECT * FROM ".$this->table." p, usuario_proyecto up WHERE up.idProyecto = p.idProyecto and up.idUsuario = ".$idUsuaro." AND tipo IN ('invitado')" ) ;
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    }  
    
    /**
     * Funcion rowCountInvitaciones()
     * Para saber el numero total de invitaciones 
     * que el usuario tiene
     * 
     */  
    public function rowCountInvitaciones($idUsuaro){
        $consulta = $this->conexion->prepare("SELECT COUNT(*) FROM usuario_proyecto WHERE idUsuario=".$idUsuaro." AND tipo = ('invitado')"  );  
        $consulta->execute();
        $num_rows = $consulta->fetchColumn();
        
        $this->conexion = null; 
        
        return $num_rows;
    }
    
    /**
     * Funcion save()
     * Para registrar un proyecto nuevo 
     * en la base de datos
     * 
     */    
    public function save(){
        $consulta = $this->conexion->prepare("INSERT INTO ".$this->table." (nombre,descripcion) VALUES (:nombre, :descripcion)");
        $save = $consulta->execute(array(
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion
     
        ));
        
       $lastId=$this->conexion->lastInsertId();
       $this->conexion = null; 
       
       return $lastId;
    }
    
    /**
     * Funcion delete()
     * Para eliminar un proyecto 
     * de base de datos
     * 
     */  
    public function delete($id){
        $consulta = $this->conexion->prepare("DELETE FROM ".$this->table." WHERE idProyecto = " . $id);
        $consulta->execute();
        $this->conexion = null; 

    }

}
