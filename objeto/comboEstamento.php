<?php
require_once("../class/class_repositorio.php");
	//print_r($_POST);
	  //$codigoAuditoria=$_POST["codAuditoria"];
    $objRepositorio=new repositorio;
    $objRepositorio->combo_estamento();
	//exit;
?>