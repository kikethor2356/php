<?php


class conexion{

private $server;
private $user;
private $password;
private $database;
private $port;
private $conexion;

function __construct()
{
    $listadatos = $this->datosConexion();
    foreach ($listadatos as $key => $value){

        
        $this->server = $value ['server'];
        $this->user = $value ['user'];
        $this->password = $value ['password'];
        $this->database = $value ['database'];
        $this->port = $value ['port'];  
    }

    $this->conexion = new mysqli($this->server, $this->user,
    $this->password, $this->database,$this->port);

    if($this->conexion->connect_errno){
        echo "Algo va mal con la conexion";
        die();

    }else {
      //  echo "Se establecio correctamente la conexion";
    }
   

    
}

//En esta funcion obtenemos los datos del archivo config que esta
//en formato json y lo pasamos a las variables de arriba
private function datosConexion(){
    $direccion = dirname(__FILE__);
    $jsondata = file_get_contents($direccion . "/" . "config");
    return json_decode($jsondata,true);
}



//Esta funcion es para decodificar los simbolos como la ñ
//Usando UTF-8
private function convertirUTF8($array){

    array_walk_recursive($array,function(&$item,$key){
        if(!mb_detect_encoding($item,"utf-8", true)){
            $item = utf8_encode($item);
        }
    });
    return $array;
}

//En esta funcion obtenemos la informacion de la base de datos
// y lo transformamos a UTF-8 con la funcion convertirUTF8
public function ObtenerDatos($sqlstr){
    $results = $this->conexion->query($sqlstr);
    $resultarray = array();
    foreach($results as $key){
        $resultarray[] = $key;
        
    }
    return $this->convertirUTF8($resultarray);
}

//Esta funcion sirve para insertar
public function Guardar($sqlstr){
    $results=$this->conexion->query($sqlstr);
    $filas = $this->conexion->affected_rows;
    return $filas;
}

//Esta funcion nos ayuda insertar id
public function GuardarID($sqlstr){
    $results=$this->conexion->query($sqlstr);
    $filas = $this->conexion->affected_rows;
    if($filas >= 1){
        return $this->conexion->insert_id;
        
    }else{
        return 0;
    }

}

//Funcionn para encryptar contraseña
protected function encriptar($string){
    return md5($string);
}




}//Fin class

?>