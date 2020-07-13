<?php
include("lib/menu.php");

if (isset($_SESSION["session_video_14"]))
{
$codigo=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
$daincarUsuario=$_SESSION["session_video_21"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<title></title>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/planificacion.js" type="text/javascript" language="javascript"></script>
<script src="js/repositorio.js" type="text/javascript" language="javascript"></script>
<script src="js/autocompletarNombre2.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="assets/js/axios.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>-->
<script src="assets/js/main.js" type="text/javascript" language="javascript"></script>
<script>
window.oncontextmenu = function() {
return false;
} 
</script>
<link rel="stylesheet" href="css/autocompletar.css" type="text/css"/>
<link rel="stylesheet" href="css/consulta.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
</head>
<body onload="comboEstamento2('txtEstamento');">
	<input type="hidden" id="codigoUsuario" value="<?php echo $codigo;?>" /> 
		<input type="hidden" id="daincarUsuario" value="<?php echo $daincarUsuario;?>" /> 
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/1-Normal-Home-icon.png" class="alineadoTextoImagenCentro" border="0"/>&nbsp;&nbsp;<a href="auditorias.php" class="nounderline">Inicio</a>&nbsp;&nbsp;>>&nbsp;&nbsp;<img src="img/Search-file-icon3.png" class="alineadoTextoImagenCentro" border="0"/>&nbsp;<a href="auditorias.php" class="nounderline">Auditorias</a>&nbsp;&nbsp;>>&nbsp;&nbsp;<img src="img/Distributor-report-icon3.png" class="alineadoTextoImagenCentro" border="0"/><strong>&nbsp;Reporte Planificacion</strong>
<br>
<div class='form_contact'>
<table id="consulta"  border="1" cellspacing="0" cellpadding="1" align="center" bordercolor="#F1F1F1">			
		<tr bgcolor="#3C3C3C" class="texto">
			<td colspan="2" height="30">&nbsp;&nbsp;
			CONSULTAR POR:
			</td> 
		</tr>
	  <tr align="left"  height="30">
		<td>&nbsp;&nbsp;
	
		  ESTAMENTO AUDITADO:
	     </td>
	     </td>
	     <td class="Tabla-Titulo" >&nbsp;&nbsp;
     	     		      <select id="txtEstamento">
  </select>
	     </td>
	  </tr>	 

	  <tr align="left" class="tabla" height="30">
		<td class="Tabla-Titulo" >&nbsp;&nbsp;

		  NOMBRE DE LA AUDITORIA:
	     </td>
	     <td class="Tabla-Titulo" >&nbsp;&nbsp;
	     	 <input type="text" id="txtNombre" name="texto2" size="50" onKeyUp="autocompletarNombre2('listaNombre',this.value);" onFocus="limpia(this);"><input type="hidden" id="txtCodNombre" name="texto3"/><div id="listaNombre" class="autocompletarNombre"></div>

  	     </td>
	  </tr>	     
	  <tr align="left" class="tabla" height="30">
		<td class="Tabla-Titulo" >&nbsp;&nbsp;

	TIPO DE AUDITORIA
	     </td>
	     <td class="Tabla-Titulo" >&nbsp;&nbsp;
	      <select id="cboTipoAuditoria">
	<option value="0">Seleccione Tipo ...</option>
  <option value="10">INSTITUCIONAL</option>
  <option value="20">GUBERNAMENTAL</option>
  <option value="30">EXTRAORDINARIA</option>
  <option value="40">MINISTERIAL</option>
  <option value="50">CONSULTORIA</option>
  </select>
	     </td>
	     
	  </tr>	  
	  	  <tr align="left" class="tabla" height="30">
		<td class="Tabla-Titulo" >&nbsp;&nbsp;

	ESTADO DE LA AUDITORIA
	     </td>
	     <td class="Tabla-Titulo" >&nbsp;&nbsp;
	      <select id="cboEstadoAuditoria">
	<option value="0">Seleccione Estado ...</option>
  <option value="10">PENDIENTE</option>
  <option value="20">EJECUCION</option>
  <option value="30">FINALIZADA</option>
  </select>
	     </td>
	     
	  </tr>	    
	  <tr align="left" class="tabla" height="30">
		<td class="Tabla-Titulo" >&nbsp;&nbsp;

		  A&Ntilde;O DE LA AUDITORIA:
	     </td>
	     <td class="Tabla-Titulo" >&nbsp;&nbsp;
	        <select id="cboAnnoAuditoria">
	<option value="0">Seleccione A&ntilde;o ...</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  </select>  
	     </td>
	  </tr>	     
 
	  <tr align="center" class="tabla" height="30">
		<td colspan="2" bgcolor="">
		  <input type="button" name="button02" id='btnSend' value="Buscar Auditoria"  onClick="consultarPlanificacion();"> 
	     </td>
	    
	  </tr>	 
  </table>
</div>
<div id="contenidoPagina" class='contenidoPagina'>
</div>	
<div id="footer">
Desarrollad&#64; por el Depto. Control de Gesti&oacute;n y Sistemas de Informaci&oacute;n (DCGSI) &copy; <?php echo $anno=date("Y");?>
</div>
</body>
</html>
<?php
}else
{
	echo "
	<script type='text/javascript'>
	alert('DEBE LOGUEARSE PRIMERO PARA ACCEDER A ESTE CONTENIDO');
	window.location='index.php';
	</script>
	";
}
?>