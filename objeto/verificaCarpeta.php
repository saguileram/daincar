<?php
require_once("../class/class_repositorio.php");
	//print_r($_POST);
	  $carpeta=$_POST["codigoAuditoria"];
    $objRepositorio=new repositorio;
    $objRepositorio->verifica_carpeta($carpeta);
	//exit;
?>

