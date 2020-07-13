<?php
require_once("../class/class_usuario.php");

$codigo=$_POST["codigo"];
$daincar=$_POST["daincar"];
$clave=$_POST["clave"];
$perfil=$_POST["perfil"];

//EVENTO
$codigoUsuario= $_POST["usuario"];
$daincarUsuario= $_POST["daincarUsuario"];
$operacion="INSERT";
$modulo="USUARIOS";
//CAPTURAR IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
   $ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else {
   $ip=$_SERVER['REMOTE_ADDR'];
} 

	//print_r($_POST);
		$obj=new Usuario();
    $obj->add_usuario($codigo,$daincar,$clave,$perfil);
    $obj->insertEventoUsuario($codigoUsuario,$daincarUsuario,$operacion,$modulo,$ip);
	  //exit;
?>

