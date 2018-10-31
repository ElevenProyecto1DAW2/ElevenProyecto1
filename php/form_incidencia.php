<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<meta charset="utf-8">
	<title>Incidencias</title>
</head>
<body>
	<div class="formulario4">
		<form action="form_incidencias.proc.php" method="POST">
			<h1>Introduce el Titulo de la Incidencia</h1>
			<input type="text" name="titulo_incidencia" style="width: 80%; height: 40px;"><br><br>
			<h1>Introduce la descripcion de la incidencia</h1>
			<input type="text" name="descripcion_incidencia" style="width: 80%; height: 100px;"><br><br>
			<input type="submit" name="enviar" value="Enviar" style="width: 30%; height: 50px;">
		</form>
	</div>
</body>
</html>