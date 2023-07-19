<?php

require ("Config.php");

class conexion{

    protected $conexion_db;

//Contructor
    public function Conexion(){

        $this->conexion_db=new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);


        if($this->conexion_db->connect_errno){

            echo"Fallo al conectar a Mysql: " . $this->conexion_db->connect_error;

            return;
        }
        $this->conexion_db->set_charset(DB_CHARSET);
    }
}

?>