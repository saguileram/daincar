<?php
require_once("class_conexion.php");

class Usuario
{
	

	
public function login($user,$pass)
	{
		//$user=$_POST["rut_funcionario"];
		//$pass=base64_encode($_POST["clave_intranet"]);
		//print_r($_POST);
		$sql="select 
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
   usuario.us_login = '".$user."' and 
   usuario.us_clave= '".$pass."' ";
		//echo $sql;
		//exit;
		$res=mysqli_query(Conectar::con(),$sql);
		if (mysqli_num_rows($res)==0)
		{
			echo "<script type='text/javascript'>
			alert('EL USUARIO O LA CLAVE NO EXISTEN EN LA BASE DE DATOS ...');
			window.location='index.php';
			</script>";
		}else
		{
			//echo "si existen";
			if ($reg=mysqli_fetch_array($res))
			{
				$_SESSION["session_video_14"]=$reg["us_login"];
				$_SESSION["session_video_15"]=$reg["nom_completo"];
				$_SESSION["session_video_16"]=$reg["tus_descripcion"];
				$_SESSION["session_video_17"]=$reg["daincar_descripcion"];
				$_SESSION["session_video_18"]=$reg["gra_descripcion"];
				$_SESSION["session_video_19"]=$reg["tus_codigo"];
				$_SESSION["session_video_20"]=$reg["daincar_codigo"];
				$_SESSION["session_video_21"]=$reg["daincar_codigo"];
				$_SESSION["session_video_22"]=$reg["daincar_descripcion"];
				header("Location: auditorias.php");
			}
		}
	}
	
	  public function get_usuario()
    {
	
	//print_r($_POST);
        $sql="select 
  personal.per_codigo,
  grado.gra_descripcion,
  concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nom_completo,
  cargo_auditor.car_descripcion,
  estructura_daincar.daincar_codigo,
  estructura_daincar.daincar_descripcion,
  tipo_usuario.tus_descripcion
from
  personal
  inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
  left outer join usuario on (personal.per_codigo = usuario.per_cod)
  left outer join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
  left outer join tipo_usuario on (usuario.tus_codigo = tipo_usuario.tus_codigo)
  inner join estructura_daincar on (personal.daincar_codigo = estructura_daincar.daincar_codigo)
where
  cargo_auditor.car_codigo in (10,20,30,40,50) and estructura_daincar.daincar_codigo in (20,30,40)
  and personal.activo=1
order by
 grado.gra_codigo,
 estructura_daincar.daincar_codigo";
             $res=mysqli_query(Conectar::con(),$sql);

	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      echo "";
        exit();
	
		
       }else{
	       //echo "<br>";
	       //echo "<div style='text-align: left;'>";
         //echo "&nbsp;&nbsp;&nbsp;<input type='button' name='btn3' id='btn3' value='NUEVO FUNCIONARIO' onClick=popup8('fichaFuncionario.php'); return false;>&nbsp;";
         //echo "&nbsp;&nbsp;&nbsp;<input type='button' name='btn3' id='btn3' value='NUEVO FUNCIONARIO' return false;>&nbsp;";
          //echo "<div class='form_contact'>";
          //echo "<input type='button' id='btnSend' value='Nueva Funcionario' onClick=\"abrirVentanaFichaPersonal('fichaPersonal.php')\">";
         //echo "<hr>";
          //echo "</div>";
         //echo $muestra= "<td><a href=\"reporte.php?rep=".$rep."\" \"><img src='img/microsoft-excel.png' width='30' height='32' border='0' align='middle' alt='Reporte'/></a></td>";
         echo "<table>";
         echo "<thead>";
         echo "<tr>";
         echo "<th>Nro.</th>";
         echo "<th>CODIGO</th>";
         echo "<th>GRADO</th>";
         echo "<th>NOMBRE COMPLETO</th>";
         echo "<th>CARGO</th>";
         echo "<th>DEPENDENCIA</th>";
         echo "<th>PERFIL</th>";
         echo "<th>ASIGNAR</th>";
         echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		 //$rowColors = Array('#FFFFFF','#E9EAED'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
       $i=0;
        while ($row = mysqli_fetch_array($res)){
	    $i++;
	     $this->usuario[]=$row;
	      $usuario=$row["tus_descripcion"];
	      if($usuario==""){
	      	$usuario="<font color='red'>CLAVE NO ASIGNADA</font>";
	      	}else{
	      	 $usuario;
	      }

        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["per_codigo"]."</td>";
        echo "<td>".$row["gra_descripcion"]."</td>";
        echo "<td>".$row["nom_completo"]."</td>";
        echo "<td>".$row["car_descripcion"]."</td>";
        echo "<td>".$row["daincar_descripcion"]."</td>";
        echo "<td>".$usuario."</td>";
        //echo "<td><a href=\"infoPersonal2.php?cod=".base64_encode($row["PER_CODIGO"])."\" onClick=\"popup5('infoPersonal2.php?cod=".base64_encode($row["PER_CODIGO"])."'); return false;\"><img src='./img/busqueda.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaClave('fichaNuevoUsuario.php?cod=".base64_encode($row["per_codigo"])."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["per_codigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["per_codigo"]."'/></td>";
        //(echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaClave('fichaPersonaMod2.php?cod=".$row["PER_CODIGO"]."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["PER_CODIGO"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["PER_CODIGO"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onclick=\"desactivaPersonal('".$row['PER_CODIGO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        echo "</tr>";

       
	    }  
	       echo "</tbody>";
	    echo "</table>";
	   return $this->usuario;
	   	echo "<br>";
      }			
}

	  public function get_miUsuario($codigo)
    {
	
	//print_r($_POST);
        $sql="select 
  personal.per_codigo,
  grado.gra_descripcion,
  concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nom_completo,
  cargo_auditor.car_descripcion,
  estructura_daincar.daincar_codigo,
  estructura_daincar.daincar_descripcion,
  tipo_usuario.tus_descripcion
from
  personal
  inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
  left outer join usuario on (personal.per_codigo = usuario.per_cod)
  left outer join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
  left outer join tipo_usuario on (usuario.tus_codigo = tipo_usuario.tus_codigo)
  inner join estructura_daincar on (personal.daincar_codigo = estructura_daincar.daincar_codigo)
where
  personal.per_codigo='".$codigo."'
order by
 grado.gra_codigo,
 estructura_daincar.daincar_codigo";
             $res=mysqli_query(Conectar::con(),$sql);

	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      echo "";
        exit();
	
		
       }else{
	       //echo "<br>";
	       //echo "<div style='text-align: left;'>";
         //echo "&nbsp;&nbsp;&nbsp;<input type='button' name='btn3' id='btn3' value='NUEVO FUNCIONARIO' onClick=popup8('fichaFuncionario.php'); return false;>&nbsp;";
         //echo "&nbsp;&nbsp;&nbsp;<input type='button' name='btn3' id='btn3' value='NUEVO FUNCIONARIO' return false;>&nbsp;";
          //echo "<div class='form_contact'>";
          //echo "<input type='button' id='btnSend' value='Nueva Funcionario' onClick=\"abrirVentanaFichaPersonal('fichaPersonal.php')\">";
         //echo "<hr>";
          //echo "</div>";
         //echo $muestra= "<td><a href=\"reporte.php?rep=".$rep."\" \"><img src='img/microsoft-excel.png' width='30' height='32' border='0' align='middle' alt='Reporte'/></a></td>";
         echo "<table>";
         echo "<thead>";
         echo "<tr>";
         echo "<th>Nro.</th>";
         echo "<th>CODIGO</th>";
         echo "<th>GRADO</th>";
         echo "<th>NOMBRE COMPLETO</th>";
         echo "<th>CARGO</th>";
         echo "<th>DEPENDENCIA</th>";
         echo "<th>PERFIL</th>";
         echo "<th>MODIFICAR</th>";
         echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		 //$rowColors = Array('#FFFFFF','#E9EAED'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
       $i=0;
        while ($row = mysqli_fetch_array($res)){
	    $i++;
	     $this->usuario[]=$row;
	      $usuario=$row["tus_descripcion"];
	      if($usuario==""){
	      	$usuario="<font color='red'>CLAVE NO ASIGNADA</font>";
	      	}else{
	      	 $usuario;
	      }

        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["per_codigo"]."</td>";
        echo "<td>".$row["gra_descripcion"]."</td>";
        echo "<td>".$row["nom_completo"]."</td>";
        echo "<td>".$row["car_descripcion"]."</td>";
        echo "<td>".$row["daincar_descripcion"]."</td>";
        echo "<td>".$usuario."</td>";
        //echo "<td><a href=\"infoPersonal2.php?cod=".base64_encode($row["PER_CODIGO"])."\" onClick=\"popup5('infoPersonal2.php?cod=".base64_encode($row["PER_CODIGO"])."'); return false;\"><img src='./img/busqueda.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaClave('fichaClaveUsuario.php?cod=".base64_encode($row["per_codigo"])."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["per_codigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["per_codigo"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onclick=\"desactivaPersonal('".$row['PER_CODIGO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        echo "</tr>";

       
	    }  
	       echo "</tbody>";
	    echo "</table>";
	   return $this->usuario;
	   	echo "<br>";
      }			
}
  
   	public function mod_usuario($codigo,$perfil,$claveActual,$claveNueva)
	{
		$sql="update usuario 
		      set 
		          usuario.us_clave='".$claveNueva."'
          where 
          usuario.per_cod='".$codigo."' and usuario.us_clave='".$claveActual."'";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;

	}
	
		public function delete_usuario($codigo)
	{
		$sql="delete
		      from usuario 
          where 
          usuario.per_cod='".$codigo."'";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;
	}
	
		public function add_usuario($codigo,$daincar,$clave,$perfil)
	{
    //$rep="NULL";
		$sql="insert into usuario values('".$codigo."','".$daincar."','".$codigo."','".$clave."',".$perfil.",curdate());";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;

	}
	
	  	public function insertEventoUsuario($codigo,$daincar,$operacion,$modulo,$ip)
	{
	
		$sql="insert into evento
		      values('".$codigo."',".$daincar.",now(),'".$operacion."','".$modulo."','".$ip."');";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  } 

	
}
?>

