<?php
$codigoAuditoria=$_GET["cod"];	
//echo $codigoAuditoria;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title>FICHA NUEVO DOCUMENTO ...</title>	
<script src="js/jquery-3.4.1.min.js" type="text/javascript" language="javascript"></script>
<script src="js/upload.js" type="text/javascript" language="javascript"></script>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/repositorio.js" type="text/javascript" language="javascript"></script>
</head>	
<body onload="listaDocumento();limpiar();">
<div id="contenedor">
<form name="form" action="#" method="post">
<fieldset>	
<legend>DOCUMENTOS AUDITORIA</legend>	
<br>
 <div id="documento">
	<table id="documento" border="0">
	<tr>
	<td>CODIGO AUDITORIA</td>	
	<td>:&nbsp;<input type="text" id="txtCodigoAuditoria" size="10" value="<?php echo $codigoAuditoria=$_GET["cod"];?>" readonly/></td>
	</tr>	
	<td>TIPO DE INFORME</td>	
	<td>:&nbsp;<select id="cboTipoInforme" onChange="muestraCampo()" >
	<option value="0">SELECCIONE ...</option>
  <option value="10">INFORME AUDITORIA</option>
  <option value="20">PLAN DE ACCION</option>
  <option value="30">OTROS</option>
  </select></td>
	</tr>	
	<tr>
	<td>OTRO TIPO INFORME</td>
	<td>:&nbsp;<input type="text" id="txtOtroTipoInforme" size="50" style="text-transform:uppercase;" disabled/></td>
	</tr>
	<tr>
	<td>DESCRIPCION DEL DOCUMENTO</td>
	<td>&nbsp;&nbsp;<textarea rows="4" cols="38" id="descripcionDocumento" name="descripcionDocumento" style="text-transform:uppercase;"  onKeyDown="validarSubir();"valida_longitud()" onKeyUp="valida_longitud()"></textarea></td>
	</tr>
	<tr>
<td></td>
<td><center>CARACTERES PERMITIDOS<div id="capa">0</div></center></td>
</tr>
</table>
 <br>
 </fieldset>
</form>
 </div>
<br>
 <div id="">
<fieldset>	
<legend>ADJUNTAR ARCHIVOS</legend>	
<br>
<table>
<tr align="left">
<form>
<td><input type="file"name="archivo" id="archivo" onchange="subeArchivo();" disabled/></td>
<td><input type="hidden" id="carpeta" value="<?php echo $codigoAuditoria=$_GET["cod"];?>"</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>

	<input type="hidden" id="archivoServidor" value="">
	<input type="hidden" id="archivoLoad" value=0>
	<input type="hidden" id="rutArchi" name="rutArchi" value="">
	</form> 
</td>
<td width="10%">&nbsp;</td>
<td width="10%">&nbsp;</td>
<td width="20%"></td>
<td width="17%"></td>
<td width="14%"></td>	
</tr>	
</table>
</fieldset>	
 </div>
<div id="content"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->
<div id="">
<br>
<table>
<tr>
<td><input type="button" id="btn"value="Subir documento" onClick="guardarFichaDocumento();" disabled/>&nbsp;&nbsp;<input type="button" value="Cerrar" onClick="close_window();"/></td>
<td></td>
</tr>	
</table>
</div> 
</div>	
<div id="contenidoPagina">
</body>
</html>