<?php
class UsuarioProyecto {
    private $table = "usuario_proyecto";
    private $conexion;
    
    private $idUsuario;
    private $idProyecto;
    private $tipo;
    
     function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }
    
    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    /**
     * Funcion save()
     * Para registrar la relacion entre 
     * usuario y proyecto en la base de datos
     * 
     */
    public function save(){        
        $consulta = $this->conexion->prepare('INSERT INTO '.$this->table.' (idUsuario, idProyecto, tipo) VALUES (:idUsuario, :idProyecto, :tipo)');
        $save = $consulta->execute(array(
            ':idUsuario' => $this->idUsuario,
            ':idProyecto' => $this->idProyecto,
            ':tipo' => $this->tipo
        ));
        $this->conexion = null; 
        
        return $save;
    } 
    
    /**
     * Funcion aceptarInvitacion()
     * Modificamos en usuario_proyecto 
     * el tipo, a participante  
     * en la base de datos
     * 
     */    
    public function aceptarInvitacion(){        
        $consulta = $this->conexion->prepare('UPDATE '.$this->table.' SET tipo= :tipo WHERE idUsuario = :idUsuario AND idProyecto = :idProyecto');
        $save = $consulta->execute(array(
            ':idUsuario' => $this->idUsuario,
            ':idProyecto' => $this->idProyecto,
            ':tipo' => $this->tipo
        ));
        $this->conexion = null; 
        
        return $save;
    }
    
     /**
     * Funcion rechazarInvitacion()
     * Eliminamos en usuario_proyecto 
     * la insercion hecha, con tipo: invitado  
     * en la base de datos
     * 
     */  
    public function rechazarInvitacion(){        
        $consulta = $this->conexion->prepare('DELETE FROM '.$this->table.' WHERE idUsuario = :idUsuario AND idProyecto = :idProyecto');
        $save = $consulta->execute(array(
            ':idUsuario' => $this->idUsuario,
            ':idProyecto' => $this->idProyecto,
        ));
        $this->conexion = null; 
        
        return $save;
    }  

}
