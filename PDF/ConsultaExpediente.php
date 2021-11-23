<?php


include('../php/Conectabd.php');





ini_set("date.timezone", "America/Mexico_City");


 $con = Conectar();


require 'FPDF\fpdf.php'; 

 $area = $_GET['area']; 
 $expediente = $_GET['expediente']; 
 $originalDate = $_GET['fecha'];
 $cambia=str_replace('/','-',$originalDate);
 $newDate = new DateTime($cambia);
 $fecha = $newDate->format('dmy');
/*  $hora = $_GET['hora'];  
 $Dia=$originalDate." ".$hora ;  */




$fpdf= new FPDF();
$fpdf->AddPage();
$fpdf->SetX(20);
$fpdf->SetFont('Arial','B',12);
$fpdf->cell(30,5,utf8_decode("Expediente: "));
$fpdf->SetX(75);
$fpdf->SetFont('Arial','',12);
$fpdf->cell(30,5,$expediente);
$fpdf->SetXY(20,20);
$fpdf->SetFont('Arial','B',12);
$fpdf->cell(30,5,utf8_decode("Fecha y hora de creación: "));
$fpdf->SetFont('Arial','',12);
$fpdf->SetXY(75,20);
$fpdf->cell(30,5,$originalDate);
$fpdf->SetFont('Arial','B',12);
$fpdf->SetXY(20,30);
$fpdf->cell(30,5,utf8_decode("Área que atenderá: "));
$fpdf->SetFont('Arial','',12);
$fpdf->SetX(75);
$fpdf->cell(30,5,utf8_decode($area));
$fpdf->SetFont('Arial','',25);
$fpdf->OutPut('I','Turno.pdf',true);

?>