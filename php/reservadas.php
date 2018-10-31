<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reservadas</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<script type="text/javascript" src="../js/Funciones.js"></script>
</head>
<body>
		<div class="total_recursos">
			<div class="filtro">
				<h1 style="text-align: center;">Bienvenido <?php echo "$_REQUEST[usu]"; ?>
					
				</h1>
				<div class="filtronuevo">
					<form method="POST" name="FiltroRecursos" action="reservadas.php">
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
								$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
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
								$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
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
						<input style="margin-left: 35%; margin-bottom: 5%;" type="submit" name="Filtrado" value="Filtrar">
					</form>
				</div>
					<div class="filtrando">
						<?php
								$noentrar=true;
								if (isset($_REQUEST["id"])) {
									$IdUsu=$_REQUEST["IdUsu"];
								}else {
									$IdUsu=$_REQUEST["IdUsu"];
								}
								if (isset($_REQUEST['Filtro'])) {
									if($_REQUEST['Filtro']=="-"){
										$Sql="SELECT usuario.Nombre_Usuario, equipos_sala.tipo_equipo_sala, usuario_equipo_sala.fecha_ini,usuario_equipo_sala.fecha_fin,equipos_sala.id_equipo_sala FROM usuario_equipo_sala iNNER JOIN usuario ON usuario_equipo_sala.id_usuario=usuario.id_usuario iNNER JOIN equipos_sala ON equipos_sala.Id_equipo_sala=usuario_equipo_sala.id_equipo";
									}else{
										$Filtro=$_REQUEST['Filtro'];
										$Sql="SELECT usuario.Nombre_Usuario, equipos_sala.tipo_equipo_sala, usuario_equipo_sala.fecha_ini,usuario_equipo_sala.fecha_fin,equipos_sala.id_equipo_sala  FROM usuario_equipo_sala iNNER JOIN usuario ON usuario_equipo_sala.id_usuario=usuario.id_usuario iNNER JOIN equipos_sala ON equipos_sala.Id_equipo_sala=usuario_equipo_sala.id_equipo WHERE equipos_sala.tipo_equipo_sala LIKE '".$Filtro."'";
										$noentrar=false;
									}
								}else{
									$Sql="SELECT usuario.Nombre_Usuario, equipos_sala.tipo_equipo_sala, usuario_equipo_sala.fecha_ini,usuario_equipo_sala.fecha_fin,equipos_sala.id_equipo_sala  FROM usuario_equipo_sala iNNER JOIN usuario ON usuario_equipo_sala.id_usuario=usuario.id_usuario iNNER JOIN equipos_sala ON equipos_sala.Id_equipo_sala=usuario_equipo_sala.id_equipo";
								}
								if ((isset($_REQUEST['Filtro3'])) && ($noentrar==true) ) {
									if($_REQUEST['Filtro3']=="-"){
										$Sql="SELECT usuario.Nombre_Usuario, equipos_sala.tipo_equipo_sala, usuario_equipo_sala.fecha_ini,usuario_equipo_sala.fecha_fin,equipos_sala.id_equipo_sala  FROM usuario_equipo_sala iNNER JOIN usuario ON usuario_equipo_sala.id_usuario=usuario.id_usuario iNNER JOIN equipos_sala ON equipos_sala.Id_equipo_sala=usuario_equipo_sala.id_equipo";
									}else{
										$Filtro=$_REQUEST['Filtro3'];
										$Sql="SELECT usuario.Nombre_Usuario, equipos_sala.tipo_equipo_sala, usuario_equipo_sala.fecha_ini,usuario_equipo_sala.fecha_fin,equipos_sala.id_equipo_sala  FROM usuario_equipo_sala iNNER JOIN usuario ON usuario_equipo_sala.id_usuario=usuario.id_usuario iNNER JOIN equipos_sala ON equipos_sala.Id_equipo_sala=usuario_equipo_sala.id_equipo WHERE equipos_sala.tipo_equipo_sala LIKE '".$Filtro."' ORDER BY equipos_sala.Id_equipo_sala ";
									}
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
										echo "<form style='border:none;' action='Reserva.php' method='POST'><table border style='color:white;font-size:25px; text-align:center; margin-left:5%;'><p style='text-align:left;' color='white'><td>$query[Nombre_Usuario]</td> <td>$query[tipo_equipo_sala]</td> <td>$query[id_equipo_sala]</td> <td>$query[fecha_ini]</td> <td>$query[fecha_fin]</td></p></table></form><br/>";
								}						
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>