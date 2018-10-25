<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<meta charset="utf-8">
		<title>Recursos</title>
	</head>
	<body>
		<div class="total_recursos">
			<div class="filtro">
				<h1 style="text-align: center;">Bienvenido <?php echo "$_REQUEST[usu]"; ?>
					
				</h1>
				<p>Filtro para filtrar tomaa yaa!</p>
				<div class="filtronuevo">
					<form method="POST" name="FiltroRecursos" action="Filtrado.proc.php">
						<select name="Filtro" id="SeleccionSalaEquipo" onchange="OcultarMostrarFiltro()">
							<option value="-"> - </option>
							<?php
								$link = mysql_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
									echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
									echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
									echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
									exit;
								}
								$Sql="SELECT DISTINCT(Tipo_sala) from sala";
								$Sql=mysqli_query($link.$Sql);
								ForEach ($Sql as $query) {
									echo "<option value='$query[Tipo_sala]'>$query[Tipo_sala]</option>";
								}
							?>

						</select><br>
						<input type="submit" name="Filtrado" value="Filtrar">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>