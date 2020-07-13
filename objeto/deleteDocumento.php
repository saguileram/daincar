<?php
 require_once("../class/class_repositorio.php");
 //print_r($_POST);
 $carpeta=$_GET["carpeta"];
 $documento=$_GET["documento"];
 
 //EVENTO
$codigoUsuario= $_GET["usuario"];
$daincar= $_GET["daincar"];
$operacion="DELETE";
$modulo="FICHA DOCUMENTOS";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
}  
 
 $objRepositorio=new repositorio;
 $objRepositorio->eliminar_documento($carpeta,$documento);
 $objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
 exit;
?>