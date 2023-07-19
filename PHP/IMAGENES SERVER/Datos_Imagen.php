<?php

//resivimos los datos de la imagen

$nomImagen=$_FILES["imagen"]["name"];

$tipo_imagen=$_FILES["imagen"]["type"];

$tamano_imagen=$_FILES["imagen"]["size"];

if ($tamano_imagen<=1000000){



//Realizamos la ruta de la caropeta del destino
$carpetaDestino=$_SERVER['DOCUMENT_ROOT'] . '/img';

//Movemos la imagen del directorio temporal al directorio escogido

move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino  . $nomImagen);

}else{
    echo "El tamaño de la imagen es muy grande";
}




?>