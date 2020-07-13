contenido_textarea = "";
num_caracteres_permitidos = 99;
function valida_longitud(){
num_caracteres = document.forms[0].descripcionDocumento.value.length

if (num_caracteres <= num_caracteres_permitidos){
contenido_textarea = document.forms[0].descripcionDocumento.value
}else{
document.forms[0].descripcionDocumento.value = contenido_textarea
}

if (num_caracteres >= num_caracteres_permitidos){
//document.forms[0].caracteres.style.color="#ff0000";
document.getElementById("capa").style.color="#ff0000";
}else{
//document.forms[0].caracteres.style.color="#000000";
document.getElementById("capa").style.color="#000000";
}

cuenta()
}
function cuenta(){
//document.forms[0].caracteres.value=document.forms[0].texto.value.length;
document.getElementById("capa").innerHTML=document.forms[0].descripcionDocumento.value.length;
}
function limpiar()
{
document.frm_contact.reset();
}

function close_window() {
  if (confirm("Cerrar ventana?")) {
    close();
  }
}

function cerrarVentana(){
	//alert();
	Windows.closeAll();
	return true;
}

function ltrim(s) {  
	return s.replace(/^\s+/, "");
}

function rtrim(s) {  
	return s.replace(/\s+$/, "");
}

function trim(s) {  
	return rtrim(ltrim(s));
}

function eliminarBlancos(texto){
	texto = trim(texto);
	if (texto.length >0)
	{
			cont = 0;
			for (i=0; i<texto.length;i++)
			{
					if (texto.charAt(i) == " ") cont++;
			}
			if (cont == texto.length) texto = "";
	}
	
	return texto;
}
  
function abrirVentanaRepositorio (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=630,height=360,top=0,left=0";
    window.open(pagina,"",opciones);
}
//var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=450,height=380,top=0,left=0";

function abrirVentanaDocumento (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=auto,height=570,top=0,left=0";
    window.open(pagina,"",opciones);
}

function abrirVentanaRepositorio2 (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=700,height=630,top=0,left=0";
    window.open(pagina,"",opciones);
}

function abrirVentanaRepositorio3 (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=750,height=850,top=0,left=0";
    window.open(pagina,"",opciones);
}

function abrirVentanaBiblioteca(pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=805,height=450,top=0,left=0";
    window.open(pagina,"",opciones);
}

function abrirVentanaClave(pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=770,height=700,top=0,left=0";
    window.open(pagina,"",opciones);
}

function creaCarpeta(){
	
	var msj=confirm("PROCEDERA A CREAR UNA CARPETA EN EL SERVIDOR.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
  var codAuditoria  = eliminarBlancos(document.getElementById("txtCodigoAuditoria").value.toUpperCase());
  var nomAuditoria  = document.getElementById("txtNombreAuditoria").value.toUpperCase();
  var annoAuditoria = document.getElementById("cboAnnoAuditoria").value;
  var estamento     = document.getElementById("txtCodEstamento").value;
  var tipoAuditoria = document.getElementById("cboTipoAuditoria").value;
  var cantHallazgo  = document.getElementById("txtCantidadHallazgo").value;
  //var ordenar=0;
	//alert(cod);
	 
	 //alert(codAuditoria);



  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/insertRepositorio.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send("codAuditoria="+codAuditoria+"&nomAuditoria="+nomAuditoria+"&annoAuditoria="+annoAuditoria+"&estamento="+estamento+"&tipoAuditoria="+tipoAuditoria+"&cantHallazgo="+cantHallazgo);


  
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
   




   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	//alert(objHttpXMLCargaDatos.responseText);
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
           
               alert('LOS DATOS FUERON INGRESADOS CON EXITO A LA BASE DE DATOS ......        ');
		
							 //top.listaRepositorio(ordenar);
							 window.opener.location = window.opener.location;
							 window.close();
		
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function listaRepositorio(ordenar)
{
	//alert();
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	

	

		//var ordenar = document.getElementById("cboOrdenaAuditoria").value;

	
//alert(ordenar);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/listaRepositorio.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI("ordenar="+ordenar));
   
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

function creaDocumento(){
	//var ordenar = document.getElementById("orden").value;

	//var carpeta = document.getElementById("txtCodigoAuditoria").value;
	
	var msj=confirm("PROCEDERA A REGISTRAR UN DOCUMENTO EN LA BIBLIOTECA \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
  //var codAuditoria  = document.getElementById("txtCodigoAuditoria").value;
  var nomDocumento  = document.getElementById("txtNombreDocumento").value.toUpperCase();
  //var nomDocumento  = "NULL";
  var tipoDocumento = document.getElementById("cboTipoDocumento").value;
  var descDocumento = document.getElementById("descripcionDocumento").value.toUpperCase();
  
  //if(tipoDocumento==30){
  // var otroInforme   = document.getElementById("txtOtroTipoInforme").value.toUpperCase();
  //}else{
  	var otroInforme   = "NULL";
  //}
  
  var rutaArchivo 						= document.getElementById("archivo").value;
	var arrayRutaArchivo 				= rutaArchivo.split("\\");
	var cantidadArreglo 				= arrayRutaArchivo.length;
	var nombreDelArchivo 				= arrayRutaArchivo[cantidadArreglo-1];
	var extension 							= (rutaArchivo.substring(rutaArchivo.lastIndexOf("."))).toUpperCase(); 	
  var archivo                 = nombreDelArchivo;
 
	//alert(archivo);

  

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/insertDocumentoBiblioteca.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send("nomDocumento="+nomDocumento+"&descDocumento="+descDocumento+"&archivo="+archivo+"&extension="+extension+"&tipoDocumento="+tipoDocumento+"&otroInforme="+otroInforme);


  
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
   




   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	//alert(objHttpXMLCargaDatos.responseText);
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
           
               alert('LOS DATOS FUERON INGRESADOS CON EXITO A LA BASE DE DATOS ......        ');
							 top.listaBiblioteca();
							 //limpiaFichaDocumento();
							 opener.location.reload();
							 //window.opener.location = window.opener.location;
							 window.close();
		
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function listaBiblioteca()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	//var codAuditoria  = document.getElementById("txtCodigoAuditoria").value;

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/listaBiblioteca.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send();
  
   //objHttpXMLCargaDatos.send(encodeURI("codAuditoria="+codAuditoria));
   //alert(codAuditoria);
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

function listaDocumento2()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	var codAuditoria  = document.getElementById("txtCodigoAuditoria").value;

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/listaDocumento2.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI("codAuditoria="+codAuditoria));
   //alert(codAuditoria);
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

/*Funci\u00F3n para subir el archivo digital al servidor, con formato RUN+"-"+COLORLICENCIA+" "+FOLIOLICENCIA */
function subirArchivo(){
  //alert();
	var rutaArchivo 						= document.getElementById("archivo").value;
	var arrayRutaArchivo 				= rutaArchivo.split("\\");
	var cantidadArreglo 				= arrayRutaArchivo.length;
	var nombreDelArchivo 				= arrayRutaArchivo[cantidadArreglo-1];	
	var archivoServidor					=	document.getElementById("archivoServidor").value;	
	var extension 							= (rutaArchivo.substring(rutaArchivo.lastIndexOf("."))).toUpperCase(); 	
	var extensiones_permitidas 	= new Array(".PDF",".DOC",".DOCX",".XLS",".XLSX",".PPT",".PPTX");
	var noaceptada  						= true;
	//alert(archivoServidor);
	
	 if(rutaArchivo == ""){
	alert("DEBE ADJUNTAR UN ARCHIVO CON LA EXTENSION VALIDA ...");
   document.getElementById("archivo").focus();
   return false;
 }
	
	for (var i = 0; i < extensiones_permitidas.length; i++) {
    if (extensiones_permitidas[i] == extension) {
     	noaceptada = false;
    }
  } 
  
  if(noaceptada){
		alert("EL TIPO DE ARCHIVO NO ES PERMITIDO, DEBE SER EN FORMATO DOCX, DOC, XLSX, PPT O PDF");
   	document.getElementById("archivo").value = "";
   	//document.getElementById("archivo").disabled=""; 
   	document.getElementById('submit').disabled = true;
   	return false;
  }
  document.getElementById("rutArchi").value = rutaArchivo
 //document.getElementById("archivo").disabled = true;
 document.getElementById("archivo").disabled="true"; 
 document.getElementById("archivoLoad").value=1; 
 document.getElementById('submit').disabled = false;
 return true;
	
	//rutsinchar=rutsinchar.replace(".","");
	//rutsinchar=rutsinchar.replace(".","");
	//rutsinchar=rutsinchar.replace("-","");
	
	//rutaArchivo = rutsinchar+"-"+folioColor+extension;
	
	//if(rutsinchar == archivoServidor){
	//	alert("EL DOCUMENTO YA EXISTE");
	//	return false;
	//}
	
	//document.getElementById("rutArchi").value = rutaArchivo;	
	//document.formSubeArchivo.submit();
	
	//boton.disabled = true;
	//document.getElementById("archivo").disabled = true;
	//document.getElementById("archivoLoad").value=1;
	
}


function validarSubir(){
	//var nomDocumento 	= document.getElementById("txtNombreDocumento").value;
	var tipoDocumento = document.getElementById("cboTipoDocumento").value;

	//alert(tipoDocumento);
	if(tipoDocumento != 0){
		//document.getElementById('archivo').disabled = false;
		    document.getElementById("archivo").disabled=""; 
		//document.getElementById('btn100').disabled = false;
		}
	else{
		//document.getElementById('archivo').disabled = true;
		//document.getElementById('btn100').disabled = true;
		 document.getElementById("archivo").disabled="true"; 
		}
		
}

function validaNumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}




function activaCombo(){
	var campo = document.getElementById("txtNombreAuditoria").value;
	//alert(combo);
	if(campo==""){
		document.getElementById("cboOrdenaAuditoria").disabled=""; 
		}else{
		 document.getElementById("cboOrdenaAuditoria").disabled="true"; 
		}
	
}

function muestraCampo(){
	var cboTipoInforme = document.getElementById("cboTipoInforme").value;
	//alert(cboTipoInforme);
	if(cboTipoInforme==60){
		document.getElementById("txtOtroTipoInforme").disabled="";
		}else{
		 	document.getElementById("txtOtroTipoInforme").disabled="true";
		}	
}

function eliminaBilioteca(codigo,documento)
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDER\u00C1 A ELIMINAR EL DOCUMENTO "+documento+" DE LA BIBLIOTECA \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	//var nom  = document.getElementById("carpetaBD").value;
	//var cod 	= document.getElementById("documentoBD").value;
	
	//alert(carpeta);
	//alert(documento);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("GET","./objeto/deleteDocumentoBiblioteca.php?codigo="+codigo+"&documento="+documento);
  
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send(null);


  
   //objHttpXMLCargaDatos.send(encodeURI("nom="+nom+"&cod="+cod));
   
   //alert("A\u00F1o: "+anno);
   




   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
        
            alert("EL DOCUMENTO "+documento+ " DE LA BIBLIOTECA \nHA SIDO ELIMINADO CON EXITO ......        ");

      
					   //top.listaUsuarios();
					  location.reload();
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function validarFichaDocumento(){
  var nomDocumento  = document.getElementById("txtNombreDocumento").value;
  var tipoDocumento = document.getElementById("cboTipoDocumento").value;
  //var otroInforme   = document.getElementById("txtOtroTipoInforme").value;
  var descDocumento = document.getElementById("descripcionDocumento").value;
  var archivo       = document.getElementById("archivo").value;
  //var archivoLoad   = document.getElementById("archivoLoad").value;
  //alert(archivo);
  
  	if (nomDocumento == ""){
		alert("DEBE INDICAR EL NOMBRE DEL DOCUMENTO ...... 	     ");
		document.getElementById("txtNombreDocumento").focus();
		return false;
	}
	
	 	if (descDocumento == ""){
		alert("DEBE INDICAR LA DESCRIPCI\u00D3N DEL DOCUMENTO ...... 	     ");
		document.getElementById("descripcionDocumento").focus();
		return false;
	}
	
		if (tipoDocumento == 0){
		alert("DEBE INDICAR TIPO DE DOCUMENTO ...... 	     ");
		document.getElementById("cboTipoDocumento").focus();
		return false;
	}
	
	//if(tipoDocumento == 60){
	//	if (otroInforme == ""){
	//	alert("DEBE INDICAR EL NUEVO TIPO DE INFORME ...... 	     ");
	//	document.getElementById("txtOtroTipoInforme").focus();
	//	return false;
	//}
 //}
 
	 if (archivo== ""){
		alert("DEBE SUBIR EL DOCUMENTO A LA BIBLIOTECA ...... 	     ");
		document.getElementById("archivo").focus();
		return false;
	}
	
		//if (archivoLoad == 0) {
		//alert("DEBE PRESIONAR EL BOT\u00D3N SUBIR DOCUMENTO PARA CARGAR EL ARCHIVO AL SISTEMA ...... 	     ");
		//return false;
	//}
	
  return true;
}

function validarFichaCarpeta(){
  var codAuditoria  = document.getElementById("txtCodigoAuditoria").value;
  var nomAuditoria  = document.getElementById("txtNombreAuditoria").value;
  var annoAuditoria = document.getElementById("cboAnnoAuditoria").value;
  var estamento     = document.getElementById("txtEstamento").value;
  var tipoAuditoria = document.getElementById("cboTipoAuditoria").value;
  var cantHallazgo  = document.getElementById("txtCantidadHallazgo").value;
  var codEstamento     = document.getElementById("txtCodEstamento").value;
  
  	if (codAuditoria == ""){
		alert("DEBE INDICAR EL C\u00D3DIGO DE LA AUDITORIA ...... 	     ");
		document.getElementById("txtCodigoAuditoria").focus();
		return false;
	}
	
		if (nomAuditoria== ""){
		alert("DEBE INDICAR EL NOMBRE DE LA AUDITORIA ...... 	     ");
		document.getElementById("txtNombreAuditoria").focus();
		return false;
	}
	
		if (annoAuditoria == 0){
		alert("DEBE INDICAR EL A\u00D1O DE LA AUDITORIA ...... 	     ");
		document.getElementById("cboAnnoAuditoria").focus();
		return false;
	}
	
		if (estamento == ""){
		alert("DEBE INDICAR EL ESTAMENTO AUDITADO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		return false;
	}
	
		if (tipoAuditoria == 0){
		alert("DEBE INDICAR EL TIPO DE AUDITORIA ...... 	     ");
		document.getElementById("cboTipoAuditoria").focus();
		return false;
	}
	
	  if (cantHallazgo == "" || cantHallazgo == 0){
		alert("DEBE INDICAR LA CANTIDAD DE HALLAZGOS ...... 	     ");
		document.getElementById("txtCantidadHallazgo").focus();
		return false;
	}
	
		if (codEstamento == 0 || codEstamento ==""){
		alert("DEBE INDICAR UN ESTAMENTO AUDITADO VALIDO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		//limpia(codEstamento);
		return false;
	}
	
  return true;
}

function guardarFichaCarpeta(){
	var codigo  = document.getElementById("txtCodigoAuditoria").value.toUpperCase();
	//alert(cod);
	var existe = verificaCarpeta(codigo);
	//alert(existe);
	if(existe==1){
		return false;
		//window.close(); 
	}
else{
	var validaOk = validarFichaCarpeta();
	if(validaOk){
		creaCarpeta();
	}
 }	
}

function modificaFichaCarpeta(){
	
	var validaOk = validarFichaCarpeta();
	if(validaOk){
		modificaCarpeta();
	}	
}


function guardarDocumentoBiblioteca(){
	
	var validaOk = validarFichaDocumento();
	if(validaOk){
		creaDocumento();
	}	
}

function subeArchivo(){
	
	var validaOk = subirArchivo();
	if(validaOk){
		//alert();
		upload_archivo();
	}	
}

function verificaCarpeta(cod)
{

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/verificaCarpeta.php",false);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 	var mensaje = "";
  var codigoAuditoria  = document.getElementById("txtCodigoAuditoria").value.toUpperCase();
  objHttpXMLCargaDatos.send(encodeURI("codigoAuditoria="+codigoAuditoria));
  //if (objHttpXMLCargaDatos.responseText.trim() != "VACIO")
  if(eliminarBlancos(objHttpXMLCargaDatos.responseText) != "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
	  mensaje="EL CODIGO "+codigoAuditoria+" YA EXISTE EN LA BASE DE DATOS ...";
	  alert(mensaje);
	  return 1;
  } 
}


function limpiaFichaDocumento(){	
	//alert();
  document.getElementById("txtNombreDocumento").value="";
  document.getElementById("cboTipoDocumento").value=0;
  //document.getElementById("txtOtroTipoInforme").value="";
  //document.getElementById("txtOtroTipoInforme").disabled="true"; 
  document.getElementById("descripcionDocumento").value="";
  document.getElementById("archivo").value="";
  document.getElementById("archivo").disabled="true"; 
  document.getElementById('submit').disabled = true;
  //cuenta();
}

function limpia(elemento)
{
elemento.value = "";
}

function buscaRepositorio(nombre,orden)
{
	
	var nombreAuditoria = document.getElementById("txtNombreAuditoria").value;
	var ordenar = document.getElementById("cboOrdenaAuditoria").value;

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/buscaRepositorio.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI("nombreAuditoria="+nombreAuditoria+"&ordenar="+ordenar));
   
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
  //listaRepositorio();
}


function eliminaCarpeta(carpeta)
{
	
	//		var cod  = document.getElementById("carpetaB").value;

	//alert(cod);
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDER\u00C1 A ELIMINAR LA CARPETA "+carpeta+"   \n\u00BFDESEA CONTINUAR?...");
	if (msj){
		//var cod  = document.getElementById("carpetaB").value;
	//var cod 	= document.getElementById("documentoBD").value;
	
	//alert(nom);
	//alert(cod);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("GET","./objeto/deleteCarpeta.php?carpeta="+carpeta);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("nom="+nom+"&cod="+cod);


  
   objHttpXMLCargaDatos.send(null);
   
   //alert("A\u00F1o: "+anno);
   




   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
        
            alert("LA CARPETA "+carpeta+" FUE ELIMINADA CON EXITO ......        ");
					  //top.listaUsuarios();
					  location.reload();
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function verificaDocumento2(cod)
{
//alert(cod);
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("GET","./objeto/verificaDocumento.php?cod="+cod,false);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  objHttpXMLCargaDatos.send(null);
 	var mensaje = "";
  //var codigoAuditoria  = document.getElementById("carpetaB").value.toUpperCase();
  //alert(codigoAuditoria);
  //objHttpXMLCargaDatos.send(encodeURI("codigoAuditoria="+codigoAuditoria));
  //if (objHttpXMLCargaDatos.responseText.trim() != "VACIO")

  if(objHttpXMLCargaDatos.responseText != 0){
  	//alert(objHttpXMLCargaDatos.responseText);
	  mensaje="LA CARPETA "+cod+" CONTIENE ARCHIVOS ASOCIADOS \nNO PUEDE SER ELIMINADA";
	  alert(mensaje);
	  return 1;
  } 
}

function verificaEliminaCarpeta(carpeta){
	var existe = verificaDocumento2(carpeta);
	//alert(existe);
	 if(existe==1){
		return false;
	}else{
		eliminaCarpeta(carpeta);
 }	
}
 
 function datoCarpeta(cod)
{
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/datoCarpeta.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  var codigoAuditoria  = document.getElementById("txtCodigoAuditoria").value.toUpperCase();
  //alert(codigoAuditoria);
  objHttpXMLCargaDatos.send(encodeURI("codigoAuditoria="+codigoAuditoria));
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  if(eliminarBlancos(objHttpXMLCargaDatos.responseText) != "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;

				var codigo		  = "";
				var nombre 			= "";
				var anno				= "";
				var estamento	  = "";
				var hallazgo    = "";
				var tipoAuditoria ="";
				var codEstamento	  = "";
				
				for(i=0;i<xml.getElementsByTagName("carpeta").length;i++){
					//alert();
				    codigo 		   = xml.getElementsByTagName("codigo")[i].firstChild.nodeValue;
			      nombre	   = xml.getElementsByTagName("nombre")[i].firstChild.nodeValue;
					  anno	 		 = xml.getElementsByTagName("anno")[i].firstChild.nodeValue;
					  estamento  		 = xml.getElementsByTagName("estamento")[i].firstChild.nodeValue;
					  hallazgo  		 = xml.getElementsByTagName("hallazgo")[i].firstChild.nodeValue;
	          tipoAuditoria  = xml.getElementsByTagName("tipoAuditoria")[i].firstChild.nodeValue;
	          codEstamento 		 = xml.getElementsByTagName("codEstamento")[i].firstChild.nodeValue;
	 
					  document.getElementById("txtNombreAuditoria").value    = nombre;
					  document.getElementById("cboAnnoAuditoria").value = anno;
					  document.getElementById("txtEstamento").value = estamento;
					  document.getElementById("txtCantidadHallazgo").value = hallazgo;
					  document.getElementById("cboTipoAuditoria").value =  tipoAuditoria;
					  document.getElementById("txtCodEstamento").value = codEstamento;
			
				}
   }
  } 
 }
}

function modificaCarpeta(){
	
	var msj=confirm("PROCEDERA A MODIFICAR LOS DATOS.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
  var codAuditoria  = eliminarBlancos(document.getElementById("txtCodigoAuditoria").value.toUpperCase());
  var nomAuditoria  = document.getElementById("txtNombreAuditoria").value.toUpperCase();
  var annoAuditoria = document.getElementById("cboAnnoAuditoria").value;
  var estamento     = document.getElementById("txtCodEstamento").value;
  var tipoAuditoria = document.getElementById("cboTipoAuditoria").value;
  var cantHallazgo  = document.getElementById("txtCantidadHallazgo").value;
  //var ordenar=0;
	//alert(cod);
	 
	 //alert(codAuditoria);
	 //alert(nomAuditoria);
	 //alert(annoAuditoria);
	 //alert(estamento);



  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/updateRepositorio.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send("codAuditoria="+codAuditoria+"&nomAuditoria="+nomAuditoria+"&annoAuditoria="+annoAuditoria+"&estamento="+estamento+"&tipoAuditoria="+tipoAuditoria+"&cantHallazgo="+cantHallazgo);


  
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
   




   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	//alert(objHttpXMLCargaDatos.responseText);
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
           
               alert('LOS DATOS FUERON MODIFICADOS CON EXITO A LA BASE DE DATOS ......        ');
		
							 //top.listaRepositorio(ordenar);
							 window.opener.location = window.opener.location;
							 window.close();
		
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}




 
 function verificaDocumento(carpeta)
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDER\u00C1 A ELIMINAR EL ARCHIVO        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
		var nom  = document.getElementById("carpetaBD").value;
	//var cod 	= document.getElementById("documentoBD").value;
	
	alert(nom);
	//alert(cod);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/verificaDocumento.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("nom="+nom+"&cod="+cod);


  
   objHttpXMLCargaDatos.send(encodeURI("nom="+nom));
   
   //alert("A\u00F1o: "+anno);
   




   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "VACIO")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
        
            //alert('LOS DATOS FUERON ELIMINADOS CON EXITO A LA BASE DE DATOS ......        ');
					   //top.listaUsuarios();
					  //location.reload();
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function listaAnnoRepositorio(anno)
{
	//alert();
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	

	

		var anno = document.getElementById("txtAnno").value;

	
//alert(anno);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/annoRepositorio.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI("anno="+anno));
   
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

function consultaRepositorio(estamento,nombre,tipo,anno)
{
	//alert();

	var estamento = document.getElementById("txtEstamento").value;
	var nombre    = document.getElementById("txtNombre").value;
  var tipo      = document.getElementById("cboTipoAuditoria").value;
	var anno      = document.getElementById("cboAnnoAuditoria").value;
//alert(estamento);
//alert(nombre);
//alert(tipo);
//alert(anno);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/consultaRepositorio.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI("estamento="+estamento+"&nombre="+nombre+"&tipo="+tipo+"&anno="+anno));
   
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

function validarConsulta(){
	var estamento = document.getElementById("txtEstamento").value;
	var nombre    = document.getElementById("txtNombre").value;
  var tipo      = document.getElementById("cboTipoAuditoria").value;
	var anno      = document.getElementById("cboAnnoAuditoria").value;
  
 var resultado="ninguno";
 
        var porNombre=document.getElementsByName("opcion_buscar");
        // Recorremos todos los valores del radio button para encontrar el
        // seleccionado
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                resultado=porNombre[i].value;
        }
 
        document.getElementById("resultado");
       // alert("VALOR: "+resultado);
       
       	if(resultado == 1 && estamento=="" && nombre=="" && tipo==0 && anno==0){
		alert("DEBE SELECCIONAR AL MENOS UN CRITERIO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		return false;
	
 }
	
	//if(resultado == 1 && estamento == ""){
	//	alert("DEBE INDICAR EL ESTAMENTO ...... 	     ");
//		document.getElementById("txtEstamento").focus();
//		return false;
	
// }
 //	if (resultado == 2 && nombre == ""){
//		alert("DEBE INDICAR EL NOMBRE ...... 	     ");
//		document.getElementById("txtNombre").focus();
//		return false;
//	}
//	 	if (resultado == 3 && tipo == 0){
//		alert("DEBE INDICAR EL TIPO ...... 	     ");
//		document.getElementById("cboTipoAuditoria").focus();
//		return false;
//	}
// 	if (resultado == 4 && anno == 0){
//		alert("DEBE INDICAR EL A\u00D1O ...... 	     ");
//		document.getElementById("cboAnnoAuditoria").focus();
//		return false;
//	}

 	if (estamento== 0 && nombre=="" && tipo==0 && anno==0){
		alert("DEBE INDICAR AL MENOS 1 CRITERIO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		return false;
	}
	
  return true;
}

function consultarRepositorio(){	
	//alert();
	var validaOk = validarConsulta();
	if(validaOk){
		//alert();
		consultaRepositorio();
	}	
}

var cargaNombreAuditoria;
 function comboNombre(nombreObjeto)
{
	var cargaNombreAuditoria=0;
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/comboNombre.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send(encodeURI());
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  if(eliminarBlancos(objHttpXMLCargaDatos.responseText) != "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;
	
				var codigo 			= "";
				var descripcion		= "";

				document.getElementById(nombreObjeto).length = null;
				
				var datosOpcion = new Option("Seleccione Nombre ...", 0, "", "");
				document.getElementById(nombreObjeto).options[0] = datosOpcion;		

				
				for(i=0;i<xml.getElementsByTagName("combo").length;i++){
					//alert();
				
					codigo 			= xml.getElementsByTagName('nombre')[i].firstChild.data;
					descripcion 	= xml.getElementsByTagName('nombre')[i].firstChild.data;

					var datosOpcion = new Option(descripcion, codigo, "", "");
					document.getElementById(nombreObjeto).options[i+1] = datosOpcion;
				
			   
				
				}
				var cargaNombreAuditoria=1;
   }
  } 
 }
}

var cargaEstamento;
 function comboEstamento(nombreObjeto)
{
	var cargaEstamento=0;
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/comboEstamento.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send(encodeURI());
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  if(eliminarBlancos(objHttpXMLCargaDatos.responseText) != "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;
	
				var codigo 			= "";
				var descripcion		= "";

				document.getElementById(nombreObjeto).length = null;
				
				var datosOpcion = new Option("Seleccione Estamento ...", 0, "", "");
				document.getElementById(nombreObjeto).options[0] = datosOpcion;		

				
				for(i=0;i<xml.getElementsByTagName("estamento").length;i++){
					//alert();
				
					codigo 			= xml.getElementsByTagName('codigo')[i].firstChild.data;
					descripcion 	= xml.getElementsByTagName('descripcion')[i].firstChild.data;

					var datosOpcion = new Option(descripcion, codigo, "", "");
					document.getElementById(nombreObjeto).options[i+1] = datosOpcion;
				
			   
				
				}
				var cargaEstamento=1;
   }
  } 
 }
}

function listaUsuario()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/listaUsuario.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

function listaMiUsuario(codigo)
{
	
	var codigo 	= document.getElementById("txtcodigo").value;

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objMiUsuario.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("codigo="+codigo);

  
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
   //alert("Mes: "+mes);

   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

function creaUsuario()
{
	var msj=confirm("PROCEDERA A CREAR UN USUARIO EN EL SISTEMA.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
	var codigo 	= document.getElementById("txtCodigo").value;
	var clave = codigo.substring(4,-1)
  var perfil 	= document.getElementById("cboTipoUsuario").value;
  var daincar 	= document.getElementById("cboDependencia").value;
  
   var usuario 	= document.getElementById("codigoUsuario").value;
   var daincarUsuario 	= document.getElementById("daincarUsuario").value;
   
	//alert(usuario);
	//alert(daincarUsuario);
	//alert(perfil);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objAddUsuario.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("codigo="+codigo+"&clave="+clave+"&perfil="+perfil+"&daincar="+daincar+"&usuario="+usuario+"&daincarUsuario="+daincarUsuario);

  
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
    
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
           
               alert('LOS DATOS FUERON INGRESADOS CON EXITO A LA BASE DE DATOS ......        ');
							 top.listaUsuario();
							 window.opener.location = window.opener.location;
							 window.close();
		
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function updateUsuario()
{
	var msj=confirm("PROCEDERA A MODIFICAR DATOS DEL USUARIO.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
	var codigo 	= document.getElementById("txtCodigo").value;
	var perfil 	= document.getElementById("cboTipoUsuario").value;
	var claveActual	= document.getElementById("txtClaveActual").value;
	var claveNueva	= document.getElementById("txtClaveNueva").value;
	//alert(cod);
	//alert(perfil);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objModUsuario.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("codigo="+codigo+"&perfil="+perfil+"&claveActual="+claveActual+"&claveNueva="+claveNueva);


  
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
      
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
           
               alert('LOS DATOS FUERON MODIFICADOS CON EXITO A LA BASE DE DATOS ......        ');
							 top.listaUsuario();
							 window.opener.location = window.opener.location;
							 window.close();
		
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function validarFichaUsuario(){
	var perfil 	= document.getElementById("cboTipoUsuario").value;

		if (perfil== 0){
		alert("DEBE INDICAR EL PERFIL DE USUARIO ...... 	     ");
		document.getElementById("cboTipoUsuario").focus();
		return false;
	}
	
  return true;
}

function validarFichaClave(){
	var claveActual= document.getElementById("txtClaveActual").value;
	var claveNueva= document.getElementById("txtClaveNueva").value;
  
		if (claveActual == ""){
		alert("DEBE INDICAR LA CLAVE ACTUAL...... 	     ");
		document.getElementById("txtClaveActual").focus();
		return false;
	}
	
		if (claveNueva == ""){
		alert("DEBE INDICAR LA NUEVA CLAVE ...... 	     ");
		document.getElementById("txtClaveNueva").focus();
		return false;
	}
	
	if (claveActual==claveNueva){
		alert("LA NUEVA CLAVE NO DEBE SER IGUAL A LA CLAVE ANTERIOR ...... 	     ");
		document.getElementById("txtClaveNueva").focus();
		return false;
	}
		
  return true;
}

function deleteUsuario(codigo)
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDERA A ELIMINAR LA CLAVE DEL USUARIO.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	var codigo 	= document.getElementById("txtCodigo").value;
	
	//alert(cod);
	//alert(perfil);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objDelUsuario.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("codigo="+codigo);
 
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
      
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
        
            alert('LOS DATOS FUERON ELIMINADOS CON EXITO A LA BASE DE DATOS ......        ');
					 top.listaUsuario();
					window.opener.location = window.opener.location;
					window.close();
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
 }
}

function nuevoUsuario(){	
	//alert();
	var validaOk = validarFichaUsuario();
	if(validaOk){
		//alert();
		creaUsuario();
	}	
}

function nuevaClave(){	
	//alert();
	var validaOk = validarFichaClave();
	if(validaOk){
		//alert();
		updateUsuario();
	}	
}
var idAsignaFichaPersonal; 
function datoFichaUsuario(cod)
{
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/datoFichaUsuario.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  var codigo = document.getElementById("txtCodigo").value.toUpperCase();
  //alert(codigo);
  objHttpXMLCargaDatos.send(encodeURI("codigo="+codigo));
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  
  if(eliminarBlancos(objHttpXMLCargaDatos.responseText) != "VACIO"){

  	//alert(objHttpXMLCargaDatos.responseText);

  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;
				//alert(xml);
				var codigo		  = "";
				var escalafon		  = "";
				var grado		  = "";
				var rut 			= "";		
				 var nombre  = "";	
				 var daincarCodigo  = "";	
				var cargoCodigo          = "";	
        var tipoUsuario          = "";	
        
				for(i=0;i<xml.getElementsByTagName("usuario").length;i++){
					//alert();
				    codigo 		   = xml.getElementsByTagName("codigo")[i].textContent;
				    escalafon 		   = xml.getElementsByTagName("escalafon")[i].textContent;
				    grado 		   = xml.getElementsByTagName("grado")[i].textContent;
			      rut	   = xml.getElementsByTagName("rut")[i].textContent;
			      nombre      = xml.getElementsByTagName("nombre")[i].textContent;
			      daincarCodigo         = xml.getElementsByTagName("daincarCodigo")[i].textContent;
			      cargoCodigo           = xml.getElementsByTagName("cargoCodigo")[i].textContent;
            tipoUsuario           = xml.getElementsByTagName("tipoUsuario")[i].textContent;
					 
					  document.getElementById("txtRut").value    = rut;
					  document.getElementById("txtNombre").value    = nombre;
					  document.getElementById("cboDependencia").value    = daincarCodigo;
					  document.getElementById("cboCargo").value    = cargoCodigo;
					  if(tipoUsuario==0 || tipoUsuario==""){
					  	  document.getElementById("cboTipoUsuario").value    = 0;
					  	}else{
					  document.getElementById("cboTipoUsuario").value    =  tipoUsuario ;
					  }
					  
					  var valoresAsignar = "'"+escalafon+"','" + grado + "','',false,'',1,'',1";					
					  idAsignaFichaPersonal = setInterval("asignaValoresFichaFuncionario("+valoresAsignar+")",1000);
				}
   }
  } 
 }
}

var idAsignaFichaPersonal; 
function datoFichaClave(cod)
{
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/datoFichaUsuario.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  var codigo = document.getElementById("txtCodigo").value.toUpperCase();
  //alert(codigo);
  objHttpXMLCargaDatos.send(encodeURI("codigo="+codigo));
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  
  if(eliminarBlancos(objHttpXMLCargaDatos.responseText) != "VACIO"){

  	//alert(objHttpXMLCargaDatos.responseText);

  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;
				//alert(xml);
				var codigo		  = "";
				var escalafon		  = "";
				var grado		  = "";
				var rut 			= "";		
				 var nombre  = "";	
				 var daincarCodigo  = "";	
				var cargoCodigo          = "";	
        var tipoUsuario          = "";	
        var clave          = "";	
				for(i=0;i<xml.getElementsByTagName("usuario").length;i++){
					//alert();
				    codigo 		   = xml.getElementsByTagName("codigo")[i].textContent;
				    escalafon	 		       = xml.getElementsByTagName("escalafon")[i].textContent;
					  grado	 		       = xml.getElementsByTagName("grado")[i].textContent;
			      rut	   = xml.getElementsByTagName("rut")[i].textContent;
			      nombre      = xml.getElementsByTagName("nombre")[i].textContent;
			      daincarCodigo         = xml.getElementsByTagName("daincarCodigo")[i].textContent;
            tipoUsuario           = xml.getElementsByTagName("tipoUsuario")[i].textContent;
					  clave           = xml.getElementsByTagName("clave")[i].textContent;
					  
					  document.getElementById("txtNombre").value    = nombre;
					  document.getElementById("cboTipoUsuario").value    =  tipoUsuario ;
					  document.getElementById("txtClaveActual").value    = clave;
					  
					  var valoresAsignar = "'"+escalafon+"','" + grado + "','',false,'',1,'',1";					
					  idAsignaFichaPersonal = setInterval("asignaValoresFichaFuncionario("+valoresAsignar+")",1000);
				}
   }
  } 
 }
}