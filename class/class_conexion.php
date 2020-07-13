<?php
session_start();
date_default_timezone_set("America/Santiago");

class Conectar
{
	public static function con()
	{
	$server   = "localhost";
	$username = "root";
	$password = "sergio81";
	$database = "DB_Daincar_V3";
	$con = mysqli_connect($server,$username,$password,$database);
  mysqli_query($con,"SET NAMES 'utf8'");
 
  if (!$con) {
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "Errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
  echo "Error de depuración: " . mysqli_connect_error() . PHP_EOL;
  exit;
 }else {
 	return $con;
 	}
			
 }
}
?>