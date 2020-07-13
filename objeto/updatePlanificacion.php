<?php
require_once("../class/class_planificacion.php");

//variables POST
$codAuditoria    = $_POST["codAuditoria"];
$nomAuditoria    = $_POST["nomAuditoria"];
$annoAuditoria   = $_POST["annoAuditoria"];
$estamento       = $_POST["estamento"];
$hora            = $_POST["hora"];
$f1             = $_POST["finicio"];
$f2             = $_POST["ftermino"];
$f3             = $_POST["fcaigg"];
$fechaPaso1 		= explode("/",$f1);
$finicio         = $fechaPaso1[2] . "-" . $fechaPaso1[1] . "-" . $fechaPaso1[0];
$fechaPaso2 		= explode("/",$f2);
$ftermino         = $fechaPaso2[2] . "-" . $fechaPaso2[1] . "-" . $fechaPaso2[0];
$fechaPaso3 		= explode("/",$f3);
$fcaigg        = $fechaPaso3[2] . "-" . $fechaPaso3[1] . "-" . $fechaPaso3[0];
$objetivo        = $_POST["objetivo"];
$tipoAuditoria   = $_POST["tipoAuditoria"];
$estadoAuditoria = $_POST["estadoAuditoria"];

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="UPDATE";
$modulo="PLANIFICACION";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
}  


//sleep(1);
//print_r($_POST);

//creamos el objeto $objRepositorio
//y usamos su método insert_repositorio
$objRepositorio=new Trabajo();
$objRepositorio->update_planificacion($codAuditoria,$annoAuditoria,$nomAuditoria,$estamento,$objetivo,$hora,$finicio,$ftermino,$fcaigg,$tipoAuditoria,$estadoAuditoria);
$objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
?>

