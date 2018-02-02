<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Principal
 *
 * @author pcwin
 */
class Principal {
    //put your code here
    private $table = "principal";
    private $conexion;
    
     function __construct($conexion) {
        $this->conexion = $conexion;
    }
}
