<?php
require_once("../class/class_planificacion.php");
$auditoria=$_POST["auditoria"];
$auditor=unserialize(stripslashes($_POST["auditor"]));
$asignado=$_POST["asignado"];
//if (isset($_POST["grabar"]) and $_POST["grabar"]=="si")
//{
	//print_r($_POST);

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="INSERT";
$modulo="ASIGNACION DE EQUIPO";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
} 

		$obj=new Trabajo();
    $obj->add_auditor($auditoria,$auditor,$asignado);
    $obj->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
	  //exit;
//}
?>

