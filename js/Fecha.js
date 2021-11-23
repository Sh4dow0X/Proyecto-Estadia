/**
 * Obtiene la fecha actual del sistema
 * @var f genera nuevo objeto tipo Date
 * @var dia almacena la fecha completa
 * @var formato almancena el formato modificado
 */
function Fechas() {
	let f = new Date();
    let dia=f.getDate() + "/" +  ("0" + (f.getMonth() + 1)).slice(-2) + "/" + f.getFullYear();
    let formato=f.getFullYear()+(f.getMonth() + 1)+f.getDate();
    document.getElementById("fecha").innerHTML=dia;
    document.getElementById("FechaF"),innerHTML=formato;
    console.log(dia);


}
function Formato(){
	let h= new Date();
	let Año=h.getFullYear().toString();
	let DDAño=Año.slice(-2);
	const mes=["01","02","03","04","05","06","07","08","09","10","11","12"];
	let DDMes=mes[h.getMonth()];
	let formato=DDAño+""+DDMes+""+h.getDate();
    document.getElementById("FechaF").innerHTML=formato;
    document.getElementById("FechaFF").innerHTML=formato;
    console.log(formato);
}