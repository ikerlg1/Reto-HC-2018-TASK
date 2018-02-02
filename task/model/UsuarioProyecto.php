<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioProyecto
 *
 * @author pcwin
 */
class UsuarioProyecto {
    //put your code here
    private $table = "usuario_proyeto";
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

    
    public function save(){        
        $consulta = $this->conexion->prepare('INSERT INTO usuario_proyecto (idUsuario, idProyecto, tipo) VALUES (:idUsuario, :idProyecto, :tipo)');
        $save = $consulta->execute(array(
            ':idUsuario' => $this->idUsuario,
            ':idProyecto' => $this->idProyecto,
            ':tipo' => $this->tipo
        ));
        $this->conexion = null; 
        
        return $save;
    } 

}
