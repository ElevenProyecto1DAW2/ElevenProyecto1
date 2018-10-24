<?php

//conectamos a la BD 1819_exemple
	$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
	
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
$query = mysqli_query($link, "SELECT * FROM usuario WHERE Nombre_Usuario LIKE '$_REQUEST[user]'");
$categoria=mysqli_fetch_array($query);
if ($_REQUEST['user'] == $categoria['Nombre_Usuario'] && $_REQUEST['contra'] == $categoria['Contra_Usu']) {
	header('Location: correcto.php');
} else {
	echo "El usuario o contraseña son incorrectos";
	echo "<a href='index.php'>Pulsa aqui para volver</a>";
}



?>