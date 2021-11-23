<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">

<?php

$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");

$matricula2="";
$Nombre2="";
$Grupo2="";
$Gen="";


if (isset($_POST['Cargar_Datos'])) {
if (strlen($_POST['Matricula2'])>=1){
$matricula2=trim($_POST['Matricula2']);
$resultado=mysqli_query($Conexion,"SELECT * FROM alumnos WHERE  Ncontrol='$matricula2'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre2=$consulta['Nombre'];
  $Grupo2=$consulta['Grupo'];
  $Gen=$consulta['generacion'];
  
}




}
else{
  echo '<script>';
          echo 'alert("Ingrese la matricula del integrante");';
          echo 'window.location.href="Registro_Integrante.php";';
echo '</script>';
}

}




if (isset($_POST['Registrarse_Integrante'])) {


if (strlen($_POST['Nombre'])>=1 && 
strlen($_POST['Grupo1'])>=1 && 
strlen($_POST['Contraseña'])>=1 && 
strlen($_POST['Matricula2'])>=1 &&
strlen($_POST['Generacion'])>=1 ){ 

$nombre=trim($_POST['Nombre']);
$grupo=trim($_POST['Grupo1']);
$contraseña=trim($_POST['Contraseña']);
$matricula=trim($_POST['Matricula2']); 
$gen=trim($_POST['Generacion']); 

$Consulta="SELECT * FROM tacceso_integrantes WHERE 
          Nombre='$nombre' and Matricula='$matricula'";
          $resultado=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado); 

          if($filas>0){
echo '<script>';
          echo 'alert("!ups parece que alguien ya se ha registrado el integrante");';
          echo 'window.location.href="Registro_Integrante.php";';
echo '</script>';
        }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
  else{
$Consulta2="INSERT INTO tacceso_integrantes(Nombre,Correo,Grupo,Contraseña,Matricula,Estatus,Generación) 
VALUES('$nombre','$matricula@upq.edu.mx','$grupo','$contraseña','$matricula','NA','$gen')";
 $resultado2=mysqli_query($Conexion,$Consulta2);

 
if($resultado2){
echo '<script>';
echo 'alert("Registro exitoso");';
echo 'window.location.href="Inicio.html";';
echo '</script>';
 }  
else {
echo "Ha ocurrido un error";
}     
  }








}
else {
 
echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Registro_Integrante.php";';
echo '</script>';


}


}

?>
























<style >

.centrar{
	display: flex;
	justify-content: center;
}

.Texto_formulario{
	width: 500px;
	height: 500px;
	border-radius: 25px;
}
.formulario{
	background-color: white;
    height: 800px;
	width:400px;
	
	opacity: 0.7;
	border-radius: 25px;  
}

.cabezera{
width:auto;
height:100px;
background-color:#ffffff;
border-top-right-radius: 25px;
border-top-left-radius: 25px;
}

.Logo{
width:100px;
height:100px;
background-color:#ffffff; 
}

.form_cudrados{

border-top-width:0 ;
border-left-width:0; 
border-right-width:0;
border-bottom-color:#d9d9d9; 
align-items: center;    
}

.centrar_form{
width:auto;
height:150px;
background-color:#000000;
}

.centrar_datos{
	height:100px;
	width: 160px; 
	
}

.boton_ingresar{
	height:40px;
	width: 160px;
	border-radius:10px; 
	border-right: 0;
	border-bottom: 0;
	background-color:#99ccff;
	color:black;   

}

.boton_registratse{
	height:20px;
	width: 160px;
	border-radius:5px; 
	border-right: 0;
	border-bottom: 0;
	background-color:white;
	color:black;   

}









































</style>
</head>




<body style="background-image: url(Imagenes/Fondo.jpg);">

<br></br><br></br>
<div class="centrar">
	<div class="formulario">
		<div class="cabezera">
		<div class="centrar">
		<div class="Logo">
		<img src="Imagenes/Logo_mecatronica.png" height="100px" width="100px">
		</div>	

       

		</div>	
		 <h4 style="color:black;font-family:verdana;" align="center">Registro</h4>
		 <h6 style="color:black;font-family:verdana;" align="center">Ingrese la matricula y haga clic en cargas datos</h6>
		 <div class="centrar">
         <div class="centrar_datos">
		 

		   <form  method="post" action="Registro_Integrante.php" >
		     
		     <p style="font-family:"Times new roman " align="center">Matricula</p>
              <input style="color:black;text-align: center;" class="form_cudrados" type="text"  
              value="<?php  echo $matricula2; ?>" name="Matricula2" size="25" maxlength="9"> <br></br>


		      <p style= "color:black;font-family:"Times new roman" align="center">Nombre</p>
              <input style="color:black" class="form_cudrados" type="text" name="Nombre" 
              value="<?php  echo $Nombre2; ?>" size="25"><br>
         

             

              <p style="font-family:"Times new roman " align="center">Grupo</p>
             <center><input style="color:black ;text-align: center; align-items:center;" class="form_cudrados" type="text"  name="Grupo1" size="3" maxlength="3" value="<?php  echo $Grupo2; ?>"> </center><br>

             <p style="font-family:"Times new roman " align="center">Generacion</p>
             <center><input style="color:black ;text-align: center; align-items:center;" class="form_cudrados" type="text"  name="Generacion" size="3" maxlength="3" value="<?php  echo $Gen; ?>"> </center><br></br>
             
             <p style="font-family:"Times new roman " align="center">Contraseña</p>
             <input style="color:black;text-align:center;" class="form_cudrados" type="Password" name="Contraseña" size="25"> <br></br>

              

                  
              <br></br>
             <input class="boton_ingresar"type="submit"value="Registrarse"name="Registrarse_Integrante">
             <br></br>
             <input class="boton_ingresar"type="submit"value="Cargar datos"name="Cargar_Datos">
         

              </form>
         
         
         
         
         </div>
         </div>
         </div>


		</div>
	</div>

</div>




</body>
</html>
