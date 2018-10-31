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
			$IdUsu=$_REQUEST['IdUsu'];
			$usu=$_REQUEST['Usuario'];
			$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}	
			$Id=$_REQUEST['Recurso'];
			$Sql="SELECT * FROM equipos_sala where Id_equipo_sala='".$Id."'";
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
			echo "<div class='reserva_boton'>";
			if ($query['Disponible']=='true') {
				echo "<button id='BotonReserva' value='$Id' onclick='Reservar()'>Reservar</button>";
				echo "<input type='hidden' id='IdUsu' value='$IdUsu'>";
				echo "<input type='hidden' id='usu' value='$usu'>";
			}else{
				echo "<button id='BotonReserva' value='$Id' onclick='Liberar()'>Liberar</button>";
				echo "<input type='hidden' id='IdUsu' value='$IdUsu'>";
				echo "<input type='hidden' id='usu' value='$usu'>";
			}
			echo "</div>";
			echo "<div class='descripcion'>";
			$Nueva_var=utf8_encode($query["descripcion"]);
				echo "<p>".$Nueva_var."</p>";
			echo "</div>";
			}
			echo "<div class='incidencia_boton'>";
				echo "<button id='BotonIncidencia' value='$Id' onclick='incidencia()'>Poner Incidencia</button>";
				echo "<input type='hidden' id='IdUsu' value='$IdUsu'>";
				echo "<input type='hidden' id='usu' value='$usu'>";
			echo "</div>";
			?>
		</div>

	</body>
</html>