<?php


function getListaIn(){
	$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
	$ID=$_POST['ID'];
	$resultado_ruta=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID'");
    while($consulta=mysqli_fetch_array($resultado_ruta)){
     $Matricula_integrante=$consulta['Matriculalider']; 
     
         }
	$resultado2=mysqli_query($Conexion,"SELECT * FROM integrantes  WHERE Matriculalider='$Matricula_integrante'");
	
	$integrantes='';
	
	while($row2=mysqli_fetch_array($resultado2)){
		$integrantes .=
		    "<input type=checkbox  readonly='readonly' onclick='javascript: return false;' checked name=integrante[] value='$row2[Alumno]'><label style='font-size: 12px;'>$row2[Alumno]<strong>-$row2[Grupo] </strong> 
            <input maxlength=3 style='width:10%; font-family: calibri'  type=text name=cuadro_cal[] value='0' >

		    </label> <br> 
		  ";
       
		}


	return $integrantes;
}

echo "<script type=text/javascript>
	$(document).ready(function(){
$(':checkbox[readonly=readonly]').click(function(){
return false;        
});
});
</script>";




echo getListaIn();

?>