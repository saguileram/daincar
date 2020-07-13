<?php
session_start();
if (isset($_SESSION["session_video_14"]))
{
$codigoUsuario=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
$daincarUsuario=$_SESSION["session_video_21"];
echo $tipo;
$miFecha = date("d-m-Y h:m:s");
$codigo=$_GET["cod"];
//echo $cod;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos de Funcionarios ...</title>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/planificacion.js" type="text/javascript" language="javascript"></script>
<script src="js/repositorio.js" type="text/javascript" language="javascript"></script>
<script src="js/autocompletarProfesion.js" type="text/javascript" language="javascript"></script>

<link rel="stylesheet" href="css/autocompletar.css" type="text/css"/>
<link rel="stylesheet" href="css/formulario3.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

</head>
<body onload="datoFichaPersonal('txtCodigo');leeEscalafon('selEscalafon');">
			<input type="hidden" id="codigoUsuario" value="<?php echo $codigoUsuario;?>" /> 
		<input type="hidden" id="daincarUsuario" value="<?php echo $daincarUsuario;?>" /> 
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>ADMINISTRACION<br>DE PERSONAL</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> daincar@carabineros.cl</p>
                <!--<p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>-->
            </section>
        </section>

        <form action="" class="form_contact">
        	 <!--<a href="javascript:void(0);"</a><img src="img/Programming-Delete-Sign-icon.png" border="0" style="position: absolute; top: 0; right: 0;" onClick="window.close();"/></a><br>-->
            <h2><center>Modificacion de Datos</centrer></h2>
            <div class="user_info">
                <label for="names">C&oacute;digo de Funcionario *</label>
                <input type="text" id="txtCodigo" name="txtCodigoAuditoria" value="<?php echo base64_decode($codigo);?>" readonlystyle="text-transform:uppercase;">
                <label for="phone">Escalafon*</label>
               <select id="selEscalafon" onChange="leeGrados('selGrado',this.value,this[this.selectedIndex].text)"></select>
                <label for="phone">Grado*</label>
                <select id="selGrado"></select>
                <label for="phone">Rut*</label>
                <input type="text" id="txtRut" style="text-transform:uppercase;">
                 <label for="phone">Nombre*</label>
                <input type="text" id="txtNombre" style="text-transform:uppercase;">
               <label for="mensaje">Dependencia *</label>
   <select id="cboDependencia">
   		<option value="0">Seleccione Dependencia</option>
  <option value="20">DIRECCION DE AUDITORIA INTERNA PM.</option>
  <option value="30">DEPTO. GESTION DE AUDITORIAS</option>
  <option value="40">DEPTO. SEGUIMIENTO DE AUDITORIAS Y REPORTES</option>
  <option value="50">GABINETE</option>
  <option value="60">AREA AUDITORIAS</option>
  <option value="70">AREA SEGUIMIENTO DE AUDITORIAS</option>
  </select>
                <label for="phone">Profesion  y/o Especialidad *</label>
              <input type="text" id="txtProfesion" name="texto" size="50" onKeyUp="autocompletarProfesion('lista',this.value);" onFocus="limpia(this);" style="text-transform:uppercase;"><input type="hidden" id="txtCodProfesion" name="texto2"/><div id="lista" class="autocompletar"></div>
                <label for="email">Cargo *</label>
              <select id="cboCargo">
	<option value="0">Seleccione Cargo</option>
  <option value="10">DIRECTOR</option>
  <option value="20">JEFE DEPTO. GESTION DE AUDITORIAS</option>
  <option value="30">JEFE DEPTO. SEGUIMIENTO DE AUDITORIAS Y REPORTES</option>
  <option value="40">ASESOR</option>
  <option value="50">SUPERVISOR</option>
  <option value="60">AUDITOR</option>
  <option value="70">JEFE DE GABINETE</option>
  </select>
                
              <center><input type="button" value=Modificar Datos" id="btnSend" onclick="modificarFichaPersonal();" <?php if($tipo==30) echo "disabled"; else echo "enabled";?>></center>
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