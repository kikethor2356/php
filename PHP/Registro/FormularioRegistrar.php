<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuarios</title>
</head>
<body>
	<h1>Registro de Usuarios</h1>
	<form method="post" action="ConexionSQL.php">
		<label>Nombre de Usuario:</label>
		<input type="text" name="usuarios" required><br>

		<label>Contraseña:</label>
		<input type="password" name="password" required><br>

		<input type="submit" value="Registrar">
	</form>
</body>
</html>