<?php
//sleep(1);

$archivo=$_FILES['archivo']['name'];
$absoluta="../biblioteca/";
$existe=$absoluta.$archivo;
$tamano=$_FILES['archivo']['size'];
 
if($tamano > 10000000){
	    echo "<script type='text/javascript'>";
	  echo "alert('EL TAMAÑO DEL DOCUMENTO NO PUEDE SOBREPASAR LOS 10 MEGABYTES.');";
    echo "limpiaFichaDocumento();\n";
	  echo "</script>";	 
	}else{
if (file_exists($existe)) {
    echo "<script type='text/javascript'>";
	  echo "alert('EL DOCUMENTO ".$archivo." YA EXISTE EN LA BIBLIOTECA.');";
    echo "limpiaFichaDocumento();\n";
	  echo "</script>";	  
}else{
if(copy($_FILES['archivo']['tmp_name'], '../biblioteca/'.$_FILES['archivo']['name']))
{
	echo "<script type='text/javascript'>";
	echo "alert('ARCHIVO SUBIDO A LA BIBILIOTECA ...');";
	echo "</script>";
}else{
	echo "alert('ERROR ...');";
	}
}
}
?>