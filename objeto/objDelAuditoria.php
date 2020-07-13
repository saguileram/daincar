<?php
require_once("../class/class_planificacion.php");
  $cod=$_GET["cod"];
	//print_r($_POST);
	
//EVENTO
$codigoUsuario= $_GET["usuario"];
$daincar= $_GET["daincar"];
$operacion="DELETE";
$modulo="PLANIFICACION";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
}  

		$obj=new Trabajo();
    $obj->delete_auditoria($cod);
    $obj->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
	  exit;

?>