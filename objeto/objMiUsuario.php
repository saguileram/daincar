<?php
require_once("../class/class_usuario.php");
	  $codigo=$_POST["codigo"];
	//print_r($_POST);

		$obj=new Usuario();
    $desv=$obj->get_miUsuario($codigo);
	//exit;

?>