<?php
session_start();
if (isset($_SESSION["session_video_14"]))
{
$codigo=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
$daincarUsuario=$_SESSION["session_video_21"];
//echo $tipo;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repositorio de Documentos ...</title>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/repositorio.js" type="text/javascript" language="javascript"></script>
<script src="js/autocompletar.js" type="text/javascript" language="javascript"></script>

<link rel="stylesheet" href="css/autocompletar.css" type="text/css"/>
<link rel="stylesheet" href="css/formulario.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

</head>
<body>
			<input type="hidden" id="codigoUsuario" value="<?php echo $codigo;?>" /> 
		<input type="hidden" id="daincarUsuario" value="<?php echo $daincarUsuario;?>" /> 
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>REPOSITORIO<br>DE DOCUMENTOS</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> daincar@carabineros.cl</p>
                <!--<p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>-->
            </section>
        </section>

        <form action="" class="form_contact">
        	<!--<a href="javascript:void(0);"</a><img src="img/Programming-Delete-Sign-icon.png" border="0" style="position: absolute; top: 0; right: 0;" onClick="window.close();"/></a><br>-->
            <h2><center>Creaci&oacute;n de Carpeta</centrer></h2>
            <div class="user_info">
                <label for="names">C&oacute;digo de la Auditoria *</label>
                <input type="text" id="txtCodigoAuditoria" name="txtCodigoAuditoria" style="text-transform:uppercase;">

                <label for="phone">Nombre de la auditoria *</label>
                <input type="text" id="txtNombreAuditoria" style="text-transform:uppercase;">
                <label for="email">A&ntilde;o de la Auditoria *</label>
              <select id="cboAnnoAuditoria">
	<option value="0">Seleccione A&ntilde;o</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  </select>
                <label for="mensaje">Estamento Auditado *</label>
                <input type="text" id="txtEstamento" name="texto" size="50" style="text-transform:uppercase;" onKeyUp="autocompletar('lista',this.value);" onFocus="limpia(this);"><input type="hidden" id="txtCodEstamento" name="texto2"/><div id="lista" class="autocompletar"></div>
                <label for="email">Tipo de Auditoria *</label>
              <select id="cboTipoAuditoria">
	<option value="0">Seleccione Tipo</option>
  <option value="10">INSTITUCIONAL</option>
  <option value="20">GUBERNAMENTAL</option>
  <option value="30">EXTRAORDINARIA</option>
  <option value="40">MINISTERIAL</option>
  <option value="50">CONSULTORIA</option>
  </select>
        <label for="phone">Cantidad de Hallazgos *</label>
           <input type="text" id="txtCantidadHallazgo" onkeypress="return validaNumeros(event)">
              <input type="button" value="Crear carpeta" id="btnSend" onclick="guardarFichaCarpeta();">
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
