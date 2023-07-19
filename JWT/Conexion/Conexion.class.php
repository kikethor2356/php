<?php

class conexion{

    public $server;
    public $username;
    public $password;
    public $database;
    public $port;
    public $conexion;

function __construct()
{
    $datosConexion = $this->datosConexion();
    foreach($datosConexion as $key => $value){

        $this->server = $value ['server'];
        $this->username = $value ['username'];
        $this->password = $value ['password'];
        $this->database = $value ['database'];
        $this->port = $value ['port'];  
    }

}


public function iniciarConexion (){
    $this->conexion = new mysqli($this->server, $this->username,
    $this->password, $this->database, $this->port);

    if($this->conexion->connect_errno){
        echo "Algo esta mal con la conexion";
        exit;
    }else{
        echo "Se establecio la conexion exitosamente <tr>";
    }
}

private function datosConexion(){
    $direccion = dirname(__FILE__);
    $jsondata = file_get_contents($direccion . "/" . "config");
    return json_decode($jsondata,true);
}


private function convertirUTF8($array){

    array_walk_recursive($array,function(&$item,$key){
        if(!mb_detect_encoding($item,"utf-8", true)){
            $item = utf8_encode($item);
        }
    });
    return $array;
}


}




?>