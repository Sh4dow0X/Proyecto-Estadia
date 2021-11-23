function DesapareceD() {
	let x = document.getElementById("Datos");
	let y=document.getElementById("DatosGenerales");
	if (x.style.display === "none") {
		x.style.display = "block";
		y.style.display="block";
	} else {
		x.style.display = "none";
		y.style.display="none";
	}
}
function DesapareceF() {
	let a = document.getElementById("FilaE");
	let b=document.getElementById("Fila");
	if (a.style.display === "none") {
		a.style.display = "block";
		b.style.display="block";
	} else {
		a.style.display = "none";
		b.style.display="none";
	}
}
function AbrirD(){
	let x = document.getElementById("Datos");
	let y=document.getElementById("DatosGenerales");
	if (x.style.display === "none") {
		x.style.display = "block";
		y.style.display="block";
	}
}

function AbrirF(){
	let a = document.getElementById("FilaE");
	let b=document.getElementById("Fila");
	if (a.style.display === "none") {
		a.style.display = "block";
		b.style.display="block";
	}
	
}

function abrirEditarFila(){
	$('#btn-ventana').on('click',function(){
		$('#modalEditarFila').modal();
	})
}

function abrirBusqueda(){
	let b = document.getElementById("Busca");
	if (b.style.display==="block") {
		b.style.display="none";

	}else{
		b.style.display="block";
		
	}
}
