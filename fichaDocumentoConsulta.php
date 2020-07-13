<?php
$codigoAuditoria=$_GET["cod"];	
//echo $codigoAuditoria;
?>
<!DOCTYPE html>

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<title>Administracion de Carpeta </title>
		<script src="js/jquery-3.4.1.min.js" type="text/javascript" language="javascript"></script>
<script src="js/upload.js" type="text/javascript" language="javascript"></script>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/repositorio.js" type="text/javascript" language="javascript"></script>
		
		<link rel="shortcut icon" href="images/favicon.ico" />
		
		<!-- CSS style -->
		<link rel="stylesheet" type="text/css" href="css/ajax-contact-form.css" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link href="css/tabla.css" rel="stylesheet" type="text/css"/>
		

		

	</head>
	
	<body onload="listaDocumento2();limpiar();">
	
		<!--
		#########################################
			- Ajax Contact Form / Start -
		#########################################
		-->
		<div class="ajax-contact-form">
			<div class="container">
			
				<!-- Title -->
				<div class="title">
					Administracion de Documentos 

					<span>Este formulario permite administrar <b>Documentos</b> subidos al <b>Repositorio</b> </span>
				</div>
				
				<div class="form-holder">
				
					<!-- Notification -->
					<div class="notification canhide">
						<div class="wrapper">
							<div class="inner"></div>
						</div>
					</div>	
						
					<!-- Form -->				
					<form id="frm_contact" name="frm_contact" action="" method="post">
						
						<div class="field">
							<label for="name">Nombre de la Carpeta  <span class="required"></span></label>
							<div class="inputs">
								<input class="aweform small" type="text" id="txtCodigoAuditoria" name="txtCodigoAuditoria" value="<?php echo $codigoAuditoria=$_GET["cod"];?>" readonly/>
							</div>  
						</div>
						
						<div class="field">
							<label for="email">Tipo de Informe<span class="required">*</span></label>
							<div class="inputs">
									<select class="aweform" id="cboTipoInforme" name="subject" onChange="muestraCampo()" disabled>
						<option value="0">SELECCIONE ...</option>
  <option value="10">INFORME PRELIMINAR</option>
  <option value="20">PLANIFICACION AUDITORIA</option>
  <option value="30">INFORME FINAL</option>
  <option value="40">PLAN DE ACCION</option>
  <option value="50">PRESENTACION FINAL</option>
  <option value="60">OTRO</option>
								</select>
							</div>  
						</div>
						
						<div class="field">
							<label for="phone">Otro Tipo de Informe <span class="required">*</span></label>
							<div class="inputs">
								<input class="aweform" type="text" id="txtOtroTipoInforme" name="phone" disabled/>
							</div>  
						</div>												
						<div class="field">
							<label for="message">Descripcion <span class="required">*</span></label>
							<div class="inputs">
									<!--<textarea class="aweform" id="descripcionDocumento" name="message" rows="30" cols="5" style="text-transform:uppercase;"  onKeyDown="validarSubir();"></textarea>-->
							<input class="aweform" type="text" id="descripcionDocumento" name="phone" style="text-transform:uppercase;" onKeyDown="validarSubir();" disabled/>
							</div>  
						</div>
						
						<div class="field">
							<label for="verify"> <span class="required"></span></label>
							<div class="inputs">
							
							</div>  
						</div>
							<div class="field">
							<label for="phone">Adjuntar Archivos <span class="required">*</span></label>
							<div class="inputs">
								<input class="aweform small" type="file" id="archivo" name="phone" onchange="subeArchivo();"disabled/>
								<input type="hidden" id="carpeta" value="<?php echo $codigoAuditoria=$_GET["cod"];?>"/>
									<input type="hidden" id="archivoServidor" value="">
	<input type="hidden" id="archivoLoad" value=0>
	<input type="hidden" id="rutArchi" name="rutArchi" value="">
							</div>  
						</div>	
						<div class="form-submit">
							<button type="button" id="submit" name="submit" onClick="guardarFichaDocumento();" disabled><i class="fa fa-chevron-circle-right"></i> Subir Documento</button>   
						</div>
						
					</form>
<div id="content"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->				
<br>			
<div id="contenidoPagina"></div>
				</div>
				
			</div>
		</div>

						</div>	
			
	</body>
	
</html>