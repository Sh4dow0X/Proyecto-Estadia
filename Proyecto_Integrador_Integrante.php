<?php 
include('conexion_bd.php');
session_start();
if(($_SESSION['Correo1'])!=""){
$Correo=$_SESSION['Correo1'];

$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDIntegrador");

/* $Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador"); */
//$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Correo='$Correo'");

$EstatusP=" ";




while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula2=$consulta['Matricula'];
  $Matriculalider=$consulta['Matriculalider'];
  $Gen=$consulta['Generación'];
  
}


  


$resultado3=mysqli_query($Conexion,"SELECT * FROM carga WHERE Matricula='$Matricula2'");
$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
 


////EXTRAR EL ESTATUS PARA VALIDAD EN QUE ESTATUS SE ENCUENTRA///////////////
$resultado2=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Matricula='$Matriculalider'");
$resultado4=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Matricula='$Matricula2'");
$filas=mysqli_num_rows($resultado2);

while($consulta_estatus=mysqli_fetch_array($resultado4)){  ///Obtener el estatus
$Estatus2=$consulta_estatus['Estatus'];  ////Tomar datos del estatus
}

  $Nombre_lider="";
   $Matricula_lider="";
   $Nombre_proyecto="";
   $Objetivo_proyecto="";
   $Tipo_industria="";
   $Objetivo_cuatrimestral=""; 
  
if ($Estatus2=="A") {   ///Verificar la matricula y el estatus de aceptado
  

if($filas>0){

while($consulta=mysqli_fetch_array($resultado2)){
   $Nombre_lider=$consulta['Nombre'];
   $Matricula_lider=$consulta['Matricula'];
   $EstatusP=$consulta['Estatus'];

if($consulta['Nombre_Proyecto']){
  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $Objetivo_proyecto=$consulta['Objetivo'];
  $Tipo_industria=$consulta['Tipo_industria'];
  $Objetivo_cuatrimestral=$consulta['Objetivo_cuatrimestral'];
}
else{
   
   $Nombre_proyecto="Aun no se agrega";
   $Objetivo_proyecto="";
   $Tipo_industria="";
   $Objetivo_cuatrimestral="";

}
} //////////llave que verifica si las filas son mayores a cero
} ///verificar el estatus

  






}

?>































































































































<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio alumnado</title>

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
height:605px;
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
width:600px;
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

}			                              /*TERMINA ESTILO DE LA BARRA DE OPCIONES */
		
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
width: 700px;
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

.Cuadro_ProyectoDatos{
	display:flex;
	background-color:#d9d9d9;
	height:270px;
	border-right:grey 0.2px solid;
	justify-content: center;
	padding-top:2px; 
}

.Cuadro_ProyectoDatos2{
	background-color:white;
	height:265px;
	width:98%;
	
}

.Cuadro_ProyectoEntregasP{
  display:flex;
  background-color:#d9d9d9;
  height:200px;
  border-right:grey 0.2px solid;
  justify-content:center;
  padding-top:2px; 
  padding-bottom:3px; 
}

.Cuadro_ProyectoEntregasP2{

  justify-content:center;
  background-color:white;
  height:190px;
  width:98%;
}


.Cuadro_ProyectoFinales{
  display:flex;
  background-color:#d9d9d9;
  height:auto;
  border-right:grey 0.2px solid;
  justify-content:center;
  padding-top:2px; 
}

.Cuadro_ProyectoFinales2{

  justify-content:center;
  background-color:white;
  height:105px;
  width:98%;
}

.BotonSubir{
  border-radius: 5px;
}



.ventana_datos{
  background-color:#f6f6f6;
  width: 30%;
  color: black;
  font-family: calibri;
  font-size: 18px;
  padding: 33px;
  min-height: 210px;
  border-radius: 10px;
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

.cerrar{
  top: 2px;
  right: 5px;
  position: absolute;
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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL INTEGRANTE</P>
</div>
</div>
<br>
<input onclick="location.href='Cerrar_sesion.php'" class="boton_sesion" style="float: right;" type="submit" name="Cerrar" value="Cerrar sesion"> </div>

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
    <th>Grupo</th>
    <td><?php  echo $Grupo; ?></th>
  </tr>

  <tr>
    <th>Matricula</th>
    <td><?php  echo $Matricula2; ?></th>
  </tr>

  <tr>
    <th>Correo</th>
    <td><?php  echo $Correo; ?></th>
  </tr>

  <tr>
    <th>Generación</th>
    <td><?php  echo $Gen; ?></th>
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
	 <li><a href="Pagina_Principal_Integrante.php">Pagina principal</a></li>
   <li><a href="Proyecto_Integrador_Integrante.php">Proyecto Integrador</a></li>
   <li><a href="Asignacion_integrante.php">Asignación</a></li>
   <li><a href="Elegir_proyecto.php">Agregar proyecto</a></li>

	</ul>	
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

<p style="color:black;text-align:center; font-family:Calibri;">SEGUIMIENTO DE PROYECTO INTEGRADOR</p>

<div class="Cuadro_ProyectoDatos">
<div class="Cuadro_ProyectoDatos2">
<h5 style="font-family:calibri;margin: 0px;padding: 0px">Datos del proyecto</p>
<table class="Tabla">
  
  <tr>
    <th>Lider del equipo</th>
    <td> <?php  echo $Nombre_lider;?> </th>
  </tr>

 <tr>
    <th>Matricula del lider</th>
    <td> <?php  echo $Matricula_lider;?> </th>
  </tr>


  <tr>
    <th>Nombre del proyecto</th>
    <td> <?php echo $Nombre_proyecto; ?></th>
  </tr>

  <tr>
    <th>Objetivo</th>
    <td> <?php echo $Objetivo_proyecto?></th>
  </tr>

<tr>
    <th>Objetivo cuatrimestral</th>
    <td> <?php echo $Objetivo_cuatrimestral?></th>
  </tr>


<tr>
    <th>Tipo de industria</th>
    <td> <?php echo $Tipo_industria?></th>
  </tr>


 <tr>
    <th>Estatus</th>
    <td style="color: green"> <?php echo $EstatusP?> </th>
  </tr>



  

</table>
</div>
</div>



<div class="Cuadro_ProyectoEntregasP">
<div class="Cuadro_ProyectoEntregasP2 " style="overflow:scroll; ">
<h5 style="font-family:calibri;margin: 0px;padding: 0px;">Entregas por asignatura</p>
<table class="Tabla">
  <tr>
    <th style="text-align: center;">Materia</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">Profesor</th>
    <th style="text-align: center;">Cal.1</th>
    <th style="text-align: center;">Cal.2</th>
    <th style="text-align: center;">F1</th>
    <th style="text-align: center;">F2</th>
    <th style="text-align: center;">F3</th>
    </th>
    
   
  </tr>
  

<?php 
$materias="SELECT* FROM carga WHERE Matricula='$Matricula2'";


$resultado2=mysqli_query($Conexion,$materias);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr> 
<td> <?php echo $row["Materia"];?></td>
<td style="text-align: center;"> <?php echo $row["Grupo"];?> </td>
<td> <?php echo $row["Profesor"];?> </td>
<td style="text-align: center;"> <?php echo $row["Cal1"];?> </td>
<td style="text-align: center;"> <?php echo $row["Cal2"];?> </td>
<td style="text-align: center;"> <?php echo $row["F1"];?> </td>
<td style="text-align: center;"> <?php echo $row["F2"];?> </td>
<td style="text-align: center;"> <?php echo $row["F3"];?> </td>
</tr>
<?php } 
?> 


  <tr>                             <!--Codigo de cada uno de las filas-->
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   
    
  </tr>

</table>
</div>
</div>















</div>                   
</div>






























<div class="ventana_datos" id="archivos" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_archivos()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Subir archivo</h5>  

    <form  method="post" action="Entregables.php" enctype="multipart/form-data">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Materia</strong></label>
   <select class="Botones" name="Materia">
          <option value="" disabled selected>Seleccionar</option>
          <?php 
          while ($datos=mysqli_fetch_array($resultado3)) {
          ?>

          <option value="<?php echo $datos['Materia']; ?>"> <?php echo $datos['Materia']; ?></option>

          <?php 
          }
          ?>
    </select>
    <br> 
         

    <label style="font-family: calibri;font-size: 13px;"> <strong>Tipo</strong></label>
    <select class="Botones" name="Entregable_E2">
          <option value="Entregable2" disabled selected >Entregable 2</option>   
    </select>

    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Seleccione archivo</strong></label>
    <br>

    <input  style="float:left;font-family:calibri" type="file" onchange="return validarExt1()" name="Archivo22" id="archivo" value="Subir archivo">
    <br>

    <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Subir_archivo22" value="Subir archivo"> 
    </form>
</div>

<script>
  function abrir_archivos(){
    document.getElementById("archivos").style.display="block";
  }

  function cerrar_archivos(){
    document.getElementById("archivos").style.display="none";
}


function validarExt1(){
  var archivoInput=document.getElementById('archivo');
  var archivoRuta=archivoInput.value;
  var extPermitidas=/(.pdf)$/i;
  if (!extPermitidas.exec(archivoRuta)) {
    alert('Seleccione un archivo en formato pdf');
    archivoInput.value='';
    return false;
  }
}
  
</script>






























<div class="ventana_datos" id="archivos2" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_archivos2()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Subir archivo</h5>  

    <form  method="post" action="Entregables.php" enctype="multipart/form-data">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>*En este apartado subiras el formato de datos generales del proyecto integrador </strong></label>
    
    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Seleccione archivo</strong></label>
    <br>

    <input  style="float:left;font-family:calibri" type="file" onchange="return validarExt2()" name="Archivo11" id="archivo2" value="Subir archivo">
    <br>

    <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Subir_archivo11" value="Subir archivo"> 
    </form>
</div>

<script>
  function abrir_archivos2(){
    document.getElementById("archivos2").style.display="block";
  }

  function cerrar_archivos2(){
    document.getElementById("archivos2").style.display="none";
}

function validarExt2(){
  var archivoInput2=document.getElementById('archivo2');
  var archivoRuta2=archivoInput2.value;
  var extPermitidas2=/(.pdf)$/i;
  if (!extPermitidas2.exec(archivoRuta2)) {
    alert('Seleccione un archivo en formato pdf');
    archivoInput2.value='';
    return false;
  }
}

</script>




































<div class="ventana_datos" id="archivos3" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_archivos3()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Subir archivo</h5>  

    <form  method="post" action="Entregables.php" enctype="multipart/form-data">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>*En este apartado enviaran los entregables finales </strong></label>
    <br>
   <label style="font-family: calibri;font-size: 13px;"> <strong>Tipo</strong></label>

<select class="Botones" name="Entrega_final">
          <option value="" disabled selected>Seleccionar</option>
          <option value="Reporte" >Reporte</option>
          <option value="Poster" >Poster</option>
          <option value="Video" >Video</option>
          
    </select>


    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Seleccione archivo</strong></label>
    <br>

    <input  style="float:left;font-family:calibri" type="file" onchange="return validarExt3()" name="Archivo33" id="archivo3" value="Subir archivo">
    <br>

    <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Subir_archivo33" value="Subir archivo"> 
    </form>
</div>

<script>
  function abrir_archivos3(){
    document.getElementById("archivos3").style.display="block";
  }

  function cerrar_archivos3(){
    document.getElementById("archivos3").style.display="none";
}

function validarExt3(){
  var archivoInput3=document.getElementById('archivo3');
  var archivoRuta3=archivoInput3.value;
  var extPermitidas3=/(.pdf)$/i;
  if (!extPermitidas3.exec(archivoRuta3)) {
    alert('Seleccione un archivo en formato pdf');
    archivoInput3.value='';
    return false;
  }
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
