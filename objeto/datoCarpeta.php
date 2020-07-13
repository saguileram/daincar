<?php
require_once("../class/class_repositorio.php");
	//print_r($_POST);
	  $carpeta=$_POST["codigoAuditoria"];
    $objRepositorio=new repositorio;
    $objRepositorio->dato_carpeta($carpeta);
	//exit;
?>

