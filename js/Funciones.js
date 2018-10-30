function ControlarUsu(){
	var mensaje="";
	if (document.Formulario.user.value=="") {
		mensaje+="-El campo USUARIO no debe estar VACIO \n";
	} 
	if (document.Formulario.contra.value==""){
		mensaje+="-El campo CONTRASEÑA no debe estar VACIO \n";
	}
	if (mensaje=="") {
		return true
	}else{
		alert(mensaje);
		return false;
	}
}
function Reservar(){
	window.location.href='../php/reservar.proc.php?num='+document.getElementById("BotonReserva").value+'&user='+document.getElementById("usu").value+'&idUsu='+document.getElementById("IdUsu").value;
}