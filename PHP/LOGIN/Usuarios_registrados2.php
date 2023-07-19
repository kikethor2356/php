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

session_start();

if(!isset($_SESSION["usuario"])){

    header("Location:index.php");
}

?>

<h1>Bienvenidos usuarios registrados</h1>

<?php

echo "QUE FRAME WORK TE GUSTA MAS?" . $_SESSION["usuario"];



?>

<p><a href="Cierre.php" >Cierra sesion </a> </p>
<p>Esto es informacion solo para usuarios registrados</p>
    
</body>
</html>