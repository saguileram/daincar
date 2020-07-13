<!DOCTYPE html>
<html lang="es">
	<head>
	<title>DAINCAR</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<meta name="theme-color" content="#3c763d;">
	<link rel="stylesheet" href="assets/css/font-awesome.min.Autentif.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styleAutentif.css">	
  
<script type="text/javascript" src="assets/js/axios.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>-->
 <script src="assets/js/main.js" type="text/javascript" language="javascript"></script>
	
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<meta name="theme-color" content="#3c763d;">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">	
</head>

<body class="bg-login" >
	<div class="margintop-login">
  
	    <div class="carabineros">
		    <div  style="line-height: 32px; width: 85%; float: right; text-align: left;">
		        <h1 class="title-name-app">DAINCAR</h1>
		        <h5 class="subtitle-name-app">DIRECCION AUDITORIA INTERNA</h5>
		    </div>
		    <div  style="width: 30%">
		        <img src="assets/images/carabineros.png" width="70" height="auto">
		    </div>
	    </div>
		<div style="clear:both"></div>
	    <div class="login-page"  class="background-black-06">
	   		<div class="autentificatic-sello text-center">
	   			<!--<a href="http://autentificaticapi.carabineros.cl/assets/documents/procedimiento_de_seguridad.pdf" target="_blank">-->
	   			<img src="http://autentificaticapi.carabineros.cl/assets/images/autentificatic.png" width="280" height="auto" style="padding-top: 6px;">
	   			</a>
	   		</div>
	   			<div  class="text-center">
			        <a href="#popup"><img src="assets/images/info.png" width="60" height="auto"></a>
			    </div>
		    <div class="input-size">		    	 
		        <form id="form_login" action="index.php" method="post" autocomplete="off">
		         	<div class="input-group form-group">
		         		 <!-- INPUT PARA LOGIN LOCAL, SE DEBE COMENTAR -->
		         		 <input name="rut_funcionario" id="rut_funcionario" type="text" class="input-style" size="10" style="text-transform:uppercase;" onChange="validaCodigo(this);" required>
		          		 <!-- INPUT ORIGINAL PARA AUTETIFICATIC, SE DEBE DESCOMENTAR, PARA UTILIZAR -->
		          		<!--<input name="rut" id="rut" type="text" class="input-style" size="10" onChange="checkRut(this, 'rut')" required>-->
		          		<span class="highlight"></span>
			            <span class="bar"></span>
			             <!-- MENSAJE ORIGINAL PARA AUTETIFICATIC, SE DEBE DESCOMENTAR, PARA MOSTRAR -->
			                  <!--<label class="label-input"><i class="fa fa-user"></i> RUT (sin puntos ni guión)</label>-->
			                    <label class="label-input"><i class="fa fa-user"></i> Código de Funcionario (Sin guión)</label>
		              	<div class="invalid-feedback">
	                    	<span id="rut_error"></span>
	                  	</div>		                             
		          	</div>
			        <div class="input-group form-group">
			   <input name="password" id="password" type="password" class="input-style" size="20" required>
			            <span class="highlight"></span>
			            <span class="bar"></span>
			             <label class="label-input"><i class="fa fa-lock"></i> Contraseña</label>
			            <div class="invalid-feedback">
		                	<span id="password_error"></span>
		                </div>	             
			          </div>		        

		         	<div style="float: left;">
		         		<!--<a href="http://autentificatic.carabineros.cl/password/reset" style="width: 50%" >Recuperar contrase🺯a>-->
		         	</div>

		         	<div style="float: right;">
		         		<!--<a href="http://autentificatic.carabineros.cl/register" style="width: 50%">Registrate en autentificatic</a>-->
		         	</div>

		         	<div style="clear: both; padding-bottom: 15px;"></div>

		          	<div class="text-center">
		        <!-- BOTON ORIGINAL PARA AUTETIFICATIC, SE DEBE DESCOMENTAR, PARA UTILIZAR -->
				      	<!--<input type="button" class="btn-login" name="enviar" value="iniciar sesion" onclick="iniciar_sesion();"/>-->
				  	 <!-- BOTON LOGIN LOCAL, SE DEBE COMENTAR -->
				  <input type="button" class="btn-login" name="enviar" value="iniciar sesion" onclick="sesionLocal();"/>
				  	</div>
				  	<div class="text-center">
				  		<p style="margin-bottom: 0px;"><strong>PLANIFICACION Y ADMINISTRACION DE AUDITORIAS V2.0.0</strong></p>
				  	</div>
				</form>		       
		   	</div>
		</div>

	  	<div class="text-center information-bottom">
		  <div class="title-by">Desarrollado por el Depto. Control de Gestión Sistemas de Información (DCGSI) © <?php echo $anno=date("Y");?></div>	
		  <div class="title-deskhelp">FONO SOPORTE: 20809</div>
		</div>	    

		<div class="logos-bottom">
			<img src="http://intranetv2.carabineros.cl/DescargasTIC/aniversario.png" width="70" height="auto"  style="padding-top: 20px; text-align:center;">
			<!--<img src="http://intranetv2.carabineros.cl/DescargasTIC/sello-TIC.png" width="70" height="auto" style="float: right;">-->
		</div>

		<div class="text-center slogan"><img src="http://intranetv2.carabineros.cl/DescargasTIC/slogan.png" style="padding-top: 20px;"></div>

	</div>

	 <div id="popup" class="overlay">
        <div id="popupBody">
            <h2>Objetivo del sistema</h2>
            <a id="cerrar" href="#">&times;</a>
            <div class="popupContent">
                <p> <div style="color:#8f8e8e; font-size:13px; text-align:center; padding:5px;">
        	   <br/><br/><strong> © Carabineros de Chile</strong> <br/>
                Desarrollado por el Depto. Control de Gestión Sistemas de Información <br/>
                Consultas al telefono IP: 20809<br/><br/><br/><br/>
                Sitio Optimizado para: &nbsp; <a href="https://www.google.com/intl/es-419_ALL/chrome/" target="_blank"><img src="img/chrome.svg"  width="30px" height="100%"></a>
                &nbsp;
                 <a href="https://www.mozilla.org/es-CL/firefox/new/" target="_blank"><img src="img/mozilla.png" width="30px" height="100%"></a>
        </div></p>
            </div>
        </div>
    </div>


	

</body>
</html>