<?php
require_once("../class/class_planificacion.php");
	//print_r($_POST);
	  $auditoria=$_POST["codigoAuditoria"];
    $objRepositorio=new Trabajo;
    $objRepositorio->verifica_auditoria($auditoria);
	//exit;
?>