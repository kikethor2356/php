4<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$conexion=new mysqli("localhost", "root", "", "itf");

if($conexion->connect_errno){

    echo "fallo la conección " . $conexion->connect_errno;
}

#mysqli_set_charset($conexion, "utf8");

$conexion->set_charset("utf8");

$sql="SELECT * FROM login";

#$resultados=mysqli_query($conexion, $sql);

$resultado=$conexion->query($sql);

if($conexion->errno){

    die($conexion->error);

}

while($fila=$resultado->fetch_assoc()){


    echo $fila ['EMAIL'];
    echo $fila ['PASSWORD'];
}

$conexion->close();
?>
    
</body>
</html>