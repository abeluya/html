<!DOCTYPE html>
<html>
	<head>
	<title>Login</title>
	<meta charset="utf-8">
	</head>
<body>

	<div id="login">
		<h1>Login Info </h1>
		<form action="" method="post" id=loginForm>
			Usuario <input type="text" name="userName" id="userName">
			</br>
			Contraseña <input type="password" name="password" id="password">
			</br>
			<input type="submit" name="Login">
		</form>

		<?php

		$config = parse_ini_file("config.ini", true);

		if ( isset($_POST['userName']) && isset($_POST['password']))
		{
			$hostname = $config['database']['host'];
			$username = $config['database']['user'];
			$password = $config['database']['pass'];
			$dbname = "admin";
			$dbhandle = mysqli_connect("$hostname", "$username", "$password", "$dbname");

			if (!$dbhandle) 
			{
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}

			echo "Éxito: Se realizó una conexión apropiada a $dbname." . PHP_EOL;
			echo "Información del host: " . mysqli_get_host_info($dbhandle) . PHP_EOL . "</br>";

			$query = "SELECT * FROM users WHERE id = $_POST['userName'] AND password = $_POST['password']";
			if ($sentencia = mysqli_prepare($dbhandle, $query)) 
			{
			mysqli_execute($sentencia);
			mysqli_stmt_bind_result($sentencia, $usuario, $contrasena, $nombre, $apellido);

			printf("%s %s %s", "\nResultado de la Consulta: ", $query,":");
			while (mysqli_stmt_fetch($sentencia))
			{

				printf("%s (%s)\n", $usuario, $nombre);
			}
			mysqli_stmt_close($sentencia);
			}
			mysqli_close($dbhandle);

		}
		else echo "</br>Sin conexión todavia";
		?>

	</div>

</body>
</html>