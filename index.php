<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de una web con PHP - aprenderaprogramar.com</title>
<meta charset="utf-8">
</head>
<body>
	<div>
		<form action = "" method = "post">
		Nombre <input type="text" name="name" value="Name">
		<br/>
		Contraseña <input type="text" name="pasword" value="Pass">
		<br/>
		<input type="submit" value="Submit">
		</form>
	</div>
<?php
/* Aquí vendría el código PHP */
/* Este código PHP podría ser una consulta a base de datos */
/* Y además podríamos mostrar esos datos */

	function factorial ($value)
	{
		if ($value <= 0)
			return 1;
		else
			return $value * factorial($value-1);

	}
	echo factorial ($_POST['name']);

?>

	<div>
		<form action = "variables.php" method = "get">
		<input type="submit" value="Get">
		</form>
	</div>


</body>
</html>