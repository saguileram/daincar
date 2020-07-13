<?php
require_once("../class/class_usuario.php");
	//print_r($_POST);
	  $user = $_GET["funCodigo"];
    $pass = $_GET["clave"];
	  //if ($user != "" && $pass != ""){
    $objRepositorio=new Usuario;
    $objRepositorio->login($user,$pass);
	//exit;
//}
?>