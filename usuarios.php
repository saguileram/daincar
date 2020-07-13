<?php
include("lib/menu.php");
if (isset($_SESSION["session_video_14"]))
{
$codigo=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
//echo $tipo;
?>
<html>
<head>
<title>Listado</title>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/usuario.js" type="text/javascript" language="javascript"></script>
<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="assets/js/axios.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>-->
 <script src="assets/js/main.js" type="text/javascript" language="javascript"></script>
<script>
window.oncontextmenu = function() {
return false;
} 
</script>
<link href="css/tabla.css" rel="stylesheet" type="text/css"/>
</head>
<body onload="listaUsuario();">
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/1-Normal-Home-icon.png" class="alineadoTextoImagenCentro" border="0"/>&nbsp;&nbsp;<a href="auditorias.php" class="nounderline">Inicio</a>&nbsp;&nbsp;>>&nbsp;&nbsp;<img src="img/Users-icon2.png" class="alineadoTextoImagenCentro" border="0"/>&nbsp;<strong>Usuarios</strong>
<br>
<div id="contenidoPagina" style="text-align: center;">
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
	alert('DEBE INICIAR SESION PARA PODER ACCEDER A ESTE CONTENIDO ...');
	window.location='index.php';
	</script>
	";
}
?>