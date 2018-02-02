<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notas
 *
 * @author 2gdaw01
 */
class Nota {
    //put your code here
    private $table = "nota";
    private $conexion;
    
    private $idNota;
    private $idTarea;
    private $descripcion;
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    function getIdNota() {
        return $this->idNota;
    }

    function getIdTarea() {
        return $this->idTarea;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdNota($idNota) {
        $this->idNota = $idNota;
    }

    function setIdTarea($idTarea) {
        $this->idTarea = $idTarea;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    
    public function save(){
        $consulta = $this->conexion->prepare("INSERT INTO nota (idTarea, descripcion) VALUES (:idTarea, :descripcion)"); 
        $save = $consulta->execute(array(
            "idTarea" => $this->idTarea,
            "descripcion" => $this->descripcion
        ));
        
        $this->conexion = null; 
        
        return $save;
    }
    
    public function getAllByIdTarea($idTarea){
        $consulta = $this->conexion->prepare("SELECT idNota, idTarea, descripcion FROM nota WHERE idTarea =".$idTarea);
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;
       
    }   
    
    public function delete(){
        
        $consulta = $this->conexion->prepare("DELETE FROM nota WHERE idNota = :idNota"); 
        $consulta->execute(array(
            "idNota" => $this->idNota,
        ));
        $fila=$consulta->rowCount();
        $this->conexion = null; 
        
        return $fila;
        
    }
    
}
