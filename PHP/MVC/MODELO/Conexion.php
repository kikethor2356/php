<?php

//HACEMOS LA CLASS Concetar

class conexion
{
    public $db_name;
    public $host;
    public $pass_db;
    public $user_db;


    public function __construct($db_name, $host)
    {
        echo $this->db_name = $db_name;
        echo $this->host = $host;
    }
    //HACEMOS UNA FUNCION O UN METODO LLAMADA conexion 
    public function Conectar()
    {

        //INICIAMOS UN BLOQUE TRY PARA HACER LA conexion
        try {

            //DECLARAMOS UNA VARIABLE LLAMADA $conexion CON EL DRIVER PARA HACER LA CONEXION
            /*             $stringconexion="mysql:host=". $this->db_name ."; dbname=MVCPractica', 'root',''";
 */
            $stringconexion = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";";
            $conexion = new PDO($stringconexion . 'root', '');

            //ESTABLECEMOS LOS ATRIBUTOS DE LA CONEXION EN PDO
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //ESTABLECEMOS QUE LA CONEXION PUEDA RECIBIR CARACTERES
            $conexion->exec("SET CHARACTER SET UTF8");
        } catch (Exception $e) {

            die("ERROR" . $e->getMessage());

            echo ("Linea del error: " . $e->getLine());
        }
        return $conexion;
    }
}
