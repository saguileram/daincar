<?php
session_start();
if (isset($_SESSION["session_video_14"]))
{
$codigo=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
//echo $tipo;
}
$auditoria=$_GET["aud"];
$asignado=$_GET["asig"];
//echo $auditoria;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Asignaci&oacute;n de Equipos ...</title>
<!--[if lt IE 9]>
<script src="js/html5.min.js"></script>
<![endif]-->
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/planificacion.js" type="text/javascript" language="javascript"></script>
<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
<script src="js/listaMultiple.js" type="text/javascript" language="javascript"></script>

<link rel="stylesheet" href="css/estilos.css" type="text/css" media="all"/>
<link href="./css/aplicacion.css" rel="stylesheet" type="text/css">
<link href="./css/fichaServicio.css" rel="stylesheet" type="text/css">
</head>
<body onload="auditorDisponible('perrosDisponibles');supervisorDisponible('caballosDisponibles');equipoAsignado('animalesAsignados');">
<input type="hidden" id="perfil" value="<?php echo $perfil;?>" /> 
<div id="contenidoPagina"></div>
<!-- NUEVA PANTALLA PARA ASIGNAR ANIMALES	-->
  <div id="divAsignaAnimales" style="position:relative;  width:100%;">
		<div id="marcoLevantado">
		  <div id="cuadro">
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" border="0">
			<tr> 
			 	<td align="left">
					<input type="text" id="auditoria" value="<?php echo $auditoria;?>" disabled/><input type="hidden" id="asignado" value="<?php echo $asignado;?>" />  
			</td>
			<td>&nbsp;</td>
			</tr>
			</table>
		  </div>
		  <div id="cuadro">
	    	<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
		    	<tr> 
	      		<td height="30" width="45%" id="tituloSelecMultiple"><div id="tituloCaballoDisponible">SUPERVISORES DISPONIBLES</div></td>
	      		<td width="1%" rowspan="4"></td>
	      		<td width="8%">&nbsp; </td>
	      		<td width="1%" rowspan="4"></td>
	      		<td width="45%" id="tituloSelecMultiple"><div id="tituloAnimalAsignado">EQUIPO ASIGNADO</div></td>
		    	</tr>
		    	<tr> 
	      		<td width="45%" rowspan="3"><select id="caballosDisponibles" size="12" multiple>></select> 
	      			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	    					<tr><td height="30" width="45%" id="tituloSelecMultiple"><div id="tituloPerroDisponible">AUDITORES DISPONIBLES</div></td></tr>
	    					<tr><td width="100%" rowspan="3">	<select id="perrosDisponibles" size="12" multiple></select></td></tr>
	      			</table>
	        	</td>
	      		<td width="8%">
	      			<input id="btn100" type="button" name="Btn_AgregarAnimal" value=" >>" onclick="asignarAnimal()">&nbsp; 
	        		<input id="btn100" type="button" name="Btn_QuitarAnimal" value=" << " onclick="desasignarAnimal()">
	        	</td>
	      		<td width="45%"> 
	      			<select id="animalesAsignados" size="26" ></select> 
	        	</td>
		    	</tr>
	    	</table>
      </div>
      </div>
  </div>  
 <!-- FIN NUEVA PANTALLA PARA ASIGNAR ANIMALES	-->
<div style="padding:10px 5px 0px 0px;"></div>
<table width="40%" align="right" border="0">
<td width="8%"><input type="button" id="btn100" value="ASIGNAR EQUIPO"  onclick="guardarFichaEquipo();" disabled/><input type="hidden" name="grabar" value="si"></td>
<!-- <td width="8%"><input type="button" id="btn100" value="ELIMINAR EQUIPO"  onclick="verificaSupervisor();" disabled/><input type="hidden" name="grabar" value="si"></td>-->
<td width="8%"><input type="button"  id="btn100" value="CERRAR" onClick="window.close();"/></td>
</table>
</body>
</html>