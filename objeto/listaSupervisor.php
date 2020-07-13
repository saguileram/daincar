<?php
require_once("../class/class_planificacion.php");
$auditoria=$_POST["auditoria"];
$asignado=$_POST["asignado"];
//print_r($_POST);
 $objRepositorio=new Trabajo;
 $objRepositorio->get_supervisor($auditoria,$asignado);
//exit;
?>