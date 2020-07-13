<?php
require_once("../class/class_usuario.php");
$codigo=$_POST["codigo"];
$objRepositorio=new Usuario();
$objRepositorio->dato_fichaUsuario($codigo);
?>