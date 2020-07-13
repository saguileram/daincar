<?php
include("lib/menu.php");
include("lib/fechaTexto.php");
$miFecha = date("d-m-Y h:m:s");
$prueba=$_SESSION["session_video_14"];
echo $prueba;
if (isset($_SESSION["session_video_14"]))
{
$codigo=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
ECHO "<br>";
echo $tipo;
?>
<html>
<head>
<title></title>	
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
<body>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/1-Normal-Home-icon.png" class="alineadoTextoImagenCentro" border="0"/>&nbsp;&nbsp;<a href="auditorias.php" class="nounderline">Inicio</a>&nbsp;&nbsp;>>&nbsp;&nbsp;<img src="img/Search-file-icon3.png" class="alineadoTextoImagenCentro" border="0"/>&nbsp;<strong>Auditorias</strong>
<br>
<?php 
echo "<center>".fechaTexto($miFecha)."</center>";
echo "<center><h2>PLANIFICACION Y ADMINISTRACION DE AUDITORIAS V2.0.0</h2></center>";
?>
<div id="contenedor" class="contenido1">
<div class="contenido2">
<a href="repositorio.php"><img src="img/archive-icon1.png" class="alineadoTextoImagenAbajo" border="0"/></a><br>Repositorio 
</div>
<div class="contenido2">
<a href="planificacion.php"><img src="img/folder-documents-icon.png" class="alineadoTextoImagenAbajo" border="0"/></a><br>Planificaci&oacute;n 
</div>
<div class="contenido2">
<a href="personal.php"><img src="img/person-icon2.png" class="alineadoTextoImagenAbajo" border="0"/></a><br>Personal
</div>
<div class="contenido2">
<a href="biblioteca.php"><img src="img/Books-icon.png" class="alineadoTextoImagenAbajo" border="0"/></a><br>Biblioteca
</div>
<?php
echo "<div class='contenido2'>";
if($tipo==30){
echo "<a href='#'><img src='img/Users-icon22.png' class='alineadoTextoImagenAbajo' border='0'/></a><br>Usuarios";
}else{
echo "<a href='usuarios.php'><img src='img/Users-icon22.png' class='alineadoTextoImagenAbajo' border='0'/></a><br>Usuarios";
}
echo "</div>";
?>
<div class="contenido2">
<a href="#"><img src="img/Actions-help-hint-icon.png" class="alineadoTextoImagenAbajo" border="0"/></a><br>Manual
</div>
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