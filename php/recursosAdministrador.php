<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<meta charset="utf-8">
		<title>Recursos</title>
		<script type="text/javascript" src="../js/Funciones.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


	</head>
	<body>
		<div class="total_recursos">
			<div class="filtro">
					
				</h1>
				<p>Incidencias nuevas</p>
				<div class="filtronuevo">
					<form method="POST" name="FiltroRecursos" action="recursosAdministrador.php">
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
									echo "<option value='$query[tipo_equipo_sala]'>$query[tipo_equipo_sala]</option>";
								}
								echo "<input type='hidden' name='usu' value='$_REQUEST[usu]'>";
							?>
						</select><br><br>
						<input style="margin-left: 35%; margin-bottom: 5%;" type="submit" name="Filtrado" value="Filtrar">
					</form>
				</div>

					<div class="filtrando">
						<?php
							
								$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}
								$Sql="SELECT * FROM incidencias"; 
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									$incidencia=$query['Id_incidencias'];
									$informacion=$query['Id_incidencias'];
									echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:red; text-decoration:none; float: right;' href='informacion.php;'> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.php?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";

								}	


						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>