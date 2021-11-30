<?php 
$id= $_GET['idi'];
//$Conexion=mysqli_connect("localhost","root","","BDPIntegrador");
$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
$int=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes where ID = '$id'");

while($consulta=mysqli_fetch_array($int)){
    $idi = $consulta['ID'];
    $nomi = $consulta['Nombre'];
    $mali = $consulta['Matriculalider'];
    $coi = $consulta['Correo'];
    $grui = $consulta['Grupo'];
    $coni = $consulta['Contraseña'];
    $mai = $consulta['Matricula'];
    $gei = $consulta['Generación'];
}

$lider=mysqli_query($Conexion,"SELECT * FROM tacceso_lider where Matricula = '$mali'");

while($consulta=mysqli_fetch_array($lider)){
    $idl = $consulta['ID'];
    $noml = $consulta['Nombre'];
    $col = $consulta['Correo'];
    $grul = $consulta['Grupo'];
    $conl = $consulta['Contraseña'];
    $mal = $consulta['Matricula'];
    $gel = $consulta['Generación'];
}

$Consulta2="UPDATE tacceso_integrantes SET Nombre='$noml',Matriculalider='$mai',Correo='$col', 
Grupo='$grul',Contraseña='$conl', Matricula='$mal', Generación= '$gel' WHERE ID = '$idi'";
$resultado2=mysqli_query($Conexion,$Consulta2);

$Consulta3="UPDATE tacceso_lider SET Nombre='$nomi',Correo='$coi', 
Grupo='$grui',Contraseña='$coni', Matricula='$mai', Generación= '$gei' WHERE ID = '$idl'";
$resultado3=mysqli_query($Conexion,$Consulta3);


$Consulta4="UPDATE tacceso_integrantes SET Matriculalider='$mai' WHERE Matriculalider = '$mal'";
$resultado4=mysqli_query($Conexion,$Consulta4);



if($resultado2 && $resultado3 && $resultado4){
echo '<script>';
echo 'alert("Actualizacion Exitosa");';
 echo 'window.location.href="Registrar_Lider.php";';
echo '</script>';
 }  
else {
echo "Ha ocurrido un error";
}     

?>