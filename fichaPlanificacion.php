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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repositorio de Documentos ...</title>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/planificacion.js" type="text/javascript" language="javascript"></script>
<script src="js/funciones.js" type="text/javascript" language="javascript"></script>
<script src="js/repositorio.js" type="text/javascript" language="javascript"></script>
<script src="js/autocompletar.js" type="text/javascript" language="javascript"></script>
<script src="js/jsCalendar.js" type="text/javascript" language="javascript"></script>
<script src="js/jsCalendar.datepicker.js" type="text/javascript" language="javascript"></script>
<script src="js/jsCalendar.lang.es.js" type="text/javascript" language="javascript"></script>

<link rel="stylesheet" href="css/autocompletar.css" type="text/css"/>
<link rel="stylesheet" href="css/formulario2.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/jsCalendar.css" type="text/css"/>
<link rel="stylesheet" href="css/jsCalendar.micro.css" type="text/css"/>
<link rel="stylesheet" href="css/estilos.css" type="text/css"/>

</head>
<body>
			<input type="hidden" id="codigoUsuario" value="<?php echo $codigo;?>" /> 
		<input type="hidden" id="daincarUsuario" value="<?php echo $daincarUsuario;?>" /> 
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>PLANIFICACION<br>DE AUDITORIAS</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> daincar@carabineros.cl</p>
                <!--<p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>-->
            </section>
        </section>

        <form action="" class="form_contact">
        	<!--<a href="javascript:void(0);"</a><img src="img/Programming-Delete-Sign-icon.png" border="0" style="position: absolute; top: 0; right: 0;" onClick="window.close();"/></a><br>-->
            <h2><center>Creaci&oacute;n de Auditorias</centrer></h2>
            <div class="user_info">
                <label for="names">C&oacute;digo de la Auditoria *</label>
                <input type="text" id="txtCodigoAuditoria" name="txtCodigoAuditoria" style="text-transform:uppercase;">

                <label for="phone">Nombre de la Auditoria *</label>
                <input type="text" id="txtNombreAuditoria" style="text-transform:uppercase;">
                <label for="email">A&ntilde;o de la Auditoria *</label>
              <select id="cboAnnoAuditoria">
	<option value="0">Seleccione A&ntilde;o</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  </select>
                <label for="mensaje">Estamento Auditado *</label>
                <input type="text" id="txtEstamento" name="texto" size="50" onKeyUp="autocompletar('lista',this.value);" onFocus="limpia(this);" style="text-transform:uppercase;"><input type="hidden" id="txtCodEstamento" name="texto2"/><div id="lista" class="autocompletar"></div>
             <label for="phone">Objetivo *</label>
           <input type="text" id="txtObjetivo" style="text-transform:uppercase;">
              <label for="phone">Horas Planificadas *</label>
           <input type="text" id="txtHorasTrabjadas" onkeypress="return validaNumeros(event)">
               <label for="phone">Fecha Inicio*</label>
           <input type="text" id="txtFechaInicio" data-years-line="3" data-date="now" data-datepicker data-language="es" data-class="auto-jsCalendar micro-theme"/>  
                   <label for="phone">Fecha Termino * </label>
           <input type="text" id="txtFechaTermino" data-years-line="3" data-date="now" data-datepicker data-language="es" data-class="mauto-jsCalendar micro-theme"/>  
            <label for="phone">Fecha Envio a Caigg * </label>
           <input type="text" id="txtFechaCaigg" data-years-line="3" data-date="now" data-datepicker data-language="es" data-class="auto-jsCalendar micro-theme"/> 
                <label for="email">Tipo de Auditoria *</label>
              <select id="cboTipoAuditoria">
	<option value="0">Seleccione Tipo</option>
  <option value="10">INSTITUCIONAL</option>
  <option value="20">GUBERNAMENTAL</option>
  <option value="30">EXTRAORDINARIA</option>
  <option value="40">MINISTERIAL</option>
  <option value="50">CONSULTORIA</option>
  </select>
                  <label for="email">Estado de la Auditoria *</label>
              <select id="cboEstadoAuditoria">
	<option value="0">Seleccione Estado</option>
  <option value="10">PENDIENTE</option>
  <option value="20">EJECUCION</option>
  <option value="30">FINALIZADA</option>
  </select>
              <input type="button" value="Crear Planificacion" id="btnSend" onclick="guardarFichaPlanificacion();" <?php if($tipo==30) echo "disabled"; else echo "enabled";?>>
            </div>
        </form>

    </section>
<div id="contenidoPagina"></div>
</body>
</html>
