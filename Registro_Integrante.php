<!DOCTYPE html>
<html>

<head>
	<title>Registro</title>
	<meta charset="utf-8">

	<?php

	$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","BDPIntegrador");
	//$Conexion = mysqli_connect("localhost", "root", "", "BDPIntegrador");

	$matricula2 = "";
	$Nombre2 = "";
	$Grupo2 = "";
	$Gen = "";


	if (isset($_POST['Cargar_Datos'])) {
		if (strlen($_POST['Matricula2']) >= 1) {
			$matricula2 = trim($_POST['Matricula2']);
			$resultado = mysqli_query($Conexion, "SELECT * FROM alumnos WHERE  Ncontrol='$matricula2'");
			while ($consulta = mysqli_fetch_array($resultado)) {
				$Nombre2 = $consulta['Nombre'];
				$Grupo2 = $consulta['Grupo'];
				$Gen = $consulta['generacion'];
			}
		} else {
			echo '<script>';
			echo 'alert("Ingrese la matricula del integrante");';
			echo 'window.location.href="Registro_Integrante.php";';
			echo '</script>';
		}
	}




	if (isset($_POST['Registrarse_Integrante'])) {


		if (
			strlen($_POST['Nombre']) >= 1 &&
			strlen($_POST['Grupo1']) >= 1 &&
			strlen($_POST['Contraseña']) >= 1 &&
			strlen($_POST['Matricula2']) >= 1 &&
			strlen($_POST['Generacion']) >= 1
		) {

			$nombre = trim($_POST['Nombre']);
			$grupo = trim($_POST['Grupo1']);
			$contraseña = trim($_POST['Contraseña']);
			$matricula = trim($_POST['Matricula2']);
			$gen = trim($_POST['Generacion']);
			/* Verificacion para ver si ya hay un estudiante con la misma matricula */
			$Consulta = "SELECT * FROM tacceso_integrantes WHERE 
          Matricula='$matricula'";
			$resultado = mysqli_query($Conexion, $Consulta);
			$filas = mysqli_num_rows($resultado);

			if ($filas > 0) {
				echo '<script>';
				echo 'alert("!ups parece que alguien ya se ha registrado el integrante");';
				echo 'window.location.href="Registro_Integrante.php";';
				echo '</script>';
			}

			//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
			else {
				$Consulta2 = "INSERT INTO tacceso_integrantes(Nombre,Correo,Grupo,Contraseña,Matricula,Estatus,Generación) 
				VALUES('$nombre','$matricula@upq.edu.mx','$grupo','$contraseña','$matricula','NA','$gen')";
				$resultado2 = mysqli_query($Conexion, $Consulta2);


				if ($resultado2) {
					echo '<script>';
					echo 'alert("Registro exitoso");';
					echo 'window.location.href="Inicio.html";';
					echo '</script>';
				} else {
					echo "Ha ocurrido un error";
				}
			}
		} else {

			echo '<script>';
			echo 'alert("Llene todos los campos");';
			echo 'window.location.href="Registro_Integrante.php";';
			echo '</script>';
		}
	}

	?>
























	<style>
		.centrar {
			display: flex;
			justify-content: center;
		}

		.Texto_formulario {
			width: 500px;
			height: 500px;
			border-radius: 25px;
		}

		.formulario {
			background-color: white;
			height: 690px;
			width: 400px;
			opacity: 0.9;
			border-radius: 25px;
		}

		.cabezera {
			width: auto;
			height: 100px;
			background-color: #ffffff;
			border-top-right-radius: 25px;
			border-top-left-radius: 25px;
		}

		.Logo {
			width: 80px;
			height: 80px;
			margin-bottom: 10px;
			background-color: #ffffff;
		}

		.form_cudrados {

			border-top-width: 0;
			border-left-width: 0;
			border-right-width: 0;
			border-bottom-color: #d9d9d9;
			align-items: center;
		}

		.centrar_form {
			width: auto;
			height: 150px;
			background-color: #000000;
		}

		.centrar_datos {}

		#boton_ingresar {
			height: 40px;
			width: 160px;
			border-radius: 10px;
			border-right: 0;
			border-bottom: 0;
			background-color: #99ccff;
			color: black;

		}

		.btn {
			width: 160px;
			border-radius: 5px;
			background-color: #99ccff;
			color: black;

		}
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>




<body style="background-image: url(Imagenes/Fondo.jpg);">

	<div class="centrar" style="margin-top: 20px;">
		<div class="formulario">
			<div class="cabezera">
				<div class="centrar">
					<div class="Logo">
						<img src="Imagenes/Logo_mecatronica.png" height="100px" width="100px">
					</div>



				</div>
				<h4 style="color:black; font-size: 22px;" align="center">Registro</h4>
				<h6 style="color:black; font-size: 14px;" align="center">Ingrese la matricula y haga clic en cargas datos</h6>
				<br>
				<div class="centrar">
					<div class="centrar_datos">


						<form method="post" action="Registro_Integrante.php">
							<center>

								<p style="font-family: 'Times New Roman'" align="center">Matricula</p>
								<input style="color:black;text-align: center;" class="form_cudrados" type="text" value="<?php echo $matricula2; ?>" name="Matricula2" size="25" maxlength="9"> <br></br>


								<p style="color:black;font-family: 'Times New Roman'" align="center">Nombre</p>
								<input style="color:black" class="form_cudrados" type="text" name="Nombre" value="<?php echo $Nombre2; ?>" size="25" style="float: left;"><br><br>



								<p style="font-family:Times new roman " align="center">Grupo</p>
								<input style="color:black ;text-align: center; align-items:center;" class="form_cudrados" type="text" name="Grupo1" size="4" maxlength="4" value="<?php echo $Grupo2; ?>"> <br><br>

								<p style="font-family:Times new roman " align="center">Generación</p>
								<input style="color:black ;text-align: center; align-items:center;" class="form_cudrados" type="text" name="Generacion" size="4" maxlength="2" value="<?php echo $Gen; ?>"> <br></br>
								<p style="font-family:Times new roman " align="center">Contraseña</p>
								<input style="color:black;text-align:center;" class="form_cudrados" type="Password" name="Contraseña" size="25"> <br></br>

							</center>



							<div class="row">
								<div class="col">
									<input type="submit" value="Registrarse" name="Registrarse_Integrante" class="btn btn-primary">
									<br></br>
								</div>
								<div class="col">
									<input type="submit" value="Cargar datos" name="Cargar_Datos" class="btn btn-info">
								</div>
							</div>


						</form>




					</div>
				</div>
			</div>


		</div>
	</div>

	</div>




</body>

</html>