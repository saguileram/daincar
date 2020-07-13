<?php
require_once("../class/class_planificacion.php");

	//print_r($_POST);
$perfil=$_POST["perfil"];;
		$obj=new Trabajo();
    $desv=$obj->get_personal($perfil);
	//exit;

?>