<?php
class Mensaje {
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
    
    
    /**
     * Funcion save()
     * Para insertar los mensajes en la tabla correspondiente 
     * 
     */
    public function save(){
        $consulta = $this->conexion->prepare("INSERT INTO ".$this->table." (descripcion, fecha, idProyecto) VALUES (:descripcion, :fecha, :idProyecto)");
        $save = $consulta->execute(array(
            "descripcion" => $this->descripcion,
            "fecha" => $this->fecha,
            "idProyecto" => $this->idProyecto
        ));
       $this->conexion = null; 
       
       return $save;
    }   
    
    /**
     * Funcion getAllByIdProyecto()
     * Para recoger los mensajes de la tabla y mostrarlos
     * en la vista segun el proyecto que sea
     */
     public function getAllByIdProyecto($idProyecto){
        $consulta = $this->conexion->prepare("SELECT idMensaje, descripcion, fecha, idProyecto FROM ".$this->table." WHERE idProyecto =".$idProyecto." order BY idMensaje DESC");
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;
       
    }   
    
    
}
