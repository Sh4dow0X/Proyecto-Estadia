<?php  
session_start();

if(($_SESSION['Correo1'])!=""){
$Correo=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");
/*$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");*/
$resultado=mysqli_query($Conexion,"SELECT * FROM maestros WHERE  Usuario='$Correo'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];  
}





//////////////////////TRAER LAS MATERIAS DEL PROFESOR DE LA BASE DE DATOS////////////////////
$materias="SELECT* FROM carga_profesor WHERE Nombre='$Nombre' and Estatus=' '"; 
$materias_asignadas="SELECT* FROM carga_profesor WHERE Nombre='$Nombre'  and Estatus='Asignada'"; 

$materias_asignadas2=mysqli_query($Conexion,"SELECT * FROM carga_profesor
 WHERE Nombre='$Nombre'  and Estatus='Asignada'");

$materias_asignadas3=mysqli_query($Conexion,"SELECT * FROM carga_profesor
 WHERE Nombre='$Nombre'  and Estatus='Asignada'");

$resultado_materias=mysqli_query($Conexion,"SELECT * FROM carga_profesor
 WHERE Nombre='$Nombre'  and Estatus=''");



///////////////////////////////VALIDAR EL BOTON AGREGAR DE VENTANA ASIGNAR////////////////////////////
if (isset($_POST['Asignar_materia'])) {

if (strlen($_POST['Materia'])>=1 &&
strlen($_POST['P1'])>=1 &&
strlen($_POST['P2'])>=1 &&
strlen($_POST['P2'])>=1){
$ID_materia=trim($_POST['Materia']);
$P1=trim($_POST['P1']);
$P2=trim($_POST['P2']);
$P3=trim($_POST['P3']);

$resultado_grupo=mysqli_query($Conexion,"SELECT * FROM carga_profesor 
	WHERE  Nombre='$Nombre'  and ID='$ID_materia'");

while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];  
}


$agregar_materia=mysqli_query($Conexion,"UPDATE carga_profesor 
SET Estatus='Asignada', P1='$P1' , P2='$P2',P3='$P3' 
WHERE Nombre='$Nombre'  and ID='$ID_materia'");

         if($agregar_materia){
          echo '<script>';
          echo 'alert("Materia asignada exitosamente");';
          echo 'window.location.href="Asignacion_Profesor_Notutor.php";';
          echo '</script>';
          }  


}//llave que verifica los campos
else{
echo '<script>';
          echo 'alert("Seleccione una materia o llene todos los campos");';
          echo 'window.location.href="Asignacion_Profesor_Notutor.php";';
echo '</script>';
} //llave de else que manda mensaje de seleccionar una materia
}//llave que verifica si se presiono el boton agregar



if (isset($_POST['Actualizar_materia'])) {

if (strlen($_POST['Materia_actualizar'])>=1 &&
strlen($_POST['P1'])>=1 &&
strlen($_POST['P2'])>=1 &&
strlen($_POST['P2'])>=1){
$ID_materia=trim($_POST['Materia_actualizar']);
$P1=trim($_POST['P1']);
$P2=trim($_POST['P2']);
$P3=trim($_POST['P3']);

$resultado_grupo=mysqli_query($Conexion,"SELECT * FROM carga_profesor 
	WHERE  Nombre='$Nombre'  and ID='$ID_materia'");

while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];  
}


$agregar_materia=mysqli_query($Conexion,"UPDATE carga_profesor 
SET  P1='$P1' , P2='$P2',P3='$P3' 
WHERE Nombre='$Nombre'  and ID='$ID_materia'");

         if($agregar_materia){
          echo '<script>';
          echo 'alert("Materia actualizada exitosamente");';
          echo 'window.location.href="Asignacion_Profesor_Notutor.php";';
          echo '</script>';
          }  


}//llave que verifica los campos
else{
echo '<script>';
          echo 'alert("Seleccione una materia o llene los campos");';
          echo 'window.location.href="Asignacion_Profesor_Notutor.php";';
echo '</script>';
} //llave de else que manda mensaje de seleccionar una materia
}//llave que verifica si se presiono el boton agregar









if (isset($_POST['Eliminar_materia'])) {

if (strlen($_POST['Materia_eliminar'])>=1){
$ID_materia=trim($_POST['Materia_eliminar']);


$resultado_grupo=mysqli_query($Conexion,"SELECT * FROM carga_profesor 
	WHERE  Correo='$Correo' and ID='$ID_materia'");

while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];  
}


$agregar_materia=mysqli_query($Conexion,"UPDATE carga_profesor 
SET Estatus='' ,P1='' , P2='',P3='' 
WHERE Nombre='$Nombre' and Correo='$Correo' and ID='$ID_materia'");

         if($agregar_materia){
          echo '<script>';
          echo 'alert("Materia eliminada exitosamente");';
          echo 'window.location.href="Asignacion_Profesor_Notutor.php";';
          echo '</script>';
          }  


}//llave que verifica los campos
else{
echo '<script>';
          echo 'alert("Seleccione una materia o llene los campos");';
          echo 'window.location.href="Asignacion_Profesor_Notutor.php";';
echo '</script>';
} //llave de else que manda mensaje de seleccionar una materia
}//llave que verifica si se presiono el boton agregar


















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
width:650px;
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

.Cuadro_Principal{
	display:inline-table;
	background-color:#d9d9d9;
	height:600px;
	border-right:grey 0.2px solid;
	justify-content: center;
	padding-top:2px; 
	width:99.9%; 
	

}

.Cuadro_Principal2{
	position: absolute;
	background-color:white;
	height:400px;
	width:40%;
	right:41%;
}

.Cuadro_Principal11{

	position: absolute;
	background-color:white;
	height:400px;
	border-right:grey 0.2px solid;
	justify-content: center;
	padding-top:2px; 
	width:38%;
	right:2%; 
	

}




.cerrar{
  top: 2px;
  right: 5px;
  position: absolute;
}



.ventana_datos{
  background-color:white;
  width:300px;
  height:300px;
  color: black;
  font-family: calibri;
  font-size: 18px;
  padding:33px;
  
  border-radius:5px;
  position: absolute;
  top:37%;
  right:40%;
  display: none;
  border:black 0.2px solid;
}


.agregar_datos:hover{
  background-color:#ffffb3;
  border:black 0.2px solid;
}





.ventana_datos2{
  background-color:white;
  width:20%;
  height: 300px;
  color: black;
  font-family: calibri;
  font-size: 18px;
  padding: 33px;
  
  border-radius:5px;
  position: absolute;
  top:37%;
  right:40%;
  display: none;
  border:black 0.2px solid;
}

.ventana_datos3{
  background-color:white;
  width:20%;
  height: 110px;
  color: black;
  font-family: calibri;
  font-size: 18px;
  padding: 33px;
  
  border-radius:5px;
  position: absolute;
  top:37%;
  right:35%;
  display: none;
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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL PROFESOR</P>
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
    <td> Docente </th>
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
		<li><a href="Pagina_Principal_Maestro.php">Pagina Principal</a></li>
    <li><a href="Asignacion_Profesor_Notutor.php">Asignación</a></li>
    <li><a href="Entregables_Profesor_Notutor_dos.php">Entregables</a></li>
   

		
	</ul>	
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

<p style="color:black;text-align:center; font-family:Calibri;">ASIGNACIÓN DE MATERIAS</p>

<div class="Cuadro_Principal">  <!--div de tabla de grupos-->
<div class="Cuadro_Principal2" style="overflow:scroll; ">
<label style="font-family: calibri;font-size: 13px;"> <strong>Materias no asignadas</strong></label>
<form method="post" action="Asignacion_Profesor_Notutor.php">
<table class="Tabla">
<tr>
    <th style="text-align: center;">Materia</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">Profesor</th>
    <th style="text-align: center;"></th>
  </tr>


<?php 

$resultado2=mysqli_query($Conexion,$materias);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr> 
<td> <?php echo $row["Materia"];?></td>
<td> <?php echo $row["Grupo"];?> </td>
<td> <?php echo $row["Nombre"];?> </td>
</tr>
<?php } ?> 

</table> 
</form> 

<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" onclick="abrir()"  value="Asignar"  >





</div>   <!--div de cuadro principal 2 -->

<!--Ventana para Cargar la Materia a alumnos -->
<div class="ventana_datos" id="vent" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Asignar materia</h5>  
    
    <form  method="post" action="Asignacion_Profesor_Notutor.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Materias</strong></label>
    <select class="Botones" name="Materia">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($datos=mysqli_fetch_array($resultado_materias)) {
          ?>

          <option value="<?php echo $datos['ID']; ?>"> <?php echo $datos['Materia'],"-",$datos['Grupo']; ?></option> 

          <?php 
          }
          ?>
          </select>
    <br>
    <h5 style="font-family: calibri;">Porcentaje en parciales</h5>  
    <label style="font-family: calibri;font-size: 13px;"> <strong>Parcial 1</strong></label>
    <input maxlength="2" style="width:10%; font-family: calibri" class="agregar_datos" type="text" name="P1" value="" >%
    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Parcial 2</strong></label>
    <input  maxlength="2" style="width:10%; font-family: calibri" class="agregar_datos" type="text" name="P2" value="" >%
    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Parcial 2</strong></label>
    <input  maxlength="2" style="width:10%; font-family: calibri" class="agregar_datos" type="text" name="P3" value="" >%

    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Asignar_materia" value="Agregar"> 
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



























































<div class="Cuadro_Principal11" style="overflow:scroll; "> 
<label style="font-family: calibri;font-size: 13px;"> <strong>Materias asignadas</strong></label>
<form method="post" action="Asignacion_Profesor_Notutor.php">
<table class="Tabla">
<tr>
    <th style="text-align: center;">Materia</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">P1</th>
    <th style="text-align: center;">P2</th>
    <th style="text-align: center;">P3</th>
  </tr>


<?php $resultado2=mysqli_query($Conexion,$materias_asignadas);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr> 
<td> <?php echo $row["Materia"];?></td>
<td> <?php echo $row["Grupo"];?> </td>
<td> <?php echo $row["P1"];?> </td>
<td> <?php echo $row["P2"];?> </td>
<td> <?php echo $row["P3"];?> </td>
</tr>
<?php } ?> 

</table> 
</form> 

<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" onclick="abrir2()"  value="Actualizar"  >

<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" onclick="abrir3()"  value="Eliminar"  >


</div>  <!--div de cuadro principal 11 -->
</div>   <!--div de cuadro principal -->




<!--VENTANA PARA ACTUALIZAR LOS PORCENTAJES -->

<div class="ventana_datos2" id="vent2" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar2()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Actualizar porcentajes</h5>  
    
    <form  method="post" action="Asignacion_Profesor_Notutor.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Materias</strong></label>
    <select class="Botones" name="Materia_actualizar">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($datos2=mysqli_fetch_array($materias_asignadas2)) {
          ?>

          <option value="<?php echo $datos2['ID']; ?>"> <?php echo $datos2['Materia'],"-",$datos2['Grupo']; ?></option> 

          <?php 
          }
          ?>
          </select>
    <br>
    <h5 style="font-family: calibri;">Porcentaje en parciales</h5>  
    <label style="font-family: calibri;font-size: 13px;"> <strong>Parcial 1</strong></label>
    <input maxlength="2" style="width:10%; font-family: calibri" class="agregar_datos" type="text" name="P1" value="" >%
    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Parcial 2</strong></label>
    <input  maxlength="2" style="width:10%; font-family: calibri" class="agregar_datos" type="text" name="P2" value="" >%
    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Parcial 2</strong></label>
    <input  maxlength="2" style="width:10%; font-family: calibri" class="agregar_datos" type="text" name="P3" value="" >%

    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Actualizar_materia" value="Actualizar"> 
    </form>
</div>
<script>
  function abrir2(){
    document.getElementById("vent2").style.display="block";
  }

  function cerrar2(){
    document.getElementById("vent2").style.display="none";
  }
</script>











<!--VENTANA PARA ELIMINAR MATERIA -->

<div class="ventana_datos3" id="vent3" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar3()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Eliminar materia</h5>  
    
    <form  method="post" action="Asignacion_Profesor_Notutor.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Materias</strong></label>
    <select class="Botones" name="Materia_eliminar">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($datos3=mysqli_fetch_array($materias_asignadas3)) {
          ?>

          <option value="<?php echo $datos3['ID']; ?>"> <?php echo $datos3['Materia'],"-",$datos3['Grupo']; ?></option> 

          <?php 
          }
          ?>
          </select>
    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Eliminar_materia" value="Eliminar"> 
    </form>
</div>
<script>
  function abrir3(){
    document.getElementById("vent3").style.display="block";
  }

  function cerrar3(){
    document.getElementById("vent3").style.display="none";
  }
</script>
























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