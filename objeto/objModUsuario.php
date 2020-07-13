<?php
require_once("../class/class_usuario.php");
$codigo=$_POST["codigo"];
$perfil=$_POST["perfil"];
$claveActual=$_POST["claveActual"];
$claveNueva=$_POST["claveNueva"];
	//print_r($_POST);
		$obj=new Usuario();
    $obj->mod_usuario($codigo,$perfil,$claveActual,$claveNueva);
	  exit;

?>

