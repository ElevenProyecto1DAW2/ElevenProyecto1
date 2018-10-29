<?php
$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
	
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
$query = mysqli_query($link, "SELECT * FROM equipos_sala WHERE Id_equipo_sala LIKE '$_REQUEST[user]'");
