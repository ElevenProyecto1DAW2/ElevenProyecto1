<?php
$link = mysqli_connect('172.24.17.192', 'root', '1234', 'proyecto1eleven');
	
	if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
$IdRecurso=$_REQUEST["num"];
$usu=$_REQUEST["user"];
$IdUsu=$_REQUEST["idUsu"];
$Sql="SELECT * FROM equipos_sala WHERE Id_equipo_sala='".$IdRecurso."'";
$Sql=mysqli_query($link,$Sql);
ForEach($Sql as $query){
	if ($query['Disponible']=='true') {
		$Sql="INSERT INTO usuario_equipo_sala(id_usuario,id_equipo,fecha_ini) VALUES('".$IdUsu."','".$IdRecurso."',NOW())";
		$Sql2="UPDATE equipos_sala SET Disponible='false' WHERE Id_equipo_sala=$IdRecurso";
		mysqli_query($link,$Sql);
		mysqli_query($link,$Sql2);
	}else{
		$Sql="UPDATE usuario_equipo_sala SET fecha_fin=NOW() WHERE id_usuario=$IdUsu and id_equipo=$IdRecurso and fecha_fin is null";
		$Sql2="UPDATE equipos_sala SET Disponible='true' WHERE Id_equipo_sala=$IdRecurso";
		mysqli_query($link,$Sql);
		mysqli_query($link,$Sql2);
	}
}
header("location:recursos.php?usu=$usu&IdUsu=$IdUsu");
