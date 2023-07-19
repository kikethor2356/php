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

//Login funcional 
//author@ kikethor

if(isset($_POST["enviar"])){

try{

    //1 ESTABLECEMOS LA CONEXION A LA BASE DE DATOS
    $base=new PDO ("mysql:hotst=localhost; dbname=universidades","root","");
    //2 LE ASIGNAMOS LOS ATRIBUTOS PDO A LAS CONEXION
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //3 HACEMOS LA CONSULTA SQL
    $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login AND PASSWORD= :password";
    //4 PREPARAMOS LA CONSULTA PREPARADA PARA MAYOR SEGURIDAD CONTRA
    //LAS INYECCIONES SQL
    $reultado=$base->prepare($sql);

    $login=htmlentities(addslashes($_POST['login']));

    $password=htmlentities(addslashes($_POST['password']));

    $reultado->bindValue(':login', $login);

    $reultado->bindValue(':password',$password);

    $reultado->execute();

    $numero_registro=$reultado->rowCount();

    if($numero_registro !=0){

        //Iniciamos la sesion o la creamos
        session_start();
        //Almacenamos el usuario en una variable global
        $_SESSION["usuario"]=$_POST["login"];
        //redireccionamos a otra pagina con una sesion

       // header("Location:Usuarios_registrados.php");        
        //echo "<h2>Adelante!!</h2>";

    }else{
        echo "Error Usuario o contraseña incorrecta o no registrada";
        //header("location:index.php");
    }

}catch(Exception $e){

    die("Error: ". $e->getMessage());

    }
}
?>
     <?php
     if(!isset($_SESSION["usuario"])){
     include("Formulario.html");
     }else{
        echo "Usuario: " . $_SESSION["usuario"];
     }

     ?>
</body>
</html>