<?php


require ("DevuelveUniversidades.php");
//Esta es una instancia
$unis=new DevuelveUniversidades();

//Este es un array que alamacena get universidades
$array_univeridades=$unis->get_universidades();

?>
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

    foreach($this->$array_univeridades as $elemento){
    
        echo "<table><tr><td>";
        echo $elemento ['cueci'] . "</td>>td>";
    }
    ?>
</body>
</html>

