function Desaparece() {
    var x = document.getElementById("Tabla");
    var a=document.getElementById("BusqCiudadano");
    a.placeholder="Búsqueda de Ciudadano";
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function turno(){
    window.open("PDF/Turno.php");

}