<?php
//sleep(1);

$carpeta =	$_POST["carpeta"];
$barra = "/";
$ruta = $carpeta.$barra;
//echo $ruta;
$archivo=$_FILES['archivo']['name'];
$absoluta="../documentos/";
$existe=$absoluta.$ruta.$archivo;
$tamano=$_FILES['archivo']['size'];

if($tamano > 10000000){
	    echo "<script type='text/javascript'>";
	  echo "alert('EL TAMAÑO DEL DOCUMENTO NO PUEDE SOBREPASAR LOS 10 MEGABYTES.');";
    echo "limpiaFichaDocumento();\n";
	  echo "</script>";	 
	}else{
if (file_exists($existe)) {
     echo "<script type='text/javascript'>";
	  echo "alert('EL DOCUMENTO ".$archivo." YA EXISTE.');";
    echo "limpiaFichaDocumento();\n";
	  echo "</script>";	  
}else{
if(copy($_FILES['archivo']['tmp_name'], '../documentos/'.$ruta.$_FILES['archivo']['name']))
{
	 echo "<script type='text/javascript'>";
	echo "alert('ARCHIVO SUBIDO A LA CARPETA ".$carpeta."');";
	echo "</script>";
}else{

	echo "alert('ERROR ...');";
	}
 }
}
?>