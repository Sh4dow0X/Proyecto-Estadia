<?php 
session_start();
if(($_SESSION['Correo1'])!=""){
/*Consulta de datos de la base de la tabla para colocar en tabla de informacion del alumno*/
$Correo=$_SESSION['Correo1'];

//$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");
$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM administrador WHERE  Usuario='$Correo'");


while($con=mysqli_fetch_array($resultado)){
  $N=$con['Nombre'];
  $maestro="SELECT* FROM maestros";
  $tutor="SELECT* FROM tutores";
}

/*Consulta de datos de la base de la tabla para colocar en tabla de informacion del integrante*/
$id="";
$matricula2="";
$Nombre2="";
$Grupo2="";
$matriculaL="";
$gen="";
$pass="";
$st="";

if (isset($_POST['Cargar_Datos'])) {
    if (strlen($_POST['Matricula2'])>=1){
    $matricula2=trim($_POST['Matricula2']);
    $resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Matricula='$matricula2'");
      while($consulta=mysqli_fetch_array($resultado)){
        $id=$consulta['ID'];
        $Nombre2=$consulta['Nombre'];
        $Grupo2=$consulta['Grupo'];
        $matriculaL=$consulta['Matriculalider'];
        $gen=$consulta['Generación'];
        $pass=$consulta['Contraseña'];
        $st=$consulta['Estatus'];
      }
    }
    else{
      echo '<script>';
              echo 'alert("Ingrese la matricula del integrante");';
              echo 'window.location.href="Administrar_Usuarios.php";';
    echo '</script>';
    }
}

if (isset($_POST['Actualizar'])) {


if (strlen($_POST['Nombre'])>=1 && 
strlen($_POST['ID'])>=1 && 
strlen($_POST['Grupo1'])>=1 && 
strlen($_POST['Contraseña'])>=1 && 
strlen($_POST['Matricula2'])>=1 && 
strlen($_POST['Matricula_lider'])>=1 &&
strlen($_POST['Generacion'])>=1 &&
strlen($_POST['Estado'])>=1){ 


$i=trim($_POST['ID']);
$nombre=trim($_POST['Nombre']);
$grupo=trim($_POST['Grupo1']);
$contraseña=trim($_POST['Contraseña']);
$matricula=trim($_POST['Matricula2']);
$matricula_lider=trim($_POST['Matricula_lider']); 
$genn=trim($_POST['Generacion']); 
$es=trim($_POST['Estado']); 

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////

$Consulta2="UPDATE tacceso_integrantes SET Nombre='$nombre',Correo='$matricula@upq.edu.mx',Grupo='$grupo',Contraseña='$contraseña',Matricula='$matricula',Generación='$genn',Matriculalider='$matricula_lider',Estatus='$es' WHERE ID = '$i'";
 $resultado2=mysqli_query($Conexion,$Consulta2);

if($resultado2){
echo '<script>';
echo 'alert("Actualizacion Exitosa");';
 echo 'window.location.href="Administrar_Usuarios.php";';
echo '</script>';
 }  
else {
echo "Ha ocurrido un error";
}     
}
else {
 
echo '<script>';
          
          echo 'window.location.href="Administrar_Usuarios.php";';
echo '</script>';


}
}


if (isset($_POST['Insertar'])) {


if (strlen($_POST['NomM'])>=1 && 
strlen($_POST['UsuM'])>=1 && 
strlen($_POST['PassM'])>=1){ 


$nombrem=trim($_POST['NomM']);
$pasm=trim($_POST['PassM']);
$usuariom=trim($_POST['UsuM']);
 

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////

$Consulta2="INSERT INTO maestros (Nombre,Clave,Usuario) VALUES ('$nombrem','$pasm','$usuariom')";
$resultado2=mysqli_query($Conexion,$Consulta2);

if($resultado2){
echo '<script>';
echo 'alert("Actualizacion Exitosa");';
 echo 'window.location.href="Administrar_Usuarios.php";';
echo '</script>';
 }  
else {
echo "Ha ocurrido un error";
}     
}
else {
 
echo '<script>';
          
          echo 'window.location.href="Administrar_Usuarios.php";';
echo '</script>';


}
}

?>






<!DOCTYPE html>
<html>
<head>
<title>Administrar usuarios</title>

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

                                        /*BOTON TERMINAR SESION */

.Cuadro_Registrar{
	display: flex;
	background-color:#d9d9d9;
	height:330px;
	border-right:grey 0.2px solid;
	justify-content: center;
	padding-top:2px; 
	

}

.Cuadro_Registrar2{
	background-color:white;
	height:325px;
	width:98%;
}

.agregar_datos:hover{
  background-color:#ffffb3;
  border:black 0.2px solid;
}

.BotonSubir{
  border-radius: 5px;
}



.Cuadro_integrantes{
  display:flex;
  background-color:#d9d9d9;
  height:270px;
  border-right:grey 0.2px solid;
  justify-content: center;
  padding-top:2px;
  padding-left:3px;  
  padding-right: 3px;
  

}

.Cuadro_integrantes2{
  background-color:white;
  height:290px;
  width:50%;

}

.Cuadro_Iespera{
  background-color:white;
  height:290px;
  width:50%;
}




.cerrar{
  top: 2px;
  right: 5px;
  position: absolute;
}

.cerrar2{
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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL ADMINISTRADOR</P>
</div>
</div>
<br>
<input onclick="location.href='Cerrar_sesionA.php'" class="boton_sesion" style="float: right;" type="submit" name="Cerrar" value="Cerrar sesion"> 
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
    <td><?php  echo $N;?></th>
  </tr>


  <tr>
    <th>Tipo de usuario</th>
    <td> Administrador </th>
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
		<li><a href="Pagina_Principal_Administrador.php">Pagina Principal</a></li>
    <li><a href="Administrar_Usuarios.php">Administrar usuarios</a></li>
	</ul>	
  </div>
  </div>
  </div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

  <p style="color:black;text-align:center; font-family:Calibri;">Administrar usuarios</p>

  <div class="Cuadro_Registrar">
  <div class="Cuadro_Registrar2" >

    <table class="Tabla">
    <form  method="post" action="Administrar_Usuarios.php">

    <h5 style="font-family: calibri;">Datos del Alumno</h5> 
    <h6 style="font-family: calibri;">*Ingrese la matricula de su integrante y presion "Cargar datos"</h6> 
    <tr>
    <th>ID</th>
    <td> <input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="ID" value="<?php  echo $id; ?>"maxlength="9" ></td>
    </tr>

    <tr>
    <th>Matricula</th>
    <td> <input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="Matricula2" value="<?php  echo $matricula2; ?>"maxlength="9" ></td>
    </tr>

    <tr>
    <th>Nombre</th>
    <td> <input  style="width:80%; font-family: calibri"  type="text" name="Nombre" value=" <?php  echo $Nombre2; ?>" ></td>
    </tr>

    <tr>
    <th>Grupo</th>
    <td> <input style="width:80%; font-family: calibri"   type="text" name="Grupo1" value="<?php  echo $Grupo2; ?>" maxlength="4" ></td>
    </tr>

    <tr>
    <th>Generacion</th>
    <td> <input style="width:80%;  font-family: calibri; text-align:left;"    type="text" name="Generacion" value="<?php  echo $gen; ?> " maxlength="9" ></td>
    </tr>


    <tr>
    <th>Matricula del lider</th>
    <td> <input style="width:80%;  font-family: calibri; text-align:left;"    type="text" name="Matricula_lider" value="<?php  echo $matriculaL; ?> " maxlength="9" ></td>
    </tr>

    <tr>
    <th>Contraseña</th>
    <td><input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="Contraseña"value="<?php  echo $pass; ?>"maxlength="30" ></td>
    </tr>

    <tr>
    <th>Estado</th>
    <td><input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="Estado"value="<?php  echo $st; ?>"maxlength="30" ></td>
    </tr>

     </table>

     <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Actualizar" value="Actualizar"> 

     <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Cargar_Datos" value="Cargar datos">


      </form>
   </div>
  <div class="Cuadro_Registrar2" >

    <table class="Tabla">
    <form  method="post" action="Administrar_Usuarios.php">

    <h5 style="font-family: calibri;">Registrar Maestro</h5> 
    <tr>
    <th>Nombre</th>
    <td> <input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="NomM" ></td>
    </tr>

    <tr>
    <th>Usuario</th>
    <td> <input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="UsuM"></td>
    </tr>

    <tr>
    <th>Contraseña</th>
    <td> <input  style="width:80%; font-family: calibri"  type="text" name="PassM" ></td>
    </tr>

     </table>

     <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Insertar" value="Registar Maestro"> 

      </form>
   </div>
   </div>

   <br><br>

   <!--CODIGO PARA COLOCAR TABLA DE DATOS-->

  <div class="Cuadro_integrantes">
  <div class="Cuadro_integrantes2" style="overflow:scroll; ">

  <h5 style="font-family: calibri;">Maestros</h5> 
  <form method="post" action="Administrar_Usuarios.php">
    <table class="Tabla">
    <tr>
    <th style="text-align: center;">ID</th>  
    <th style="text-align: center;">Nombre</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Usuario</th>
    <th style="text-align: center;">Clave</th>
    <th style="text-align: center;">Operacion</th>
    </tr>

    <?php 


    
    $resultado2=mysqli_query($Conexion,$maestro);
    while ($row=mysqli_fetch_assoc($resultado2)) { ?>

    <tr> 
      <td> <?php echo $row["ID"];?></td>  
      <td> <?php echo $row["Nombre"];?></td>
      <td> <?php echo $row["Usuario"];?> </td>
      <td> <?php echo $row["Clave"];?> </td>
      <td> <a href="Administrar_UsuariosM.php?idm=<?php echo $row["ID"];?>">Actualizar</a></td>
    </tr>
    <?php } ?> 

    </table> 
    
    </form> 


 </div>
<div class="Cuadro_Iespera" style="overflow:scroll; ">

<h5 style="font-family: calibri;">Tutores</h5> 
  <form method="post" action="Administrar_Usuarios.php">
    <table class="Tabla">
    <tr>
    <th style="text-align: center;">ID</th>  
    <th style="text-align: center;">Nombre</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Usuario</th>
    <th style="text-align: center;">Clave</th>
    <th style="text-align: center;">Operacion</th>
    </tr>

    <?php 


    
    $resultado2=mysqli_query($Conexion,$tutor);
    while ($row=mysqli_fetch_assoc($resultado2)) { ?>

    <tr> 
      <td> <?php echo $row["ID"];?></td>  
      <td> <?php echo $row["Nombre"];?></td>
      <td> <?php echo $row["usuario"];?> </td>
      <td> <?php echo $row["clave"];?> </td>
      <td> <a href="Administrar_UsuariosT.php?idt=<?php echo $row["ID"];?>">Actualizar</a></td>
    </tr>
    <?php } ?> 

    </table> 
    
    </form>







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