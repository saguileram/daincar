<?php
require_once("../class/class_planificacion.php");

$perfil=$_POST["perfil"];;

	//print_r($_POST);

		$obj=new Trabajo();
    $desv=$obj->get_auditoria($perfil);
	//exit;

?>