<?php
require_once("../class/class_usuario.php");

	//print_r($_POST);

		$obj=new Usuario();
    $desv=$obj->get_usuario();
	//exit;

?>