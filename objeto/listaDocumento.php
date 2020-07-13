<?php
require_once("../class/class_repositorio.php");
	//print_r($_POST);
	  $codigoAuditoria=$_POST["codAuditoria"];
	  $perfil=$_POST["perfil"];
    $objRepositorio=new repositorio;
    $objRepositorio->lista_documento($codigoAuditoria,$perfil);
	//exit;
?>

