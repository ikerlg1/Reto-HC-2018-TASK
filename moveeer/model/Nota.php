<?php
class Nota {
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
    
    /**
     * Funcion save()
     * Para insertar las notas en la tabla correspondiente 
     * 
     */
    public function save(){
        $consulta = $this->conexion->prepare("INSERT INTO ".$this->table." (idTarea, descripcion) VALUES (:idTarea, :descripcion)"); 
        $save = $consulta->execute(array(
            "idTarea" => $this->idTarea,
            "descripcion" => $this->descripcion
        ));
        
        $this->conexion = null; 
        
        return $save;
    }
    
    /**
    * Funcion getAllByIdTarea()
    * Para recoger todas las notas correspondiente a la tarea 
    * y mostrarlo en la vista
    */
    public function getAllByIdTarea($idTarea){
        $consulta = $this->conexion->prepare("SELECT idNota, idTarea, descripcion FROM ".$this->table." WHERE idTarea =".$idTarea);
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;
       
    } 

    /**
    * Funcion delete()
    * Para eliminar las notas 
    */
    public function delete(){
        
        $consulta = $this->conexion->prepare("DELETE FROM ".$this->table." WHERE idNota = :idNota"); 
        $consulta->execute(array(
            "idNota" => $this->idNota,
        ));
        $fila=$consulta->rowCount();
        $this->conexion = null; 
        
        return $fila;
        
    }
    
}
