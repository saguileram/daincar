function abrirVentanaPersonal (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=670,height=650,top=0,left=0";
    window.open(pagina,"",opciones);
}

function abrirVentanaFichaPersonal (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=670,height=680,top=0,left=0";
    window.open(pagina,"",opciones);
}

function abrirVentanaEquipoDisponible (pagina) {
var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=850,height=450,top=0,left=0";
    window.open(pagina,"",opciones);
}



function listaPersonal()
{
	
	//var anno= document.getElementById("anno").value;
	var perfil 	= document.getElementById("perfil").value;

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objPersonal.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI("perfil="+perfil));
   
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

function listaAuditoria()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	//var auditoria 	= document.getElementById("rep").value;
	//var rep 	= document.getElementById("rep").value;
	
	//alert(auditoria)
	//alert(rep);

var perfil 	= document.getElementById("perfil").value;
//alert(perfil);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objAuditoria.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("perfil="+perfil);
   //objHttpXMLCargaDatos.send();
  
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

function creaAuditoria()
{
	var msj=confirm("PROCEDERA A INGRESAR UNA AUDITORIA EN EL SISTEMA.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;

	var auditoria 	= document.getElementById("txtCodigoAuditoria").value;
	var anno 	= document.getElementById("cboAnnoAuditoria").value;
	var nombre 	= document.getElementById("txtNombreAuditoria").value;
	var objetivo 	= document.getElementById("txtObjetivo").value;
	var auditado 	= document.getElementById("txtCodEstamento").value;
	var finicio	= document.getElementById("txtFechaInicio").value;
	var ftermino 	= document.getElementById("txtFechaTermino").value;
	var fcaigg 	= document.getElementById("txtFechaCaigg").value;
	var tipoAuditoria 	= document.getElementById("cboTipoAuditoria").value;
	var estadoAuditoria 	= document.getElementById("cboEstadoAuditoria").value;
	var hras 	= document.getElementById("txtHorasTrabjadas").value;
	
	var usuario        = document.getElementById("codigoUsuario").value.toUpperCase();
  var daincar        = document.getElementById("daincarUsuario").value;


	//alert(auditoria);
	//alert(anno);
	//alert(nombre);
	//alert(objetivo);
	//alert(auditado);
	//alert(finicio);
	//alert(ftermino);
	//alert(fcaigg);
	//alert(tipoAuditoria);
	//alert(estadoAuditoria);


  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objAddAuditoria.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("auditoria="+auditoria+"&anno="+anno+"&nombre="+nombre+"&objetivo="+objetivo+"&auditado="+auditado+"&finicio="+finicio+"&ftermino="+ftermino+"&fcaigg="+fcaigg+"&tipoAuditoria="+tipoAuditoria+"&estadoAuditoria="+estadoAuditoria+"&hras="+hras+"&usuario="+usuario+"&daincar="+daincar);


  
   //objHttpXMLCargaDatos.send(encodeURI());
   
   //alert("A\u00F1o: "+anno);
   




   
  objHttpXMLCargaDatos.onreadystatechange=function()
  {
  	
    if(objHttpXMLCargaDatos.readyState == 4)
    {
    	//alert(objHttpXMLCargaDatos.responseText);
      if (objHttpXMLCargaDatos.responseText != "ERROR")
      {
      //alert(objHttpXMLCargaDatos.responseText);
        var xml 			 = objHttpXMLCargaDatos.responseText;
        divPagina.innerHTML=xml;
           
               alert('LOS DATOS FUERON INGRESADOS CON EXITO A LA BASE DE DATOS ......        ');
							 //top.listaAuditoria();
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

function deleteAuditoria(cod1)
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDERA A ELIMINAR LA AUDITORIA.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	var cod 	= document.getElementById("cod").value;
	
	var usuario 	= document.getElementById("codigoUsuario").value;
	var daincar 	= document.getElementById("daincarUsuario").value;
	
	//alert(usuario);
	//alert(daincar);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objDelAuditoria.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("cod="+cod);


  
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
					   top.listaUsuarios();
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

function listaAuditor(nombreObjeto)
{
	var divPagina	= document.getElementById("contenidoPagina3");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/listaAuditor.php",true);
  
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

function auditorDisponible(nombreObjeto)
{
	
	var auditoria 	= document.getElementById("auditoria").value;
	var asignado 	= document.getElementById("asignado").value;
  document.getElementById(nombreObjeto).length = null;
	var datosOpcion = new Option("CARGANDO AUDITORES ... ", 0, "", "");
	document.getElementById(nombreObjeto).options[0] = datosOpcion;

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/listaAuditor.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send(encodeURI("auditoria="+auditoria+"&asignado="+asignado));
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  if(objHttpXMLCargaDatos.responseText!= "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;
	
				var codigo 			= "";
				var grado			= "";
				var nombre		= "";
			

				
				for(i=0;i<xml.getElementsByTagName("auditores").length;i++){
					//alert();
				
					codigo 			= xml.getElementsByTagName('codigo')[i].firstChild.data;
					grado 			= xml.getElementsByTagName('grado')[i].firstChild.data;
					nombre	= xml.getElementsByTagName('nombre')[i].firstChild.data;
					var auditor =  "AUD. " + nombre + " (" + grado + ")";

					var datosOpcion = new Option(auditor, codigo, "", "");
		      document.getElementById(nombreObjeto).options[i] = datosOpcion;
				
				}
		
   }else{
   	document.getElementById(nombreObjeto).length = null;
   	}
  } 
 }
}

function supervisorDisponible(nombreObjeto)
{
	var auditoria 	= document.getElementById("auditoria").value;
	var asignado 	= document.getElementById("asignado").value;
	
  document.getElementById(nombreObjeto).length = null;
	var datosOpcion = new Option("CARGANDO SUPERVISORES ... ", 0, "", "");
	document.getElementById(nombreObjeto).options[0] = datosOpcion;

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/listaSupervisor.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send(encodeURI("auditoria="+auditoria+"&asignado="+asignado));
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  if(objHttpXMLCargaDatos.responseText!= "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;
	
				var codigo 			= "";
				var grado			= "";
				var nombre		= "";

				
				for(i=0;i<xml.getElementsByTagName("supervisores").length;i++){
					//alert();
				
					codigo 			= xml.getElementsByTagName('codigo')[i].firstChild.data;
					grado 			= xml.getElementsByTagName('grado')[i].firstChild.data;
					nombre	= xml.getElementsByTagName('nombre')[i].firstChild.data;
					var auditor = "SUP. " + nombre + " (" + grado + ")";

					var datosOpcion = new Option(auditor, codigo, "", "");
		      document.getElementById(nombreObjeto).options[i] = datosOpcion;
				
				}
		
   }else{
   	document.getElementById(nombreObjeto).length = null;
   	}
  } 
 }
}

function equipoAsignado(nombreObjeto)
{
	var auditoria 	= document.getElementById("auditoria").value;
  document.getElementById(nombreObjeto).length = null;
	//var datosOpcion = new Option("NO TIENE EQUIPO ASIGNADO ... ", 0, "", "");
	//document.getElementById(nombreObjeto).options[0] = datosOpcion;

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/equipoAsignado.php",true);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send(encodeURI("auditoria="+auditoria));
     objHttpXMLCargaDatos.onreadystatechange=function()
    {
    if(objHttpXMLCargaDatos.readyState == 4)
      {
  if(objHttpXMLCargaDatos.responseText!= "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
  	    var xml 				= objHttpXMLCargaDatos.responseXML.documentElement;
	
				var codigoAuditoria = "";
				var codigo 			= "";
				var grado			= "";
				var nombre		= "";
				var cargo     = "";
				var codigoCargo     = "";

				
				for(i=0;i<xml.getElementsByTagName("equipo").length;i++){
					//alert();
				  codigoAuditoria 			= xml.getElementsByTagName('auditoria')[i].firstChild.data;
					codigo 			= xml.getElementsByTagName('codigo')[i].firstChild.data;
					grado 			= xml.getElementsByTagName('grado')[i].firstChild.data;
					nombre	= xml.getElementsByTagName('nombre')[i].firstChild.data;
					codigoCargo	= xml.getElementsByTagName('codigoCargo')[i].firstChild.data;
					cargo	= xml.getElementsByTagName('cargo')[i].firstChild.data;
					if(codigoCargo==50){
					var auditor = "SUP. " + nombre + " (" + grado + ")";
          }else{
          var auditor = "AUD. " + nombre + " (" + grado + ")";
          }
					var datosOpcion = new Option(auditor, codigo, "", "");
		      document.getElementById(nombreObjeto).options[i] = datosOpcion;
				
				}
		
   }else{
   	document.getElementById(nombreObjeto).length = null;
   	alert("NO TIENE EQUIPO ASIGNADO.   ");
   	}
  } 
 }
}

function listaSupervisores()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;

  var divPagina	= document.getElementById("contenidoPagina2");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/listaSupervisor.php",true);
  
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

function updatePersonal()
{
		var msj=confirm("MODIFICARA EL CARGO AL FUNCIONARIO.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;

	var cod 	= document.getElementById("cod").value;
	var perfil 	= document.getElementById("cargoAuditor").value;
	//alert(cod);
	//alert(perfil);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objModPersonal.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("cod="+cod+"&perfil="+perfil);


  
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
							 top.listaUsuarios();
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

function listaDatoAuditoria()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;

	var auditoria 	= document.getElementById("auditoria").value;
	//alert(auditoria);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objDatoAuditoria.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("auditoria="+auditoria);
   

  
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
      }

      else
      {
        alert("PROBLEMAS CON LA BASE DE DATOS.");
        divPagina.innerHTML="";
      }
    }
  }
}

function listaEquipoAsignado22()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	var auditoria 	= document.getElementById("auditoria").value;

  var divPagina	= document.getElementById("contenidoPagina2");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objEquipoAsignado.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("auditoria="+auditoria);
  
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

function listaSupervisorAsignado()
{

	var auditoria 	= document.getElementById("auditoria").value;
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	//alert(auditoria);

  var divPagina	= document.getElementById("contenidoPagina3");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objSupervisorAsignado.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("auditoria="+auditoria);
  
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

function creaEquipo()
{
		var msj=confirm("CREARA EL EQUIPO AUDITOR.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
//var auditor 	= document.getElementByName("auditor");
	var auditoria 	= document.getElementById("auditoria").value;
	var asignado 	= document.getElementById("asignado").value;
	
	var usuario 	= document.getElementById("codigoUsuario").value;
	var daincar 	= document.getElementById("daincarUsuario").value;
	
	//alert(auditoria);
		//alert(auditor);
		//alert(supervisor);
	//alert(perfil);
	
				var arrayAuditor	= new Array();
			var largoAuditor	= document.getElementById("animalesAsignados").length;
			for (i=0;i<largoAuditor;i++){
				arrayAuditor[arrayAuditor.length] = document.getElementById("animalesAsignados").options[i].value;
			}
				var arrayAuditorParametro 			= php_serialize(arrayAuditor);
				//alert(arrayAuditorParametro);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/addEquipo.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("auditoria="+auditoria+"&auditor="+arrayAuditorParametro+"&asignado="+asignado+"&usuario="+usuario+"&daincar="+daincar);


  
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
							 top.listaAuditoria();
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

function modificaEquipo()
{
		var msj=confirm("MODIFICARA EL EQUIPO AUDITOR.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
//var auditor 	= document.getElementByName("auditor");
	var auditoria 	= document.getElementById("auditoria").value;
	var asignado 	= document.getElementById("asignado").value;
	
	var usuario 	= document.getElementById("codigoUsuario").value;
	var daincar 	= document.getElementById("daincarUsuario").value;
	//alert(auditoria);
		//alert(auditor);
		//alert(supervisor);
	//alert(perfil);
	
				var arrayAuditor	= new Array();
			var largoAuditor	= document.getElementById("animalesAsignados").length;
			for (i=0;i<largoAuditor;i++){
				arrayAuditor[arrayAuditor.length] = document.getElementById("animalesAsignados").options[i].value;
			}
				var arrayAuditorParametro 			= php_serialize(arrayAuditor);
				//alert(arrayAuditorParametro);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/modEquipo.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("auditoria="+auditoria+"&auditor="+arrayAuditorParametro+"&asignado="+asignado+"&usuario="+usuario+"&daincar="+daincar);


  
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
							 //top.listaAuditoria();
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

function validar1(){
	
	  var auditoria= document.getElementById("auditoria").value;
		var anno	= document.getElementById("anno").value;
		var nombre	= document.getElementById("nombre").value;

	if (auditoria == "") {
		alert("DEBE INDICAR EL CODIGO DE LA AUDITORIA...... 	     ");
		document.getElementById("anno").focus();
		return false;
	}
	 	if (anno == 0) {
		alert("DEBE INDICAR EL A\u00D1O...... 	     ");
		document.getElementById("anno").focus();
		return false;
	}
	
	 	if (nombre == "") {
		alert("DEBE INDICAR EL NOMBRE DE LA AUDITORIA...... 	     ");
		document.getElementById("nombre").focus();
		return false;
	}
	

	return true;
}

function guardarFichaAuditoria(){
	var validaOk = validar();

	
	var auditoria = document.getElementById("auditoria").value;
	//alert(auditoria);
	//alert(validaOk);
	if (validaOk){
		if (auditoria != "") {
			var msj=confirm("ATENCI\u00D3N :\nSE INGRESARA LA AUDITORIA EN LA BASE DE DATOS.          \n\u00BFDESEA CONTINUAR?");
			if (msj){
				creaAuditoria();
			}else{
	
				return false;
			}
		}
	} 
}

function guardarFichaEquipo(){
var ficha = document.getElementById("asignado").value;
//alert(ficha);
	var validaOk = validaDatosAsignaAnimales();
	//alert(validaOk);
	if (validaOk){
		if (ficha == 0) {
			var msj=confirm("ATENCI\u00D3N :\nSE INGRESARA EL EQUIPO AUDITOR EN LA BASE DE DATOS.          \n\u00BFDESEA CONTINUAR?");
			if (msj){
				creaEquipo();
			}else{
				return false;
			}
		}else{
					var msj=confirm("ATENCI\u00D3N :\nSE PROCEDERA A MODIFICAR EL EQUIPO AUDITOR.          \n\u00BFDESEA CONTINUAR?");
			if (msj){
				modificaEquipo();
			}else{
				return false;
			}
		}
	} 	
}

function listaReporteAuditoria()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
	
	//var auditoria 	= document.getElementById("rep").value;
	//var rep 	= document.getElementById("rep").value;
	
	//alert(auditoria)
	//alert(rep);


  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objReporteAuditoria.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("auditoria="+auditoria);
   objHttpXMLCargaDatos.send();
  
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

function listaMiUsuario()
{
	
	//var anno= document.getElementById("anno").value;
	var cod 	= document.getElementById("cod").value;
	var rep 	= document.getElementById("rep").value;

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objMiUsuario.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("cod="+cod+"&rep="+rep);

  
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

function deleteAuditoria2()
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDERA A ELIMINAR LA AUDITORIA.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	var auditoria 	= document.getElementById("auditoria").value;
	
	//alert(auditoria);
	//alert(perfil);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/objDelAuditoria2.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   objHttpXMLCargaDatos.send("auditoria="+auditoria);


  
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
					   top.listaAuditoria();
					  //location.reload();
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

//function limpiar()
//{
//  document.getElementById("contenidoPagina").innerHTML="";
//  document.getElementById(selTipo).length = null;
//}

function eliminaAuditoria(cod)
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDER\u00C1 A ELIMINAR LA AUDITORIA DEL SISTEMA \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	//var nom  = document.getElementById("carpetaBD").value;
	//var codi 	= document.getElementById("codi").value;
	
	var usuario 	= document.getElementById("codigoUsuario").value;
	var daincar 	= document.getElementById("daincarUsuario").value;
	
	//alert(cod);
	//alert(documento);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("GET","./objeto/objDelAuditoria.php?cod="+cod+"&usuario="+usuario+"&daincar="+daincar);
  
  
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
        
            alert("LA AUDITORIA HA SIDO ELIMINADA CON EXITO ......        ");

      
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

 function datoFichaAuditoria(cod)
{
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/datoFicha.php",true);
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
				var anno				= "";
				var nombre 			= "";
				var estamento	  = "";
				var hallazgo    = "";
				var tipoAuditoria ="";
				var codEstamento	  = "";
				var estadoAuditoria = "";
				var hora            = "";
				var finicio         = "";
				var ftermino        = "";
				var fcaigg           = "";
				
				for(i=0;i<xml.getElementsByTagName("auditoria").length;i++){
					//alert();
				    codigo 		   = xml.getElementsByTagName("codigo")[i].firstChild.nodeValue;
			      nombre	   = xml.getElementsByTagName("nombre")[i].firstChild.nodeValue;
					  anno	 		 = xml.getElementsByTagName("anno")[i].firstChild.nodeValue;
					  estamento  		 = xml.getElementsByTagName("estamento")[i].firstChild.nodeValue;
					  objetivo  		 = xml.getElementsByTagName("objetivo")[i].firstChild.nodeValue;
	          tipoAuditoria  = xml.getElementsByTagName("tipoAuditoria")[i].firstChild.nodeValue;
	          codEstamento 		 = xml.getElementsByTagName("codEstamento")[i].firstChild.nodeValue;
	          estadoAuditoria  = xml.getElementsByTagName("estadoAuditoria")[i].firstChild.nodeValue;
	          hora             = xml.getElementsByTagName("hora")[i].firstChild.nodeValue;
	          finicio          = xml.getElementsByTagName("finicio")[i].firstChild.nodeValue;
	          ftermino         = xml.getElementsByTagName("ftermino")[i].firstChild.nodeValue;
	          fcaigg           = xml.getElementsByTagName("fcaigg")[i].firstChild.nodeValue;
	 
					  document.getElementById("txtNombreAuditoria").value    = nombre;
					  document.getElementById("cboAnnoAuditoria").value = anno;
					  document.getElementById("txtEstamento").value = estamento;
					  document.getElementById("txtObjetivo").value = objetivo;
					  document.getElementById("cboTipoAuditoria").value =  tipoAuditoria;
					  document.getElementById("txtCodEstamento").value = codEstamento;
					  document.getElementById("cboEstadoAuditoria").value =  estadoAuditoria;
					  document.getElementById("txtHorasTrabjadas").value =  hora;
					  document.getElementById("txtFechaInicio").value =  finicio;
					  document.getElementById("txtFechaTermino").value =  ftermino;
					  document.getElementById("txtFechaCaigg").value =  fcaigg;
					  document.getElementById("txtCodigoEstado").value =  estadoAuditoria;
			
				}
   }
  } 
 }
}

function modificaPlanificacion(){
	
	var msj=confirm("PROCEDERA A MODIFICAR LOS DATOS.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
  var codAuditoria  = eliminarBlancos(document.getElementById("txtCodigoAuditoria").value.toUpperCase());
  var nomAuditoria  = document.getElementById("txtNombreAuditoria").value.toUpperCase();
  var annoAuditoria = document.getElementById("cboAnnoAuditoria").value;
  var estamento     = document.getElementById("txtCodEstamento").value;
  var hora  = document.getElementById("txtHorasTrabjadas").value;
  var finicio = document.getElementById("txtFechaInicio").value;
  var ftermino = document.getElementById("txtFechaTermino").value;
  var fcaigg = document.getElementById("txtFechaCaigg").value;
  var objetivo = document.getElementById("txtObjetivo").value;
  var tipoAuditoria = document.getElementById("cboTipoAuditoria").value;
  var estadoAuditoria = document.getElementById("cboEstadoAuditoria").value;
  
  var usuario = document.getElementById("codigoUsuario").value;
  var daincar = document.getElementById("daincarUsuario").value;
 
  //alert(objetivo);
  
  //var ordenar=0;
	//alert(cod);
	 
	 //alert(codAuditoria);
	 //alert("Nombre: "+nomAuditoria);
	 //alert("A\u00F1o: "+annoAuditoria);
	 //alert("Estamento: "+estamento);
	 //alert("Objetivo: "+objetivo);
	 //alert("Hora: "+hora);
	 //alert("Tipo: "+tipoAuditoria);
	 //alert("Estado: "+estadoAuditoria);
	
	 
  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/updatePlanificacion.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send("codAuditoria="+codAuditoria+"&nomAuditoria="+nomAuditoria+"&annoAuditoria="+annoAuditoria+"&estamento="+estamento+"&objetivo="+objetivo+"&hora="+hora+"&finicio="+finicio+"&ftermino="+ftermino+"&fcaigg="+fcaigg+"&tipoAuditoria="+tipoAuditoria+"&estadoAuditoria="+estadoAuditoria+"&usuario="+usuario+"&daincar="+daincar);


  
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
		
							 //top.listaAuditoria();
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

function desactivaPersonal(cod)
{
	
	//var anno= document.getElementById("anno").value;
	//var mes 	= document.getElementById("mes").value;
		var msj=confirm("PROCEDER\u00C1 A ELIMINAR AL FUNCIONARIO DEL SISTEMA \n\u00BFDESEA CONTINUAR?...");
	if (msj){
  var usuario        = document.getElementById("codigoUsuario").value.toUpperCase();
  var daincar        = document.getElementById("daincarUsuario").value;
	
	//alert(cod);
	//alert(documento);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("GET","./objeto/DeletePersonal.php?cod="+cod+"&usuario="+usuario+"&daincar="+daincar);
  
  
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
        
            alert("EL FUNCIONARIO HA SIDO ELIMINADO CON EXITO ......        ");

      
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

var idAsignaFichaPersonal; 
function datoFichaPersonal(cod)
{
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/datoFichaPersonal.php",true);
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

				var codigo		       = "";
				var rut				       = "";
				var grado 		     	 = "";
				var nombre           = "";
				var escalafon       = "";
				var cargoCodigo      = "";
				//var cargoDescripcion = "";
				var reparticion      = "";
				var codigoProfesion      = "";
				var profesion     = "";
				
				
				for(i=0;i<xml.getElementsByTagName("funcionario").length;i++){
					//alert();
				    codigo 		       = xml.getElementsByTagName("codigo")[i].textContent;
			      rut	             = xml.getElementsByTagName("rut")[i].textContent;
			      escalafon	 		       = xml.getElementsByTagName("codigoEscalafon")[i].textContent;
					  grado	 		       = xml.getElementsByTagName("codigoGrado")[i].textContent;
					  nombre  		     = xml.getElementsByTagName("nombre")[i].textContent;
					  profesion  		   = xml.getElementsByTagName("profesion")[i].textContent;
					  codigoProfesion  		   = xml.getElementsByTagName("codigoProfesion")[i].textContent;
	          cargoCodigo      = xml.getElementsByTagName("cargoCodigo")[i].textContent;
	          cargoDescripcion = xml.getElementsByTagName("cargoDescripcion")[i].textContent;
	          reparticion      = xml.getElementsByTagName("reparticion")[i].textContent;
	          //alert(reparticion);
	          //alert(grado);
	          //alert(cargoCodigo);
	          var cargo;
	          if (cargoCodigo=="") {
	          	cargo=0;
	          }else{
	          	 cargo=cargoCodigo;
	          	}
	             var pro;
	          if (codigoProfesion==1 || codigoProfesion=="") {
	          	pro="NO ESPECIFICADA";
	          }else{
	          	 pro=profesion;
	          	}
	          	
	            var dependencia;
	          if (reparticion=="" || reparticion==0) {
	          	dependencia=0;
	          }else{
	          	 dependencia=reparticion;
	          	}	
	     
	          //alert(cargaGrados);
					  document.getElementById("txtRut").value         = rut;
					  //document.getElementById("selEscalafon").value       = escalafon;
					   //document.getElementById("selGrado").value = grado;
					  //if (cargaGrado== 1){
					  //document.getElementById("selGrado").value = grado;
	          //leeGrados('selGrado', escalafon, document.getElementById("selEscalafon")[document.getElementById("selEscalafon").selectedIndex].text);	
					  //}
					  document.getElementById("txtNombre").value      = nombre;
					  document.getElementById("txtProfesion").value   = pro;
					  document.getElementById("cboCargo").value       = cargo;
					  document.getElementById("cboDependencia").value   = dependencia;
					  
					  var valoresAsignar = "'"+escalafon+"','" + grado + "','',false,'',1,'',1";					
					  idAsignaFichaPersonal = setInterval("asignaValoresFichaFuncionario("+valoresAsignar+")",1000);
			
				}
   }
  } 
 }
}

function registraPersonal(){
	
	var msj=confirm("PROCEDERA A INGRESAR LOS DATOS DEL FUNCIONARIO.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
  var codigo      = document.getElementById("txtCodigo").value.toUpperCase();
  var rut         = document.getElementById("txtRut").value.toUpperCase();
  var cargo       = document.getElementById("cboCargo").value.toUpperCase();
  var dependencia = document.getElementById("cboDependencia").value.toUpperCase();
  var escalafon   = document.getElementById("selEscalafon").value;
  var grado       = document.getElementById("selGrado").value;
  var profesion   = document.getElementById("txtCodProfesion").value;
  var ape1        = document.getElementById("txtApe1").value.toUpperCase();
  var ape2        = document.getElementById("txtApe2").value.toUpperCase();
  var nom1        = document.getElementById("txtNom1").value.toUpperCase();
  var nom2        = document.getElementById("txtNom2").value.toUpperCase();
  
  var usuario        = document.getElementById("codigoUsuario").value.toUpperCase();
  var daincar        = document.getElementById("daincarUsuario").value;

	 //alert("Usuario: "+usuario);
	 //alert("Cargo: "+cargo);
	 //alert("Rut: "+rut);
	 //alert("Dependencia: "+dependencia);
	 //alert("Escalafon: "+escalafon);
	 //alert("Gado: "+grado);
	 //alert("Profesion: "+profesion);
	 //alert("Apellido1: "+ape1);
	 //alert("Apellido2: "+ape2);
	 //alert("Nombre1: "+nom1);
	 //alert("Nombre2: "+nom2);
  
  rut=rut.replace(".","");
	rut=rut.replace(".","");
  rut=rut.replace("-","");


  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/addPersonal.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send("codigo="+codigo+"&cargo="+cargo+"&dependencia="+dependencia+"&escalafon="+escalafon+"&grado="+grado+"&rut="+rut+"&profesion="+profesion+"&ape1="+ape1+"&ape2="+ape2+"&nom1="+nom1+"&nom2="+nom2+"&usuario="+usuario+"&daincar="+daincar);



  
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
		
							 //top.listaAuditoria();
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

function modificaPersonal(){
	
	var msj=confirm("PROCEDERA A MODIFICAR LOS DATOS DEL FUNCIONARIO.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
  var codigo      = document.getElementById("txtCodigo").value.toUpperCase();
  var cargo       = document.getElementById("cboCargo").value.toUpperCase();
  var dependencia = document.getElementById("cboDependencia").value.toUpperCase();
  var escalafon   = document.getElementById("selEscalafon").value;
  var grado       = document.getElementById("selGrado").value;
  var profesion   = document.getElementById("txtCodProfesion").value;
  
    var usuario        = document.getElementById("codigoUsuario").value.toUpperCase();
  var daincar        = document.getElementById("daincarUsuario").value;


	 //alert(codigo);
	 //alert(cargo);
	 //alert(dependencia);
	 //alert(estamento);



  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/updatePersonal.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send("codigo="+codigo+"&cargo="+cargo+"&dependencia="+dependencia+"&escalafon="+escalafon+"&grado="+grado+"&profesion="+profesion+"&usuario="+usuario+"&daincar="+daincar);



  
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
		
							 //top.listaAuditoria();
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

function ordenar(o) {
    var v=new Array();
    for (var i=0; i<o.options.length; i++) {
        v[v.length]=new Array(o[i].text,o[i].value);
    }
    v.sort(compara);
    for (var i=0; i<o.options.length; i++) {
        o[i]=new Option(v[i][0],v[i][1],false,false);
    }
}

function compara(a, b) {
    return (a[0]<b[0]?"-1":"1");
}

function asignarAnimal(){
	
	moverDatos('caballosDisponibles','animalesAsignados');
	moverDatos('perrosDisponibles','animalesAsignados');
	
	ordenar(document.getElementById('caballosDisponibles'));
	ordenar(document.getElementById('perrosDisponibles'));
	 
}

function desasignarAnimal(){
	var cantidadAnimalesAsignados = document.getElementById("animalesAsignados").length;
	var animalesAsignados = document.getElementById("animalesAsignados");
	var moverAnimales = new Array;
		
	for (var i=0; i<cantidadAnimalesAsignados; i++){
		moverAnimales[i] = document.getElementById('animalesAsignados').options[i].text;
	}
	
	for (var i=0; i<moverAnimales.length; i++){
		
		var valorOption 	= moverAnimales[i];
		var letraInicial 	= valorOption.substring(0,1);
		var valorCodigo 	= valorOption;
		//alert(letraInicial);
		
		if (animalesAsignados.options[i].selected && letraInicial == "S") {
			moverDatos('animalesAsignados','caballosDisponibles');
			i = moverAnimales
		}
		else if (animalesAsignados.options[i].selected && letraInicial == "A") {
			moverDatos('animalesAsignados','perrosDisponibles');
			i = moverAnimales;
		}
	}
	ordenar(document.getElementById('caballosDisponibles'));
	ordenar(document.getElementById('perrosDisponibles'));
}

function validaDatosAsignaAnimales(){
	var cantAnimalesAsignados = document.getElementById("animalesAsignados").length;
	//alert(cantAnimalesAsignados);
	if (cantAnimalesAsignados == 0){
		alert("DEBE INDICAR EL EQUIPO ASIGNADO A ESTA AUDITORIA");
		return false;
	}
	return true;
}

function verificarSupervisor(){
	var cantidadFuncionariosAsignados = document.getElementById("caballosDisponibles").length;
	var funcionariosAsignados = document.getElementById("caballosDisponibles");
		var moverAnimales = new Array;
	for (var i=0; i<cantidadFuncionariosAsignados; i++){
		if (funcionariosAsignados.options[i].selected){
			
				i = moverAnimales;
			//var codFuncionarioAsignado = funcionariosAsignados.options[i].value;
			//alert(codFuncionarioAsignado);
				alert(i);
			//return false;
		}
		  //return true;
	
	}
}

var cargaGrados;
var cargaEscalafon;

function leeEscalafon(nombreObjeto){
	cargaEscalafon = 0;
	
	document.getElementById(nombreObjeto).length = null;
	var datosOpcion = new Option("CARGANDO DATOS ... ", 0, "", "");
	document.getElementById(nombreObjeto).options[0] = datosOpcion;		
	
	
	var objHttpXMLEscalafon = new AJAXCrearObjeto();
			
	objHttpXMLEscalafon.open("POST","./objeto/listaEscalafon.php",true);
	objHttpXMLEscalafon.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	objHttpXMLEscalafon.send(encodeURI());
	objHttpXMLEscalafon.onreadystatechange=function()
	{
		if(objHttpXMLEscalafon.readyState == 4)
		{       
			if (objHttpXMLEscalafon.responseText != "VACIO"){
	
				//alert(objHttpXMLEscalafon.responseText);		
				var xml 			= objHttpXMLEscalafon.responseXML.documentElement;
				var codigo 			= "";
				var descripcion		= "";

				document.getElementById(nombreObjeto).length = null;
				
				var datosOpcion = new Option("SELECCIONE UNA OPCION ... ", 0, "", "");
				document.getElementById(nombreObjeto).options[0] = datosOpcion;								
				
				for(i=0;i<xml.getElementsByTagName('escalafon').length;i++){
					codigo 			= xml.getElementsByTagName('codigo')[i].firstChild.data;
					descripcion 	= xml.getElementsByTagName('descripcion')[i].firstChild.data;
					
					var datosOpcion = new Option(descripcion, codigo, "", "");
					document.getElementById(nombreObjeto).options[i+1] = datosOpcion;
				}
				cargaEscalafon = 1;
			}
		}
	}
} 

function leeGrados(nombreObjeto, escalafonCodigo, escalafonDescripcion){
	//alert();
	cargaGrados = 0;
	document.getElementById(nombreObjeto).length = null;
	var datosOpcion = new Option("Cargando Datos ... ", 0, "", "");
	document.getElementById(nombreObjeto).options[0] = datosOpcion;	
		
	var objHttpXMLGrados = new AJAXCrearObjeto();
			
	objHttpXMLGrados.open("POST","./objeto/listaGrado.php",true);
	objHttpXMLGrados.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	objHttpXMLGrados.send(encodeURI("escalafonCodigo="+escalafonCodigo+"&escalafonDescripcion="+escalafonDescripcion));
	objHttpXMLGrados.onreadystatechange=function()
	{
		if(objHttpXMLGrados.readyState == 4)
		{       
			//alert(objHttpXMLGrados.responseText);
			if (objHttpXMLGrados.responseText != "VACIO"){
	
				//alert(objHttpXMLGrados.responseText);		
				var xml 			= objHttpXMLGrados.responseXML.documentElement;
				var codigo 			= "";
				var descripcion		= "";

				document.getElementById(nombreObjeto).length = null;
				
				var datosOpcion = new Option("SELECCIONE UNA OPCION ... ", 0, "", "");
				document.getElementById(nombreObjeto).options[0] = datosOpcion;								
				
				for(i=0;i<xml.getElementsByTagName('grado').length;i++){
					codigo 			= xml.getElementsByTagName('codigo')[i].firstChild.data;
					descripcion 	= xml.getElementsByTagName('descripcion')[i].firstChild.data;
					
					var datosOpcion = new Option(descripcion, codigo, "", "");
					document.getElementById(nombreObjeto).options[i+1] = datosOpcion;
				}
				cargaGrados = 1;
			}
		}
	}
} 

function llenaGradoFichaPersonal(grado){

	if (cargaGrados == 1) {
		clearInterval(idAsignaGradoFichaPersonal);
		document.getElementById("selGrado").value = grado;						
	}
}

function asignaValoresFichaFuncionario(escalafon, grado){
	if (cargaEscalafon == 1){
		clearInterval(idAsignaFichaPersonal);
		document.getElementById("selEscalafon").value 		= escalafon; 
		leeGrados('selGrado', escalafon, document.getElementById("selEscalafon")[document.getElementById("selEscalafon").selectedIndex].text);	
		idAsignaGradoFichaPersonal = setInterval("llenaGradoFichaPersonal("+grado+")",500);
	}
}

function validarPersonal(){
  var codigo      = document.getElementById("txtCodigo").value.toUpperCase();
  var rut         = document.getElementById("txtRut").value.toUpperCase();
  var cargo       = document.getElementById("cboCargo").value.toUpperCase();
  var dependencia = document.getElementById("cboDependencia").value.toUpperCase();
  var escalafon   = document.getElementById("selEscalafon").value;
  var grado       = document.getElementById("selGrado").value;
  //var profesion   = document.getElementById("cboProfesion").value;
  //var profesion   = document.getElementById("txtProfesion").value;
  var ape1        = document.getElementById("txtApe1").value.toUpperCase();
  var ape2        = document.getElementById("txtApe2").value.toUpperCase();
  var nom1        = document.getElementById("txtNom1").value.toUpperCase();
  var nom2        = document.getElementById("txtNom2").value.toUpperCase();
  //alert(codigo);
  
  	if (codigo == ""){
		alert("DEBE INDICAR EL C\u00D3DIGO DEL FUNCIONARIO ...... 	     ");
		document.getElementById("txtCodigo").focus();
		return false;
	}
	
		var regExCodigoFun = /^[0-9]{6,6}[A-Z]{1,1}$/;
	  var codigoValido = codigo.match(regExCodigoFun);
	//alert(codigoValido);
	
	if (!codigoValido){
		alert("EL CODIGO DE FUNCIONARIO INGRESADO NO TIENE UNA ESTRUCTURA VALIDA...... 	     ");
		document.getElementById("txtCodigo").focus();
		return false;
	}
	
		if (rut == ""){
		alert("DEBE INDICAR EL RUT DEL FUNCIONARIO ...... 	     ");
		document.getElementById("txtRut").focus();
		return false;
	}
	
		if (dependencia == 0){
		alert("DEBE INDICAR LA DEPENDENCIA ...... 	     ");
		document.getElementById("cboDependencia").focus();
		return false;
	}
	
		if (escalafon == 0){
		alert("DEBE INDICAR EL ESCALAFON ...... 	     ");
		document.getElementById("selEscalafon").focus();
		return false;
	}
	
		if (grado == 0){
		alert("DEBE INDICAR EL GRADO...... 	     ");
		document.getElementById("selGrado").focus();
		return false;
	}
	
	 // if (profesion == 0){
	//	alert("DEBE INDICAR LA PROFESION ...... 	     ");
	//	document.getElementById("cboProfesion").focus();
	//	return false;
	//}
	
		if (ape1 ==""){
		alert("DEBE INDICAR EL PRIMER APELLIDO ...... 	     ");
		document.getElementById("txtApe1").focus();
		//limpia(codEstamento);
		return false;
	}
	
		if (ape2 ==""){
		alert("DEBE INDICAR EL SEGUNDO APELLIDO ...... 	     ");
		document.getElementById("txtApe2").focus();
		//limpia(codEstamento);
		return false;
	}
	
	 if (nom1 ==""){
		alert("DEBE INDICAR EL PRIMER NOMBRE ...... 	     ");
		document.getElementById("txtNom1").focus();
		//limpia(codEstamento);
		return false;
	}
	
	 //if (nom2 ==""){
		//alert("DEBE INDICAR EL SEGUNDO APELLIDO ...... 	     ");
		//document.getElementById("txtNom2").focus();
		//limpia(codEstamento);
		//return false;
	//}
	
  return true;
}

function validarPersonalModificar(){

  var dependencia = document.getElementById("cboDependencia").value;
var cargo = document.getElementById("cboCargo").value;
  //var profesion   = document.getElementById("cboProfesion").value;
  // var profesion   = document.getElementById("txtProfesion").value;


		if (dependencia == 0){
		alert("DEBE INDICAR LA DEPENDENCIA ...... 	     ");
		document.getElementById("cboDependencia").focus();
		return false;
	}
	
		if (cargo == 0){
		alert("DEBE INDICAR EL CARGO ...... 	     ");
		document.getElementById("cboCargo").focus();
		return false;
	}

	
	 // if (profesion == 0){
	//	alert("DEBE INDICAR LA PROFESION ...... 	     ");
	//	document.getElementById("cboProfesion").focus();
	//	return false;
	//}
	

	
  return true;
}

function guardarFichaPersonal(){
	var codigo  = document.getElementById("txtCodigo").value.toUpperCase();
	//alert(auditoria);
	var existe = verificaFuncionario(codigo);
	//alert(existe);
	if(existe==1){
		return false;
		//window.close(); 
	}
else{
	var validaOk = validarPersonal();
	if(validaOk){
		registraPersonal();
	}
 }	
}

function modificarFichaPersonal(){
	//alert();
	var validaOk = validarPersonalModificar();
	if(validaOk){
		modificaPersonal();
	}	
}

function validarPlanificacion(){
	
	var auditoria 	= document.getElementById("txtCodigoAuditoria").value;
	var anno 	= document.getElementById("cboAnnoAuditoria").value;
	var nombre 	= document.getElementById("txtNombreAuditoria").value;
	var objetivo 	= document.getElementById("txtObjetivo").value;
	var auditado 	= document.getElementById("txtCodEstamento").value;
	var finicio	= document.getElementById("txtFechaInicio").value;
	var ftermino 	= document.getElementById("txtFechaTermino").value;
	var fcaigg 	= document.getElementById("txtFechaCaigg").value;
	var tipoAuditoria 	= document.getElementById("cboTipoAuditoria").value;
	var estadoAuditoria 	= document.getElementById("cboEstadoAuditoria").value;
	var hras 	= document.getElementById("txtHorasTrabjadas").value;
	  var estamento     = document.getElementById("txtEstamento").value;

  
  if (auditoria == ""){
		alert("DEBE INDICAR EL C\u00D3DIGO DE LA AUDITORIA...... 	     ");
		document.getElementById("txtCodigoAuditoria").focus();
		return false;
	}
	
		if (anno  == 0){
		alert("DEBE INDICAR EL A\u00D1O DE LA AUDITORIA ...... 	     ");
		document.getElementById("cboAnnoAuditoria").focus();
		return false;
	}
	
		if (nombre == ""){
		alert("DEBE INDICAR EL NOMBRE DE LA AUDITORIA ...... 	     ");
		document.getElementById("txtNombreAuditoria").focus();
		return false;
	}
	
			if (estamento == ""){
		alert("DEBE INDICAR EL ESTAMENTO AUDITADO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		return false;
	}
	
		if (auditado == 0 || auditado==""){
		alert("DEBE INDICAR UN ESTAMENTO AUDITADO VALIDO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		//limpia(codEstamento);
		return false;
	}
	
		if (objetivo == ""){
		alert("DEBE INDICAR EL OBJETIVO DE LA AUDITORIA ...... 	     ");
		document.getElementById("txtObjetivo").focus();
		return false;
	}
	
		if (finicio == ""){
		alert("DEBE INDICAR LA FECHA DE INICIO...... 	     ");
		document.getElementById("txtFechaInicio").focus();
		return false;
	}
	
		if (ftermino == ""){
		alert("DEBE INDICAR LA FECHA DE TERMINO...... 	     ");
		document.getElementById("txtFechaTermino").focus();
		return false;
	}
	
	 if (fcaigg == ""){
		alert("DEBE INDICAR FECHA DE ENVIO A CAIGG...... 	     ");
		document.getElementById("txtFechaCaigg").focus();
		return false;
	}
		
		if (tipoAuditoria ==0){
		alert("DEBE INDICAR EL TIPO DE AUDITORIA ...... 	     ");
		document.getElementById("cboTipoAuditoria").focus();
		//limpia(codEstamento);
		return false;
	}
	
		if (estadoAuditoria ==0){
		alert("DEBE INDICAR EL ESTADO DE LA AUDITORIA ...... 	     ");
		document.getElementById("cboEstadoAuditoria").focus();
		//limpia(codEstamento);
		return false;
	}
	
	 if (hras ==""){
		alert("DEBE INDICAR LAS HORAS DESTINADAS ...... 	     ");
		document.getElementById("txtHorasTrabjadas").focus();
		//limpia(codEstamento);
		return false;
	}
	
  var fechaMayor = comparaFecha(finicio,ftermino);
		//alert(fechaMayor);
	if (fechaMayor == 1){
		alert("LA FECHA DE TERMINO NO PUEDE SER INFERIOR A LA FECHA DE INICIO DE LA AUDITORIA: " + finicio);
		return false;
	}
	
	 var fechaMayorCaigg = comparaFecha(finicio,fcaigg);
		//alert(fechaMayor);
	if (fechaMayorCaigg == 1){
		alert("LA FECHA DE ENVIO A CAIGG NO PUEDE SER INFERIOR A LA FECHA DE INICIO DE LA AUDITORIA: " + finicio );
		return false;
	}
	
	  var fechaIguales = comparaFecha(finicio,ftermino);
		//alert(fechaMayor);
	if (fechaIguales == 0){
		alert("LA FECHA DE TERMINO NO DEBE SER IGUAL A LA FECHA DE INICIO DE LA AUDITORIA: " + finicio);
		return false;
	}
			
  return true;
}

function guardarFichaPlanificacion(){
	var auditoria  = document.getElementById("txtCodigoAuditoria").value.toUpperCase();
	//alert(auditoria);
	var existe = verificaAuditoria(auditoria);
	//alert(existe);
	if(existe==1){
		return false;
		//window.close(); 
	}
else{
	//alert();
	var validaOk = validarPlanificacion();
	if(validaOk){
		creaAuditoria();
	}
 }	
}

function modificarFichaPlanificacion(){	
	var validaOk = validarPlanificacion();
	if(validaOk){
		modificaPlanificacion();
	}	
}


function verificaAuditoria(auditoria)
{

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/verificaAuditoria.php",false);
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

function verificaFuncionario(codigo)
{

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/verificaFuncionario.php",false);
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 	var mensaje = "";
  var codigo  = document.getElementById("txtCodigo").value.toUpperCase();
  objHttpXMLCargaDatos.send(encodeURI("codigo="+codigo));
  //if (objHttpXMLCargaDatos.responseText.trim() != "VACIO")
  if(eliminarBlancos(objHttpXMLCargaDatos.responseText) != "VACIO"){
  	//alert(objHttpXMLCargaDatos.responseText);
	  mensaje="EL FUNCIONARIO "+codigo+" YA EXISTE EN LA BASE DE DATOS ...";
	  alert(mensaje);
	  return 1;
  } 
}

function consultaPlanificacion(estamento,nombre,tipo,anno,estado)
{
	//alert();

	var estamento = document.getElementById("txtEstamento").value;
	var nombre    = document.getElementById("txtNombre").value;
  var tipo      = document.getElementById("cboTipoAuditoria").value;
	var anno      = document.getElementById("cboAnnoAuditoria").value;
	var estado      = document.getElementById("cboEstadoAuditoria").value;
	
	 var usuario   = document.getElementById("codigoUsuario").value.toUpperCase();
   var daincar   = document.getElementById("daincarUsuario").value;
	
//alert(estamento);
//alert(nombre);
//alert(tipo);
//alert(anno);

  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/consultaPlanificacion.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

   //objHttpXMLCargaDatos.send("anno="+anno);
  
   objHttpXMLCargaDatos.send(encodeURI("estamento="+estamento+"&nombre="+nombre+"&tipo="+tipo+"&anno="+anno+"&estado="+estado+"&usuario="+usuario+"&daincar="+daincar));
   
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

var cargaEstamento2;
 function comboEstamento2(nombreObjeto)
{
	var cargaEstamento2=0;
  var objHttpXMLCargaDatos = new AJAXCrearObjeto();
  objHttpXMLCargaDatos.open("POST","./objeto/comboEstamento2.php",true);
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
				var cargaEstamento2=1;
   }
  } 
 }
}

function validarConsulta2(){
	var estamento = document.getElementById("txtEstamento").value;
	var nombre    = document.getElementById("txtNombre").value;
  var tipo      = document.getElementById("cboTipoAuditoria").value;
	var anno      = document.getElementById("cboAnnoAuditoria").value;
  var estado      = document.getElementById("cboEstadoAuditoria").value;
  
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
       
       	if(resultado == 1 && estamento=="" && nombre=="" && tipo==0 && anno==0 && estado==0){
		alert("DEBE SELECCIONAR AL MENOS UN CRITERIO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		return false;
	
 }
	


 	if (estamento== 0 && nombre=="" && tipo==0 && anno==0 && estado==0){
		alert("DEBE INDICAR AL MENOS 1 CRITERIO ...... 	     ");
		document.getElementById("txtEstamento").focus();
		return false;
	}
	
  return true;
}

function consultarPlanificacion(){	
	//alert();
	var validaOk = validarConsulta2();
	if(validaOk){
		//alert();
		consultaPlanificacion();
	}	
}

function modificaEstadoPlanificacion(){
	
	var msj=confirm("PROCEDERA A MODIFICAR EL ESTADO.        \n\u00BFDESEA CONTINUAR?...");
	if (msj){
	
  var codAuditoria  = eliminarBlancos(document.getElementById("txtCodigoAuditoria").value.toUpperCase());
  var estadoAuditoria = document.getElementById("cboEstadoAuditoria").value;
  
   var usuario   = document.getElementById("codigoUsuario").value.toUpperCase();
   var daincar   = document.getElementById("daincarUsuario").value;
 
  //alert(objetivo);
  
  //var ordenar=0;
	//alert(cod);
	 
	 //alert(codAuditoria);
	 //alert("Nombre: "+nomAuditoria);
	 //alert("A\u00F1o: "+annoAuditoria);
	 //alert("Estamento: "+estamento);
	 //alert("Objetivo: "+objetivo);
	 //alert("Hora: "+hora);
	 //alert("Tipo: "+tipoAuditoria);
	 //alert("Estado: "+estadoAuditoria);
	
	 
  var divPagina	= document.getElementById("contenidoPagina");
  divPagina.innerHTML="<br><br><center><img src='./img/load.gif'>  CARGANDO ...</center>";

  var objHttpXMLCargaDatos = new AJAXCrearObjeto();

  objHttpXMLCargaDatos.open("POST","./objeto/updatePlanificacionEstado.php",true);
  
  objHttpXMLCargaDatos.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  objHttpXMLCargaDatos.send("codAuditoria="+codAuditoria+"&estadoAuditoria="+estadoAuditoria+"&usuario="+usuario+"&daincar="+daincar);


  
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
		
							 //top.consultaPlanificacion();
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

function modificarEstadoPlanificacion(){	
	var validaOk = validarEstadoPlanificacion();
	if(validaOk){
		modificaEstadoPlanificacion();
	}	
}

function validarEstadoPlanificacion(){
	var estadoAuditoria 	= document.getElementById("cboEstadoAuditoria").value;
	var estadoActualAuditoria 	= document.getElementById("txtCodigoEstado").value;
	
	//alert("Nuevo: "+estadoAuditoria);
	//alert("Actual: "+estadoActualAuditoria);
	
		if (estadoAuditoria ==0 || estadoAuditoria ==""){
		alert("DEBE INDICAR EL ESTADO DE LA AUDITORIA ...... 	     ");
		document.getElementById("cboEstadoAuditoria").focus();
		//limpia(codEstamento);
		return false;
	}
	
	 if ( estadoAuditoria ==estadoActualAuditoria){
		alert("EL NUEVO ESTADO DE LA AUDITORIA NO DEBE SER IGUAL AL ESTADO ACTUAL ...... 	     ");
		document.getElementById("cboEstadoAuditoria").focus();
		//limpia(codEstamento);
		return false;
	}
	
		 if (estadoActualAuditoria==30){
		alert("NO SE PUEDE MODIFICAR EL ESTADO, DEBIDO A QUE LA AUDITORIA YA SE ENCUENTRA FINALIZADA ...... 	     ");
	  window.opener.location = window.opener.location;
		window.close();
	}
	
  return true;
 
}