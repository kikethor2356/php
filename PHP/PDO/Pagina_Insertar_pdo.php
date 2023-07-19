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
$Insertar_Correo=$_GET["Correo"];
$Insertar_Contra=$_GET ["Contraseña"];

try{
    $base=new PDO('mysql: host=localhost; dbname=itf', 'root', '');

    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $base->exec("SET CHARACTER SET utf8");

    #$sql="SELECT EMAIL FROM login WHERE PASSWORD= $Busqueda";

    $sql="INSERT INTO  login (EMAIL, PASSWORD)  
    VALUES(:Correo,:Contraseña)";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":Correo"=>$Insertar_Correo, ":Contraseña"=>$Insertar_Contra));

    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

        echo "Email es: " . $registro['EMAIL'] . "<br>";

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