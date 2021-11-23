<?php


function getListaPro(){
	$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
	$Entregable=$_POST['Entregable'];
	$Materia=$_POST['Materia'];
	$Grupo=$_POST['Grupo'];
	$resultado=mysqli_query($Conexion,"SELECT * FROM entregables WHERE Entregable='$Entregable' and Materia='$Materia' and Estatus='Calificada' and Grupo='$Grupo'");
	$listas='<option value="0">Elige un equipo </option>';
	while($row=mysqli_fetch_array($resultado)){
		$listas .="<option  value='$row[ID]'>$row[Proyecto]-$row[ID_Proyecto]</option>";
	}
	return $listas;
}

echo getListaPro();

?>