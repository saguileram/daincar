<?php
require_once("../class/class_planificacion.php");
	//print_r($_POST);
	  $codigo=$_POST["codigo"];
    $objRepositorio=new Trabajo;
    $objRepositorio->verifica_funcionario($codigo);
	//exit;
?>