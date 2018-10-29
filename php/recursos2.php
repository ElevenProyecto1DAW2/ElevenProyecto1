<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<meta charset="utf-8">
		<title>Recursos</title>
		<script type="text/javascript" src="../js/Funciones.js"></script>
	</head>
	<body>
		<div class="total_recursos">
			<div class="filtro">
				<h1 style="text-align: center;">Bienvenido <?php echo "$_REQUEST[usu]"; ?>
					
				</h1>
				<p>Filtro para filtrar tomaa yaa!</p>
				<div class="filtronuevo">
					<form method="POST" name="FiltroRecursos" action="recursos.php">
						<br>
						<select style="margin-left: 5%; width: 90%; height: 20%;" name="Filtro" id="SeleccionSalaEquipo">
							<option value="-"> - </option>
							<?php
								$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
									echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
									echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
									echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
									exit;
								}
								$Sql="SELECT DISTINCT(tipo_equipo_sala) from equipos_sala";
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									echo "<option value='$query[tipo_equipo_sala]'>uiuiuiuuuiuiuuiuiuiuuiuiuiiuiuiuui$query[tipo_equipo_sala]</option>";
								}
								echo "<input type='hidden' name='usu' value='$_REQUEST[usu]'>";
							?>
						</select><br><br>
						<input style="margin-left: 35%; margin-bottom: 5%;" type="submit" name="Filtrado" value="Filtrar">
					</form>
				</div>
					<div class="filtrando">
						<?php
							
								$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}
								$Filtro="$_REQUEST[Filtro]";
								$Sql="SELECT * FROM equipos_sala where tipo_equipo_sala='".$Filtro."'";
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									echo "<p style='color:white;'>$query[Id_equipo_sala] $query[tipo_equipo_sala]</p>";
								}						
						?>
					</div>
				</div>
				
			</div>
		</div>
	</body>
</html>