<?php

    require_once("MODELO/Usuarios_modelo.php");

    //ALMACENAMOS LA CLASE Usuario_modelo EN UNA VARIABLE LLAMADA usuario
    $usuario=new Usuario_modelo();


    //HACEMOS UN ARRAY PARA TRAER LA TABLA DEL METODO get_usuario
    $matrizUsuarios=$usuario->get_usuario();


    require_once("VISTA/Usuarios_view.php");

?>