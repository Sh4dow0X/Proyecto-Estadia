<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
session_start();
session_unset();
session_destroy();
header("location:InicioA.html");
?>
</body>
</html>