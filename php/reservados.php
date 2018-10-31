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
				<h1 style="text-align: center;">
					Aqui tiene todos los recursos reservados por usted
				</h1>
				<div class="filtronuevo" style="margin-bottom: 5%;">
					<form style="padding-bottom: 7%;" method="POST" name="FiltroRecursos" action="recursos.php">
						<br>
						<?php
							if (isset($_REQUEST["id"])) {
								$IdUsu=$_REQUEST["id"];
							}else {
								$IdUsu=$_REQUEST["IdUsu"];
							}
							echo "<input type='hidden' name='usu' value='$_REQUEST[usu]'>";
							echo "<input type='hidden' name='IdUsu' value='".$IdUsu."'>";
						?>
						<input style="margin-left: 15%; width: 70%;" type="submit" name="Enviar" value="Volver">
					</form>
				</div>
					<div class="filtrando">
						<?php
								if (isset($_REQUEST["id"])) {
									$IdUsu=$_REQUEST["id"];
								}else {
									$IdUsu=$_REQUEST["IdUsu"];
								}
								if (isset($_REQUEST['Filtro'])) {
									$Filtro=$_REQUEST['Filtro'];
									$Sql="SELECT * FROM usuario_equipo_sala inner join equipos_sala on equipos_sala.Id_equipo_sala = usuario_equipo_sala.id_equipo where usuario_equipo_sala.id_usuario=$IdUsu && equipo_sala.equipo_sala='".$Filtro."' & usuario_equipo_sala.fecha_fin is null";		
								}else{
									$Sql="SELECT * FROM usuario_equipo_sala inner join equipos_sala on equipos_sala.Id_equipo_sala = usuario_equipo_sala.id_equipo where usuario_equipo_sala.id_usuario=$IdUsu && usuario_equipo_sala.fecha_fin is null";
								}
								$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}								
								$Sql2=mysqli_query($link,$Sql);
								if ((mysqli_num_rows($Sql2))>0) {
									ForEach ($Sql2 as $query) {
											echo "<form style='border:none' action='Reserva.php' method='POST'><p color='white'>$query[tipo_equipo_sala]<br> <input class='botonsito' type='submit' name='Enviar' value='Más Información'></p><input type='hidden' name='Recurso' value='$query[Id_equipo_sala]'><input type='hidden' name='Usuario' value='$_REQUEST[usu]'><input type='hidden' name='IdUsu' value='".$IdUsu."'></form><br/>";
									}
								}else{
									echo "<p>No tiene ningun recurso reservado ahora mismo</p>";
								}						
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>