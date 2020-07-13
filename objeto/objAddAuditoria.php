<?php
require_once("../class/class_planificacion.php");

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="INSERT";
$modulo="PLANIFICACION";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
}    
//if (isset($_POST["grabar"]) and $_POST["grabar"]=="si")
//{
	//print_r($_POST);
		$obj=new Trabajo();
    $obj->add_auditoria($_POST["auditoria"],$_POST["anno"],$_POST["nombre"],$_POST["objetivo"],$_POST["auditado"],$_POST["finicio"],$_POST["ftermino"],$_POST["fcaigg"], $_POST["tipoAuditoria"],$_POST["estadoAuditoria"],$_POST["hras"]);
    $obj->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
	  //exit;
//}
?>

