<?php 
session_start();

if(($_SESSION['Correo1'])!=""){
$Correo=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");
/*$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");*/
$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Correo='$Correo'");

while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula=$consulta['Matricula'];
  $Estatus=$consulta['Estatus'];
  $Gen=$consulta['Generación'];
}

///Cargar las materias,grupos y profesores en las opciones
$materias="SELECT* FROM carga WHERE Matricula='$Matricula'";
$resultado4=mysqli_query($Conexion,"SELECT * FROM Contenido");

///Cargar las materias del alumno para eliminar
$resultado_materias_eliminar=mysqli_query($Conexion,"SELECT * FROM carga WHERE Matricula='$Matricula'");









$materias_asignadas="";
////////////////////Agregar materia cargada a la base de datos
if (isset($_POST['Cargar'])) {
  if (strlen($_POST['Grupo1'])>=1){ 
      $Grupo1=trim($_POST['Grupo1']);
        if ($Estatus=="Validado") {
         
$materias_asignadas="SELECT* FROM carga_profesor WHERE Grupo='$Grupo1' and Estatus='Asignada'";
$resultado_materias_agregar=mysqli_query($Conexion,"SELECT * FROM carga_profesor WHERE Grupo='$Grupo1' and Estatus='Asignada'");

} ///llave que verifica si el estatus ya esta validado
else{
 echo '<script>';
          echo 'alert("Valide el proyecto primero");';
          echo 'window.location.href="Asignacion_lider.php";';
echo '</script>';

}

} ///Corchete para verificar if de campos

else{
 echo '<script>';
          echo 'alert("Seleccione un grupo");';
          echo 'window.location.href="Asignacion_lider.php";';
echo '</script>';
}

}   ///Verificar si se presiono el boton





/////////////////////////////////////AGREGA LA MATERIA DE LA VENTANA AGREGAR MATERIA/////////////////////77
if (isset($_POST['Agregar_materia2'])) {
if (strlen($_POST['Materia_agregar'])>=1){ 
$ID_agregar=trim($_POST['Materia_agregar']);
$resultado_materias_agregar2=mysqli_query($Conexion,"SELECT * FROM carga_profesor WHERE  ID='$ID_agregar'");

while($consulta_datos_materia=mysqli_fetch_array($resultado_materias_agregar2)){
  $Nombre_maestro=$consulta_datos_materia['Nombre'];
  $Grupo=$consulta_datos_materia['Grupo'];
  $Materia=$consulta_datos_materia['Materia'];
  $P1=$consulta_datos_materia['P1'];
  $P2=$consulta_datos_materia['P2'];
  $P3=$consulta_datos_materia['P3'];
}


  $Consulta_materia_existente="SELECT * FROM carga WHERE 
          Materia='$Materia' and  Grupo='$Grupo' 
          and Profesor='$Nombre_maestro' and Matricula='$Matricula'";
          $resultado11=mysqli_query($Conexion,$Consulta_materia_existente);
          $filas=mysqli_num_rows($resultado11); 

          if($filas>0){
echo '<script>';
          echo 'alert("!ups parece que ya registrastes esta materia");';
          echo 'window.location.href="Asignacion_lider.php";';
echo '</script>';
        }

else{
$Agregar_BD="INSERT INTO carga(Nombre,Matricula,Matriculalider,Materia,Grupo,Profesor,P1,P2,P3) 
          VALUES('$Nombre','$Matricula','$Matricula','$Materia','$Grupo','$Nombre_maestro','$P1','$P2','$P3')";
          $resultado_agregar_BD=mysqli_query($Conexion,$Agregar_BD);
          
          
         if($resultado_agregar_BD){
          echo '<script>';
          echo 'alert("Registro exitoso");';
          echo 'window.location.href="Asignacion_lider.php";';
          echo '</script>';
          }  
          else {
           echo "Ha ocurrido un error";
               }     

}//LLAVE DE ELSE QUE INGRESA LOS DATOS SI NO ESTAN EXISTENTES
}
}











































///////////////////////////BORRAR MATERIA SELECCIONADA POR EL ALUMNO/////////////


if (isset($_POST['Eliminar'])) {
if (strlen($_POST['Materia2'])>=1){
  $ID_eliminar=trim($_POST['Materia2']);
  $resultado_eliminar=mysqli_query($Conexion,"DELETE FROM carga WHERE ID='$ID_eliminar'");
if ($resultado_eliminar) {
 echo '<script>';
          echo 'alert("Eliminacion exitosa");';
          echo 'window.location.href="Asignacion_lider.php";';
echo '</script>';

}
}
else{
echo '<script>';
          echo 'alert("Seleccione una materia");';
          echo 'window.location.href="Asignacion_lider.php";';
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
width: 600px;
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

                                        /*BOTON TERMINAR SESION  */

.Cuadro_Calificaciones{
	display: flex;
	background-color:#d9d9d9;
	height:auto;
	border-right:grey 0.2px solid;
	justify-content: center;
	padding-top:2px;
  padding-bottom:3px; 
	

}

.Cuadro_Calificaciones2{
	background-color:white;
  height: auto;
	width:98%;
}

.Botones{
border-radius:2px;
font-family:Calibri;
}

.Cuadro_Materias{
  display: flex;
  background-color:#d9d9d9;
  height:220px;
  border-right:grey 0.2px solid;
  justify-content: center;
  padding-top:2px; 

}
.Cuadro_Materias2{
  background-color:white;
  height:210px;
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
  height: 120px;
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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL LIDER</P>
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
    <th>Grupo</th>
    <td><?php  echo $Grupo; ?></th>
  </tr>
  
  <tr>
    <th>Matricula</th>
    <td><?php  echo $Matricula; ?></th>
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
		<li><a href="Pagina_Principal_Lider.php">Pagina principal</a></li>
		<li><a href="Proyecto_Integrador_Lider.php">Proyecto Integrador</a></li>
	  <li><a href="Registrar_integrantes_Lider.php">Registrar Integrantes</a></li>
    <li><a href="Asignacion_lider.php">Asignación</a></li>
    
		
	</ul>	
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

<p style="color:black;text-align:center; font-family:Calibri;">ASIGNACION DE MATERIAS</p>































<div class="Cuadro_Calificaciones">
<div class="Cuadro_Calificaciones2">
<form  action="Asignacion_lider.php" method="post">
<table class="Tabla">
<tr>
                                              <!--Codigo de los titulos de columnas-->
  <th style="text-align: center;">Grupo</th>
</tr>
  
<tr>  <!--Codigo de cada uno de las filas-->
    <td style="text-align: center;">
          <select class="Botones" name="Grupo1" >
          <option value="" selected>Grupo</option>
          <?php 
          while ($datos2=mysqli_fetch_array($resultado4)) {
          ?>
          <option value="<?php echo $datos2['Grupo']; ?>"> <?php echo $datos2['Grupo']; ?></option>
          <?php 
          }
          ?>
          </select>
          </select>
    </td> 
 </tr>   


</table>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Cargar" value="Cargar"  >

</form>




<table class="Tabla">
<tr>
    <th style="text-align: center;">Materia</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">Profesor</th>
    <th style="text-align: center;"></th>
  </tr>


<?php 
if (isset($_POST['Cargar'])) {
$resultado2=mysqli_query($Conexion,$materias_asignadas);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr> 
<td> <?php echo $row["Materia"];?></td>
<td> <?php echo $row["Grupo"];?> </td>
<td> <?php echo $row["Nombre"];?> </td>
</tr>
<?php }} ?> 

</table> 

<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Agregar_materia" value="Agregar"  onclick="abrir_agregar()"  >

</div>
</div>


<!--CODIGO DE VENTANA PARA AGREGAR MATERIA A LA CARGA DEL ALUMNO-->

<div class="ventana_datos" id="vent" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_agregar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Agregar materia</h5>  

    <form  method="post" action="Asignacion_lider.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Materias</strong></label>
    <select class="Botones" name="Materia_agregar">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($datos_agregar=mysqli_fetch_array($resultado_materias_agregar)) {
          ?>

          <option value="<?php echo $datos_agregar['ID']; ?>"> <?php echo $datos_agregar['Materia']; ?></option>

          <?php 
          }
          ?>
          </select>
    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Agregar_materia2" value="Agregar"> 
    </form>
</div>
<script>
  function abrir_agregar(){
    document.getElementById("vent").style.display="block";
  }

  function cerrar_agregar(){
    document.getElementById("vent").style.display="none";
  }
</script>





















































































<div class="Cuadro_Materias">
<div class="Cuadro_Materias2" style="overflow:scroll; ">
<h5 style="font-family: calibri;">Materias cargadas</h5> 
<form method="post" action="Proyecto_Integrador_Lider.php">
<table class="Tabla">
<tr>
    <th style="text-align: center;">Materia</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">Profesor</th>
    <th style="text-align: center;"></th>
  </tr>


<?php $resultado2=mysqli_query($Conexion,$materias);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr> 
<td> <?php echo $row["Materia"];?></td>
<td> <?php echo $row["Grupo"];?> </td>
<td> <?php echo $row["Profesor"];?> </td>
</tr>
<?php } ?> 

</table> 
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Finalizar" value="Finalizar">


</form> 

<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" onclick="abrir_eliminar()"  value="Eliminar"  >


</div> 
</div>
</div>                   



</div>


 <!--Ventana para eliminar materias cargadas-->

<div class="ventana_datos" id="vent2" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_eliminar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Eliminar materia</h5>  

    <form  method="post" action="Asignacion_lider.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Materias</strong></label>
    <select class="Botones" name="Materia2">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($datos_eliminar=mysqli_fetch_array($resultado_materias_eliminar)) {
          ?>

          <option value="<?php echo $datos_eliminar['ID']; ?>"> <?php echo $datos_eliminar['Materia']; ?></option>

          <?php 
          }
          ?>
          </select>
    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Eliminar" value="Eliminar"> 
    </form>
</div>
<script>
  function abrir_eliminar(){
    document.getElementById("vent2").style.display="block";
  }

  function cerrar_eliminar(){
    document.getElementById("vent2").style.display="none";
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
