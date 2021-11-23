<?php
$Conexion=mysqli_connect("localhost","root","","registropi");

function getListaPro(){
	
	$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider ");
	$listas='Elige una opcion';
	while($row=mysqli_fetch_array($resultado)){
		$listas =$row['Proyecto'];
	}
	return $listas;
}

echo getListaPro();

?>