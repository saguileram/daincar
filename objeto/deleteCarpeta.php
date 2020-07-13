<?php
 require_once("../class/class_repositorio.php");
 //print_r($_POST);
 
 //EVENTO
$codigoUsuario= $_GET["usuario"];
$daincar= $_GET["daincar"];
$operacion="DELETE";
$modulo="REPOSITORIO";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
} 
 
 $carpeta=$_GET["carpeta"];
 $objRepositorio=new repositorio;
 $objRepositorio->eliminar_carpeta($carpeta);
 $objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
 //exit;
?>