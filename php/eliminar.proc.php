<?php
	$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
		$id=$_REQUEST['eliminar'];
	$sql="DELETE FROM incidencias where Id_incidencias=$id";
	mysqli_query($link,$sql);
	header("location: recursosAdministrador.php");
?>