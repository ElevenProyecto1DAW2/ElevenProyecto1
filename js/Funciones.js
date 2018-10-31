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
function aparecer2(){
	document.getElementById('SeleccionSalaEquipo').style.display='none';
	document.getElementById('SeleccionSala').style.display='none';
	if (document.getElementById('filtro2').value=="equipos") {
		document.getElementById('SeleccionSalaEquipo').style.display='block';
	}
	if (document.getElementById('filtro2').value=="salas") {
		document.getElementById('SeleccionSala').style.display='block';
	}
}
function incidencia(){
window.location.href='../php/form_incidencia.php?num='+document.getElementById("BotonIncidencia").value+'&usu='+document.getElementById("usu").value+'&IdUsu='+document.getElementById("IdUsu").value;

}
function reservadas(){
	window.location.href='../php/reservadas.php?num='+document.getElementById("BotonReservado").value+'&usu='+document.getElementById("usu").value+'&IdUsu='+document.getElementById("IdUsu").value;
}