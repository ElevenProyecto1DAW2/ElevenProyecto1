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
		<button onclick="LogOut()">Log Out</button>
		<div class="total_recursos">
			<div class="filtro">
				<h1 style="text-align: center;">Bienvenido Administrador
				</h1>
				<p>Incidencias nuevas</p>
				<div class="filtronuevo">
					<form method="POST" name="FiltroRecursos" action="recursosAdministrador.php">
						<br>
						<select name="Filtro4" style="margin-left: 5%; width: 90%; height: 20%;">
							<option value="ambas">Ambas</option>
							<option value="acabadas">acabadas</option>
							<option value="noacabadas">no acabadas</option>
						</select><br><br>
						<input style="margin-left: 35%; margin-bottom: 5%;" type="submit" name="Filtrado" value="Filtrar">
						<button style="margin-left: 29%; margin-bottom: 5%;" onclick="reservadas();return false;" id="BotonReservado" >Reservas</button>
						<?php
						$IdUsu=$_REQUEST['id'];
						$usu=$_REQUEST['usu'];
						echo "<input type='hidden' id='IdUsu' value='$IdUsu'>";
						echo "<input type='hidden' id='usu' value='$usu'>";
						?>
					</form>
				</div>

					<div class="filtrando">
						<?php
							if (isset($_REQUEST['Filtro4'])) {
								if ($_REQUEST['Filtro4']=='ambas') {
									$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
									if (!$link) {
									    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
									    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
									    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
									    exit;
									}
									$Sql="SELECT * from incidencias";
									$Sql2=mysqli_query($link,$Sql);
									ForEach ($Sql2 as $query) {
										$incidencia=$query['Id_incidencias'];
										$informacion=$query['Id_incidencias'];
										if ($query['resuelta']=='true') {
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:green; text-decoration:none; float: right;' href=''> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.hp?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										} else{
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:red; text-decoration:none; float: right;' href='resulta.proc.php?Id_incidencias=$query[Id_incidencias]'> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.php?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										}

									}
								} elseif ($_REQUEST['Filtro4']=='acabadas') {
									$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
									if (!$link) {
									    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
									    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
									    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
									    exit;
									}
									$Sql="SELECT * from incidencias where resuelta='true'";
									$Sql2=mysqli_query($link,$Sql);
									ForEach ($Sql2 as $query) {
										$incidencia=$query['Id_incidencias'];
										$informacion=$query['Id_incidencias'];
										if ($query['resuelta']=='true') {
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:green; text-decoration:none; float: right;' href=''> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.hp?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										} else{
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:red; text-decoration:none; float: right;' href='resulta.proc.php?Id_incidencias=$query[Id_incidencias]'> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.php?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										}

									}	
								} elseif ($_REQUEST['Filtro4']=='noacabadas') {
									$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
									if (!$link) {
									    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
									    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
									    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
									    exit;
									}
									$Sql="SELECT * from incidencias where resuelta='false'";
									$Sql2=mysqli_query($link,$Sql);
									ForEach ($Sql2 as $query) {
										$incidencia=$query['Id_incidencias'];
										$informacion=$query['Id_incidencias'];
										if ($query['resuelta']=='true') {
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:green; text-decoration:none; float: right;' href=''> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.hp?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										} else{
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:red; text-decoration:none; float: right;' href='resulta.proc.php?Id_incidencias=$query[Id_incidencias]'> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.php?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										}
									}	
								}

							}else{
								$link = mysqli_connect('localhost', 'root', '', 'proyecto1eleven');
								if (!$link) {
								    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
								    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
								    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
								    exit;
								}
								$Sql="SELECT * from incidencias";
								$Sql2=mysqli_query($link,$Sql);
									ForEach ($Sql2 as $query) {
										$incidencia=$query['Id_incidencias'];
										$informacion=$query['Id_incidencias'];
										if ($query['resuelta']=='true') {
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:green; text-decoration:none; float: right;' href=''> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.hp?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										} else{
											echo "<p style='color:white; text-align:left;'>$query[Id_incidencias] $query[titulo] <a  style='color:red; text-decoration:none; float: right;' href='resulta.proc.php?Id_incidencias=$query[Id_incidencias]'> &nbsp<i class='fas fa-check'></i></a><a style='color:red;text-decoration:none; float:right; ' href='eliminar.proc.php?eliminar=$incidencia'> &nbsp <i class='fas fa-trash-alt'></i></a><a style='color:red;text-decoration:none;float:right; 'href='informacion2.php?Recurso=$informacion'> &nbsp<i class='fas fa-info-circle'></i></a></p>";
										}
									}	
								}
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>