<?php
class Tarea {
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

    /**
     * Funcion getAllByIdProyecto()
     * Para recoger la informacion 
     * de todas las Tareas del proyecto
     * y poder mostrarlo en la vista  
     * 
     */
    public function getAllByIdProyecto($idProyecto){

        $consulta = $this->conexion->prepare("SELECT idTarea, nombre, fecha_vencimiento, realizado, idProyecto FROM ".$this->table." where idProyecto = ".$idProyecto) ;
        $consulta->execute();
        $resultados = $consulta->fetchAll();
        $this->conexion = null; 
        return $resultados;

    }

    /**
     * Funcion save()
     * Para registrar una Tarea 
     * en la base de datos 
     * 
     */
    public function save($id){
        $consulta = $this->conexion->prepare("INSERT INTO ".$this->table." (nombre,fecha_vencimiento,idProyecto) VALUES (:nombre, :fechavencimiento,".$id.")");
        $save = $consulta->execute(array(
            "nombre" => $this->nombre,
            "fechavencimiento" => $this->fechaVencimiento
        ));
        
        $this->conexion = null; 
        return $save;
    }   
    
    /**
     * Funcion delete()
     * Para eliminar una Tarea 
     * de la base de datos 
     * 
     */
    public function delete($id){
        $consulta = $this->conexion->prepare("DELETE FROM ".$this->table." WHERE idTarea =". $id);
        $consulta->execute();
        $this->conexion = null; 

    }
    
    /**
     * Funcion realizado()
     * Para modificar el estado 
     * de la Tarea a realizado
     * 
     */
    public function realizado($idTarea){
        $consulta = $this->conexion->prepare("UPDATE ".$this->table." SET realizado=1 WHERE idTarea =".$idTarea );  
        $consulta->execute();
        //$filas=  $consulta->rowCount();
        $this->conexion = null; 
        
        return $idTarea;
    }

    /**
     * Funcion rowCountTareas()
     * Para contar el numero total de tareas
     * que tiene el proyecto
     * 
     */    
    public function rowCountTareas($idProyecto){
        $consulta = $this->conexion->prepare("SELECT COUNT(*) FROM ".$this->table." WHERE idProyecto=".$idProyecto );  
        $consulta->execute();
        $num_rows = $consulta->fetchColumn();
        
        $this->conexion = null; 
        
        return $num_rows;
    }

    /**
     * Funcion rowCountTareasRealizadas()
     * Para contar el numero total de tareas
     * realizadas que tiene el proyecto
     * 
     */  
    public function rowCountTareasRealizadas($idProyecto){
        $consulta = $this->conexion->prepare("SELECT COUNT(*) FROM ".$this->table." WHERE idProyecto=".$idProyecto." AND realizado = 1" );  
        $consulta->execute();
        $num_rows = $consulta->fetchColumn();
        
        $this->conexion = null; 
        
        return $num_rows;
    }

}
