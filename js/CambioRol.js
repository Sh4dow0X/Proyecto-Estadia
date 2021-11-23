
/**
 * Realiza cambio de rol entre, las 3 opciones a elegir y 
 * deshabilita sus respectivos campos de a cuerdo a la selección
 * @var cod almacena el id del campo 
 * @var div almacena la vista que se mostrará despues de cada selección
 * 
 * @author Braulio Miguel Perales Venegas
 */
function rol() {
	var cod = document.getElementById("Rol").value;

	if (cod=="Victima") {
		window.alert("Victima");
		let div = document.getElementById("Formulario");
		div.innerHTML ="<form id='miForm'><div class='row g-3'><div class='col-6 col-sm-3'><label for='formFile' class='form-label'>Foto</label><input class='form-control border-success' type='file' placeholder='Inserta Fotografia' id='uploadImage1' name='images[1]' onchange='previewImage(1);'></div><div class='col-6 col-sm-3'><img id='uploadPreview1' width='150' height='150' src='img/not-available.png' /></div></div><br><div class='row g-3'><!---------Nombre--------><div class='col'><label for='Nombre' class='form-label'>Nombre</label><input type='email' class='form-control' id='Nombre' placeholder='Nombre(s)' aria-describedby='emailHelp'></div><!---------Apellido Paterno--------><div class='col'><label for='ApellidoP' class='form-label'>Apellido Paterno</label><input type='text' class='form-control border border-danger' id='ApellidoP' placeholder='Apellido Paterno' aria-label='First name' required></div><!---------Apellido Materno--------><div class='col'><label for='ApellidoM' class='form-label'>Apellido Materno</label><input type='text' class='form-control border border-success' id='ApellidoM'  placeholder='Apellido Materno' aria-label='Last name'></div></div><div class='row g-3'><div class='col col-lg-2'><label for='FechaN' class='form-label'> Fecha de nacimiento.</label><br><input type='date' onblur='calcularEdad(document.getElementById();' id='FechaN'  name='FechaN' class='form-control-xs border border-danger'  required=''></div><div class='col col-lg-2'><label for='edad' class='form-label'> Edad</label><br><input type='number' id='edad' onblur='FechaNac(document.getElementById();'  placeholder='Edad' class='form-control-xs border border-danger' ></div></div><div class='row g-3'><div class='col-auto me-auto'><label for='Sexo' class='form-label'> Sexo</label><select class='form-select form-select-xs mb-3 border border-danger' aria-label='.form-select-lg example' id='Sexo' name='Sexo' required><option selected>Selecciona...</option><option value='Masculino'>Masculino</option><option value='Femenino'>Femenino</option></select></div><div class='col'><br><div class='form-check'><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault'><label class='form-check-label' for='flexCheckDefault'>¿Es Extranjero?</label></div></div></div><div class='row g-3'><!---------Estado--------><div class='col-6 col-sm-3'><label for='Estado' class='form-label'> Estado de Nacimiento</label><input class='form-control border border-danger'  placeholder='Selecciona Estado de Nacimiento'  list='ListEstado' id='Estado' ><datalist id='ListEstado'><option value='Selecciona...' selected=''></option><option  value='Ciudad de Mexico'>Ciudad de Mexico</option><option value='Queretaro'>Querétaro</option><option value='San Luis Potosi'>San Luis Potosi</option><option value='Chihuahua'>Chihuahua</option></div><!---------Curp--------><div class='col-6 col-sm-3'><label for='Curp' class='form-label'> Curp</label><input type='text' class='form-control border border-danger' placeholder='Curp' id='Curp' name='Curp'><div id='cer' class='form-text'></div></div><!---------Generar--------><div class='col-6 col-sm-3'><br><button type='button' class='btn btn-primary'>Generar</button></div></div><div class='row g-3'><!---------Colonia--------><div class='col'>           <label for='Colonia' class='form-label'>Colonía</label><input class='form-control border border-danger' placeholder='Seleccione Colonia' list='ListColonia' id='Colonia' ><datalist id='ListColonia'><option selected value='Selecciona...'></option><option value='Villas de Santiago'>Villas de Santiago</option><option value='El Vergel'>El Vergel</option><option value='La españa'>La españa</option></datalist></div><!---------Calle--------><div class='col'><label for='Calle' class='form-label'> Calle</label><input class='form-control border border-danger' placeholder='Calle' list='ListCalle' id='Calle'><datalist  id='ListCalle'><option selected value='Selecciona...'></option></datalist></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Exterior</label><input type='text' class='form-control border border-danger' placeholder='Numero Exterior' id='NumE' name='NumE'><div id='cer' class='form-text'></div></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Interior</label><input type='text' class='form-control border border-success' placeholder='Numero interior' id='NumI' name='NumI'></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Etnia' class='form-label'>Etnia</label><input class='form-control border border-danger' placeholder='Selecciona Etnia' list='ListaEtnias' id='Etnia'><datalist id='ListaEtnias'><option value='Seleciona...' selected=''></option><option value='Ninguna'></option><option value='Otomí'></option><option value='Purepecha'></option><option value='Otomí-Chichimecas'></option></datalist></div><div class='col-6 col-sm-3'><label for='Orgien' class='form-label'>Origen</label><input class='form-control border-success' list='ListOrigen'  placeholder='Selecciona Origen' id='Origen'><datalist id='ListOrigen'><option selected>Origen</option><option value='Rural'>Rural</option><option value='Urbano'>Urbano</option></datalist></div></div><br><div class='row g-3'><div class='col-6 col-sm-3'><label for='Identificacion' class='form-label'> Tipo de Identificacion</label><input class='form-control border border-danger' placeholder='Selecciona Identificacion' list='ListIdentificacion' id='Identificacion'><datalist id='ListIdentificacion'><option selected value='Selecciona...'></option><option value='INE'>INE</option><option value='Curp'>Curp</option><option value='Cartilla Militar'>Cartilla Militar</option><option value='Pasaporte'>Pasaporte</option></datalist></div><div class='col-6 col-sm-3'><label for='NumIdentifcacion' class='form-label'> Numero de Identificacion</label><input type='text' class='form-control border border-danger' placeholder='Numero de Identificacion' id='NumIdentifcacion' name='NumIdentifcacion' required></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Celular' class='form-label'>Numero de Celular</label><input type='text' class='form-control border-success' placeholder='Número Celular' id='Celular' name='Celular'></div><div class='col-6 col-sm-3'><label for='Telefono' class='form-label'>Numero de Telefono </label><input type='text' class='form-control border-success'  placeholder='Número Teléfonico' id='Telefono' name='Telefono'></div></div></form>";
	}
	else if(cod=="Agresor"){
		window.alert("Agresor");
		let div = document.getElementById("Formulario");
		div.innerHTML ="<form id='miForm'><div class='row g-3'><div class='col-6 col-sm-3'><label for='formFile' class='form-label'>Foto</label><input class='form-control border-success' type='file' placeholder='Inserta Fotografia' id='uploadImage1' name='images[1]' onchange='previewImage(1);'></div><div class='col-6 col-sm-3'><img id='uploadPreview1' width='150' height='150' src='img/not-available.png' /></div></div><br><div class='row g-3'><!---------Nombre--------><div class='col'><label for='Nombre' class='form-label'>Nombre</label><input type='email' class='form-control' id='Nombre' placeholder='Nombre(s)' aria-describedby='emailHelp'></div><!---------Apellido Paterno--------><div class='col'><label for='ApellidoP' class='form-label'>Apellido Paterno</label><input type='text' class='form-control border border-danger' id='ApellidoP' placeholder='Apellido Paterno' aria-label='First name' required></div><!---------Apellido Materno--------><div class='col'><label for='ApellidoM' class='form-label'>Apellido Materno</label><input type='text' class='form-control border border-success' id='ApellidoM'  placeholder='Apellido Materno' aria-label='Last name'></div></div><div class='row g-3'><div class='col col-lg-2'><label for='FechaN' class='form-label'> Fecha de nacimiento.</label><br><input type='date' onblur='calcularEdad(document.getElementById();' id='FechaN'  name='FechaN' class='form-control-xs border border-danger'  required=''></div><div class='col col-lg-2'><label for='edad' class='form-label'> Edad</label><br><input type='number' id='edad' onblur='FechaNac(document.getElementById();'  placeholder='Edad' class='form-control-xs border border-danger' ></div></div><div class='row g-3'><div class='col-auto me-auto'><label for='Sexo' class='form-label'> Sexo</label><select class='form-select form-select-xs mb-3 border border-danger' aria-label='.form-select-lg example' id='Sexo' name='Sexo' required><option selected>Selecciona...</option><option value='Masculino'>Masculino</option><option value='Femenino'>Femenino</option></select></div><div class='col'><br><div class='form-check'><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault'><label class='form-check-label' for='flexCheckDefault'>¿Es Extranjero?</label></div></div></div><div class='row g-3'><!---------Estado--------><div class='col-6 col-sm-3'><label for='Estado' class='form-label'> Estado de Nacimiento</label><input class='form-control border border-danger'  placeholder='Selecciona Estado de Nacimiento'  list='ListEstado' id='Estado' ><datalist id='ListEstado'><option value='Selecciona...' selected=''></option><option  value='Ciudad de Mexico'>Ciudad de Mexico</option><option value='Queretaro'>Querétaro</option><option value='San Luis Potosi'>San Luis Potosi</option><option value='Chihuahua'>Chihuahua</option></div><!---------Curp--------><div class='col-6 col-sm-3'><label for='Curp' class='form-label'> Curp</label><input type='text' class='form-control border border-danger' placeholder='Curp' id='Curp' name='Curp'><div id='cer' class='form-text'></div></div><!---------Generar--------><div class='col-6 col-sm-3'><br><button type='button' class='btn btn-primary'>Generar</button></div></div><div class='row g-3'><!---------Colonia--------><div class='col'>           <label for='Colonia' class='form-label'>Colonía</label><input class='form-control border border-danger' placeholder='Seleccione Colonia' list='ListColonia' id='Colonia' ><datalist id='ListColonia'><option selected value='Selecciona...'></option><option value='Villas de Santiago'>Villas de Santiago</option><option value='El Vergel'>El Vergel</option><option value='La españa'>La españa</option></datalist></div><!---------Calle--------><div class='col'><label for='Calle' class='form-label'> Calle</label><input class='form-control border border-danger' placeholder='Calle' list='ListCalle' id='Calle'><datalist  id='ListCalle'><option selected value='Selecciona...'></option></datalist></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Exterior</label><input type='text' class='form-control border border-danger' placeholder='Numero Exterior' id='NumE' name='NumE'><div id='cer' class='form-text'></div></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Interior</label><input type='text' class='form-control border border-success' placeholder='Numero interior' id='NumI' name='NumI'></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Etnia' class='form-label'>Etnia</label><input class='form-control border border-danger' placeholder='Selecciona Etnia' list='ListaEtnias' id='Etnia'><datalist id='ListaEtnias'><option value='Seleciona...' selected=''></option><option value='Ninguna'></option><option value='Otomí'></option><option value='Purepecha'></option><option value='Otomí-Chichimecas'></option></datalist></div><div class='col-6 col-sm-3'><label for='Orgien' class='form-label'>Origen</label><input class='form-control border-success' list='ListOrigen'  placeholder='Selecciona Origen' id='Origen'><datalist id='ListOrigen'><option selected>Origen</option><option value='Rural'>Rural</option><option value='Urbano'>Urbano</option></datalist></div></div><br><div class='row g-3'><div class='col-6 col-sm-3'><label for='Identificacion' class='form-label'> Tipo de Identificacion</label><input class='form-control border border-danger' placeholder='Selecciona Identificacion' list='ListIdentificacion' id='Identificacion'><datalist id='ListIdentificacion'><option selected value='Selecciona...'></option><option value='INE'>INE</option><option value='Curp'>Curp</option><option value='Cartilla Militar'>Cartilla Militar</option><option value='Pasaporte'>Pasaporte</option></datalist></div><div class='col-6 col-sm-3'><label for='NumIdentifcacion' class='form-label'> Numero de Identificacion</label><input type='text' class='form-control border border-danger' placeholder='Numero de Identificacion' id='NumIdentifcacion' name='NumIdentifcacion' required></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Celular' class='form-label'>Numero de Celular</label><input type='text' class='form-control border-success' placeholder='Número Celular' id='Celular' name='Celular'></div><div class='col-6 col-sm-3'><label for='Telefono' class='form-label'>Numero de Telefono </label><input type='text' class='form-control border-success'  placeholder='Número Teléfonico' id='Telefono' name='Telefono'></div></div></form>";		
	}
	else if (cod=="Asesor"){
		window.alert("Asesor Juridico");
		let div = document.getElementById("Formulario");
		div.innerHTML ="<form id='miForm'><div class='row g-3'><div class='col-6 col-sm-3'><label for='formFile' class='form-label'>Foto</label><input class='form-control border-success' type='file' placeholder='Inserta Fotografia' id='uploadImage1' name='images[1]' onchange='previewImage(1);'></div><div class='col-6 col-sm-3'><img id='uploadPreview1' width='150' height='150' src='img/not-available.png' /></div></div><br><div class='row g-3'><!---------Nombre--------><div class='col'><label for='Nombre' class='form-label'>Nombre</label><input type='email' class='form-control' id='Nombre' placeholder='Nombre(s)' aria-describedby='emailHelp'></div><!---------Apellido Paterno--------><div class='col'><label for='ApellidoP' class='form-label'>Apellido Paterno</label><input type='text' class='form-control border border-danger' id='ApellidoP' placeholder='Apellido Paterno' aria-label='First name' required></div><!---------Apellido Materno--------><div class='col'><label for='ApellidoM' class='form-label'>Apellido Materno</label><input type='text' class='form-control border border-success' id='ApellidoM'  placeholder='Apellido Materno' aria-label='Last name'></div></div><div class='row g-3'><div class='col col-lg-2'><label for='FechaN' class='form-label'> Fecha de nacimiento.</label><br><input type='date' onblur='calcularEdad(document.getElementById();' id='FechaN'  name='FechaN' class='form-control-xs border border-danger'  required=''></div><div class='col col-lg-2'><label for='edad' class='form-label'> Edad</label><br><input type='number' id='edad' onblur='FechaNac(document.getElementById();'  placeholder='Edad' class='form-control-xs border border-danger' ></div></div><div class='row g-3'><div class='col-auto me-auto'><label for='Sexo' class='form-label'> Sexo</label><select class='form-select form-select-xs mb-3 border border-danger' aria-label='.form-select-lg example' id='Sexo' name='Sexo' required><option selected>Selecciona...</option><option value='Masculino'>Masculino</option><option value='Femenino'>Femenino</option></select></div><div class='col'><br><div class='form-check'><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault'><label class='form-check-label' for='flexCheckDefault'>¿Es Extranjero?</label></div></div></div><div class='row g-3'><!---------Estado--------><div class='col-6 col-sm-3'><label for='Estado' class='form-label'> Estado de Nacimiento</label><input class='form-control border border-danger'  placeholder='Selecciona Estado de Nacimiento'  list='ListEstado' id='Estado' ><datalist id='ListEstado'><option value='Selecciona...' selected=''></option><option  value='Ciudad de Mexico'>Ciudad de Mexico</option><option value='Queretaro'>Querétaro</option><option value='San Luis Potosi'>San Luis Potosi</option><option value='Chihuahua'>Chihuahua</option></div><!---------Curp--------><div class='col-6 col-sm-3'><label for='Curp' class='form-label'> Curp</label><input type='text' class='form-control border border-danger' placeholder='Curp' id='Curp' name='Curp'><div id='cer' class='form-text'></div></div><!---------Generar--------><div class='col-6 col-sm-3'><br><button type='button' class='btn btn-primary'>Generar</button></div></div><div class='row g-3'><!---------Colonia--------><div class='col'>           <label for='Colonia' class='form-label'>Colonía</label><input class='form-control border border-danger' placeholder='Seleccione Colonia' list='ListColonia' id='Colonia' ><datalist id='ListColonia'><option selected value='Selecciona...'></option><option value='Villas de Santiago'>Villas de Santiago</option><option value='El Vergel'>El Vergel</option><option value='La españa'>La españa</option></datalist></div><!---------Calle--------><div class='col'><label for='Calle' class='form-label'> Calle</label><input class='form-control border border-danger' placeholder='Calle' list='ListCalle' id='Calle'><datalist  id='ListCalle'><option selected value='Selecciona...'></option></datalist></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Exterior</label><input type='text' class='form-control border border-danger' placeholder='Numero Exterior' id='NumE' name='NumE'><div id='cer' class='form-text'></div></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Interior</label><input type='text' class='form-control border border-success' placeholder='Numero interior' id='NumI' name='NumI'></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Etnia' class='form-label'>Etnia</label><input class='form-control border border-danger' placeholder='Selecciona Etnia' list='ListaEtnias' id='Etnia'><datalist id='ListaEtnias'><option value='Seleciona...' selected=''></option><option value='Ninguna'></option><option value='Otomí'></option><option value='Purepecha'></option><option value='Otomí-Chichimecas'></option></datalist></div><div class='col-6 col-sm-3'><label for='Orgien' class='form-label'>Origen</label><input class='form-control border-success' list='ListOrigen'  placeholder='Selecciona Origen' id='Origen'><datalist id='ListOrigen'><option selected>Origen</option><option value='Rural'>Rural</option><option value='Urbano'>Urbano</option></datalist></div></div><br><div class='row g-3'><div class='col-6 col-sm-3'><label for='Identificacion' class='form-label'> Tipo de Identificacion</label><input class='form-control border border-danger' placeholder='Selecciona Identificacion' list='ListIdentificacion' id='Identificacion'><datalist id='ListIdentificacion'><option selected value='Selecciona...'></option><option value='INE'>INE</option><option value='Curp'>Curp</option><option value='Cartilla Militar'>Cartilla Militar</option><option value='Pasaporte'>Pasaporte</option></datalist></div><div class='col-6 col-sm-3'><label for='NumIdentifcacion' class='form-label'> Numero de Identificacion</label><input type='text' class='form-control border border-danger' placeholder='Numero de Identificacion' id='NumIdentifcacion' name='NumIdentifcacion' required></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Celular' class='form-label'>Numero de Celular</label><input type='text' class='form-control border-success' placeholder='Número Celular' id='Celular' name='Celular'></div><div class='col-6 col-sm-3'><label for='Telefono' class='form-label'>Numero de Telefono </label><input type='text' class='form-control border-success'  placeholder='Número Teléfonico' id='Telefono' name='Telefono'></div></div><div class='row g-3'><div class='row g-3'><div class='col-6 col-sm-3'><label for='Cedula' class='form-label'>Numero de Cedula</label><input type='text' class='form-control border-success' placeholder='Número de Cedula' id='Cedula' name='Cedula'></div></div></form>";		
	}
	else if (cod=="Policia"){
		window.alert("Policia");
		let div = document.getElementById("Formulario");
		div.innerHTML ="<form id='miForm'><div class='row g-3'><div class='col-6 col-sm-3'><label for='formFile' class='form-label'>Foto</label><input class='form-control border-success' type='file' placeholder='Inserta Fotografia' id='uploadImage1' name='images[1]' onchange='previewImage(1);'></div><div class='col-6 col-sm-3'><img id='uploadPreview1' width='150' height='150' src='img/not-available.png' /></div></div><br><div class='row g-3'><!---------Nombre--------><div class='col'><label for='Nombre' class='form-label'>Nombre</label><input type='email' class='form-control' id='Nombre' placeholder='Nombre(s)' aria-describedby='emailHelp'></div><!---------Apellido Paterno--------><div class='col'><label for='ApellidoP' class='form-label'>Apellido Paterno</label><input type='text' class='form-control border border-danger' id='ApellidoP' placeholder='Apellido Paterno' aria-label='First name' required></div><!---------Apellido Materno--------><div class='col'><label for='ApellidoM' class='form-label'>Apellido Materno</label><input type='text' class='form-control border border-success' id='ApellidoM'  placeholder='Apellido Materno' aria-label='Last name'></div></div><div class='row g-3'><div class='col col-lg-2'><label for='FechaN' class='form-label'> Fecha de nacimiento.</label><br><input type='date' onblur='calcularEdad(document.getElementById();' id='FechaN'  name='FechaN' class='form-control-xs border border-danger'  required=''></div><div class='col col-lg-2'><label for='edad' class='form-label'> Edad</label><br><input type='number' id='edad' onblur='FechaNac(document.getElementById();'  placeholder='Edad' class='form-control-xs border border-danger' ></div></div><div class='row g-3'><div class='col-auto me-auto'><label for='Sexo' class='form-label'> Sexo</label><select class='form-select form-select-xs mb-3 border border-danger' aria-label='.form-select-lg example' id='Sexo' name='Sexo' required><option selected>Selecciona...</option><option value='Masculino'>Masculino</option><option value='Femenino'>Femenino</option></select></div><div class='col'><br><div class='form-check'><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault'><label class='form-check-label' for='flexCheckDefault'>¿Es Extranjero?</label></div></div></div><div class='row g-3'><!---------Estado--------><div class='col-6 col-sm-3'><label for='Estado' class='form-label'> Estado de Nacimiento</label><input class='form-control border border-danger'  placeholder='Selecciona Estado de Nacimiento'  list='ListEstado' id='Estado' ><datalist id='ListEstado'><option value='Selecciona...' selected=''></option><option  value='Ciudad de Mexico'>Ciudad de Mexico</option><option value='Queretaro'>Querétaro</option><option value='San Luis Potosi'>San Luis Potosi</option><option value='Chihuahua'>Chihuahua</option></div><!---------Curp--------><div class='col-6 col-sm-3'><label for='Curp' class='form-label'> Curp</label><input type='text' class='form-control border border-danger' placeholder='Curp' id='Curp' name='Curp'><div id='cer' class='form-text'></div></div><!---------Generar--------><div class='col-6 col-sm-3'><br><button type='button' class='btn btn-primary'>Generar</button></div></div><div class='row g-3'><!---------Colonia--------><div class='col'>           <label for='Colonia' class='form-label'>Colonía</label><input class='form-control border border-danger' placeholder='Seleccione Colonia' list='ListColonia' id='Colonia' ><datalist id='ListColonia'><option selected value='Selecciona...'></option><option value='Villas de Santiago'>Villas de Santiago</option><option value='El Vergel'>El Vergel</option><option value='La españa'>La españa</option></datalist></div><!---------Calle--------><div class='col'><label for='Calle' class='form-label'> Calle</label><input class='form-control border border-danger' placeholder='Calle' list='ListCalle' id='Calle'><datalist  id='ListCalle'><option selected value='Selecciona...'></option></datalist></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Exterior</label><input type='text' class='form-control border border-danger' placeholder='Numero Exterior' id='NumE' name='NumE'><div id='cer' class='form-text'></div></div><div class='col-auto'><label for='NumE' class='form-label'> Numero Interior</label><input type='text' class='form-control border border-success' placeholder='Numero interior' id='NumI' name='NumI'></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Etnia' class='form-label'>Etnia</label><input class='form-control border border-danger' placeholder='Selecciona Etnia' list='ListaEtnias' id='Etnia'><datalist id='ListaEtnias'><option value='Seleciona...' selected=''></option><option value='Ninguna'></option><option value='Otomí'></option><option value='Purepecha'></option><option value='Otomí-Chichimecas'></option></datalist></div><div class='col-6 col-sm-3'><label for='Orgien' class='form-label'>Origen</label><input class='form-control border-success' list='ListOrigen'  placeholder='Selecciona Origen' id='Origen'><datalist id='ListOrigen'><option selected>Origen</option><option value='Rural'>Rural</option><option value='Urbano'>Urbano</option></datalist></div></div><br><div class='row g-3'><div class='col-6 col-sm-3'><label for='Identificacion' class='form-label'> Tipo de Identificacion</label><input class='form-control border border-danger' placeholder='Selecciona Identificacion' list='ListIdentificacion' id='Identificacion'><datalist id='ListIdentificacion'><option selected value='Selecciona...'></option><option value='INE'>INE</option><option value='Curp'>Curp</option><option value='Cartilla Militar'>Cartilla Militar</option><option value='Pasaporte'>Pasaporte</option></datalist></div><div class='col-6 col-sm-3'><label for='NumIdentifcacion' class='form-label'> Numero de Identificacion</label><input type='text' class='form-control border border-danger' placeholder='Numero de Identificacion' id='NumIdentifcacion' name='NumIdentifcacion' required></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Celular' class='form-label'>Numero de Celular</label><input type='text' class='form-control border-success' placeholder='Número Celular' id='Celular' name='Celular'></div><div class='col-6 col-sm-3'><label for='Telefono' class='form-label'>Numero de Telefono </label><input type='text' class='form-control border-success'  placeholder='Número Teléfonico' id='Telefono' name='Telefono'></div></div><div class='row g-3'><div class='col-6 col-sm-3'><label for='Cargo' class='form-label'> Cargo</label><input class='form-control border border-danger'  placeholder='Seleccione Cargo ' list='ListCargo' id='Cargo'><datalist id='ListCargo'><option selected>Seleccione cargo</option><option value='Policia'>Policia</option><option value='Comandante'>Comandante</option></datalist></div></div></form>";
			}
	else if (cod==" ") {

		let div=document.getElementById("Formulario");
		div.innerHTML=" ";
	}
}