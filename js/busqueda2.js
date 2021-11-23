function buscar_datos(consulta) {
	$.ajax({
		url:'php/Busquedaciudadano.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})
}

$(document).on('keyup','#Busqueda', function(){
	var valor=$("#Busqueda").val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		//buscar_datos();
	}
});