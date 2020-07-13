<?php
 require_once("../class/class_biblioteca.php");
 //print_r($_POST);
 $codigo=$_GET["codigo"];
 $documento=$_GET["documento"];
 
 //EVENTO
$codigoUsuario= $_GET["codigoUsuario"];
$daincar= $_GET["daincar"];
$operacion="DELETE";
$modulo="BIBLIOTECA";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
}   
 
 
 $objRepositorio=new Biblioteca;
 $objRepositorio->eliminar_biblioteca($codigo,$documento);
 $objRepositorio->insertEventoBiblioteca($codigoUsuario,$daincar,$operacion,$modulo,$ip);
 exit;
?>