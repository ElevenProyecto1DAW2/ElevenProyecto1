<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<meta charset="utf-8">
		<title>Recursos</title>
		<script type="text/javascript" src="../js/Funciones.js"></script>
	</head>
	<body>
		<button onclick="LogOut()">Log Out</button>
		<div class="total_recursos">
			<div class="filtro">
				<h1 style="text-align: center;">Bienvenido <?php echo "$_REQUEST[usu]"; ?>
					
				</h1>
				<div class="filtronuevo">
					<form method="POST" name="FiltroRecursos" action="recursos.php">
						<br>
						<select style="margin-left: 5%; width: 90%; height: 20%;" id="filtro2" onchange="aparecer2()">
							<option value="nada"> - </option>
							<option value="equipos"> equipos</option>
							<option value="salas"> salas</option>
						</select><br><br>
						<select style="margin-left: 5%; width: 90%; height: 20%; display: none;" name="Filtro" id="SeleccionSalaEquipo">
							<option value="-"> - </option>
							<?php
								if (isset($_REQUEST["id"])) {
									$IdUsu=$_REQUEST["id"];
								}else {
									$IdUsu=$_REQUEST["IdUsu"];
								}
								$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}
								$Sql="SELECT DISTINCT(tipo_equipo_sala) from equipos_sala WHERE equipo_sala LIKE 'equipo'";
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									echo "<option value='".utf8_encode($query[tipo_equipo_sala])."'>".utf8_encode($query[tipo_equipo_sala])."</option>";
								}
								echo "<input type='hidden' name='usu' value='$_REQUEST[usu]'>";
								echo "<input type='hidden' name='IdUsu' value='".$IdUsu."'>";
							?>
						</select><br><br>
						<select style="margin-left: 5%; width: 90%; height: 20%; display: none;" name="Filtro3" id="SeleccionSala">
							<option value="-"> - </option>
							<?php
								if (isset($_REQUEST["id"])) {
									$IdUsu=$_REQUEST["id"];
								}else {
									$IdUsu=$_REQUEST["IdUsu"];
								}
								$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}
								$Sql="SELECT DISTINCT(tipo_equipo_sala) from equipos_sala WHERE equipo_sala LIKE 'sala'";
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									echo "<option value='".utf8_encode($query[tipo_equipo_sala])."'>".utf8_encode($query[tipo_equipo_sala])."</option>";
								}
								echo "<input type='hidden' name='usu' value='$_REQUEST[usu]'>";
								echo "<input type='hidden' name='IdUsu' value='".$IdUsu."'>";
							?>
						</select><br><br>
						<select style="margin-left: 5%; width: 90%; height: 20%; display: none;" name="Filtro3" id="SeleccionSala">
							<option value="-"> - </option>
							<?php
								if (isset($_REQUEST["id"])) {
									$IdUsu=$_REQUEST["id"];
								}else {
									$IdUsu=$_REQUEST["IdUsu"];
								}
								$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}
								$Sql="SELECT DISTINCT(tipo_equipo_sala) from equipos_sala WHERE equipo_sala LIKE 'sala'";
								$Sql2=mysqli_query($link,$Sql);
								ForEach ($Sql2 as $query) {
									echo "<option value='".utf8_encode($query[tipo_equipo_sala])."'>".utf8_encode($query[tipo_equipo_sala])."</option>";
								}
								echo "<input type='hidden' name='usu' value='$_REQUEST[usu]'>";
								echo "<input type='hidden' name='IdUsu' value='".$IdUsu."'>";
							
						echo "</select><br><br>";
						echo "<input style='margin-left: 35%; margin-bottom: 5%;' type='submit' name='Filtrado' value='Filtrar'>";
						echo "<form method='POST'>";
							echo "<button style='margin-left: 25%;margin-bottom: 5%;' onclick='Reservados();return false'>Reservados</button>";
							echo "<input type='hidden' id='usu' value='$_REQUEST[usu]'>";
							echo "<input type='hidden' id='IdUsu' value='".$IdUsu."'>";
						echo "</form>";
					echo "</form>";
					?>
				</div>
					<div class="filtrando">
						<?php
								$noentrar=true;
								if (isset($_REQUEST["id"])) {
									$IdUsu=$_REQUEST["id"];
								}else {
									$IdUsu=$_REQUEST["IdUsu"];
								}
								if (isset($_REQUEST['Filtro'])) {
									if ($_REQUEST['Filtro']=="-") {
										$Sql="SELECT * FROM equipos_sala";
										$_REQUEST['Filtro']="";
									}else {
									$Filtro="$_REQUEST[Filtro]";
									$Sql="SELECT * FROM equipos_sala where tipo_equipo_sala='".$Filtro."'";
										$noentrar=false;
									$_REQUEST['Filtro']="";
									}
								}else{
									$Sql="SELECT * FROM equipos_sala";
									$_REQUEST['Filtro']="";
								}
								if ((isset($_REQUEST['Filtro3'])) && ($noentrar==true)) {
									if ($_REQUEST['Filtro3']=="-") {
										$Sql="SELECT * FROM equipos_sala";
										$_REQUEST['Filtro3']="";
									}else {
									$Filtro="$_REQUEST[Filtro3]";
									$Sql="SELECT * FROM equipos_sala where tipo_equipo_sala='".$Filtro."'";
									$_REQUEST['Filtro3']="";
									}
								}
								$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}							
								$Sql2=mysqli_query($link,$Sql);
								if ((mysqli_num_rows($Sql2))>0) {
									ForEach ($Sql2 as $query) {
										if ($query['Disponible']=='true') {
											echo "<form style='border:none' action='Reserva.php' method='POST'><p color='white'>$query[tipo_equipo_sala]<br> <input class='botonsito' type='submit' name='Enviar' value='Más Información'></p><input type='hidden' name='Recurso' value='$query[Id_equipo_sala]'><input type='hidden' name='Usuario' value='$_REQUEST[usu]'><input type='hidden' name='IdUsu' value='".$IdUsu."'></form><br/>";
										}	
									}
								}else{
									echo "<p>No Hay recursos disponibles en este momento</p>";
								}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>