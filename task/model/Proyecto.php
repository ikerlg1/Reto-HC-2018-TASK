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

        $consulta = $this->conexion->prepare("SELECT * FROM proyecto WHERE idProyecto =".$idProyecto) ;
        $consulta->execute();
        $resultados = $consulta->fetchObject();
        $this->conexion = null; 
        return $resultados;

    }      

     public function getAllById($idUsuaro){

        $consulta = $this->conexion->prepare("SELECT * FROM proyecto p, usuario_proyecto up WHERE up.idProyecto = p.idProyecto and up.idUsuario = ".$idUsuaro) ;
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

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
