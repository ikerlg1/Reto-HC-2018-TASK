<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proyecto
 *
 * @author pcwin
 */
class Proyecto {
    //put your code here
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
    
    public function getAll($idProyecto){

        $consulta = $this->conexion->prepare("SELECT idProyecto, nombre, descripcion FROM proyecto WHERE idProyecto =".$idProyecto) ;
        $consulta->execute();
        $resultados = $consulta->fetchObject();
        $this->conexion = null; 
        return $resultados;

    }      

    public function getAllById($idUsuaro){

        $consulta = $this->conexion->prepare("SELECT * FROM proyecto p, usuario_proyecto up WHERE up.idProyecto = p.idProyecto and up.idUsuario = ".$idUsuaro." AND tipo NOT IN ('invitado')" ) ;
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    }  
    
    public function getAllInvitaciones($idUsuaro){

        $consulta = $this->conexion->prepare("SELECT * FROM proyecto p, usuario_proyecto up WHERE up.idProyecto = p.idProyecto and up.idUsuario = ".$idUsuaro." AND tipo IN ('invitado')" ) ;
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    }  
    
    public function rowCountInvitaciones($idUsuaro){
        $consulta = $this->conexion->prepare("SELECT COUNT(*) FROM usuario_proyecto WHERE idUsuario=".$idUsuaro." AND tipo = ('invitado')"  );  
        $consulta->execute();
        $num_rows = $consulta->fetchColumn();
        
        $this->conexion = null; 
        
        return $num_rows;
    }
    
    public function save(){
        $consulta = $this->conexion->prepare("INSERT INTO proyecto (nombre,descripcion) VALUES (:nombre, :descripcion)");
        $save = $consulta->execute(array(
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion
     
        ));
        
       $lastId=$this->conexion->lastInsertId();
       $this->conexion = null; 
       
       return $lastId;
    }
    
    public function delete($id){
        $consulta = $this->conexion->prepare("DELETE FROM proyecto WHERE idProyecto = " . $id);
        $consulta->execute();
        $this->conexion = null; 

    }

    
}
