<?php
require_once("../class/class_planificacion.php");
	//print_r($_POST);
	  $codigo=$_POST["codigoAuditoria"];
    $objRepositorio=new Trabajo();
    $objRepositorio->dato_ficha($codigo);
	//exit;
?>

