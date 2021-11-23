$(document).ready(function(){
	
	$.ajax({
		type:'POST',
		url:'cargar_proyectos.php',
		data:{'peticion':'cargar_proyectos'}
	})
	.done(function(listas_pro){
    $('#lista_proyectos').html(listas_pro)
	})
	.fail(function(){
		alert('Hubo un error al cargar los proyectos')
	})
})