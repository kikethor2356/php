<?php
session_start();
include ('Conexion.php');


if(isset($_POST['Usuario']) &&  isset($_POST['Clave'])){
    function validate($data){
        $data = trim($data);
        $data =  stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $usuario = validate($_POST['Usuario']);
    $clave = validate($_POST['Clave']);

    if (empty($usuario)){
        header("Location: intex.php?error= El usuario es requerido");
        exit();
    }elseif (empty($clave)){
        header("Location: index.php?error= La clave es requerida");
        exit();
    }else{
       // $clave = md5($clave);

        $sql = "SELECT * FROM usuarios WHERE Usuario = ' $usuario' AND Clave= ' $clave'";
        $result = mysqli_query($conexion,$sql);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if($row['Usuario'] === $usuario && $row['$clave'] === $clave){
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: Inicio.php");
                exit();
            }else{
                header("Location: index.php?error=El usuario o clave son incorrectos");

            }
        }
         
    }
}else{
    header("Location: index.php");
    exit();
}

?>