<?php
require_once("../class/class_repositorio.php");
	//print_r($_POST);
	
//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincar= $_POST["daincar"];
$operacion="SELECT";
$modulo="REPORTE AUDITORIA";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
}  
	
	  $parametro1=$_POST["estamento"];
	  $parametro2=$_POST["nombre"];
	  $parametro3=$_POST["tipo"];
	  $parametro4=$_POST["anno"];
	  //echo $parametro3;
    $objRepositorio=new repositorio;
    $objRepositorio->consulta_repositorio($parametro1,$parametro2,$parametro3,$parametro4);
    $objRepositorio->insertEvento($codigoUsuario,$daincar,$operacion,$modulo,$ip);
	//exit;
?>