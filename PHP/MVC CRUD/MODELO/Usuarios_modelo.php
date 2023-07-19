<?php

    //INICIO DE UNA CLASE LLAMDA Usuario_modelo
    class Usuario_modelo{

        private $db;
        private $usuarios;

        //HACEMOS EL CONTRUCTOR DE LA CLASE
        function __construct()
        {
            require_once("MODELO/Conexion.php");

            //LOS :: NOS AYUDA A TRAER EL METODO DE LA CLASE
            //ESTAMOS ALMACENANDO LA CONEXION EN LA VARIABLE db
            $this->db=Conectar::conexion();

            $this->usuarios=array();
        }

        //FUNCION PARA OBTENER LOS DATOS DEL USUARIO
        public function get_usuario(){

            require("Paginacion.php");

            $consulta=$this->db->query("SELECT * FROM usuario_datos limit $empezar_desde, $tamano_paginas");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){

                $this->usuarios[]=$filas;
            }

            return $this->usuarios;
        }
    }

?>