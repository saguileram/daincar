<?php
require_once("../class/class_planificacion.php");
	//print_r($_POST);
	  //$codigoAuditoria=$_POST["codAuditoria"];
    $objRepositorio=new Trabajo;
    $objRepositorio->combo_estamento2();
	//exit;
?>