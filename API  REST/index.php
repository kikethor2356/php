<?php

require_once "clases/conexion/conexion.php";

 $conexion = new conexion;
 
$query="SELECT * FROM pacientes";

$json = $conexion->ObtenerDatos($query);
$json = json_encode($json);
print_r($json);

 //$query = "Insert into pacientes (DNI) value('1')";
 //print_r($conexion->nonQueryId ($query));
   



?>

