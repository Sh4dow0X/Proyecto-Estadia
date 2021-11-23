<!DOCTYPE html>
<html>
<head>
	<title>SweetAlert Ejemplo - Evilnapsis</title>

<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/sweetalert2.min.css">
<script type="text/javascript" src="sweetalert/sweetalert2.min.js" ></script>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="../js/alertas.js"></script>

</head>
<body>

<?php 
$nombre=$_GET['nombre'];
$appaterno=$_GET['appaterno'];
$apmaterno=$_GET['apmaterno'];
$fechanac=$_GET['fechanac'];
$curp=$_GET['curp'];
?>


<div class="container">

<div class="row">
<div class="col-md-12">

<script> swal({
    title:'DATOS GENERALES GUARDADOS EXITOSAMENTE',
    type:'success',
    showConfirmButton: false,
    html:
    
    "<a href='http://localhost/FUA-WEB/ModalOpcionesDatos.php?nombre=<?php echo $nombre?>&appaterno=<?php echo $appaterno?>&apmaterno=<?php echo $apmaterno?>&fechanac=<?php echo $fechanac?>&curp=<?php echo $curp?>' class='btn btn-success'>Listo</a> "
      
  })
  </script>
   
<!--
<button id="button1" class="btn btn-success">Opcion 1</button>
<button id="button2" class="btn btn-warning">Opcion 2</button>
<button id="button3" class="btn btn-danger">Opcion 3</button>
-->


</div>

</div>

</div>


</body>
</html>

