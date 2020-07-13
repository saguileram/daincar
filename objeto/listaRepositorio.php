<?php
require_once("../class/class_repositorio.php");
	//print_r($_POST);
	  $orden=$_POST["ordenar"];
	  $perfil=$_POST["perfil"];
    $objRepositorio=new repositorio;
    $objRepositorio->lista_repositorio($orden,$perfil);
	//exit;
?>