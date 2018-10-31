<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<meta charset="utf-8">
		<title>Reserva</title>
		<script type="text/javascript" src="../js/Funciones.js"></script>
	</head>
	<body>
		<button onclick="LogOut()">Log Out</button>
		<div class="reserva_total">
			<?php
			$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}	
			$Id=$_REQUEST['Recurso'];
			$Sql="SELECT incidencias.descripcion, equipos_sala.foto, equipos_sala.tipo_equipo_sala FROM equipos_sala inner join incidencias  on equipos_sala.Id_equipo_sala = incidencias.id_sala where Id_incidencias=".$Id;
			$Sql2=mysqli_query($link,$Sql);
			ForEach($Sql2 as $query){
				if ($query['foto']!="") {
					echo "<div class='imagen'>";
						echo "<img src='".$query['foto']."'>";
					echo "</div>";
				}else{
					echo "<div></div>";
				}
			echo "<div class='titulo'>";
				echo "<h1>$query[tipo_equipo_sala]</h1>";
			echo "</div>";
		}
			?>
			<div class='reserva_boton'>
				<button id="BotonReserva" value="$Id" onclick="window.location.href='recursosAdministrador.php'" >Volver</button>
			</div>
			<?php
			echo "<div class='descripcion'>";
			$Nueva_var=utf8_encode($query["descripcion"]);
				echo "<p>".$Nueva_var."</p>";
			echo "</div>";
				//echo "<input type='hidden' id='IdUsu' value='$IdUsu'>";
				//echo "<input type='hidden' id='usu' value='$usu'>";
			?>
		</div>

	</body>
</html>