<?php
require_once("../class/class_planificacion.php");
//print_r($_POST);
//variables POST
$codigo      = $_POST["codigo"];
$cargo       = $_POST["cargo"];
$dependencia = $_POST["dependencia"];
$escalafon   = $_POST["escalafon"];
$grado       = $_POST["grado"];
$profesion   = $_POST["profesion"];

//sleep(1);
//print_r($_POST);

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="UPDATE";
$modulo="PERSONAL";
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
$objRepositorio->modifica_personal($codigo,$cargo,$dependencia,$escalafon,$grado,$profesion);
$objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
?>

