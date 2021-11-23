<?php 
session_start();

if(($_SESSION['Correo1'])!=""){
$Correo=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE  Usuario='$Correo'");



while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];  
}




/////////////////////////////////////Cargar informacion en los ComboBox///////////////////////////////////
$Datos="";

$resultado3=mysqli_query($Conexion,"SELECT * FROM Contenido");


///Cargar las materias,grupos y profesores en las opciones
if (isset($_POST['Cargar'])) {
if (strlen($_POST['Grupo1'])>=1){ 
$Grupo1=trim($_POST['Grupo1']);
          
//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
if ($Grupo1) {
	
  $Datos2="SELECT * FROM tacceso_lider WHERE Grupo='$Grupo1'and Estatus='No validado' and Tutor='$Nombre'";
  ///////CARGAR INFORMACION DE LOS PROYECTOS EN LA VENTANA DE VALIDAR///////////////
  $resultado4=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE Grupo='$Grupo1' and Estatus='No validado'");
}

} ///Corchete para verificar if de campos

else{
	
 echo '<script>';
          echo 'alert("Seleccione un grupo");';
          echo 'window.location.href="Proyecto_Integrador_Profesor.php";';
echo '</script>';
}

}   ///Verificar si se presiono el boton


////////////////VALIDAR LOS PROYECTO QUE AUN NO SE HAN VALIDADO//////////////////////////

if (isset($_POST['ValidadP'])) {
if (strlen($_POST['Validar_P'])>=1){ 
$ValidarP=trim($_POST['Validar_P']);
 $Estatus_validar=mysqli_query($Conexion,"UPDATE tacceso_lider SET 
Estatus='Validado' , Comentarios='No tienes comentarios' WHERE Matricula='$ValidarP'");

if ($Estatus_validar) {
echo '<script>';
          echo 'alert("Validacion exitosa");';
          echo 'window.location.href="Proyecto_Integrador_Profesor.php";';
echo '</script>';
}
}
else{
echo '<script>';
          echo 'alert("Seleccione un proyecto");';
          echo 'window.location.href="Proyecto_Integrador_Profesor.php";';
echo '</script>'; 
}
}


if (isset($_POST['EnviarC'])) {
if (strlen($_POST['ComentariosP'])>=1 && isset($_POST['Validar_P'])){ 
$Comentario_tutor=trim($_POST['ComentariosP']);
$MLider=trim($_POST['Validar_P']);
$Estatus_comentario=mysqli_query($Conexion,"UPDATE tacceso_lider SET 
Comentarios='$Comentario_tutor' WHERE Matricula='$MLider'");

if ($Estatus_comentario) {
echo '<script>';
          echo 'alert("Comentario enviado");';
          echo 'window.location.href="Proyecto_Integrador_Profesor.php";';
echo '</script>';
}
}
else{
echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Proyecto_Integrador_Profesor.php";';
echo '</script>'; 
}
}


























//////////////////////////Cargar los datos de proyecto segun su grupo/////////////////////////////////////















?>




















































<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio Docente</title>

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
width:650px;
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
width: 800px;
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

                                        /*BOTON TERMINAR SESION */

.Cuadro_Principal{
	display: flex;
	background-color:#d9d9d9;
	height:auto;
	border-right:grey 0.2px solid;
	justify-content: center;
	padding-top:2px; 
	

}

.Cuadro_Principal2{
	background-color:white;
	height:auto;
	width:98%;
	
}


.Cuadro_Materias{
  display: flex;
  background-color:#d9d9d9;
  height:400px;
  border-right:grey 0.2px solid;
  justify-content: center;
  padding-top:2px; 

}
.Cuadro_Materias2{
  background-color:white;
  height:auto;
  width:98%;
}




.cerrar{
  top: 2px;
  right: 5px;
  position: absolute;
}

.ventana_datos{
  background-color:white;
  width: 30%;
  height:260px;
  color: black;
  font-family: calibri;
  font-size: 18px;
  padding: 33px;
  
  border-radius:5px;
  position: absolute;
  top:45%;
  right:30%;
  display: none;
  border:black 0.2px solid;
}


.agregar_datos:hover{
  background-color:#ffffb3;
  border:black 0.2px solid;
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
    <td><?php  echo $Nombre;?></th>
  </tr>

  <tr>
    <th>Tipo de usuario</th>
    <td>Tutor </th>
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

































<p style="color:black;text-align:center; font-family:Calibri;">PROYECTO INTEGRADOR</p>
<div class="Cuadro_Principal">
<div class="Cuadro_Principal2">


<form  action="Proyecto_Integrador_Profesor.php" method="post">
<table class="Tabla">
  <h6 style="font-family: calibri;">*Seleccionar el grupo tutorado</h6> 
<tr>
   <th style="text-align: center;">Grupo</th>          <!--Codigo de los titulos de columnas-->
</tr>
  
  
<tr>  <!--Codigo de cada uno de las filas-->
                         
   <td style="text-align: center;">
          <select class="Botones" name="Grupo1">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($datos=mysqli_fetch_array($resultado3)) {
          ?>

          <option value="<?php echo $datos['Grupo']; ?>"> <?php echo $datos['Grupo']; ?></option>

          <?php 
          }
          ?>
          </select>
    </td>

   

    
 </tr>   
<!-- 
 <?php $resultado2=mysqli_query($Conexion,$materias);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<td> <?php echo $row["Materias"];?> </td>

<?php } ?>   

<script language="JavaScript">
var estado;
function uncheckRadio(rbutton){
if(rbutton.checked==true && estado==true){rbutton.checked=false;}
estado=rbutton.checked;
}
</script>
-->

</table>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Cargar" value="Cargar"  >
</form>
</div>
</div>






















<div class="Cuadro_Materias">
<div class="Cuadro_Materias2 " style="overflow:scroll; ">
<h5 style="font-family: calibri;">Información de proyectos</h5> 
<h6 style="font-family: calibri;">*Solo se muestran los proyecto que aun no estan validados</h6> 
<form method="post" action="Proyecto_Integrador_Profesor.php">
<table class="Tabla">
<tr>
    <th style="text-align: center;">Lider</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Nombre del proyecto</th>
    <th style="text-align: center;">Objetivo</th>
    <th style="text-align: center;">Objetivo cuatrimestral</th>
    <th style="text-align: center;">Tipo de industria</th>
    <th style="text-align: center;">Comentarios</th>
  </tr>


<?php
if (isset($_POST['Cargar'])) {
$resultado2=mysqli_query($Conexion,$Datos2);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr> 
<td> <?php echo $row["Nombre"];?></td>
<td> <?php echo $row["Nombre_Proyecto"];?> </td>
<td> <?php echo $row["Objetivo"];?> </td>
<td> <?php echo $row["Objetivo_cuatrimestral"];?> </td>
<td> <?php echo $row["Tipo_industria"];?> </td>
<td> <?php echo $row["Comentarios"];?> </td>

</tr>
<?php }}
 
 ?> 


</table> 

</form> 
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Finalizar" onclick="abrir()" value="Validar">




</div> 
</div>

































































































</div>                   
</div>













<div class="ventana_datos" id="vent" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Validar proyecto ó  enviar comentarios</h5>  

    <form  method="post" action="Proyecto_Integrador_Profesor.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Nombre de proyecto</strong></label>
    <select class="Botones" name="Validar_P">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($Datos=mysqli_fetch_array($resultado4)) {
          ?>

          <option value="<?php echo $Datos['Matricula']; ?>"> <?php echo $Datos['Nombre_Proyecto'],"-", $Datos['Nombre'];  ?></option>

          <?php 
          }
          ?>
          </select>
    <br> </br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Comentarios</strong></label>
    <br>
    <textarea class="agregar_datos" style="width:80%; height:100px;font-family:calibri"  name="ComentariosP"></textarea>
    <br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="ValidadP" value="Validar"> 
    <input  style="border-radius:3px; font-family:Calibri; width: 115px; background-color:#f6f6f6 "  type="submit" name="EnviarC" value="Enviar comentario"> 
    </form>
</div>
<script>
  function abrir(){
    document.getElementById("vent").style.display="block";
  }

  function cerrar(){
    document.getElementById("vent").style.display="none";
  }
</script>




































</body>
</html>
<?php  
}
else{
	header("location:Inicio.html");
}
?>