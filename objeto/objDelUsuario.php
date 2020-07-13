<?php
require_once("../class/class_usuario.php");

	//print_r($_POST);
$codigo=$_POST["codigo"];
		$obj=new Usuario();
    $desv=$obj->delete_usuario($codigo);
	  exit;

?>