<?php 
require_once("../class/class_planificacion.php");
//$codigo=$_POST["codigo"];
//echo $codigo;
if(isset($_POST["codigo"])){
$objRepositorio=new Trabajo();
$objRepositorio->dato_fichaUsuario($_POST["codigo"]);
}?>
