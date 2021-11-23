/**
 * 
 * author:zepeda codepen https://codepen.io/zepeda
 * Editor:Braulio Miguel Perales Venegas (FGE)
 * En este apartado nosotros Generamos el curp de manera NO OFICIAL, para esto  utilizamos los siguientes datos:Nombre,Apellido Paterno, 
 * Apellido Materno, Fecha de nacimiento,Genero, Estado de Nacimiento, los ultimos dos digitos se generan de anera aleatoria esto debido a que  
 * esos digitos son identificadores el cual gobierno asigna con un algoritmo con el cual no contamos. 
 * Ultima modificacion: 23-07-2021.
 * */

(function (global) {
  'use strict';
  var comunes = [  'MA', 'MA.', 'J', 'J.' ];

  /* ASI SE ENCONTRABA ORIGINALMENTE= */ /*   var comunes = [ 'MARIA', 'MA', 'MA.', 'JOSE', 'J', 'J.' ];*/
  
  function filtraInconvenientes(str) {
    var inconvenientes = [ 'BACA', 'LOCO', 'BUEI', 'BUEY', 'MAME', 'CACA', 'MAMO',
      'CACO', 'MEAR', 'CAGA', 'MEAS', 'CAGO', 'MEON', 'CAKA', 'MIAR', 'CAKO', 'MION',
      'COGE', 'MOCO', 'COGI', 'MOKO', 'COJA', 'MULA', 'COJE', 'MULO', 'COJI', 'NACA',
      'COJO', 'NACO', 'COLA', 'PEDA', 'CULO', 'PEDO', 'FALO', 'PENE', 'FETO', 'PIPI',
      'GETA', 'PITO', 'GUEI', 'POPO', 'GUEY', 'PUTA', 'JETA', 'PUTO', 'JOTO', 'QULO',
      'KACA', 'RATA', 'KACO', 'ROBA', 'KAGA', 'ROBE', 'KAGO', 'ROBO', 'KAKA', 'RUIN',
      'KAKO', 'SENO', 'KOGE', 'TETA', 'KOGI', 'VACA', 'KOJA', 'VAGA', 'KOJE', 'VAGO',
      'KOJI', 'VAKA', 'KOJO', 'VUEI', 'KOLA', 'VUEY', 'KULO', 'WUEI', 'LILO', 'WUEY',
      'LOCA' ];

    if (inconvenientes.indexOf(str) > -1) {
      str = str.replace(/^(\w)\w/, '$1X');
    }

    return str;
  }

  /**
   * ajustaCompuesto()
   * Cuando el nombre o los apellidos son compuestos y tienen
   * proposiciones, contracciones o conjunciones, se deben eliminar esas palabras
   * a la hora de calcular el CURP.
   * @param {string} str - String donde se eliminarán las partes que lo hacen compuesto
   */
  function ajustaCompuesto(str) {
    var compuestos = [ /\bDA\b/, /\bDAS\b/, /\bDE\b/, /\bDEL\b/, /\bDER\b/, /\bDI\b/,
        /\bDIE\b/, /\bDD\b/, /\bEL\b/, /\bLA\b/, /\bLOS\b/, /\bLAS\b/, /\bLE\b/,
        /\bLES\b/, /\bMAC\b/, /\bMC\b/, /\bVAN\b/, /\bVON\b/, /\bY\b/ ];

    compuestos.forEach(function (compuesto) {
      if (compuesto.test(str)) {
        str = str.replace(compuesto, '');
      }
    });

    return str;
  }

  /**
  * zeropad()
  * Rellena con ceros un string, para que quede de un ancho determinado.
  * @param {number} ancho - Ancho deseado.
  * @param {number} num - Numero que sera procesado.
  */
  function zeropad(ancho, num) {
    var pad = Array.apply(0, Array.call(0, ancho)).map(function () { return 0; }).join('');

    return (pad + num).replace(new RegExp('^.*([0-9]{' + ancho + '})$'), '$1');
  }
  /**
  * primerConsonante()
  * Saca la primer consonante interna del string, y la devuelve.
  * Si no hay una consonante interna, devuelve X.
  * @param {string} str - String del cual se va a sacar la primer consonante.
  */
  function primerConsonante(str) {
    str = str.trim().substring(1).replace(/[AEIOU]/ig, '').substring(0, 1);
    return (str === '' || str === 'Ñ') ? 'X' : str;
  }

  /**
  * filtraCaracteres()
  * Filtra convirtiendo todos los caracteres no alfabeticos a X.
  * @param {string} str - String el cual sera convertido.
  */
  function filtraCaracteres(str) {
    return str.toUpperCase().replace(/[\d_\-\.\/\\,]/g, 'X');
  }

  /**
  * estadoValido()
  * Valida si el estado esta en la lista de estados, de acuerdo a la RENAPO.
  * @param {string} str - String con el estado.
  */
  function estadoValido(str) {
    var estado = [ 'AS', 'BC', 'BS', 'CC', 'CS', 'CH', 'CL', 'CM', 'DF', 'DG',
        'GT', 'GR', 'HG', 'JC', 'MC', 'MN', 'MS', 'NT', 'NL', 'OC', 'PL', 'QT',
        'QR', 'SP', 'SL', 'SR', 'TC', 'TS', 'TL', 'VZ', 'YN', 'ZS', 'NE' ];

    return (estado.indexOf(str.toUpperCase()) > -1);
  }


  /**
  * normalizaString()
  * Elimina los acentos, eñes y diéresis que pudiera tener el nombre.
  * @param {string} str - String con el nombre o los apellidos.
  */
  function normalizaString(str) {
    var origen, destino, salida;
    origen  = [ 'Ã', 'À', 'Á', 'Ä', 'Â', 'È', 'É', 'Ë', 'Ê', 'Ì', 'Í', 'Ï', 'Î',
             'Ò', 'Ó', 'Ö', 'Ô', 'Ù', 'Ú', 'Ü', 'Û', 'ã', 'à', 'á', 'ä', 'â',
             'è', 'é', 'ë', 'ê', 'ì', 'í', 'ï', 'î', 'ò', 'ó', 'ö', 'ô', 'ù',
             'ú', 'ü', 'û', 'Ç', 'ç' ];
    destino = [ 'A', 'A', 'A', 'A', 'A', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I',
             'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'a', 'a', 'a', 'a', 'a',
             'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'u',
             'u', 'u', 'u', 'c', 'c' ];
    str     = str.split('');
    salida  = str.map(function (char) {
      var pos = origen.indexOf(char);
      return (pos > -1) ? destino[pos] : char;
    });

    return salida.join('');
  }


  /**
  * agregaDigitoVerificador()
  * Agrega el dígito que se usa para validar el CURP.
  * @param {string} curp_str - String que contiene los primeros 17 caracteres del CURP.
  */
  function agregaDigitoVerificador(curp_str) {
    var curp, caracteres, curpNumerico, suma, digito;

    // Convierte el CURP en un arreglo
    curp = curp_str.substring(0, 17).toUpperCase().split('');
    caracteres  = [
      '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E',
      'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S',
      'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    // Convierte el curp a un arreglo de números, usando la posición de cada
    // carácter, dentro del arreglo `caracteres`.
    curpNumerico = curp.map(function (caracter) {
      return caracteres.indexOf(caracter);
    });

    suma = curpNumerico.reduce(function (prev, valor, indice) {
      return prev + (valor * (18 - indice));
    }, 0);

    digito = (10 - (suma % 10));

    if (digito === 10) {
      digito = 0;
    }

    return curp_str + digito;
  }

  /**
   * extraerInicial()
   * Funcion que extrae la inicial del primer nombre, o, si tiene mas de 1 nombre Y el primer
   * nombre es uno de la lista de nombres comunes, la inicial del segundo nombre
   * @param {string} nombre - String que representa todos los nombres (excepto los apellidos) separados por espacio
   */
  function extraerInicial(nombre) {
    var nombres, primerNombreEsComun;
    nombres = nombre.toUpperCase().trim().split(/\s+/);
    primerNombreEsComun = (nombres.length > 1 && comunes.indexOf(nombres[0]) > -1);

    if (primerNombreEsComun) {
      return nombres[1].substring(0, 1);
    }

    return nombres[0].substring(0, 1);
  }

  /**
  * generaCurp()
  * Función principal que genera el CURP.
  * @param {object} param - Objeto que tiene los parámetros necesarios para poder generar el curp,
  * Las propiedasdes del objeto param son:
  * @param {string} nombre - Nombre(s).
  * @param {string} apellido_paterno - Apellido materno.
  * @param {string} apellido_materno - Apellido materno.
  * En caso de haber conjunciones en los apellidos, estas deben ir aqui.
  * @param {string} sexo - Sexo. H para hombre, M para mujer.
  * @param {string} estado - Estado, usando las abreviaturas oficiales.
  * @param {array} fecha_nacimiento - Arreglo con [ día, mes, año ], cada uno como numero.
  * @param {string} [homonimia] - Opcional. Valor usado para evitar repeticiones, es asignado por gobernación.
  * Por default es 0 si la fecha de nacimiento es menor o igual a 1999, o A, si es igual o mayor a 2000.
  */
  function generaCurp(param) {
    var inicial_nombre, vocal_apellido, posicion_1_4, posicion_14_16, curp, primera_letra_paterno, primera_letra_materno, nombres, nombre_a_usar, pad;

    pad = zeropad.bind(null, 2);
    if (!estadoValido(param.estado)) {
      return false;
    }

    param.nombre = ajustaCompuesto(normalizaString(param.nombre.toUpperCase())).trim();
    param.apellido_paterno = ajustaCompuesto(normalizaString(param.apellido_paterno.toUpperCase())).trim();

    param.apellido_materno = param.apellido_materno || "";
    param.apellido_materno = ajustaCompuesto(normalizaString(param.apellido_materno.toUpperCase())).trim();

    inicial_nombre = extraerInicial(param.nombre);

    vocal_apellido = param.apellido_paterno.trim().substring(1).replace(/[BCDFGHJKLMNÑPQRSTVWXYZ]/g, '').substring(0, 1);
    vocal_apellido = (vocal_apellido === '') ? 'X' : vocal_apellido;

    primera_letra_paterno = param.apellido_paterno.substring(0, 1);
    primera_letra_paterno = primera_letra_paterno === 'Ñ' ? 'X' : primera_letra_paterno;

    if (!param.apellido_materno || param.apellido_materno === "") {
      primera_letra_materno = 'X';
    } else {
      primera_letra_materno = param.apellido_materno.substring(0, 1);
      primera_letra_materno = primera_letra_materno === 'Ñ' ? 'X' : primera_letra_materno;
    }

    posicion_1_4 = [
      primera_letra_paterno,
      vocal_apellido,
      primera_letra_materno,
      inicial_nombre
    ].join('');

    posicion_1_4 = filtraInconvenientes(filtraCaracteres(posicion_1_4));

    nombres = param.nombre.split(" ").filter(function (palabra) {
      return palabra !== "";
    });
    nombre_a_usar = comunes.indexOf(nombres[0]) > -1 ? nombres[1] : nombres[0];

    posicion_14_16 = [
      primerConsonante(param.apellido_paterno),
      primerConsonante(param.apellido_materno),
      primerConsonante(nombre_a_usar)
    ].join('');

    curp = [
      posicion_1_4,
      pad(param.fecha_nacimiento[2] - 1900),
      pad(param.fecha_nacimiento[1]),
      pad(param.fecha_nacimiento[0]),
      param.sexo.toUpperCase(),
      param.estado.toUpperCase(),
      posicion_14_16,
      param.homonimia || (param.fecha_nacimiento[2] > 1999 ? 'A' : 0)
    ].join('');

    return agregaDigitoVerificador(curp);
  }

  // Si es un navegador, exporta 'generaCurp' a una variable global.
  // Si es node.js, exporta esa función en module.exports
  if (global.hasOwnProperty('window') && global.window === global) {
    global.generaCurp = generaCurp;
  } else {
    module.exports = generaCurp;
  }

}(this));
/*==============================================================================*/

/* separacion de fecha de nacimiento*/

/*===============================================*/
function calcularEstado(Estado){
  if (Estado=="QUERETARO") {
    return "QT";
  }else if(Estado=="GUANAJUATO"){
    return "GT";
  }else if (Estado=="GUERRERO"){
    return "GR";
  }else if (Estado=="HIDALGO") {
    return "HG";
  }else if (Estado=="JALISCO") {
    return "JC";
  }else if(Estado=="DISTRITO FEDERAL"){
    return "DF";
  }else if (Estado=="MICHOACAN") {
    return "MN";
  }else if (Estado=="MORELOS") {
    return "MS";
  }else if (Estado=="NAYARIT"){
    return "NT";
  } else if (Estado=="NUEVO LEON"){
    return "NL";
  }else if (Estado=="OAXACA"){
    return "OC";
  }else if (Estado=="PUEBLA"){
    return "PL";
  }else if (Estado=="QUINTANA ROO"){
    return "QR";
  }else if (Estado=="SAN LUIS POTOSI"){
    return "SP";
  }else if (Estado=="SINALOA"){
    return "SL";
  }else if (Estado=="SONORA"){
    return "SR";
  }else if (Estado=="TABASCO"){
    return "TC";
  }else if (Estado=="TAMAULIPAS"){
    return "TS";
  }else if (Estado=="TLAXCALA"){
    return "TL";
  }else if (Estado=="VERACRUZ"){
    return "VZ";
  }else if (Estado=="ZACATECAS"){
    return "ZS"
  }else if (Estado=="BAJA CALIFORNIA"){
    return "BC"
  }else if (Estado=="BAJA CALIFORNIA SUR"){
    return "BS"
  }else if (Estado=="CAMPECHE"){
    return "CM"
  }else if (Estado=="DURANGO"){
    return "DG";
  }else if(Estado=="YUCATAN"){
    return "YN";
  }else if(Estado=="AGUASCALIENTES"){
    return "AS";
  }else if(Estado=="MEXICO ESTADO"){
    return "MC";
  }else if(Estado=="COLIMA"){
    return "CM";
  }else if(Estado="CHIAPAS"){
    return "CS";
  }else if(Estado=="CHIHUAHUA"){
     return "CH";
  }else if(Estado=="COAHUILA"){
    return "CL";
  }else{
    return "NE";
  }
}


/*+++ Aqui va la implementacion +++*/
function calcularCurp(){
  var sexo="";
  var nombre=document.getElementById("Nombre").value;
  var apellido_paterno=document.getElementById("ApellidoP").value;
  var apellido_materno=document.getElementById("ApellidoM").value;
  var genero=document.getElementById("genero").value;
  if(genero==2){
    sexo="H";
  }else if(genero==3){
    sexo="M";
  }
  var Estado=document.getElementById("Estado").value;
  var estado=calcularEstado(Estado);
  var Fecha=document.getElementById("FechaN").value;
  console.log(Fecha);
  var fecha2=Fecha.split("-");
  var fecha_nacimiento=[fecha2[2],fecha2[1],fecha2[0]];
  console.log(fecha_nacimiento);
  
  /*
  var curp = generaCurp({
    nombre            : 'Constantina',
    apellido_paterno  : 'Vazquez',
    apellido_materno  : 'Bautista',
    sexo              : 'M',
    estado            : 'PL',
    fecha_nacimiento  : [25, 02, 1957]
  });
  */  
  
  var curp = generaCurp({
    nombre            : nombre,
    apellido_paterno  : apellido_paterno,
    apellido_materno  : apellido_materno,
    sexo              : sexo,
    estado            : estado,
    fecha_nacimiento  : fecha_nacimiento
  });  
  
  document.getElementById('Curp').value=curp;
}


/***********/
function validarInput(input) {
	var curp = input.value.toUpperCase(),
    	resultado = document.getElementById("resultado2"),
        valido = "No válido";
        
    if (curpValida(curp)) {
    	valido = "Válido";
        resultado.classList.add("ok");
    } else {
    	resultado.classList.remove("ok");
    }
        
    resultado.innerText = "CURP: " + curp + "\nFormato: " + valido;
}

function curpValida(curp) {
	var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
    	validado = curp.match(re);
	
    if (!validado)  //Coincide con el formato general?
    	return false;
    
    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if(lngDigito == 10)
            return 0;
        return lngDigito;
    }
    if (validado[2] != digitoVerificador(validado[1])) 
    	return false;
        
	return true; //Validado
}
