<?php
require_once("../class/class_biblioteca.php");
	//print_r($_POST);
	  $perfil=$_POST["perfil"];
    $objRepositorio=new Biblioteca;
    $objRepositorio->lista_biblioteca($perfil);
	//exit;
?>

