<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universidades";

$conn = mysqli_connect($servername, $username, $password, $dbname);


// Verificar conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Procesar datos del formulario
$usuarios = $_POST['usuarios'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT, array("cost"=>15)); 

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios_pass (usuarios,password) VALUES ('$usuarios', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "Usuario registrado exitosamente";
} else {
  echo "Error al registrar usuario: " . mysqli_error($conn);
}

// Cerrar conexión a la base de datos
mysqli_close($conn);
?>
