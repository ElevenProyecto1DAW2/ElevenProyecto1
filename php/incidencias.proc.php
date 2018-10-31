<?php
	$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	$Filtro="$_REQUEST[Filtro]";
	$Sql="SELECT * FROM sala where Tipo_Sala='".$Filtro."'";
	$Sql2=mysqli_query($link,$Sql);
	ForEach ($Sql2 as $query) {
		echo "$query[Id_incidencias] $query[Tipo_Sala]";
	}
?>