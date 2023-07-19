<?php

//HACEMOS LA CLASS Concetar

class Conectar{


        //HACEMOS UNA FUNCION O UN METODO LLAMADA CONEXION 
    public static function conexion(){

        //INICIAMOS UN BLOQUE TRY PARA HACER LA CONEXION
        try{

            //DECLARAMOS UNA VARIABLE LLAMADA $conexion CON EL DRIVER PARA HACER LA CONEXION
            $conexion=new PDO('mysql:host=localhost; dbname=universidades', 'root','');

            //ESTABLECEMOS LOS ATRIBUTOS DE LA CONEXION EN PDO
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //ESTABLECEMOS QUE LA CONEXION PUEDA RECIBIR CARACTERES
            $conexion->exec("SET CHARACTER SET UTF8");


        }catch(Exception $e){

            die("ERROR" . $e->getMessage());

            echo ("Linea del error: " . $e->getLine());

        }
        return $conexion;
    }

}



?>