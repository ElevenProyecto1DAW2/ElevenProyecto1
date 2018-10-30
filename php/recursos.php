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
				<div class="filtronuevo">
					<form method="POST" name="FiltroRecursos" action="recursos.php">
						<br>
						<select style="margin-left: 5%; width: 90%; height: 20%;" name="Filtro" id="SeleccionSalaEquipo">
							<option value="-"> - </option>
							<?php
								$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
								if (!$link) {
									echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
									echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
									echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
									exit;
								}
								$Sql="SELECT DISTINCT(tipo_equipo_sala) from equipos_sala";
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									echo "<option value='".utf8_encode($query[tipo_equipo_sala])."'>".utf8_encode($query[tipo_equipo_sala])."</option>";
								}
								echo "<input type='hidden' name='usu' value='$_REQUEST[usu]'>";
							?>
						</select><br><br>
						<input style="margin-left: 35%; margin-bottom: 5%;" type="submit" name="Filtrado" value="Filtrar">
					</form>
				</div>
					<div class="filtrando">
						<?php
								if (isset($_REQUEST['Filtro'])) {
									$Filtro="$_REQUEST[Filtro]";
									$Sql="SELECT * FROM equipos_sala where tipo_equipo_sala='".$Filtro."'";
								}else{
									$Sql="SELECT * FROM equipos_sala";
								}
								$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}								
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									echo "<form style='border:none' action='Reserva.php' method='POST'><p color='white'>$query[tipo_equipo_sala] <input class='botonsito' type='submit' name='Enviar' value='Más Información'></p><input type='hidden' name='Recurso' value='$query[Id_equipo_sala]'><input type='hidden' name='Usuario' value='$_REQUEST[usu]'></form><br/>";
								}						
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>