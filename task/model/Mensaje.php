<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mensaje
 *
 * @author 2gdaw01
 */
class Mensaje {
    //put your code here
    private $table = "mensaje";
    private $conexion;
    
     function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    private $idMensaje;
    private $descripcion;
    private $fecha;
    private $idProyecto;
    
    function getIdMensaje() {
        return $this->idMensaje;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function setIdMensaje($idMensaje) {
        $this->idMensaje = $idMensaje;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

     public function save(){
        $consulta = $this->conexion->prepare("INSERT INTO mensaje (descripcion, fecha, idProyecto) VALUES (:descripcion, :fecha, :idProyecto)");
        $save = $consulta->execute(array(
            "descripcion" => $this->descripcion,
            "fecha" => $this->fecha,
            "idProyecto" => $this->idProyecto
        ));
       $this->conexion = null; 
       
       return $save;
    }   
    
     public function getAllByIdProyecto($idProyecto){
        $consulta = $this->conexion->prepare("SELECT idMensaje, descripcion, fecha, idProyecto FROM mensaje WHERE idProyecto =".$idProyecto." order BY idMensaje DESC");
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;
       
    }   
    
    
}
