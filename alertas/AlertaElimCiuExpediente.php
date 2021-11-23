
<!DOCTYPE html>
<html>
<head>
	<title></title>

<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/sweetalert2.min.css">
<script type="text/javascript" src="sweetalert/sweetalert2.min.js" ></script>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">

</head>
<body>




<div class="container">

<div class="row">
<div class="col-md-12">
  <?php 
  $evento=$_GET['evento'];
  ?>

<script> swal({
    title:'NO SE PUEDE ELIMINAR PORQUE TIENE <?php echo $evento?> EN EL SISTEMA',
    type:'info',
    showConfirmButton: false,
    html:
    
    '<a href="http://localhost/FUA-WEB/BusquedaCiu.php" class="btn btn-primary">Ok</a> '
    
  })</script>
   
<!--
<button id="button1" class="btn btn-success">Opcion 1</button>
<button id="button2" class="btn btn-warning">Opcion 2</button>
<button id="button3" class="btn btn-danger">Opcion 3</button>
-->

</script>
</div>

</div>

</div>


</body>
</html>