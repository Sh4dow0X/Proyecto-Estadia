<?php 
session_start();
$con= include('conexion_bd.php');
if (isset($_POST['Ingresar'])) {

if (strlen($_POST['Correoelectronico'])>=1 && strlen($_POST['Contraseña'])>=1){   

$Correoelectronico=trim($_POST['Correoelectronico']);
$Contraseña=trim($_POST['Contraseña']);
//Cosultar  a la base de datos Alumno
$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador"); 
$Consulta="SELECT * FROM administrador WHERE Clave='$Contraseña' and Usuario='$Correoelectronico'";
$resultado=mysqli_query($Conexion,$Consulta);
$filas=mysqli_num_rows($resultado);

$resultado2=mysqli_query($Conexion,"SELECT * FROM administrador WHERE  Usuario='$Correoelectronico'");
 $consulta=mysqli_fetch_array($resultado2);
 //$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");

if($filas>0){

echo '<script>';
echo 'alert("Bienvenido");';
echo 'window.location.href="Pagina_Principal_Administrador.php";';
echo '</script>';

session_start();
$_SESSION['Correo1']=$Correoelectronico;

}

else{
echo '<script>';
echo 'alert("Error de autentificacion,verifique el usuario o contraseña");';
echo 'window.location.href="InicioA.html";';
echo '</script>'; 
}
}
}
?>

          

