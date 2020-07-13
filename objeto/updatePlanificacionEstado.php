<?php
require_once("../class/class_planificacion.php");

//variables POST
$codAuditoria    = $_POST["codAuditoria"];
$estadoAuditoria = $_POST["estadoAuditoria"];



//sleep(1);
//print_r($_POST);

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="UPDATE";
$modulo="REPORTE PLANIFICACION";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
}  

//creamos el objeto $objRepositorio
//y usamos su método insert_repositorio
$objRepositorio=new Trabajo();
$objRepositorio->update_planificacionEstado($codAuditoria,$estadoAuditoria);
$objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);

?>