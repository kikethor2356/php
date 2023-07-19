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
$Busqueda=$_GET["buscar"];

try{
    $base=new PDO('mysql: host=localhost; dbname=itf', 'root', '');

    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $base->exec("SET CHARACTER SET utf8");

    $sql="SELECT EMAIL FROM login WHERE PASSWORD= $Busqueda";

    $resultado=$base->prepare($sql);

    $resultado->execute(array($Busqueda));

    while($resgistro=$resultado->fetch(PDO::FETCH_ASSOC)){

        echo "Email es: " . $resgistro['EMAIL'] . "<br>";

    }

    $resultado->closeCursor();

    echo "Se establecio la conexion";
}catch(Exception $e){

        die('Error:' . $e->getMessage());    
    
    }finally{
        $base=null;
    }


?>
</body>
</html>