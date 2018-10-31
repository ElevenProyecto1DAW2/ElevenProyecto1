<?php
$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
$titulo=$_REQUEST['titulo_incidencia'];
$descripcion=$_REQUEST['descripcion_incidencia'];
$Sql="INSERT INTO ";