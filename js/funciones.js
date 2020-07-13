function getAnno(fecha){
	var fechaPaso = fecha.split("/");
   return fechaPaso[2];
}

function getMes(fecha){
	var fechaPaso = fecha.split("/");
    return fechaPaso[1];
}

function getDia(fecha){
	var fechaPaso = fecha.split("/");
    return fechaPaso[0];
}

function comparaFecha(fecha1, fecha2){
	
	var auxFecha1 = new Date(getAnno(fecha1),getMes(fecha1)-1,getDia(fecha1));
	var auxFecha2 = new Date(getAnno(fecha2),getMes(fecha2)-1,getDia(fecha2));
	//alert(auxFecha1 + " ---- " + auxFecha2);
	if (auxFecha1 > auxFecha2) return 1;
	if (auxFecha1 < auxFecha2) return 2;
	if (fecha1 == fecha2) return 0;
}

/*Función para limitar el ingreso de caracteres en un campo determinado, además de restringir el ingreso de los caracteres que se indiquen (solo números, solo letras o solo carecteres de RUN)*/
function maximo(objeto,maxi,tipo){
	if(objeto.value.length >= maxi){
		window.event.keyCode=0;
		return false;
	}
	if(tipo=="C"){
		solo_char();
	}
	else if(tipo=="N"){
		solo_num();
	}
	else if(tipo=="R"){
		solo_rut();
	}
}

/*Función de apoyo de "maximo", está restringe el ingreso a solo números al campo indicado*/   
function solo_num(){
	var key=window.event.keyCode;
	if(key==13)Objeto.blur();
	if (key < 48 || key > 57){
		window.event.keyCode=0;
	}
}

/*Función de apoyo de "maximo", está restringe el ingreso a solo letras al campo indicado*/
function solo_char(){
	var key=window.event.keyCode;
	if(key==13)Objeto.blur();
	if (key > 48 && key < 57){
		window.event.keyCode=0;
	}
}

/*Función de apoyo de "maximo", está restringe el ingreso a solo caracteres permitidos en el RUN como son los números y la letra K*/
function solo_rut(){
	var key=window.event.keyCode;
	if(key==13)Objeto.blur();
	if ((key < 48 || key > 57)&&(key != 75 && key != 107)){
		window.event.keyCode=0;
	}
}

/*Función para dar formato de RUN a un campo determinado*/
function formato_rut(rut){
		
	var sRut1 = rut.value;      //contador de para saber cuando insertar el . o la -
	var nPos = 0; 							//Guarda el rut invertido con los puntos y el guión agregado
	var sInvertido = ""; 				//Guarda el resultado final del rut como debe ser
	var sRut = "";
	
	for(var i = sRut1.length - 1; i >= 0; i-- ){
    sInvertido += sRut1.charAt(i);
    if (i == sRut1.length - 1 ) sInvertido += "-";
    else if (nPos == 3){
      sInvertido += ".";
      nPos = 0;
    }
    nPos++;
	}
	for(var j = sInvertido.length - 1; j >= 0; j-- ) {
	  if (sInvertido.charAt(sInvertido.length - 1) != ".") sRut += sInvertido.charAt(j);
	  else if (j != sInvertido.length - 1 ) sRut += sInvertido.charAt(j);
	}
	//Pasamos al campo el valor formateado
	rut.value = sRut.toUpperCase();
	Valida_Rut(rut);
}

/*Función para validar que el RUN ingresado sea valido*/
function Valida_Rut(Objeto){
	
	var tmpstr = "";
	var intlargo = Objeto.value
	var key=window.event.keyCode;
	
	if (intlargo.length> 0){
		
		crut = Objeto.value
		largo = crut.length;
		if ( largo <2 ){
			alert('rut inválido')
			Objeto.focus()
			return false;
		}
		
		for ( i=0; i <crut.length ; i++ )
		
		if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' ){
			tmpstr = tmpstr + crut.charAt(i);
		}
		rut = tmpstr;
		crut=tmpstr;
		largo = crut.length;
 
		if ( largo> 2 )
			rut = crut.substring(0, largo - 1);
		else
			rut = crut.charAt(0);

		dv = crut.charAt(largo-1);
 
		if ( rut == null || dv == null )
		return 0;

		var dvr = '0';
		suma = 0;
		mul  = 2;

		for (i= rut.length-1 ; i>= 0; i--){
			suma = suma + rut.charAt(i) * mul;
			if (mul == 7)
				mul = 2;
			else
				mul++;
		}
 
		res = suma % 11;
		if (res==1)
			dvr = 'k';
		else if (res==0)
			dvr = '0';
		else{
			dvi = 11-res;
			dvr = dvi + "";
		}
		
		if ( dvr != dv.toLowerCase() ){
			alert('El Rut Ingresado no es Invalido');
			Objeto.value="";
			Objeto.focus();
			return false;
		}
		
		Objeto.disabled = false;
		return true;
	}
}

function php_serialize(obj)
{
    var string = '';

    if (typeof(obj) == 'object') {
        if (obj instanceof Array) {
            string = 'a:';
            tmpstring = '';
            var count = 0;
            //for (var key in obj) {
            //    tmpstring += php_serialize(key);
            //    tmpstring += php_serialize(obj[key]);
            //    count++;
            //}
            //count = obj.length; 
            //alert(count);
            for (var key=0; key<obj.length; key++) {
                tmpstring += php_serialize(key);
                tmpstring += php_serialize(obj[key]);
                count++;
            }
            
            string += count + ':{';
            string += tmpstring;
            string += '}';
        } else if (obj instanceof Object) {
            classname = obj.toString();

            if (classname == '[object Object]') {
                classname = 'StdClass';
            }

            string = 'O:' + classname.length + ':"' + classname + '":';
            tmpstring = '';
            count = 0;
            for (var key in obj) {
                tmpstring += php_serialize(key);
                if (obj[key]) {
                    tmpstring += php_serialize(obj[key]);
                } else {
                    tmpstring += php_serialize('');
                }
                count++;
            }
            string += count + ':{' + tmpstring + '}';
        }
    } else {
        switch (typeof(obj)) {
            case 'number':
                if (obj - Math.floor(obj) != 0) {
                    string += 'd:' + obj + ';';
                } else {
                    string += 'i:' + obj + ';';
                }
                break;
            case 'string':
                string += 's:' + obj.length + ':"' + obj + '";';
                break;
            case 'boolean':
                if (obj) {
                    string += 'b:1;';
                } else {
                    string += 'b:0;';
                }
                break;
        }
    }

    return string;
}

//Validar checkbox
function validate(form){ 
for(var i = 0; i < form.supervisor.length; i++){ 
if(form.supervisor[i].checked)return true; 
} 
alert('DEBE SELECCIONAR UN SUPERVISOR ...'); 
return false; 
} 

function validate1(form){ 
for(var i = 0; i < form.auditor.length; i++){ 
if(form.auditor[i].checked)return true; 
} 
alert('DEBE SELECCIONAR LOS AUDITORES ...'); 
return false; 
} 

//Volver
function goBack() {
    window.history.back()
  //alert("Prueba.");
}

//Validar
function validar(){
	
	  var auditoria= document.getElementById("auditoria").value;
		var anno	= document.getElementById("anno").value;
		var nombre	= document.getElementById("nombre").value;

	if (auditoria == "") {
		alert("DEBE INDICAR EL CODIGO DE LA AUDITORIA...... 	     ");
		document.getElementById("auditoria").focus();
		return false;
	}
	 	if (anno == 0) {
		alert("DEBE INDICAR EL AÑO...... 	     ");
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

//Validar
function validar2(){
  // primera comprobación
  if(formulario.txtfun.value == ''){
    // informamos del error
    alert('INGRESE EL CÓDIGO DEL FUNCIONARIO.');
    // seleccionamos el campo incorrecto
    document.formulario.txtfun.focus();
    return false;
  }
   document.formulario.submit();
   return true;
}


	
function closeAllModalWindows() {
    Windows.closeAllModalWindows();
    return true;
}


function cerrarVentana(){
	//alert();
	Windows.closeAll();
	return true;
}
  
  
 function cerrarAplicacion(){
		var caduca=new Date(); 

		
		//setCookie('USUARIO_NOMBRE','',caduca);          
		//alert();
		//setCookie('USUARIO_CODIGOFUNCIONARIO','',caduca);
		//setCookie('USUARIO_DESCRIPCIONUNIDAD','',caduca);
		//
		////window.document.write = "unset($_COOKIE['USUARIO_UNIDAD'])";
		//alert();
		window.location.replace("logout.php");
		
}

var newwindow;
function popup(url)
{ newwindow=window.open(url,'Ficha Usuario ...','width=450,height=520,left=200,top=300','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=440,height=347,directories=no,titlebar=no');
if (window.focus) {newwindow.focus()}
}


function cerrar(){
	top.close;
	}

 //   function popUp(URL) {
 //       window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=300,height=200,left = 390,top = 50');
 //   }

var newwindow2;
function popup1(url)
{ newwindow2=window.open(url,'name','width=500,height =420,left=200,top=300','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=440,height=347,directories=no,titlebar=no');
if (window.focus) {newwindow2.focus()}
}

var newwindow3;
function popup3(url)
{ newwindow3=window.open(url,'name','width=860,height=560,left=250,top=400','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=440,height=347,directories=no,titlebar=no');
if (window.focus) {newwindow3.focus()}
}

var newwindow5;
function popup5(url)
{ newwindow5=window.open(url,'name','width=455,height=380,left=250,top=350','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=440,height=347,directories=no,titlebar=no');
if (window.focus) {newwindow5.focus()}
}

var newwindow6;
function popup6(url)
{ newwindow6=window.open(url,'name','width=860,height=560,left=250,top=450','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=440,height=347,directories=no,titlebar=no');
if (window.focus) {newwindow6.focus()}
}

var newwindow7;
function popup7(url)
{ newwindow7=window.open(url,'name','width=860,height=480,left=250,top=450','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=440,height=347,directories=no,titlebar=no');
if (window.focus) {newwindow7.focus()}
}

var newwindow8;
function popup8(url)
{ newwindow8=window.open(url,'name','width=520,height=480,left=250,top=450','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=440,height=347,directories=no,titlebar=no');
if (window.focus) {newwindow8.focus()}
}

function limpia(elemento)
{
elemento.value = "";
}

//Controla que el usuario escriba solo numeros en un campo de texto
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


function codigo() { 
  var m = document.getElementById("auditoria").value;
  var expreg = /^\d{1,2}([w.@\-])\d{4}([A-I]){3}/;
  
  if(!expreg.test(m))
	alert("EL CODIGO TIENE UNA ESTRUCTURA ERRONEA ..."); 
 
} 

function limpiar_logueo()
{
	document.form.reset();
	document.form.user.focus();
}
function validar_logueo()
{
	var form=document.form;
	if (form.user.value==0)
	{
		alert("Ingrese su Login");
		form.user.value="";
		form.user.focus();
		return false;
	}
	if (form.pass.value==0)
	{
		alert("Ingrese su Password");
		form.pass.value="";
		form.pass.focus();
		return false;
	}
	
	form.pass.value=calcMD5(form.pass.value);
	form.submit();
	
}

function comprueba_extension(formulario, archivo) { 
   extensiones_permitidas = new Array(".pdf"); 
   mierror = ""; 
   if (!archivo) { 
      //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
      	mierror = "NO HAS SELECCIONADO NINGUN ARCHIVO ..."; 
   }else{ 
      //recupero la extensión de este nombre de archivo 
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
      //alert (extension); 
      //compruebo si la extensión está entre las permitidas 
      permitida = false; 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
         if (extensiones_permitidas[i] == extension) { 
         permitida = true; 
         break; 
         } 
      } 
      if (!permitida) { 
         mierror = "COMPRUEBA LA EXTENSION DE LOS ARCHIVOS A SUBIR. \nSOLO SE PUEDE SUBIR ARCHIVOS CON EXTENSIONES : " + extensiones_permitidas.join(); 
      	}else{ 
         	//submito! 
         alert ("TODO CORRECTO ..."); 
         formulario.submit(); 
         return 1; 
      	} 
   } 
   //si estoy aqui es que no se ha podido submitir 
   alert (mierror); 
   return 0; 
}

    function copiar(n1, n2){
        var num1 = document.getElementById("cod").value;
        document.getElementById("clave").value = num1.substring(4,-1);  
    }