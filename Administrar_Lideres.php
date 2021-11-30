<?php 
session_start();
if(($_SESSION['Correo1'])!=""){
/*Consulta de datos de la base de la tabla para colocar en tabla de informacion del alumno*/
$Usuario=$_SESSION['Correo1'];
$id= $_GET['idl'];
//$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");
$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE  Usuario='$Usuario'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $pro="SELECT * FROM tacceso_lider where ID = '$id'";
  $lid=mysqli_query($Conexion,"SELECT Matricula FROM tacceso_lider where ID = '$id'");
  while($consulta2=mysqli_fetch_array($lid)){
    $int="SELECT * FROM tacceso_integrantes where Matriculalider='$consulta2[Matricula]' and Estatus = 'A'";
  }  
}

/*Consulta de datos de la base de la tabla para colocar en tabla de informacion del integrante*/
$matricula2="";
$Nombre2="";
$Grupo2="";
$Tutor="";
$Gen="";

if (isset($_POST['Cargar_Datos'])) {
if (strlen($_POST['Matricula2'])>=1){
$matricula2=trim($_POST['Matricula2']);
$resultado=mysqli_query($Conexion,"SELECT * FROM alumnos WHERE  Ncontrol='$matricula2'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre2=$consulta['Nombre'];
  $Grupo2=$consulta['Grupo'];
  $Tutor=$Nombre;
  $Gen=$consulta['generacion'];
}


}
else{
  echo '<script>';
          echo 'alert("Ingrese la matricula del integrante");';
          echo 'window.location.href="Registrar_lider.php";';
echo '</script>';
}

}

if (isset($_POST['Registrarse_Integrante_Lider'])) {


if (strlen($_POST['Nombre'])>=1 && 
strlen($_POST['Grupo1'])>=1 && 
strlen($_POST['Tutor'])>=1 && 
strlen($_POST['Contraseña'])>=1 && 
strlen($_POST['Matricula2'])>=1 &&
strlen($_POST['Generacion'])>=1 ){ 

$nombre=trim($_POST['Nombre']);
$grupo=trim($_POST['Grupo1']);
$contraseña=trim($_POST['Contraseña']);
$matricula=trim($_POST['Matricula2']);
$tutor=trim($_POST['Tutor']);
$gen=trim($_POST['Generacion']); 

$Consulta="SELECT * FROM tacceso_lider WHERE 
          Nombre='$nombre' and Matricula='$matricula'";
          $resultado=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado); 

          if($filas>0){
echo '<script>';
          echo 'alert("!ups parece que alguien ya se ha registrado el lider");';
          echo 'window.location.href="Registrar_lider.php";';
echo '</script>';
        }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
  else{
 
$Consulta2="INSERT INTO tacceso_lider(Nombre,Correo,Grupo,Contraseña,Matricula,Tutor,Estatus,Generación) 
VALUES('$nombre','$matricula@upq.edu.mx','$grupo','$contraseña','$matricula','$tutor','No validado','$gen')";
 $resultado2=mysqli_query($Conexion,$Consulta2);

$Consulta3="INSERT INTO integrantes(Alumno,Correo,Grupo,Matricula,Matriculalider) 
VALUES('$nombre','$matricula@upq.edu.mx','$grupo','$matricula','$matricula')";
 $resultado_2=mysqli_query($Conexion,$Consulta3);

if($resultado2 && $resultado_2){
echo '<script>';
echo 'alert("Registro exitoso");';
 echo 'window.location.href="Registrar_lider.php";';
echo '</script>';
 }  
    
}








}
else {
 
echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Registrar_Lider.php";';
echo '</script>';


}
}




?>






<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio lider</title>

<style>
	
	                  /* CODIGO DISEÑO DEL ENCABEZADO DE LA PAGINA */ 
.Contenedor_Encabezado{
	background-color:white; 
	height:120px;
}

.Imagen_upq{
	background-color:white;
	height: 120px;
	width: 120px;
	float: left;
}

.Titulo_Contendor{
	background-color:white;
	height: 120px;
	width: 500px;
	float: left;
}

.Titulo_Titulo{
	background-color:white;
	height: 20px;
	width: 500px;
}



.Contenedor_Principal{
	background-color:white;
	height:720px; 
}


                              /* CODIGO DE SEPARACIONES PARA EL CUADRO DE DATOS FOTO Y TABLA */ 
.Contenedor_Principal_Datos{
background-color:white;
border:grey 0.2px solid;
height:720px; 
width:18%;
float:left;
}
                                                        
.FotoPerfil{
background-color:white; 
height:110px;
text-align: center;
border-left:grey 0.2px solid;
border-top:grey 0.2px solid;

padding-bottom: 0px;
padding-top: 10px;
}

.Foto{
display: flex;
justify-content: center;
background-color:white;
height:100px;
width: 100px;

margin:0px auto;

}

.DatosAlumno{
background-color:white; 
height:598px;
border:grey 0.2px solid;

}	

table.Tabla th{
	background-color: #f6f6f6;
    text-align: right;
    width: 140px;
    color: #666;
    font-weight: bolder;
    border-bottom: 0.2px solid #e9e9e9;
    border-right: 0.2px solid #e9e9e9;
    font-size:11px;
    padding:5px;
    font-family:calibri;
}
table.Tabla td{
	font-size:10px;
    padding:2px;
    font-weight: normal;
    font-family:arial;
}



                                              /*CUADRO DE OPCIONES DE LA PAGINA*/
.Contenedor_Encabezado2{
	background-color:#d9d9d9; 
	height:720px;
	border:grey 0.2px solid;
	float: left;
	width: 81.1%;
}

                                           /*ESTILO DE LA BARRA DE OPCIONES*/
#header {
width:800px;
font-family:Calibri;
}
			
ul, ol {
list-style:none;
}
			
.nav > li {
float:left;
}
			
.nav li a {
background-color:#f6f6f6;
color: #666;
text-decoration:none;
padding:1px 12px;
border-radius: 4px;
border:#e9e9e9 0.2px solid  ; 
display:block;
}

.nav li a:hover {
background-color:#ffffff;

}			                              /*TERMINA ESTILO DE LA BARRA DE OPCIONES*/
		
.Contenedor_Secciones{
	background-color:#d9d9d9;
	height:40px;
	justify-content: center;
	border-right:grey 0.2px solid;
	border-left:grey 0.2px solid;
	border-top:grey 0.2px solid;
}

.Contenedor_Secentrar{
display: flex;
justify-content: center;
background-color:#d9d9d9;
height:30px;
width: 650px;
margin:0px auto;
border-top:grey 0.2px solid;
}			
		                                /*BOTON TERMINAR SESION*/
.boton_sesion{
	height:20px;
	width: 160px;
	border-right: 0;
	border-bottom-color: black 0.2px;
	background-color:white;
	color:black;   
}

                                        /*BOTON TERMINAR SESION*/

.Cuadro_Registrar{
	display: flex;
	background-color:#d9d9d9;
	height: 600px;
	border-right:grey 0.2px solid;
	justify-content: center;
	padding-top:2px; 
	

}

.Cuadro_Registrar2{
	background-color:white;
	height:600px;
	width:98%;
}

.agregar_datos:hover{
  background-color:#ffffb3;
  border:black 0.2px solid;
}

.BotonSubir{
  border-radius: 5px;
}


</style>


</head>
<body>

<div class="Contenedor_Encabezado">
<div class="Imagen_upq">
<img src="Imagenes/Logo_mecatronica.png" height="80px" width="85px">
</div>
<div class="Titulo_Contendor">
<div class="Titulo_Titulo">
<P style="font-family:arial narrow;font-size:15px;">MODULO DE SEGUIMIENTO DE PROYECTO INTEGRADOR</P> 
</div>
<div class="Titulo_Titulo">
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL PROFESOR-Tutor</P>
</div>
</div>
<br>
<input onclick="location.href='Cerrar_sesion.php'" class="boton_sesion" style="float: right;" type="submit" name="Cerrar" value="Cerrar sesion"> 
</div>

<div class="Contenedor_Principal">
<div class="Contenedor_Principal_Datos">
	                           <!--CODIGO PARA COLOCAR FOTO DE PERFIL-->
<div class="FotoPerfil">	

<div class="Foto">             <!-- TERMINA CODIGO PARA COLOCAR FOTO DE PERFIL-->
	<img src="Imagenes/Yo.jpg" height="100px" width="100px">
</div>	
</div>
                                   <!--CODIGO PARA COLOCAR TABLA DE DATOS-->
<div class="DatosAlumno">
<table class="Tabla">
  <tr>
    <th>Nombre</th>
    <td><?php  echo $Nombre; ?></th>
  </tr>
  

  <tr>
    <th>Tipo de usuario</th>
    <td>Tutor</th>
  </tr>


</table>
</div>
</div>	                  <!-- TERMINA CODIGO PARA COLOCAR TABLA DE DATOS-->


                              <!--CODIGO PARA COLOCAR LA OPCIONES-->
<div class="Contenedor_Encabezado2">

<div class="Contenedor_Secciones">
<div class="Contenedor_Secentrar">
	<div id="header">
	<ul class="nav">
    
		<li><a href="Pagina_Principal_Profesor_Tutor.php">Pagina Principal</a></li>
    <li><a href="Asignacion_Profesor_Tutor.php">Asignación</a></li>
    <li><a href="Proyecto_Integrador_Profesor.php">Proyecto Integrador</a></li>
    <li><a href="Entregables_Profesor_Tutor_dos.php">Entregables</a></li>
    <li><a href="Registrar_lider.php">Registrar lider</a></li>
    
		
	</ul>	
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

<p style="color:black;text-align:center; font-family:Calibri;">REGISTRO DE INTEGRANTES</p>

<div class="Cuadro_Registrar">

<div class="Cuadro_Registrar2">
<h5 style="font-family: calibri;">Lider del proyecto</h5> 
  <form method="post" action="Administrar_Usuarios.php">
    <table class="Tabla">
    <tr>
    <th style="text-align: center;">ID</th>  
    <th style="text-align: center;">Nombre de proyecto</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Lider</th>
    <th style="text-align: center;">Matricula</th>
    </tr>

    <?php 


    
    $resultado2=mysqli_query($Conexion,$pro);
    while ($row=mysqli_fetch_assoc($resultado2)) { ?>

    <tr> 
      <td> <?php echo $row["ID"];?></td>  
      <td> <?php echo $row["Nombre_Proyecto"];?></td>
      <td> <?php echo $row["Nombre"];?> </td>
      <td> <?php echo $row["Matricula"];?> </td>
    </tr>
    <?php } ?> 

    </table> 
    
    </form>

    <h5 style="font-family: calibri;">Integrantes</h5> 
  <form method="post" action="Administrar_Usuarios.php">
    <table class="Tabla">
    <tr>
    <th style="text-align: center;">ID</th>           <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Lider</th>
    <th style="text-align: center;">Matricula</th>
    <th style="text-align: center;"></th>
    </tr>

    <?php 


    
    $resultado2=mysqli_query($Conexion,$int);
    while ($row=mysqli_fetch_assoc($resultado2)) { ?>

    <tr> 
      <td> <?php echo $row["ID"];?></td>  
      <td> <?php echo $row["Nombre"];?> </td>
      <td> <?php echo $row["Matricula"];?> </td>
      <td> <a href="Cambio_Lider.php?idi=<?php echo $row["ID"];?>">Cambiar a lider</a></td>
    </tr>
    <?php } ?> 

    </table> 
    
    </form>
</div>

</div>


</div>                   



</div>







</body>
</html>

<?php  
}
else{
  header("location:Inicio.html");
}
?>