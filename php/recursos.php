<!DOCTYPE html>
<html>
<head>
	<title>correcto</title>
	<script type="text/javascript" src="../js/Funciones.js"></script>
</head>
<body>
	<form method="POST" name="FiltroRecursos" action="Filtrado.proc.php">
		<select name="Filtro" id="SeleccionSalaEquipo" onchange="OcultarMostrarFiltro()">
			<option value="-"> - </option>
			<?php 
				$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
				if (!$link) {
				    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
				    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
				    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
				    exit;
				}
				$Sql="SELECT DISTINCT(Tipo_sala) from sala";
				$Sql=mysqli_query($link,$Sql);
				ForEach ($Sql as $query) {
					echo "<option value='$query[Tipo_sala]'>$query[Tipo_sala]</option>";
				}
			?>
		</select><br>
		<input type="submit" name="Filtrado" value="Filtrar">
	</form>
</body>
</html>