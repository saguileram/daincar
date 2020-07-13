<?php
require_once("./class/class_conexion.php");

$fun_codigo=mysqli_real_escape_string(Conectar::con(),$_GET["fun_codigo"]);
		
if ($fun_codigo=="") {	
	header("Location: index.php");
}

$ip  = $_SERVER['REMOTE_ADDR'];
$fecha_hra_termino	=	"NULL";
$evento	=	"NULL";

		//print_r($_POST);
		$sql="Select 
   personal.per_codigo,
    grado.gra_descripcion,
   concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nom_completo,
   usuario.us_login,
   usuario.us_clave,
   usuario.tus_codigo,
   personal.daincar_codigo,
   estructura_daincar.daincar_descripcion,
   tipo_usuario.tus_descripcion
from
   usuario
  inner join tipo_usuario on (usuario.tus_codigo = tipo_usuario.tus_codigo)
  inner join personal on (usuario.per_cod = personal.per_codigo)
  inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
  left outer join estructura_daincar on (personal.daincar_codigo = estructura_daincar.daincar_codigo)
where
   usuario.us_login = '".$fun_codigo."'
   limit 1";
		//echo $sql;
		//exit;
		$res=mysqli_query(Conectar::con(),$sql);
		if (mysqli_num_rows($res)==0)
		{
			//echo "NO EXISTE ...";
			echo "<script type='text/javascript'>
			alert('EL USUARIO NO EXISTE EN LA BASE DE DATOS ...');
		  window.location='index.php';
			</script>";
		}else
		{
			//echo "si existen";
			if ($reg=mysqli_fetch_array($res))
			{
				session_start();
				$_SESSION["session_video_14"]=$reg["us_login"];
				$_SESSION["session_video_15"]=$reg["nom_completo"];
				$_SESSION["session_video_16"]=$reg["tus_descripcion"];
				$_SESSION["session_video_17"]=$reg["daincar_descripcion"];
				$_SESSION["session_video_18"]=$reg["gra_descripcion"];
				$_SESSION["session_video_19"]=$reg["tus_codigo"];
				$_SESSION["session_video_20"]=$reg["daincar_codigo"];
				$_SESSION["session_video_21"]=$reg["daincar_codigo"];
				$_SESSION["session_video_22"]=$reg["daincar_descripcion"];
				
		    $codigo  = $_SESSION["session_video_14"];
			  $daincar = $_SESSION["session_video_21"];
				$tipo    = $_SESSION["session_video_19"];
				
				$sql1="Insert into conexion values('".$codigo."',".$daincar.",now(),'".$fecha_hra_termino."','".$ip."','".$tipo."','".$evento."');";
		    $result=mysqli_query(Conectar::con(),$sql1);
		    //echo $sql;	
				
				header("Location: auditorias.php");
			}
		}
			
?>