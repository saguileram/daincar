<?php
$codigoAuditoria=$_GET["cod"];	
//echo $codigoAuditoria;
?>
<!DOCTYPE html>
<html>
<head>
<title>FICHA ACTUALIZA DATOS ...</title>	
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/repositorio.js" type="text/javascript" language="javascript"></script>
<script src="js/autocompletar.js" type="text/javascript" language="javascript"></script>
<link rel="stylesheet" href="css/autocompletar.css" type="text/css" media="all" />
</head>	
<body onload="datoCarpeta('txtCodigoAuditoria');">
<div id="contenedor">
<form action="">
<fieldset>	
<legend>REPOSITORIO DOCUMENTOS</legend>	
<br>
 <div id="carpeta">
	<table id="carpeta" border="0">
	<tr>
	<td></td>	
	</tr>
	<tr>
	<td>CODIGO DE LA AUDITORIA</td>	
	<td>:&nbsp;<input type="text" id="txtCodigoAuditoria" name="txtCodigoAuditoria" size="10" value="<?php echo $codigoAuditoria=$_GET["cod"];?>" readonly/></td>
	</tr>	
	<tr>
	<td>NOMBRE DE LA AUDITORIA</td>
	<td>:&nbsp;<input type="text" id="txtNombreAuditoria" size="50" style="text-transform:uppercase;"/></td>
	</tr>
	<tr>
	<td>A&Ntilde;O DE LA AUDITORIA:</td>	
	<td>:&nbsp;<select id="cboAnnoAuditoria">
	<option value="0">SELECCIONE OPCION ...</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  </select></td>	
	</tr>
	<tr>
	<td>ESTAMENTO AUDITADO:</td>	
	<td>:&nbsp;<input type="text" id="txtEstamento" name="hidden" size="50" onKeyUp="autocompletar('lista',this.value);" onFocus="limpia(this);" style="text-transform:uppercase;"/><input type="hidden" id="txtCodEstamento" name="texto2"/><div id="lista" class="autocompletar"></div></td>
	</tr>
		<tr>
	<td>TIPO DE AUDITORIA</td>	
	<td>:&nbsp;<select id="cboTipoAuditoria">
	<option value="0">SELECCIONE OPCION ...</option>
  <option value="10">INSTITUCIONAL</option>
  <option value="20">GUBERNAMENTAL</option>
  <option value="30">EXTRAORDINARIA</option>
  </select></td>	
	</tr>
	<tr>
	<td>CANTIDAD DE HALLAZGOS</td>
	<td>:&nbsp;<input type="text" id="txtCantidadHallazgo" size="2" onkeypress="return validaNumeros(event)"/></td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td><input type="button" value="Actualizar" onClick="modificaFichaCarpeta()"/>&nbsp;&nbsp;<input type="button" value="Cerrar" onClick="window.close();"/></td>
	<td></td>
	</tr>
	</table>
 </div>
 <br>
 </fieldset>
 </form>
</div>	
<div id="contenidoPagina">
</body>
</html>