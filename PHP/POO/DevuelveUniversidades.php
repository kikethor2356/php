<?php

require ("Conexion.php");

class DevuelveUniversidades extends conexion{

    public function DevuelveUniversidades(){

        parent::Conexion();

    }

    public function get_universidades(){

        $resultado=$this->conexion_db->query('SELECT * FROM universidades');

        $universidad=$resultado->fetch_all(MYSQLI_ASSOC);

        return $universidad;
    }
}


?>