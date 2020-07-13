<?php
require_once("../class/class_planificacion.php");
$auditoria=$_POST["auditoria"];
//print_r($_POST);
 $objRepositorio=new Trabajo;
 $objRepositorio->get_equipo($auditoria);
//exit;
?>