<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
   
<style>


td{
    border:4px dotted #ff0000;
    background-color:aquamarine;
}

    </style>

</head>
<body>

<table>

<td>Id </td>
<td>Nombre del usuario</td>
<td>Telefono del usuario</td>
<td>Correo del usuario</td>
<td>Estatus del usuario </td>


<?php


    foreach($matrizUsuarios as $registro){


        echo "<tr><td>" . $registro["id"] . "</td>";
        echo "<td>" . $registro["nombre"] . "</td>";
        echo "<td>" . $registro["telefono"] . "</td>";
        echo "<td>". $registro["correo"] . "</td>";
        echo "<td>". $registro["estatus"] . "</td>";
        
    }

?>
    </table>
</body>
</html>