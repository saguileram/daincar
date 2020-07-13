//INICIO DE SESION LOCAL PARA PRESENTAR LA APLICACION
//SE DEBE CAMBIAR POR EL DE AUTENTIFICATIC 
function sesionLocal(){
	var fun_codigo = document.getElementById("rut_funcionario").value.toUpperCase();
	var clave = document.getElementById("password").value;
	
		if (fun_codigo == "") {
		alert("DEBE INDICAR EL CODIGO DE FUNCIONARIO...... 	     ");
		document.getElementById("rut_funcionario").focus();
		return false;
	}
	
		if (clave == "") {
		alert("DEBE INDICAR LA CLAVE...... 	     ");
		document.getElementById("password").focus();
		return false;
	}
	
	//return true;
	window.location	= 'valida.php?fun_codigo='+fun_codigo; 
	
}
//CIERRE DE SESION LOCAL
function cerrarAplicacion(){
		window.location	= 'salir.php'; 
}

//VALIDADOR DE CODIGO DE FUNCIONARIO
function validaCodigo(){
var codigo = document.getElementById("rut_funcionario").value.toUpperCase();
var regExCodigoFun = /^[0-9]{6,6}[A-Z]{1,1}$/;
var codigoValido = codigo.match(regExCodigoFun);
if (!codigoValido){
		alert("EL CODIGO DE FUNCIONARIO INGRESADO NO TIENE UNA ESTRUCTURA VALIDA...... 	     ");
		document.getElementById("rut_funcionario").focus();
		return false;
	}
}

//INICIO DE CODIGOS PARA AUTENTIFICATIC
//VALIADOR DE RUT
function checkRut(rut, id_button) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + ''+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) {
        rut.setCustomValidity("RUT Incompleto");
        var id_element = document.getElementById(id_button);
        id_element.classList.add("input-style-invalid");        
        var rut_error = document.getElementById("rut_error");
        rut_error.innerHTML = "RUT Incompleto";        
        return false;
    }
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { 
        rut.setCustomValidity("RUT no válido");
        var id_element = document.getElementById(id_button);
        id_element.classList.add("input-style-invalid");        
        var rut_error = document.getElementById("rut_error");
        rut_error.innerHTML = "RUT no válido";
        return false;
    }
 
    // Si todo sale bien, eliminar errores (decretar que es válido)
    var id_element = document.getElementById(id_button);
    id_element.classList.remove('input-style-invalid');
    rut.setCustomValidity('');
}


/* Get IE or Edge browser version */
var version = detectIE();


if (version <  10 && version != false) {
	location.href ="unsupported.html"; 
}

function detectIE() {
  var ua = window.navigator.userAgent;

  var msie = ua.indexOf('MSIE ');
  if (msie > 0) {
    /* IE 10 or older => return version number */
    return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
  }
  var trident = ua.indexOf('Trident/');
  if (trident > 0) {
    /* IE 11 => return version number */
    var rv = ua.indexOf('rv:');
    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
  }
  var edge = ua.indexOf('Edge/');
  if (edge > 0) {
    /* Edge (IE 12+) => return version number */
    return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
  }
  /* other browser */
  return false;
}

//SECCIÓN DE AUTENTIFICATIC

//import axios from 'axios';

var access_token	= '';
var token_type 		= '';
var expires_at 		= '';

//primera llamada a autentificatic
	function iniciar_sesion(){
		//alert("entro1");
		var urlLogin = 'http://autentificaticapi.carabineros.cl/api/auth/login';
		axios.post(urlLogin, {
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/x-www-form-urlencoded'
			},
			rut: 		document.getElementById("rut").value,
			password: 	document.getElementById("password").value	
		}).then(response => {
			//loguin correcto
			console.log(response.data);
			access_token = response.data.success.access_token;
			token_type   = response.data.success.token_type;
			expires_at	 = response.data.success.expires_at;
			//alert (expires_at);	
				
			// Guardar data al almacenamiento local actual
			localStorage.setItem("access_token", access_token);
			localStorage.setItem("token_type", token_type);
			localStorage.setItem("expires_at", expires_at);
				
			// limpio campos
			document.getElementById("rut").value = '';
			document.getElementById("password").value = '';
			
			
			/////////// ver porq me valida el token afuera y dentro no
			//validar_token();
			// Obtengo datos del usuario
			//obtener_datos_de_usuario();	
					
			
		}).catch(error => {
			//loguin incorrecto
			console.log(error.response.data);
			console.log(error.response.status);
			//alert ("incorrecto");
		});
        
      } 
      
 //devuelve datos relevantes del usuario logueado
	function obtener_datos_de_usuario(){
		var urlGetUser = 'http://autentificaticapi.carabineros.cl/api/auth/user';
		axios.get(urlGetUser, {	
		headers: {
			'Authorization': token_type+' '+access_token,
			'Accept': 'application/json',
			'Content-Type': 'application/x-www-form-urlencoded'
		}
		}).then(response => {
			console.log(response.data);	
			
			//declaro variables y las lleno con los datos obtenidos
			//fun_photo	= response.data.success.photo;
			//fun_codigo	= response.data.success.user.PEFBCOD;
			fun_codigo			= response.data.success.user.codigo_funcionario;		
			fun_rut				= response.data.success.user.rut;	
			fun_dotacion		= response.data.success.user.dotacion;
			expiration_psw		= response.data.success.user.password_expiration;
			primer_nombre		= response.data.success.user.primer_nombre;	
			apellido_paterno	= response.data.success.user.apellido_paterno;	
			apellido_materno	= response.data.success.user.apellido_materno;	
			//alert (fun_codigo);
			
			//validamos que el password esté vigente (dura 60 días)
			if (expiration_psw <= 0){
				var opcion = confirm("Su Password caducó, ¿desea ir a autentificatic y crear uno nuevo?");
				
				if (opcion == true) {
					window.location = "http://autentificatic.carabineros.cl/password/reset";
				}
			}else{				
				//redireccionamos si la validación está ok			
				window.location	= 'valida.php?fun_codigo='+fun_codigo; 
			}
			
		}).catch(error => {
			console.log(error.response.data.message);
		});
	}

      function validar_token(){
		//alert("access_tokens = " + localStorage.getItem("access_token"));
		  
		var urlGetUser = 'http://autentificaticapi.carabineros.cl/api/auth/validate-token';
		axios.get(urlGetUser, {	
		headers: {
			'Authorization': token_type+' '+access_token,
			'Accept': 'application/json',
			'Content-Type': 'application/x-www-form-urlencoded'
		}
		}).then(response => {
			console.log(response.data);	
		}).catch(error => {
			console.log(error.response.data.message);
		});
	}

	function validar_token(){
		//alert("access_tokens = " + localStorage.getItem("access_token"));
		  
		var urlGetUser = 'http://autentificaticapi.carabineros.cl/api/auth/validate-token';
		axios.get(urlGetUser, {	
		headers: {
			'Authorization': token_type+' '+access_token,
			'Accept': 'application/json',
			'Content-Type': 'application/x-www-form-urlencoded'
		}
		}).then(response => {
			console.log(response.data);	
		}).catch(error => {
			console.log(error.response.data.message);
		});
	}
	
function cerrar_sesion(){
		var urllogout= 'http://autentificaticapi.carabineros.cl/api/auth/logout';
		axios.get(urllogout, {	
		headers: {
			'Authorization': token_type+' '+access_token,
			'Accept': 'application/json'
		}
		}).then(response => {
			console.log(response.data.message);	
			window.location	= 'salir.php'; 
		}).catch(error => {
			console.log(error.response.data.message);
		});
	}
