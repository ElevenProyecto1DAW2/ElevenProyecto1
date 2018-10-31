<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<meta charset="utf-8">
		<title>Reserva</title>
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
			$Sql="SELECT * FROM incidencias where descripcion";
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
				echo "<button action='reservar.proc.php'>Reservar</button>";
			echo "</div>";
			echo "<div class='descripcion'>";
			$Nueva_var=utf8_encode($query["descripcion"]);
				echo "<p>".$Nueva_var."</p>";
			echo "</div>";
			}
			?>
		</div>

	</body>
</html>