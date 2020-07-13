<?php
session_start();
if (isset($_SESSION["session_video_14"]))
{
$codigo=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
//$reparticion=$_SESSION["session_video_17"];	
$grado=$_SESSION["session_video_18"];	
$tipo=$_SESSION["session_video_19"];	
$daincar=$_SESSION["session_video_21"];	
$descripcionDaincar=$_SESSION["session_video_22"];	

echo $codigo;
$fecha=date("d/m/Y");
$hora=date("H:m:s");
$ip  = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>DAINCAR</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="././assets/js/main.js" type="text/javascript" language="javascript"></script>
<link href="css/menu.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<section class="cantact_info">
<img src="img/bannerTop.jpg" border="0" height="120" width=""/>           
</section>
 <div id='cssmenu'> 
  <ul>
  	<a href='#'>
    <li><img src="img/Users-icon1.png" class="alineadoTextoImagenCentro" border="0"/>&nbsp;&nbsp;Bienvenid@:&nbsp;<?php echo $grado." - ".$nombre ?></a>
             <ul>
            <li><a href='#'><b>Perfil:</b>&nbsp;<?php echo $perfil; ?>&nbsp;<img src="img/accept-icon1.png" class="alineadoTextoImagenCentro" border="0"/></a></li>
            <li><a href='#'><b>Reparticion:</b>&nbsp;<?php echo $descripcionDaincar; ?>&nbsp;<img src="img/accept-icon1.png" class="alineadoTextoImagenCentro" border="0"/></a></li>
            <li><a href='#'><b>Fecha de Conexion:</b>&nbsp;&nbsp;<?php echo $fecha." a las ".$hora; ?>&nbsp;<img src="img/accept-icon1.png" class="alineadoTextoImagenCentro" border="0"/></a></li>
            <li><a href='#'><b>Direccion IP:</b>&nbsp;<?php echo $ip; ?>&nbsp;<img src="img/accept-icon1.png" class="alineadoTextoImagenCentro" border="0"/></a></li>
          </ul>
              <li><a href='auditorias.php'>Inicio</a>
    	    <ul>

    </ul>
    	</li>
          </li>
    <li><a href='#'>Auditoria</a>
      <ul>
        <li><a href='planificacion.php'>Administracion Plan Anual</a>
        </li>
        <li><a href='repositorio.php'>Repositorio Auditoria</a>
        </li>
      </ul>
    </li>
    <li><a href='#'>Personal</a>
    	    <ul>
    <li><a href='personal.php'>Personal DAINCAR</a></li>
    </ul>
    	</li>
    <li><a href='#'>Reportes</a>
    	    <ul>
    <li><a href='consultas.php'>Reporte Auditoria</a></li>
     <li><a href='consultasPlanificacion.php'>Reporte Planificacion</a></li>
    </ul>
    	</li>       	
    	    <?php  
              if($tipo == 10){
             echo "<li><a href='#'>Usuarios</a>";
               echo "<ul>";
               echo "<li><a href='usuarios.php'>Administrar</a></li>";
            echo    "</ul>";
            echo "</li>";
          }
            ?> 
    <li><a href='#'>Mi Cuenta</a>
    <ul>
    <li><a href='informacion.php'>Mis Datos</a></li>
    <li><a href="javascript:cerrarAplicacion();">Salir</a></li>
    </ul>
   </li>
  </ul>
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