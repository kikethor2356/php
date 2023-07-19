<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

include("Conexion.php");

$id=$_GET["id"];

$base->query("DELETE FROM usuario_datos WHERE ID='$id'");

header("Location:index.php");

?>


</body>
</html>