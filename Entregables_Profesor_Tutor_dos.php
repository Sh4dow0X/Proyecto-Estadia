<?php 
session_start();

if(($_SESSION['Correo1'])!=""){
$Usuario=$_SESSION['Correo1'];
//$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");
$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE  Usuario='$Usuario'");



while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];  
}




/////////////////////////////////////Cargar informacion en los ComboBox///////////////////////////////////
$Datos="";
$resultado3=mysqli_query($Conexion,"SELECT * FROM Contenido");
$resultado_materias=mysqli_query($Conexion,"SELECT * FROM carga_profesor WHERE Nombre='$Nombre'");



///Cargar las materias,grupos y profesores en las opciones
if (isset($_POST['Cargar'])) {
if (strlen($_POST['Materias'])>=1 && 
    strlen($_POST['Entregable_seleccionado'])>=1 ){ 
$Materia_profesor=trim($_POST['Materias']);
$Entregable_seleccionado=trim($_POST['Entregable_seleccionado']);


//////////////////TRAER LOS DATOS DE LA MATERIA QUE EL PROFES SELECCIONO PARA COMPARARLAR CON LA DEL ALUMNO
$resultado_materia=mysqli_query($Conexion,"SELECT * FROM carga_profesor WHERE  ID='$Materia_profesor'");
while($consulta=mysqli_fetch_array($resultado_materia)){
  $Nombre_maestro=$consulta['Nombre']; 
  $Nombre_materia=$consulta['Materia']; 
  $Grupo_materia=$consulta['Grupo']; 

}

//RESULTADO CALIFICACIONES DE ALUMNOS POR MATERIA-GRUPO Y CALIFICACION


$Reporte1="SELECT Nombre,Materia,Profesor,Grupo,Cal1 FROM carga WHERE Materia='$Nombre_materia' and Profesor='$Nombre_maestro' and Grupo='$Grupo_materia'";

$Reporte2="SELECT Nombre,Materia,Profesor,Grupo,Cal2 FROM carga WHERE Materia='$Nombre_materia' and Profesor='$Nombre_maestro' and Grupo='$Grupo_materia'";

$Reporte3="SELECT Nombre,Materia,Profesor,Grupo,F1 FROM carga WHERE Materia='$Nombre_materia' and Profesor='$Nombre_maestro' and Grupo='$Grupo_materia'";

$Reporte4="SELECT Nombre,Materia,Profesor,Grupo,F2 FROM carga WHERE Materia='$Nombre_materia' and Profesor='$Nombre_maestro' and Grupo='$Grupo_materia'";

$Reporte5="SELECT Nombre,Materia,Profesor,Grupo,F3 FROM carga WHERE Materia='$Nombre_materia' and Profesor='$Nombre_maestro' and Grupo='$Grupo_materia'";



///////////TRAER LOS ALUMNOS CON LAS MISMA CARACTERISTICAS QUE EL PROFE PIDO/////////////////////
$resultado_materia_alumno="SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia' and Estatus='' and Entregable='$Entregable_seleccionado'";

 $resultado_alumno_calificado="SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia' and Estatus='Calificada' and Entregable='$Entregable_seleccionado' ";

$resultado_materia_evaluar=mysqli_query($Conexion,"SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia' and Estatus=' '");

$resultado_descargar=mysqli_query($Conexion,"SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia'and Estatus=' ' and Entregable='$Entregable_seleccionado'");

} ///Corchete para verificar if de campos

else{
  
 echo '<script>';
          echo 'alert("Seleccione todos los campos");';
          echo 'window.location.href="Entregables_Profesor_Tutor_dos.php";';
echo '</script>';
}

}   ///Verificar si se presiono el boton


////////////////DESCARGAR LOS ENTREGABLES DEL ALUMNO//////////////////////////////////////////////////
if (isset($_POST['Descargar_archivo'])) {
if (strlen($_POST['Entregable_descargar'])>=1){
$ID_entregable=trim($_POST['Entregable_descargar']);

$resultado_ruta=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID_entregable'");
while($consulta=mysqli_fetch_array($resultado_ruta)){
  $ruta_entregable=$consulta['Ruta']; 
  $Nombre_entregable=$consulta['Nombre_archivo']; 
 
 $file=file($ruta_entregable);
 $file2=implode("",$file);
 header("Content-Type:application/octet-stream");
 header("Content-Disposition:attachment;filename=$Nombre_entregable");
 echo $file2;


}///LLAVE DEL WHILE QUE ME OBTIENE LA RUTA DEL ENTREGABLE ///////
}///LLAVE DE IF QUE VERIFICA LOS CAMPOS////
else{
  
 echo '<script>';
          echo 'alert("Seleccione una opcion");';
          echo 'window.location.href="Entregables_Profesor_Tutor_dos.php";';
echo '</script>';
}



} ////LLAVE DE IF QUE VERIFICA SI SE PRESIONO EL BOTON 






/////////////////////EVALUAR LOS ENTREGABLES DEL ALUMNO//////////////////////////////////////////////////

if (isset($_POST['calificar_entregable'])) {
if (isset($_POST['integrante']) && isset($_POST['cuadro_cal']) && isset($_POST['Entregable_calificar'])){



if($_POST['integrante']!="" && $_POST['cuadro_cal']!=""){

foreach (array_combine($_POST['integrante'],$_POST['cuadro_cal']) as $In => $Calificacion_entregable){


if( strlen($_POST['Proyecto_calificar'])>=1 &&
   strlen($_POST['Entregable_calificar'])>=1 ){



$ID_proyecto_calificar=trim($_POST['Proyecto_calificar']);
$Entregable=trim($_POST['Entregable_calificar']);


$agregar_calificacion=mysqli_query($Conexion,"UPDATE entregables 
SET Estatus='Calificada'
WHERE ID='$ID_proyecto_calificar'");


$resultado_ruta=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID_proyecto_calificar'");
while($consulta=mysqli_fetch_array($resultado_ruta)){
$Matricula_lider=$consulta['Matriculalider'];
$Mat=$consulta['Materia'];
$Prof=$consulta['Profesor'];
$Grup=$consulta['Grupo'];
}


if($Entregable=="Entregable1"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET Cal1='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}

if($Entregable=="Entregable2"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET Cal2='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}

if($Entregable=="Reporte"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET F1='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}



if($Entregable=="Video"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET F2='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}



if($Entregable=="Poster"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET F3='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}



if($agregar_calificacion && $agregar_calificacion2){
          echo '<script>';
          echo 'alert("La calificacion se ha agregado");';
          echo 'window.location.href="Entregables_Profesor_Tutor_dos.php";';
          echo '</script>';
          } 
}//llave del for que toma un valor de cada una de los valores del array
}//llave del while que guarda el integrante en una variable
}//llave del if que verifica si los campos de integrantes y de cal son diferentes a nada
}//llave que verifica si estan todos los campos llenos
else{
  echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Entregables_Profesor_Tutor_dos.php";';
          echo '</script>';
}



} ////LLAVE DE IF QUE VERIFICA SI SE PRESIONO EL BOTON 



























/////////////////////EVALUAR LOS ENTREGABLES DEL ALUMNO//////////////////////////////////////////////////

if (isset($_POST['actualizar_cal'])) {
if (isset($_POST['integrante']) && isset($_POST['cuadro_cal']) && isset($_POST['Entregable_calificar_Ac'])){



if($_POST['integrante']!="" && $_POST['cuadro_cal']!=""){

foreach (array_combine($_POST['integrante'],$_POST['cuadro_cal']) as $In => $Calificacion_entregable){


if( strlen($_POST['Proyecto_calificar'])>=1 &&
   strlen($_POST['Entregable_calificar_Ac'])>=1 ){



$ID_proyecto_calificar=trim($_POST['Proyecto_calificar']);
$Entregable=trim($_POST['Entregable_calificar_Ac']);


$agregar_calificacion=mysqli_query($Conexion,"UPDATE entregables 
SET Estatus='Calificada'
WHERE ID='$ID_proyecto_calificar'");


$resultado_ruta=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID_proyecto_calificar'");
while($consulta=mysqli_fetch_array($resultado_ruta)){
$Matricula_lider=$consulta['Matriculalider'];
$Mat=$consulta['Materia'];
$Prof=$consulta['Profesor'];
$Grup=$consulta['Grupo'];
}


if($Entregable=="Entregable1"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET Cal1='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}

if($Entregable=="Entregable2"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET Cal2='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}

if($Entregable=="Reporte"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET F1='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}


if($Entregable=="Video"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET F2='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}


if($Entregable=="Poster"){
$agregar_calificacion2=mysqli_query($Conexion,"UPDATE carga 
SET F3='$Calificacion_entregable' 
WHERE Materia='$Mat' and Matriculalider='$Matricula_lider' and Profesor='$Prof' and Grupo='$Grup' and Nombre='$In'");
}




if($agregar_calificacion && $agregar_calificacion2){
          echo '<script>';
          echo 'alert("Calificación actualizada");';
          echo 'window.location.href="Entregables_Profesor_Tutor_dos.php";';
          echo '</script>';
          } 
}//llave del for que toma un valor de cada una de los valores del array
}//llave del while que guarda el integrante en una variable
}//llave del if que verifica si los campos de integrantes y de cal son diferentes a nada
}//llave que verifica si estan todos los campos llenos
else{
  echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Entregables_Profesor_Tutor_dos.php";';
          echo '</script>';
}



} ////LLAVE DE IF QUE VERIFICA SI SE PRESIONO EL BOTON 






























































































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

}                                   /*TERMINA ESTILO DE LA BARRA DE OPCIONES*/
    
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

                                        /*BOTON TERMINAR SESION */

.Cuadro_Principal{
  display: flex;
  background-color:#d9d9d9;
  height:90px;
  border-right:grey 0.2px solid;
  justify-content: center;
  padding-top:2px; 
  

}

.Cuadro_Principal2{
  background-color:white;
  height:80px;
  width:98%;
  
}


.Cuadro_Materias{
  display: flex;
  background-color:#d9d9d9;
  height:auto;
  border-right:grey 0.2px solid;
  justify-content: center;
  padding-top:2px; 

}
.Cuadro_Materias2{
  background-color:white;
  height:auto;
  width:98%;
}





.Cuadro_Entregables{
  display: flex;
  background-color:#d9d9d9;
  height:290px;
  border-right:grey 0.2px solid;
  justify-content: center;
  padding-top:2px; 

}
.Cuadro_Entregables2{
  background-color:white;
  height:280px;
  width:98%;
}


.Cuadro_EntregablesC{
  display: flex;
  background-color:#d9d9d9;
  height:240px;
  border-right:grey 0.2px solid;
  justify-content: center;
  padding-top:2px; 

}
.Cuadro_EntregablesC2{
  background-color:white;
  height:235px;
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
  height: 140px;
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




.ventana_datos2{
  background-color:white;
  width:20%;
  height:auto;
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



.ventana_reporte{
  background-color:white;
  width:40%;
  height:300px;
  color: black;
  font-family: calibri;
  font-size: 18px;
  padding:10px;

  
  border-radius:5px;
  position: absolute;
  top:30%;
  right:25%;
  display: none;
  border:black 0.2px solid;
}


.ventana_reporte2{
  background-color:#f2f2f2;
  width:99%;
  height:75%;
  
  font-family: calibri;
  font-size: 18px;

  
  border-radius:5px;
  
 
 ;
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
    <td> Tutor </th>
  </tr>


</table> 

</div>
</div>                    <!-- TERMINA CODIGO PARA COLOCAR TABLA DE DATOS-->


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

































<p style="color:black;text-align:center; font-family:Calibri;">ENTREGABLES</p>
<div class="Cuadro_Principal">
<div class="Cuadro_Principal2">



<table class="Tabla">
<tr>
 
   <th style="text-align: center;">Materia</th>  
   <th style="text-align: center;">Entregable</th>            <!--Codigo de los titulos de columnas-->
</tr>


<tr>  <!--Codigo de cada uno de las filas-->
                         

<form  action="Entregables_Profesor_Tutor_dos.php" method="post">
 <td style="text-align: center;">
          <select class="Botones" name="Materias">
          <option value="" selected>Seleccionar</option>
          <?php 
          while ($datos=mysqli_fetch_array($resultado_materias)) {
          ?>

          <option value="<?php echo $datos['ID']; ?>"> <?php echo $datos['Materia'],"-",$datos['Grupo']; ?></option>

          <?php 
          }
          ?>
          </select>
    </td>

<td>
  <select class="Botones" name="Entregable_seleccionado">
          <option value="" selected>Seleccionar</option>
          <option value="Entregable1">Entregable 1</option>
          <option value="Entregable2">Entregable 2</option>
          <option value="Reporte">F1:Reporte Final</option>
          <option value="Video">F2:Video</option>
          <option value="Poster">F3:Poster</option>
          
          
          </select>
</td>

 

 </tr>   
</table>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Cargar" value="Cargar"  >

</form>

<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Reporte_cal" value="Reporte" onclick="abrir_reporte();"  >
</div>
</div>






























<div class="Cuadro_Entregables">
<div class="Cuadro_Entregables2" style="overflow:scroll" >
<label style="font-family: calibri;font-size: 13px;"> <strong>Proyectos no calificados</strong></label>
<form  method="post" action="Entregables_Profesor_Tutor_dos.php" >

<table class="Tabla">
<tr>
    <th style="text-align: center;">ID</th>
    <th style="text-align: center;">Proyecto</th>  <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Lider</th>
    <th style="text-align: center;">Fecha de entrega</th>
  </tr>


<?php 
if (isset($_POST['Cargar'])) {
$resultado_datos=mysqli_query($Conexion,$resultado_materia_alumno);
while ($row=mysqli_fetch_assoc($resultado_datos)) { ?>
<tr> 

<td style="text-align: center;"> <?php echo $row["ID_Proyecto"];?></td>
<td style="text-align: center;"> <?php echo $row["Proyecto"];?></td>
<td style="text-align: center;"> <?php echo $row["Nombre"];?> </td>
<td style="text-align: center;"> <?php echo $row["Fecha_Hora"];?> </td>

</tr>
<?php }} ?> 

</table> 




<br></br>

</form>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Descargar" onclick="abrir_descarga();" value="Descargar"  >
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Evaluar" onclick="abrir_evaluar();" value="Evaluar"  >

</div>
</div>













<!-------------------CODIGO PARA LA VENTANA DE DESCARGAR ARCHIVO -------------------------------->

<div class="ventana_datos" id="archivos" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_descarga()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Descargar archivo</h5>  

    <form  method="post" action="Entregables_Profesor_Tutor_dos.php" enctype="multipart/form-data">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Archivo </strong></label>
   <select class="Botones" name="Entregable_descargar">
          <option value="" disabled selected>Seleccionar</option>
          <?php 
          while ($datos=mysqli_fetch_array($resultado_descargar)) {
          ?>

          <option value="<?php echo $datos['ID']; ?>">
           <?php echo $datos['ID_Proyecto'],"-",$datos['Proyecto'],"-",$datos['Materia']; ?></option>

          <?php 
          }
          ?>
    </select>
    <br>  </br>
         

   
  <input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Descargar_archivo"  value="Descargar"  >
    </form>
</div>

<script>
  function abrir_descarga(){
    document.getElementById("archivos").style.display="block";
  }

  function cerrar_descarga(){
    document.getElementById("archivos").style.display="none";
}

function validarExt(){
  var archivoInput=document.getElementById('Archivo22');
  var archivoRuta=archivoInput.value;
  var extPermitidas=/(.pdf)$/i;
  if (!extPermitidas.exec(archivoRuta)) {
    alert('Seleccione un archivo en formato pdf');
    archivoInput.value='';
    return false;
  }
}


  
</script>

























<!-------------------CODIGO PARA LA VENTANA DE EVALUAR EL ENTREGABLE ARCHIVO -------------------------------->


<script type="text/javascript" src="jquery-3.5.1.min.js"></script>

<script type="text/javascript" >
  
  $(document).ready(function(){
  var Entregable="<?php echo $Entregable_seleccionado; ?>";
  var Materia="<?php echo $Nombre_materia; ?>";
  var Grupo="<?php echo $Grupo_materia; ?>";
  $.ajax({
    type:'POST',
    url:'cargar_proyectos.php',
    data:{'Entregable':Entregable,
           'Materia':Materia,
           'Grupo':Grupo}
    
  })
  .done(function(listas_pro){
    $('#lista_proyectos').html(listas_pro)
  })
  .fail(function(){
    alert('Hubo un error al cargar los proyectos')
  })



$('#lista_proyectos').on('change',function(){
  var ID=$('#lista_proyectos').val()
  $.ajax({
    type:'POST',
    url:'cargar_integrantes.php',
    data:{'ID':ID}
  })
  .done(function(lista_in){
    $('#lista_integrantes').html(lista_in)
  })

 .fail(function(){
    alert('Hubo un error al cargar los proyectos')
  })


})










})

</script>


















<div class="ventana_datos2" id="vent2" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_evaluar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Agregar calificación</h5>  
    
    <form  method="post" action="Entregables_Profesor_Tutor_dos.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Proyecto</strong></label>
    


    <select class="Botones" id="lista_proyectos" name="Proyecto_calificar"> </select>
    <br> </br>



<label style="font-family: calibri;font-size: 13px;"> <strong>Integrantes</strong></label>
    
 <div class="Botones"  name="hola" id="lista_integrantes"> </div>
    <br></br>

 <label style="font-family: calibri;font-size: 13px;"> <strong>Evaluar en escala de 1 a 10(ej. 9,8.5)</strong></label>
     <br>
    

<label style="font-family: calibri;font-size: 13px;"> <strong>Entregable</strong></label>
    <select class="Botones" name="Entregable_calificar">
           <option value="" selected>Seleccionar</option>
          <option value="Entregable1">Entregable 1</option>
          <option value="Entregable2">Entregable 2</option>
          <option value="Reporte">F1:Reporte Final</option>
          <option value="Video">F2:Video</option>
          <option value="Poster">F3:Poster</option>
          
          </select>
<br></br>

   
    
    
    

    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="calificar_entregable" value="Calificar"> 
    </form>
</div>
<script>
  function abrir_evaluar(){
    document.getElementById("vent2").style.display="block";
  }

  function cerrar_evaluar(){
    document.getElementById("vent2").style.display="none";
  }
</script>

























<!-------------------CODIGO PARA LA VENTANA DE ACTUALIZAR EL ENTREGABLE ARCHIVO -------------------------------->


<script type="text/javascript" src="jquery-3.5.1.min.js"></script>

<script type="text/javascript" >
  
  $(document).ready(function(){
  var Entregable="<?php echo $Entregable_seleccionado; ?>";
  var Materia="<?php echo $Nombre_materia; ?>";
  var Grupo="<?php echo $Grupo_materia; ?>";
  $.ajax({
    type:'POST',
    url:'cargar_proyectos2.php',
    data:{'Entregable':Entregable,
           'Materia':Materia,
           'Grupo':Grupo}
    
  })
  .done(function(listas_pro){
    $('#lista_proyectos2').html(listas_pro)
  })
  .fail(function(){
    alert('Hubo un error al cargar los proyectos')
  })



$('#lista_proyectos2').on('change',function(){
  var ID=$('#lista_proyectos2').val()
  $.ajax({
    type:'POST',
    url:'cargar_integrantes2.php',
    data:{'ID':ID}
  })
  .done(function(lista_in){
    $('#lista_integrantes2').html(lista_in)
  })

 .fail(function(){
    alert('Hubo un error al cargar los proyectos')
  })


})










})

</script>

































<div class="Cuadro_EntregablesC">
<div class="Cuadro_EntregablesC2" style="overflow:scroll">
<label style="font-family: calibri;font-size: 13px;"> <strong>Proyectos calificados</strong></label>
<table class="Tabla">
<tr>
    <th style="text-align: center;">ID</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Proyecto</th>
    <th style="text-align: center;">Lider</th>
    <th style="text-align: center;">Fecha de entrega</th>
    
  </tr>


<?php 
if (isset($_POST['Cargar'])) {
$resultado_datos=mysqli_query($Conexion,$resultado_alumno_calificado);
while ($row=mysqli_fetch_assoc($resultado_datos)) { ?>
<tr> 
<td style="text-align: center;"> <?php echo $row["ID_Proyecto"];?> </td>
<td style="text-align: center;"> <?php echo $row["Proyecto"];?></td>
<td style="text-align: center;"> <?php echo $row["Nombre"];?> </td>
<td style="text-align: center;"> <?php echo $row["Fecha_Hora"];?> </td>


</tr>
<?php }} ?> 


</table> 
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Actualizar" onclick="abrir_evaluar3();" value="Actualizar"  >
    
</div>
</div>














<div class="ventana_datos2" id="vent3" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_evaluar3()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Actualizar calificación</h5>  
    
    <form  method="post" action="Entregables_Profesor_Tutor_dos.php">
    
    <label style="font-family: calibri;font-size: 13px;"> <strong>Proyecto</strong></label>
    


    <select class="Botones" id="lista_proyectos2" name="Proyecto_calificar"> </select>
    <br> </br>



<label style="font-family: calibri;font-size: 13px;"> <strong>Integrantes</strong></label>
    
 <div class="Botones"  name="hola" id="lista_integrantes2"> </div>
    <br></br>

 <label style="font-family: calibri;font-size: 13px;"> <strong>Evaluar en escala de 1 a 10(ej. 9,8.5)</strong></label>
     <br>
    

<label style="font-family: calibri;font-size: 13px;"> <strong>Entregable</strong></label>
    <select class="Botones" name="Entregable_calificar_Ac">
          <option value="" selected>Seleccionar</option>
          <option value="Entregable1">Entregable 1</option>
          <option value="Entregable2">Entregable 2</option>
          <option value="Reporte">F1:Reporte Final</option>
          <option value="Video">F2:Video</option>
          <option value="Poster">F3:Poster</option>
          
          </select>
<br></br>

   
    
    
    

    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="actualizar_cal" value="Actualizar"> 
    </form>
</div>
<script>
  function abrir_evaluar3(){
    document.getElementById("vent3").style.display="block";
  }

  function cerrar_evaluar3(){
    document.getElementById("vent3").style.display="none";
  }
</script>







































</div>                   
</div> <!---div de cuadro de entregables sin calificar ----------------------->








<
















<!---div de cuadro de reporte ----------------------->
<div class="ventana_reporte" id="vent4" style="overflow:scroll" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_reporte()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Reporte de calificaciones</h5> 
 <?php 
  if (isset($_POST['Cargar'])) {
  if ($Entregable_seleccionado=="Entregable1") { ?>
    <h5 style="font-family: calibri;"> Entregable 1</h5> 
  <?php }}?>
    
  <?php 
  if (isset($_POST['Cargar'])) {
  if ($Entregable_seleccionado=="Entregable2") { ?>
    <h5 style="font-family: calibri;"> Entregable 2</h5> 
  <?php }}?>

  <?php 
  if (isset($_POST['Cargar'])) {
  if ($Entregable_seleccionado=="Reporte") { ?>
    <h5 style="font-family: calibri;"> Reporte</h5> 
  <?php }}?>


  <?php 
  if (isset($_POST['Cargar'])) {
  if ($Entregable_seleccionado=="Video") { ?>
    <h5 style="font-family: calibri;">Video</h5> 
  <?php }}?>


  <?php 
  if (isset($_POST['Cargar'])) {
  if ($Entregable_seleccionado=="Poster") { ?>
    <h5 style="font-family: calibri;">Poster</h5> 
  <?php }}?>

  
 <div class="ventana_reporte2" id="reportes" style="overflow:scroll" >

<table class="Tabla">
  <tr>
    <th style="text-align: center;">Materia</th> <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">Alumno</th>
    <th style="text-align: center;">Calificación</th>
    
    

    
  </tr>
  
<?php 
if (isset($_POST['Cargar'])) {
if ($Entregable_seleccionado=="Entregable1") {
  

$resultado_datos2=mysqli_query($Conexion,$Reporte1);
while ($row=mysqli_fetch_assoc($resultado_datos2)) { ?>
<tr> 
<td style="text-align: center;"> <?php echo $row["Materia"]; ?> </td>
<td style="text-align: center;"> <?php echo $row["Grupo"]; ?></td>
<td style="text-align: center;"> <?php echo $row["Nombre"]; ?></td>
<td style="text-align: center;"> <?php echo $row["Cal1"]; ?></td>

<?php }} ?> 

<?php 

if ($Entregable_seleccionado=="Entregable2") {
$resultado_datos2=mysqli_query($Conexion,$Reporte2); 
while ($row=mysqli_fetch_assoc($resultado_datos2)) { ?>

<tr> 
<td style="text-align: center;"> <?php echo $row["Materia"];?> </td>
<td style="text-align: center;"> <?php echo $row["Grupo"]; ?></td>
<td style="text-align: center;"> <?php echo $row["Nombre"]; ?></td>
<td style="text-align: center;"> <?php echo $row["Cal2"];?> </td>

<?php }}?> 



<?php 

if ($Entregable_seleccionado=="Reporte") {
$resultado_datos2=mysqli_query($Conexion,$Reporte3); 
while ($row=mysqli_fetch_assoc($resultado_datos2)) { ?>

<tr> 
<td style="text-align: center;"> <?php echo $row["Materia"];?> </td>
<td style="text-align: center;"> <?php echo $row["Grupo"]; ?></td>
<td style="text-align: center;"> <?php echo $row["Nombre"]; ?></td>
<td style="text-align: center;"> <?php echo $row["F1"];?> </td>

<?php }}?> 



<?php 

if ($Entregable_seleccionado=="Video") {
$resultado_datos2=mysqli_query($Conexion,$Reporte4); 
while ($row=mysqli_fetch_assoc($resultado_datos2)) { ?>

<tr> 
<td style="text-align: center;"> <?php echo $row["Materia"];?> </td>
<td style="text-align: center;"> <?php echo $row["Grupo"]; ?></td>
<td style="text-align: center;"> <?php echo $row["Nombre"]; ?></td>
<td style="text-align: center;"> <?php echo $row["F2"]; ?> </td>

<?php }}?> 







<?php 

if ($Entregable_seleccionado=="Poster") {
$resultado_datos2=mysqli_query($Conexion,$Reporte5); 
while ($row=mysqli_fetch_assoc($resultado_datos2)) { ?>

<tr> 
<td style="text-align: center;"> <?php echo $row["Materia"];?> </td>
<td style="text-align: center;"> <?php echo $row["Grupo"]; ?></td>
<td style="text-align: center;"> <?php echo $row["Nombre"]; ?></td>
<td style="text-align: center;"> <?php echo $row["F3"];?> </td>

<?php }}?> 







</tr>
<?php } ?> 



</table>



  </div>
    <br></br>


 
    



   
    
    
    

    

   
</div>
<script>
  function abrir_reporte(){
    document.getElementById("vent4").style.display="block";
  }

  function cerrar_reporte(){
    document.getElementById("vent4").style.display="none";
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