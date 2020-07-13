<?php
session_start();
if (isset($_SESSION["session_video_14"]))
{
$codigo=$_SESSION["session_video_14"];	
$nombre=$_SESSION["session_video_15"];	
$perfil=$_SESSION["session_video_16"];	
$tipo=$_SESSION["session_video_19"];
$daincar=$_SESSION["session_video_21"];
//echo $tipo;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repositorio de Documentos ...</title>
<script src="js/jquery-3.4.1.min.js" type="text/javascript" language="javascript"></script>
<script src="js/uploadBiblioteca.js" type="text/javascript" language="javascript"></script>
<script src="js/creaObjeto.js" type="text/javascript" language="javascript"></script>
<script src="js/biblioteca.js" type="text/javascript" language="javascript"></script>

<link rel="stylesheet" href="css/autocompletar.css" type="text/css"/>
<link rel="stylesheet" href="css/formulario4.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

</head>
<body>
<input type="hidden" id="codigoFuncionario" value="<?php echo $codigo;?>" /> 
<input type="hidden" id="daincar" value="<?php echo $daincar;?>" /> 
    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>BIBLIOTECA</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> daincar@carabineros.cl</p>
                <!--<p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>-->
            </section>
        </section>

        <form action="" class="form_contact">
        	<!--<a href="javascript:void(0);"</a><img src="img/Programming-Delete-Sign-icon.png" border="0" style="position: absolute; top: 0; right: 0;" onClick="window.close();"/></a><br>-->
            <h2><center>Registro de Documentos</centrer></h2>
            <div class="user_info">
                <label for="names">Nombre de Documennto *</label>
                <input type="text" id="txtNombreDocumento"  style="text-transform:uppercase;">

                <label for="phone">Descripcion *</label>
                <input type="text" id="descripcionDocumento" style="text-transform:uppercase;">
                <label for="email">Tipo de Documento*</label>
              <select id="cboTipoDocumento" onchange="validarSubir();" <?php if($tipo==30) echo "disabled"; else echo "enabled";?>>
	<option value="0">Seleccione Tipo</option>
  <option value="70">PLAN ANUAL</option>
  <option value="80">NORMATIVA</option>
  <option value="90">PROCEDIMIENTO</option>
  </select>			
							<label for="phone">Adjuntar Archivos *</span></label>
							<div class="inputs">
								<input class="aweform small" type="file" id="archivo" name="phone" onchange="subeArchivo();"disabled/>
								<!--<input type="hidden" id="carpeta" value="/>-->
									<input type="hidden" id="archivoServidor" value="">
	<input type="hidden" id="archivoLoad" value=0>
	<input type="hidden" id="rutArchi" name="rutArchi" value="">
							</div> 
              <input type="button" id="submit" name="submit" value="Registrar Documento" id="btnSend" onclick="guardarDocumentoBiblioteca();" <?php if($tipo==30) echo "disabled"; else echo "enabled";?>>
            </div>
        </form>

    </section>
<div id="content"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->		
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
