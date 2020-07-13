<?php
require_once("../class/class_repositorio.php");
	//print_r($_POST);
	  $nombre=$_POST["nombreAuditoria"];
	  $orden=$_POST["ordenar"];
    $objRepositorio=new repositorio;
    $objRepositorio->busca_repositorio($nombre,$orden);
	//exit;
?>