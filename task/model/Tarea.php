<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tarea
 *
 * @author 2gdaw01
 */
class Tarea {
    //put your code here
    private $table = "tarea";
    private $conexion;
    
    private $idTarea;
    private $nombre;
    private $fechaVencimiento;
    private $realizado;
    private $idProyecto;
    
    
    function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    function getIdTarea() {
        return $this->idTarea;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFechaVencimiento() {
        return $this->fechaVencimiento;
    }

    function setIdTarea($idTarea) {
        $this->idTarea = $idTarea;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFechaVencimiento($fechaVencimiento) {
        $this->fechaVencimiento = $fechaVencimiento;
    }
    function getRealizado() {
        return $this->realizado;
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function setRealizado($realizado) {
        $this->realizado = $realizado;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    
     public function getAllByIdProyecto($idProyecto){

        $consulta = $this->conexion->prepare("SELECT idTarea, nombre, fecha_vencimiento, realizado, idProyecto FROM tarea where idProyecto = ".$idProyecto) ;
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    } 
    

    public function save($id){
        $consulta = $this->conexion->prepare("INSERT INTO tarea (nombre,fecha_vencimiento,idProyecto) VALUES (:nombre, :fechavencimiento,".$id.")");
        $save = $consulta->execute(array(
            "nombre" => $this->nombre,
            "fechavencimiento" => $this->fechaVencimiento
        ));
        
        $this->conexion = null; 
        return $save;
    }   
    
    public function delete($id){
        $consulta = $this->conexion->prepare("DELETE FROM tarea WHERE idTarea =". $id);
        $consulta->execute();
        $this->conexion = null; 

    }
    
    public function realizado($idTarea){
        $consulta = $this->conexion->prepare("UPDATE tarea SET realizado=1 WHERE idTarea =".$idTarea );  
        $consulta->execute();
        //$filas=  $consulta->rowCount();
        $this->conexion = null; 
        
        return $idTarea;
    }

}
