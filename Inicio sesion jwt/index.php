
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Inicio de session</title>
</head>
<body>
    <form action ="InicioSesion.php" method="POST">
    <h1>INICIA SESION</h1>
    <hr>
    <?php

    if (isset($_GET['error'])){
        ?>
        <p class="error">
        <?php
        echo $_GET['error'];
        ?>
    </p>
    <?php
    }
    ?>
    <hr>
    <i class="fa-solid fa-user"></i>
    <label>Usuario</label>
    <input type="text" name="Usuario" placeholder="Nombre usuario">

    <i class="fa-solid fa-unlock"></i>
    <label>Clave</label>
    <input type="text" name="Clave" placeholder="Clave">
<hr>
    <button type="submit"> Iniciar sesion</button>
    <a href="CrearCuenta.php"> Crear Cuenta </a>
    </form>

</body>
</html>