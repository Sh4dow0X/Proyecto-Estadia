function ejecutar() {
    let llamado= document.getElementById("FechaN").value;
    let Edad= document.getElementById("edad").value;
    if (llamado=="") {
        console.log("ejecutando Fecha Nacimiento");
        FechaNac();
    }else{
        
    }
    if (Edad=="") {
        console.log("ejecutando Calcular Edad");
       calcularEdad();
    }else{

    }
}

function previewImage() {        
	var reader = new FileReader();         
	reader.readAsDataURL(document.getElementById('uploadImage1').files[0]);         
	reader.onload = function (e) {             
        document.getElementById('uploadPreview2').src = e.target.result;
    };     
}

function calcularEdad() {
    var fecha= document.getElementById("FechaN").value;
    var fechaNace = new Date(fecha);
    var fechaActual = new Date();

    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();

    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);

    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

   $('#edad').val(edad);
}

function Clasificacion() {
    var clas=document.getElementById("rol").value;
    console.log(clas);
    var x = document.getElementById("Cedula");
    var y=document.getElementById("Cargo");
    var z= document.getElementById("Cargo2");
    if (clas==1) {
        x.disabled=true;
        y.disabled=true;
         z.disabled=true;
    }else if(clas==2){
        if (x.disabled=true) {
            x.disabled=false;
        }
        y.disabled=true;
        z.disabled=true;
    }else if(clas==3){
        if (y.disabled=true ){
            y.disabled=false;
            z.disabled=false;
        }
        x.disabled=true;
    }
}

function FechaNac(){
    let Edad= document.getElementById("edad").value;
    let conve=parseInt(Edad,10);
    //window.alert(Edad);
    var fecha = new Date(); //Fecha actual
    //window.alert(fecha);
    año=fecha.getFullYear();
    conv=parseInt(año,10);
    rest=conv-conve;
   //window.alert(rest);
    dia=Number(-'30');//fecha en negativo debido a que esta inverso el formato
    mes=Number('01');
    var año=rest;
    var añof=dia+"-"+mes+"-"+año;
    console.log(añof);
    var f=Date.UTC(año,mes,dia);
    var timestamp=f;
    var date2=new Date(timestamp);
    //window.alert(date2.getTime());
    var date3=date2.toISOString();
    var number4= date3.substring(0,10);
    $('#FechaN').val(number4);//scritura en input
}

function NumCelular(){
    let cal=document.getElementById("Celular").value;
    if (cal.length>=10){
         document.querySelector("#Celular").style.borderColor = "#90EE90 ";
         document.querySelector("#bien").style.visibility = "visible";
          document.querySelector("#mal").style.visibility = "hidden";    
    }else{
          document.querySelector("#Celular").style.borderColor = "red";
          document.querySelector("#bien").style.visibility = "hidden";
          document.querySelector("#mal").style.visibility = "visible";
    }
}

function NumTelefono(){
    let cal=document.getElementById("Telefono").value;
    if (cal.length>=10){
         document.querySelector("#Telefono").style.borderColor = "#90EE90 ";
         document.querySelector("#Bient").style.visibility = "visible";
          document.querySelector("#Malt").style.visibility = "hidden";    
    }else{
          document.querySelector("#Telefono").style.borderColor = "red";
          document.querySelector("#Bient").style.visibility = "hidden";
          document.querySelector("#Malt").style.visibility = "visible";
    }
}

function VerificaCurp(){
    let cal=document.getElementById("Curp").value;
    if (cal.length>=18){
         document.querySelector("#Curp").style.borderColor = "#90EE90 ";
         document.querySelector("#bienC").style.visibility = "visible";
          document.querySelector("#malC").style.visibility = "hidden";    
    }else{
          document.querySelector("#Curp").style.borderColor = "red";
          document.querySelector("#bienC").style.visibility = "hidden";
          document.querySelector("#malC").style.visibility = "visible";
    }
}

/*


function cont(){
	for (var i =0; i >=100; i++) {
		i++;
		window.alert(i);
	}
}
*/
