let lista=[{key: 1, calle:"Santiago del sur", Colonia:"Villas de Santiago",Delegacion:"Epigmenio Gonzales",Municipio:"Querétaro"},
	{key: 2, calle:"Santiago de la Peña", Colonia:"Villas de Santiago",Delegacion:"Epigmenio Gonzales",Municipio:"Queretaro"}];

function BusquedaC(){
	for (var i = 1;i<=lista.length; i++) {
		var busqueda=lista.find(elemento => elemento.key == i);
		console.log(busqueda.key);
		var st=console.log(busqueda.calle);
		//$('#ListCalle').document.write("<option value="val(st)"");
		//document.write("<option value="val(st)">");
	}	
}

function Estado(Calle){
	var busqueda=lista.find(elemento => elemento.calle == Calle);
	var ca= busqueda.calle;
	var co=busqueda.Colonia;
	var del=busqueda.Delegacion;
	var Mun=busqueda.Municipio;
	console.log(ca);
	console.log(co);
	console.log(del);
	console.log(Mun);
	$('#Colonia').val(co);
	$('#Delegacion').val(del);
	$('#Municipio').val(Mun);
}