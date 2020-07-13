<?php
session_start();
if (isset($_SESSION["session_video_14"]))
{
$codigoUsuario=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
$daincar=$_SESSION["session_video_21"];
$codigo=$_GET["cod"];
//echo $tipo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de Funcionarios ...</title>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/usuario.js" type="text/javascript" language="javascript"></script>
<script src="js/planificacion.js" type="text/javascript" language="javascript"></script>


<link rel="stylesheet" href="css/autocompletar.css" type="text/css"/>
<link rel="stylesheet" href="css/formulario3.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

</head>
<body onload="datoFichaClave('txtCodigo');leeEscalafon('selEscalafon');">
	<input type="hidden" id="codigoUsuario" value="<?php echo $codigoUsuario;?>" /> 
	<input type="hidden" id="daincarUsuario" value="<?php echo $daincar;?>" /> 
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>ADMINISTRACION<br>DE CUENTA</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> daincar@carabineros.cl</p>
                <!--<p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>-->
            </section>
        </section>

        <form action="" class="form_contact">
        	 <!--<a href="javascript:void(0);"</a><img src="img/Programming-Delete-Sign-icon.png" border="0" style="position: absolute; top: 0; right: 0;" onClick="window.close();"/></a><br>-->
            <h2><center>Modificacion de Clave</centrer></h2>
            <div class="user_info">
                <label for="names">C&oacute;digo de Funcionario</label>
                <input type="text" id="txtCodigo" name="txtCodigoAuditoria" value="<?php echo base64_decode($codigo);?>" readonlystyle="text-transform:uppercase;">
                <label for="phone">Escalafon</label>
               <select id="selEscalafon" onChange="leeGrados('selGrado',this.value,this[this.selectedIndex].text)"></select>
                <label for="phone">Grado</label>
                <select id="selGrado"></select>
                 <label for="phone">Nombre</label>
                <input type="text" id="txtNombre" style="text-transform:uppercase;">
                  <label for="email">Perfil *</label>
  <select id="cboTipoUsuario">
	<option value="0">Seleccione Perfil</option>
  <option value="10">ADMINISTRADOR</option>
  <option value="30">CONSULTA</option>
  </select>  
                <label for="phone">Clave actual*</label>
                <input type="password" id="txtClaveActual" style="text-transform:uppercase;" readonly>
       <label for="phone">Nueva Clave*</label>
                <input type="password" id="txtClaveNueva" style="text-transform:uppercase;">             
              <center><input type="button" value="Modificar clave" id="btnSend" onclick="nuevaClave();"></center>
            </div>
        </form>
    </section>
<div id="contenidoPagina"></div>
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
