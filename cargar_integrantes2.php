<?php


function getListaIn(){
	$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
	$ID=$_POST['ID'];
	$resultado_ruta=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID'");
    while($consulta=mysqli_fetch_array($resultado_ruta)){
     $Matricula_integrante=$consulta['Matriculalider']; 
     $Grupo=$consulta['Grupo']; 
     $Maestro=$consulta['Profesor'];
     $Entregable=$consulta['Entregable'];
     $Materia=$consulta['Materia'];
     }
     $integrantes='';
     if($Entregable=="Entregable1"){  
	$resultado2=mysqli_query($Conexion,"SELECT Nombre,Grupo,Cal1 FROM carga  WHERE Matriculalider='$Matricula_integrante' and Materia='$Materia' and Grupo='$Grupo' and Profesor='$Maestro'");
	
	
	while($row2=mysqli_fetch_array($resultado2)){
		$integrantes .=
		    "<input type=checkbox readonly='readonly' checked name=integrante[] value='$row2[Nombre]'><label style='font-size: 12px;'>$row2[Nombre]<strong>-$row2[Grupo] </strong>
            <input maxlength=3 style='width:10%; font-family: calibri'  type=text name=cuadro_cal[] value=$row2[Cal1] >

		    </label> <br> 
		  ";
       
		}

}









 if($Entregable=="Entregable2"){  
	$resultado2=mysqli_query($Conexion,"SELECT Nombre,Grupo,Cal2 FROM carga  WHERE Matriculalider='$Matricula_integrante' and Materia='$Materia' and Grupo='$Grupo' and Profesor='$Maestro'");
	
	
	
	while($row2=mysqli_fetch_array($resultado2)){
		$integrantes .=
		    "<input type=checkbox readonly='readonly' checked name=integrante[] value='$row2[Nombre]'><label style='font-size: 12px;'>$row2[Nombre]<strong>-$row2[Grupo] </strong>
            <input maxlength=3 style='width:10%; font-family: calibri'  type=text name=cuadro_cal[] value=$row2[Cal2] >

		    </label> <br> 
		  ";
       
		}
}





if($Entregable=="Reporte"){  
	$resultado2=mysqli_query($Conexion,"SELECT Nombre,Grupo,F1 FROM carga  WHERE Matriculalider='$Matricula_integrante' and Materia='$Materia' and Grupo='$Grupo' and Profesor='$Maestro'");
	
	
	
	while($row2=mysqli_fetch_array($resultado2)){
		$integrantes .=
		    "<input type=checkbox readonly='readonly' checked name=integrante[] value='$row2[Nombre]'><label style='font-size: 12px;'>$row2[Nombre]<strong>-$row2[Grupo] </strong>
            <input maxlength=3 style='width:10%; font-family: calibri'  type=text name=cuadro_cal[] value=$row2[F1] >

		    </label> <br> 
		  ";
       
		}

}













if($Entregable=="Video"){  
	$resultado2=mysqli_query($Conexion,"SELECT Nombre,Grupo,F2 FROM carga  WHERE Matriculalider='$Matricula_integrante' and Materia='$Materia' and Grupo='$Grupo' and Profesor='$Maestro'");
	
	
	
	while($row2=mysqli_fetch_array($resultado2)){
		$integrantes .=
		    "<input type=checkbox readonly='readonly' checked name=integrante[] value='$row2[Nombre]'><label style='font-size: 12px;'>$row2[Nombre]<strong>-$row2[Grupo] </strong>
            <input maxlength=3 style='width:10%; font-family: calibri'  type=text name=cuadro_cal[] value=$row2[F2] >

		    </label> <br> 
		  ";
       
		}

}






if($Entregable=="Poster"){  
	$resultado2=mysqli_query($Conexion,"SELECT Nombre,Grupo,F3 FROM carga  WHERE Matriculalider='$Matricula_integrante' and Materia='$Materia' and Grupo='$Grupo' and Profesor='$Maestro'");
	
	
	
	while($row2=mysqli_fetch_array($resultado2)){
		$integrantes .=
		    "<input type=checkbox readonly='readonly' checked name=integrante[] value='$row2[Nombre]'><label style='font-size: 12px;'>$row2[Nombre]<strong>-$row2[Grupo] </strong>
            <input maxlength=3 style='width:10%; font-family: calibri'  type=text name=cuadro_cal[] value=$row2[F3] >

		    </label> <br> 
		  ";
       
		}

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