<?php
require_once("../class/class_planificacion.php");
	//print_r($_POST);
		//$escalafonCodigo 	  = $_POST['escalafonCodigo'];
	  //$escalafonDescripcion = $_POST['escalafonDescripcion'];
    $objRepositorio=new Trabajo;
    $objRepositorio->get_escalafon();
	//exit;
?>