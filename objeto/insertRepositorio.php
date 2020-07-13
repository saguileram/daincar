<?php
require_once("../class/class_repositorio.php");

//variables POST
$codAuditoria  = $_POST["codAuditoria"];
$nomAuditoria  = $_POST["nomAuditoria"];
$annoAuditoria = $_POST["annoAuditoria"];
$estamento     = $_POST["estamento"];
$tipoAuditoria = $_POST["tipoAuditoria"];
$cantHallazgo  = $_POST["cantHallazgo"];
//sleep(1);
//print_r($_POST);

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="INSERT";
$modulo="REPOSITORIO";
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
$objRepositorio=new repositorio;
$objRepositorio->insert_repositorio($codAuditoria,$nomAuditoria,$annoAuditoria,$estamento,$tipoAuditoria,$cantHallazgo);
$objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);

?>

