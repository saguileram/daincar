<?php
require_once("../class/class_repositorio.php");
	  //print_r($_POST);
	  $carpeta=$_GET["cod"];
    $objRepositorio=new repositorio;
    $objRepositorio->cantidad_documento($carpeta);
	//exit;
?>
