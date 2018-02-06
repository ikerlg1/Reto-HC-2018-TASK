<?php
class Archivo{
    private $table = "archivo";
    private $conexion;
    
    private $descripcion;
    private $idArchivo;
    private $idProyecto;
    private $url;


    function __construct($conexion) {
            $this->conexion = $conexion;
        }
    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdArchivo() {
        return $this->idArchivo;
    }

    function getIdProyecto() {
        return $this->idProyecto;
    }

    function getUrl() {
        return $this->url;
    }

    function getConexion() {
        return $this->conexion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdArchivo($idArchivo) {
        $this->idArchivo = $idArchivo;
    }

    function setIdProyecto($idProyecto) {
        $this->idProyecto = $idProyecto;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setConexion($conexion) {
        $this->conexion = $conexion;
    }
    
    /**
     * Funcion save()
     * Inserta en la base de datos
     * la url y descripcion del archivo subido al servidor
     *  
     */    
    public function save(){
            $consulta = $this->conexion->prepare("INSERT INTO ".$this->table." (idArchivo,url,descripcion,idProyecto) VALUES (:idArchivo,:url,:descripcion,:idProyecto)"); 
            $save = $consulta->execute(array(
                "idArchivo" => $this->idArchivo,
                "url" => $this->url,
                "descripcion"=>  $this->descripcion,
                 "idProyecto"=>  $this->idProyecto,
            ));

            $this->conexion = null; 

            return $save;
     }
     
    /**
     * Funcion getAllById()
     * Recogemos toda la informacion de los archivos
     * para mostrarlo despues en la vista
     *  
     */   
    public function getAllById($id){

            $consulta = $this->conexion->prepare("SELECT idArchivo,url,descripcion,idProyecto FROM ".$this->table." WHERE idProyecto =".$id);
            $consulta->execute();
            $resultados = $consulta->fetchAll();
            $this->conexion = null; 

            return $resultados;

    }
    
    /**
     * Funcion delete()
     * Elimina de la base de datos
     * el archivo 
     */      
    public function delete(){

            $consulta = $this->conexion->prepare("DELETE FROM ".$this->table." WHERE idArcivo = :idArchivo"); 
            $consulta->execute(array(
                "idArchivo" => $this->idArchivo,
            ));
            $fila=$consulta->rowCount();
            $this->conexion = null; 

            return $fila;

    }

    /**
     * Funcion archivo()
     * Para subir el archivo al servidor
     */     
    public function archivo(){
    $conexion= $this->conexion;
        if($_POST){
            // Creamos la cadena aletoria
                $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
                $cad = "";
            for($i=0;$i<12;$i++) {
                $cad .= substr($str,rand(0,62),1);
            }
        // Fin de la creacion de la cadena aletoria
            $tamano = $_FILES [ 'file' ][ 'size' ]; // Leemos el tamaño del fichero
            $tamaño_max="50000000000"; // Tamaño maximo permitido
            if( $tamano < $tamaño_max){ // Comprobamos el tamaño 
                $destino = 'assets/arch/' ; // Carpeta donde se guardata
                $sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/
                $tipo=$sep[1]; // Optenemos el tipo
                $nnombre= gettext($cad.'.'.$tipo);
                            //mostrar mensale o algo si no se sellcciona archivo
                if($tamano===0){  
                };
                    // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen
                move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$nnombre);  // Subimos el archivo
                return $nnombre ;
            }
            else{
                echo "tamaño erroneo o imagen no seleccionada";      
            }
        }
    } 
    
    
}