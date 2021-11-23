<?php


include('../php/Conectabd.php');





ini_set("date.timezone", "America/Mexico_City");
$Dia=date('d-m-Y  H:i ', time()); 
$fecha=date('ymd');
 $con = Conectar();


$sql_turno = "SELECT MAX(NUMERO_TURNO) as NUEVOTURNO
FROM COLA_ESPERA
WHERE to_char(fecha_hr_alta,'yyyy')=extract(year from sysdate)";
$turno = Consultar($con, $sql_turno);
$SQL = "";

while ($fila = oci_fetch_assoc($turno)) {
  $numturno = $fila['NUEVOTURNO'];
}


require 'FPDF\fpdf.php'; 

 $area = $_GET['area']; 
 

$sql = "SELECT nomarea
        FROM c_area
        WHERE id_carea = $area";
$result = Consultar($con, $sql);
$array = oci_fetch_array($result);
$area2 = $array[0];
Cerrar($con); 


$fpdf= new FPDF();
$fpdf->AddPage();
$fpdf->SetX(20);
$fpdf->SetFont('Arial','B',12);
$fpdf->cell(30,5,utf8_decode("Número de Turno: "));
$fpdf->SetX(75);
$fpdf->SetFont('Arial','',12);
$fpdf->cell(30,5,$fecha." / ".$numturno);
$fpdf->SetXY(20,20);
$fpdf->SetFont('Arial','B',12);
$fpdf->cell(30,5,utf8_decode("Fecha y hora de creación: "));
$fpdf->SetFont('Arial','',12);
$fpdf->SetXY(75,20);
$fpdf->cell(30,5,$Dia."hrs");
$fpdf->SetFont('Arial','B',12);
$fpdf->SetXY(20,30);
$fpdf->cell(30,5,utf8_decode("Área que atenderá: "));
$fpdf->SetFont('Arial','',12);
$fpdf->SetX(75);
$fpdf->cell(30,5,utf8_decode($area2));
$fpdf->SetFont('Arial','',25);
$fpdf->OutPut('I','Turno.pdf',true);

?>