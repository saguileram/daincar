<?php
require_once("../class/class_repositorio.php");

//variables POST
$codAuditoria  = $_POST["codAuditoria"];
//$nomDocumento  = $_POST["nomDocumento"];
$nomDocumento  = "NULL";
$descDocumento = $_POST["descDocumento"];
$archivo       = $_POST["archivo"];
$extension     = $_POST["extension"];
$tipoDocumento = $_POST["tipoDocumento"];
$otroInforme   = $_POST["otroInforme"];
//sleep(1);
//print_r($_POST);

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="INSERT";
$modulo="FICHA DOCUMENTOS";
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
$objRepositorio->insert_documento($codAuditoria,$nomDocumento,$descDocumento,$tipoDocumento,$otroInforme,$archivo,$extension);
$objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
?>

