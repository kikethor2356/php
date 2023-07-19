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

try{
    
    $base=new PDO("mysql:host=localhost; dbname=universidades", "root", "");

    $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $base->exec("SET CHARACTER SET  utf8");

    $tamano_paginas=3;
 
    if(isset($_GET["pagina"])){
        if ($_GET["pagina"]==1){

            header("Location:index.php");
        }else{

            $pagina=$_GET["pagina"];
        }
    }else{
        $pagina=1;
    }



    $empezar_desde=($pagina-1)*$tamano_paginas;

    $sql_total="SELECT id, nombre, apellido, direccion FROM usuario_datos ";

    $resultado=$base->prepare($sql_total);

    $resultado->execute(array());

    $num_filas=$resultado->rowCount();

    $total_paginas=ceil($num_filas/$tamano_paginas);

    echo "Numero de registros:" . $num_filas . "<br>";
    echo "Mostramos " . $tamano_paginas . " registros por pagina <br>";
    echo "Mostrando la pagina " . $pagina . " de ". $total_paginas . "<br>";

    $resultado->closeCursor();

    $sql_limite="SELECT id, nombre, apellido, direccion FROM usuario_datos  limit $empezar_desde,$tamano_paginas";

    $resultado=$base->prepare($sql_limite);

    $resultado->execute(array());

    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

        echo "<br>Id: "  . $registro["id"] . "<br>  Nombre de usuario: " . $registro["nombre"] . "<br>Apellido del usuario: " . $registro["apellido"] . "<br>Direccion del usuario: " . $registro["direccion"] . "<br>";
    }

}catch(Exception $e){


    echo "Linea del error " . $e;
}


//----------------------------------------------------------PAGINACION 

for($i=1; $i<=$total_paginas; $i++){


    echo "<a href='?pagina=" . $i . "'> " . $i . "</a>  ";
}

    ?>
</body>
</html>