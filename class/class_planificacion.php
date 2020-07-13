<?php
require_once("class_conexion.php");

class Trabajo
{
	private $resultados;
	private $certificado;
	
	public function __construct()
	{
		$this->resultados=array();
		$this->usuario=array();
		$this->personal=array();
		$this->dato=array();
		$this->datoUsuario=array();
		$this->tipoUsuario=array();
		$this->supervisor=array();
		$this->auditor=array();
		$this->planificacion=array();
	}
	
      	
	public function autocompletar()
	{
		if(isset($_POST["word"]))
		{
	
				$sql="select
              reparticion.rep_codigo,
              reparticion.rep_descripcion
              from
              reparticion 
              where
					    reparticion.rep_descripcion like '%".$_POST["word"]."%'
					    order by rep_descripcion asc"; 
			//}
			$res=mysqli_query(Conectar::con(),$sql);
			//echo $sql;
			while($row=mysqli_fetch_array($res))
			{
			//$idUnidad=$row["DESTACAMENTO_CODIGO"];
			$idUnidad=$row["rep_codigo"];
			//echo $dato2;
			//$dato=$row["DESTACAMENTO_DESCRIPCION"];
			$dato=$row["rep_descripcion"];
				// Mostramos las lineas que se mostrarán en el desplegable. Cada enlace
				// tiene una funcion javascript que pasa los parámetros necesarios a la
				// función selectItem
				echo "<a href=\"javascript:selectItem('".$_POST["idContenido"]."','".$dato."','".$idUnidad."')\" title='$dato'>".$dato."</a><br>";
			}
		}
	}
    
    public function formateo_rut($rut_param){ 
     
        $parte4 = substr($rut_param, -1); // seria solo el numero verificador 
    $parte3 = substr($rut_param, -4,3); // la cuenta va de derecha a izq  
    $parte2 = substr($rut_param, -7,3);  
        $parte1 = substr($rut_param, 0,-7); //de esta manera toma todos los caracteres desde el 8 hacia la izq 

    return $parte1.".".$parte2.".".$parte3."-".$parte4; 

}
  
  public function get_personal($perfil)
    {
	
	//print_r($_POST);
        $sql="select 
             personal.per_codigo,
             personal.daincar_codigo,
             grado.gra_codigo,
             grado.gra_descripcion,
             concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nom_completo,
             personal.per_profesion,
             carrera.carrera_descripcion,
             cargo_auditor.car_codigo,
             cargo_auditor.car_descripcion,
             estructura_daincar.daincar_descripcion        
        from
            personal
            inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
            left outer join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
            left outer join estructura_daincar on (personal.daincar_codigo = estructura_daincar.daincar_codigo)
            left outer join carrera on (personal.per_profesion = carrera.carrera_codigo)
            where
           personal.activo=1
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
          echo "<div class='form_contact'>";
          echo "<input type='button' id='btnSend' value='Nuevo Funcionario' onClick=\"abrirVentanaFichaPersonal('fichaPersonal.php')\">";
         //echo "<hr>";
          echo "</div>";
         //echo $muestra= "<td><a href=\"reporte.php?rep=".$rep."\" \"><img src='img/microsoft-excel.png' width='30' height='32' border='0' align='middle' alt='Reporte'/></a></td>";
         echo "<table>";
         echo "<thead>";
         echo "<tr>";
         echo "<th>Nro.</th>";
         echo "<th>CODIGO</th>";
         echo "<th>GRADO</th>";
         echo "<th>NOMBRE COMPLETO</th>";
         echo "<th>DEPENDENCIA</th>";
         echo "<th>PROFESION Y/O ESPECIALIDAD</th>";
         echo "<th>CARGO</th>";
         echo "<th>EDITAR</th>";
         echo "<th>ELIMINAR</th>";
         echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		 //$rowColors = Array('#FFFFFF','#E9EAED'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
       $i=0;
        while ($row = mysqli_fetch_array($res)){
	    $i++;
	     $this->usuario[]=$row;
	      $codigoProfesion=$row["per_profesion"];
	      if($codigoProfesion==1 || $codigoProfesion==""){
	      	$profesion="<font color='red'>NO ESPECIFICADA</font>";
	      	}else{
	      	 $profesion=$row["carrera_descripcion"];
	      }
	      $cargo=$row["car_codigo"];
	      if($cargo==NULL){
	      	$cargo="<font color='red'>NO REGISTRA</font>";
	      	}else{
	      	$cargo=$row["car_descripcion"];
	      }
	      $dependencia=$row["daincar_codigo"];
	      if($dependencia==0){
	      	$dependencia="<font color='red'>NO ASIGNADA</font>";
	      	}else{
	      	$dependencia=$row["daincar_descripcion"];
	      }
	      $cod=$row["per_codigo"];
        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["per_codigo"]."</td>";
        echo "<td>".$row["gra_descripcion"]."</td>";
        echo "<td>".$row["nom_completo"]."</td>";
        echo "<td>".$dependencia."</td>";
        echo "<td>".$profesion."</td>";
        echo "<td>".$cargo."</td>";
        //echo "<td><a href=\"infoPersonal2.php?cod=".base64_encode($row["PER_CODIGO"])."\" onClick=\"popup5('infoPersonal2.php?cod=".base64_encode($row["PER_CODIGO"])."'); return false;\"><img src='./img/busqueda.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaPersonal('fichaPersonalMod.php?cod=".base64_encode($row["per_codigo"])."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["per_codigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["per_codigo"]."'/></td>";
        if($perfil==30){
        echo "<td><a href='javascript:void(0);' onclick=\"alert('ACCESO RESTRINGIDO ...')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        }else{
         echo "<td><a href='javascript:void(0);' onclick=\"desactivaPersonal('".$row['per_codigo']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";	
        }
        echo "</tr>";

       
	    }  
	       echo "</tbody>";
	    echo "</table>";
	   return $this->usuario;
	   	echo "<br>";
      }			
}

  
	
	public function get_auditoria($perfil)
    {
	$annoActual=date("Y");
	//echo $tipo;
	//print_r($_POST);
        $sql="select 
               planificacion_auditoria.aud_codigo,
               planificacion_auditoria.aud_anno,
               ucase(planificacion_auditoria.aud_nombre) as nombre,
               reparticion.rep_descripcion,
               ucase(planificacion_auditoria.aud_objetivo) as objetivo,
               planificacion_auditoria.aud_horas,
               planificacion_auditoria.equipo,
               date_format(planificacion_auditoria.fecha_desde,'%d/%m/%y') as finicio,
               date_format(planificacion_auditoria.fecha_hasta,'%d/%m/%y') as ftermino,
               date_format(planificacion_auditoria.fecha_caigg,'%d/%m/%y') as caigg,
               tipo_auditoria.tip_descripcion as tipo,
               planificacion_auditoria.est_codigo,
               estado_auditoria.est_descripcion as estado,
               planificacion_auditoria.equipo   
             from
            planificacion_auditoria
            inner join reparticion on (planificacion_auditoria.aud_estamento = reparticion.rep_codigo)
            inner join `tipo_auditoria` on (`planificacion_auditoria`.`tip_codigo` = `tipo_auditoria`.`tip_codigo`)
            inner join `estado_auditoria` on (`planificacion_auditoria`.`est_codigo` = `estado_auditoria`.`est_codigo`)
            where  planificacion_auditoria.aud_anno= ".$annoActual."
          order by
           planificacion_auditoria.fecha_registro desc";
             $res=mysqli_query(Conectar::con(),$sql);
   //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      echo "";
        exit();
	
		
       }else{
       	//$tipo=$_POST["tipo"];
	       //echo "<br>";
	       //echo "<div style='text-align: left;'>";
         //echo "&nbsp;&nbsp;&nbsp;<input type='button' name='btn3' id='btn3' value='NUEVA AUDITORIA' onClick=popup3('fichaEquipo.php'); return false;>";
         //echo "</div>";
         //echo "<br>";
         echo "<div class='form_contact'>";
 //echo "<div class='texto'><img src='./img/document-archive-icon1.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Interna</div>";
// echo "<label class='texto'><img src='./img/archive-icon.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Carabineros</label>";
 echo "<form action='' class='form_contact'><input type='button' id='btnSend' value='Nueva Planificacion' onClick=\"abrirVentanaRepositorio3('fichaPlanificacion.php')\"></form>";
 //echo "<hr>";
 echo "</div>";
         echo "<table border='1'>";
         echo "<thead>";
         echo "<tr>";
         echo "<th>Nro.</th>";
         echo "<th>CODIGO</th>";
         echo "<th>A&Ntilde;O</th>";
         echo "<th>NOMBRE AUDITORIA</th>";
         echo "<th>ESTAMENTO AUDITADO</th>";
         echo "<th>HORAS</th>";
         echo "<th>FECHA INICIO</th>";
         echo "<th>FECHA TERMINO</th>";
         echo "<th>FECHA CAIGG</th>";
         echo "<th>DIAS</th>";
         echo "<th>TIPO</td>";
         echo "<th>ESTADO</th>";
         echo "<th>EQUIPO</th>";
         echo "<th>EDITAR</th>";
         echo "<th>ELIMINAR</th>";
         //echo "<th colspan='3'>ACCIONES</th>";
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";
		 $rowColors = Array('#FFFFFF','#E9EAED'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
    $i=0;
        while ($row = mysqli_fetch_array($res)){
	    $i++;
	     $this->usuario[]=$row;

	      $cod=$row["aud_codigo"];
	      $swich=$row["equipo"];
        $fechaActual=date("d/m/Y");
        $fechaHoy=date("d-m-Y");
        $fecha1=$row["finicio"];
        $fecha2=$row["ftermino"];
        $fecha3=$row["caigg"];
        $estado=$row["est_codigo"];
        //echo $fechaLimite;
	      //echo $swich;
	      //echo $cod;
	      // if($swich==0){
	      //  echo "<script>";
			  //  echo "alert('Debe configurar equipo auditor.');";
			  //  echo "</script>";
	      //}
	      //echo $tipo;
        //echo "<tr id='marca' style='background-color:".$rowColors[$nRow++ % count($rowColors)].";' align='center' class='lineaDatos1'>"; 		
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row["aud_codigo"]."</td>";
        echo "<td>".$row["aud_anno"]."</td>";
        echo "<td>".$row["nombre"]."</td>";
        echo "<td>".$row["rep_descripcion"]."</td>";
        echo "<td>".$row["aud_horas"]."</td>";
        echo "<td>".$fecha1."</td>";
        echo "<td>".$fecha2."</td>";
        echo "<td>".$fecha3."</td>";
                     
       //if($fechaActual>=$fecha1){
       // echo "<td><b><font color='green'>".$fecha1."</font></b></td>";
       //}else{
       //	 echo "<td>".$fecha1."</td>";
       //}
       //if($fechaActual<$fecha2){
       // echo "<td><b><font color='orange'>".$fecha2."</font></b></td>";
       //}elseif($fechaActual>=$fecha2){
       //	echo "<td><b><font color='red'>".$fecha2."</font></b></td>";
       //}else{
       //	 echo "<td>".$fecha2."</td>";
       //}
       //if($fechaActual==$fecha3){
       // echo "<td><b><font color='blue'>".$fecha3."</font></b></td>";
       //}elseif($fechaActual>=$fecha3){
       //	echo "<td><b><font color='red'>".$fecha3."</font></b></td>";
       //}else{
       //	 echo "<td>".$fecha3."</td>";
       //}
       
          $fechaPasoTermino 		= explode("/",$fecha2);
   	$fechaFormatoTermino         = $fechaPasoTermino[2] . "-" . $fechaPasoTermino[1] . "-" . $fechaPasoTermino[0];
   	$f1=date("Y-m-d"); 
    $f2=$fechaFormatoTermino; 
    $diasTermino=(strtotime($f1)-strtotime($f2))/86400; 
    $diasTermino=abs($diasTermino);  
    $diasTermino=floor($diasTermino); 
    //echo $diasTermino."<br>";
    //echo $fecha3;
    //echo "<br>";
    //echo $diasTermino;
    if(strtotime($fechaFormatoTermino) < strtotime($fechaHoy)){
	    $diferencias="<b><font color='red'>".$diasTermino." Dia(s) pasada la fecha de termino de la auditoria."."</font></b>";
	}elseif(strtotime($fechaFormatoTermino) > strtotime($fechaHoy)){
		if($diasTermino <=15){
				$diferencias="<b><font color='orange'>".$diasTermino." Dia(s) restantes para el termino de la auditoria."."</font></b>";
		}else{
			$diferencias="<b><font color='green'>".$diasTermino." Dia(s) restantes para el termino de la auditoria."."</font></b>";
			}		
	}elseif(strtotime($fechaFormatoTermino) == strtotime($fechaHoy)){
		 $diferencias="<b><font color='red'>".$diasTermino." Dia(s) auditoria finalizada."."</font></b>";
	}

	    if($estado==30){
	     echo "<td>AUDITORIA FINALIZADA</td>";
	       }else{ 
	       	 echo "<td>".$diferencias."</td>";
	       }
        
      echo "<td>".$row["tipo"]."</td>";
        echo "<td>".$row["estado"]."</td>";
        //if($swich==0){
        //echo "<td><a href=\"fichaDisponible.php?aud=".$row["AUD_CODIGO"]."\" onClick=\"popup7('fichaPersonalDisponible.php?aud=".$row["AUD_CODIGO"]."&asig=".$row["EQUIPO"]."'); return false;\"><img src='./img/Groups-Meeting.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaEquipoDisponible('fichaPersonalDisponible.php?aud=".base64_encode($row["aud_codigo"])."&asig=".base64_encode($row["equipo"])."')\"><img src='./img/Groups-Meeting.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaRepositorio3('fichaPlanificacionMod.php?cod=".base64_encode($row["aud_codigo"])."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["aud_codigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["aud_codigo"]."'/></td>";
       if($perfil==10){
        echo "<td><a href='javascript:void(0);' onclick=\"eliminaAuditoria('".$row['aud_codigo']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        }else{
        	echo "<td><a href='javascript:void(0);' onclick=\"alert('ACCESO RESTRINGIDO ...')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        	}
        
        //echo "<td><a href=\"fichaDisponible.php?aud=".base64_encode($row["AUD_CODIGO"])."\" onClick=\"popup7('fichaDisponible.php?aud=".base64_encode($row["AUD_CODIGO"])."'); return false;\"><img src='./img/group.png' border='0' align='middle' alt='Ver'/></a></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteAuditoria('cod');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' name='cod' id='cod' value='$cod'/></td>";
        //}else{
        //echo "<td><a href=\"datosAuditoria.php?aud=".base64_encode($row["AUD_CODIGO"])."\" onClick=\"popup6('datosAuditoria.php?aud=".base64_encode($row["AUD_CODIGO"])."'); return false;\"><img src='./img/busqueda.png' border='0' align='middle' alt='Ver'/></a></td>";
        //}
        //echo "<td><a href='./archivos/".$cod.".pdf' target='_blank'> <img src='img/pdf.png' width='16' height='16' border='0'> </a></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteAuditoria('cod');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' name='cod' id='cod' value='$cod'/></td>";
       //echo "<td><a href='javascript:void(0);' onclick=\"verificaEliminaCarpeta('".$row['REP_AUDCODIGO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        echo "</tr>";

       
	    }  
	        echo "</tbody>";
	    echo "</table>";
		echo "<br>";
	   return $this->usuario;
      }			
}
	
		public function add_auditoria($auditoria, $anno, $nombre, $objetivo, $auditado,$inicio,$termino,$caigg,$tipo,$estado)
	{
		
		$f1     = $_POST["finicio"];
	  $f2     = $_POST["ftermino"];
	  $f3     = $_POST["fcaigg"];
	  $fechaPaso1 		= explode("/",$f1);
   	$fecha1         = $fechaPaso1[2] . "-" . $fechaPaso1[1] . "-" . $fechaPaso1[0];
   	$fechaPaso2 		= explode("/",$f2);
   	$fecha2         = $fechaPaso2[2] . "-" . $fechaPaso2[1] . "-" . $fechaPaso2[0];
		$fechaPaso3 		= explode("/",$f3);
   	$fecha3         = $fechaPaso3[2] . "-" . $fechaPaso3[1] . "-" . $fechaPaso3[0];
		
		$auditoria=strtoupper($_POST["auditoria"]);
		$anno=$_POST["anno"];
		//$rep="203600000100";
		$nombre=$_POST["nombre"];
		$objetivo=$_POST["objetivo"];
		$auditado=$_POST["auditado"];
	  //$inicio=$_POST["finicio"];
		//$termino=$_POST["ftermino"];
		//$caigg=$_POST["fcaigg"];
		$tipo=$_POST["tipoAuditoria"];
		$estado=$_POST["estadoAuditoria"];
		$swich=0;
		$horas=$_POST["hras"];
    
    //$sql="SELECT 
    //     AUDITORIA.AUD_CODIGO
     //    FROM
     //    AUDITORIA
     //    WHERE
     //    AUDITORIA.AUD_CODIGO='".$auditoria."'";
		//$res=mysqli_query(Conectar::con(),$sql);
		 //echo $sql;
		 //if (mysqli_num_rows($res)==0)
		//{
		 //$sql="INSERT INTO AUDITORIA VALUES('".$auditoria."',".$anno.",'".$rep."','".$nombre."','".$auditado."','".$objetivo."','".$inicio."','".$termino."','".$caigg."',NOW(),0,0,0,".$tipo.",".$estado.",".$swich.");";
		 $sql="insert into planificacion_auditoria values('".$auditoria."',".$anno.",'".$nombre."','".$auditado."','".$objetivo."',".$horas.",'".$fecha1."','".$fecha2."','".$fecha3."',now(),".$tipo.",".$estado.",".$swich.");";
		 $res=mysqli_query(Conectar::con(),$sql);
		 //echo $sql;
		//}else{
		//  echo "<script type='text/javascript'>
		//	alert('CODIGO DE AUDITORIA YA EXISTE ...');
		//	window.opener.location = window.opener.location;
		//	window.close();
		//	</script>";
		//}

		

	}
	
		public function delete_auditoria($cod)
	{
		//echo $cod;
		
			self::delete_equipo_auditoria($cod);
		
		$sql="delete
		      from planificacion_auditoria 
          where 
          planificacion_auditoria.aud_codigo='".$cod."'";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;
	}
	
		public function delete_equipo_auditoria($aud)
	{
		$sql="delete 
		      from equipo_auditoria 
		      where equipo_auditoria.aud_codigo='".$aud."'";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;
	}
	
	  public function update_equipo($aud)
	{
		//print_r($_POST);
		$sql="update planificacion_auditoria
		      set planificacion_auditoria.equipo=0
          where 
          planificacion_auditoria.aud_codigo='".$aud."'";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;

	}
	

  
    public function get_equipo($aud)
    {
    	        $sql="select 
   equipo_auditoria.aud_codigo,
   personal.per_codigo,
   grado.gra_descripcion as  grado,
   concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nombre_completo,
   personal.car_codigo,
   cargo_auditor.car_descripcion as cargo
from
   personal
   inner join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
   inner join equipo_auditoria on (personal.per_codigo = equipo_auditoria.per_codigo)
   inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
where
   equipo_auditoria.aud_codigo='".$aud."'
order by
    personal.gra_codigo";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<equipo>";
    echo "<auditoria>".$rs["aud_codigo"]."</auditoria>";
    echo "<codigo>".$rs["per_codigo"]."</codigo>";
    echo "<grado>".$rs["grado"]."</grado>";
    echo "<nombre>".$rs["nombre_completo"]."</nombre>";
    echo "<codigoCargo>".$rs["car_codigo"]."</codigoCargo>";
    echo "<cargo>".$rs["cargo"]."</cargo>";
    echo "</equipo>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }
    }
    
    public function add_auditor($auditoria,$auditor,$asig) 
  {
  	if($asig==0){
  		 $sql="update planificacion_auditoria
		      set planificacion_auditoria.equipo=1
          where 
          planificacion_auditoria.aud_codigo='".$auditoria."'";
			$res=mysqli_query(Conectar::con(),$sql);
  	}
  	//$filtro=3;
  	//echo $auditor;
  	//$supervisor=$_POST["supervisor"];
        if(is_array($auditor)) //formo arreglo
        {
		
        foreach($auditor as $auditores){
		//if($auditor !="" and $supervisor!=""){
		       $sql="insert into equipo_auditoria values('".$auditoria."','".$auditores."',now());";
		       $res=mysqli_query(Conectar::con(),$sql);
		       //echo $sql;
		       //echo "<br>";

    //}

      }              
  }
}   

public function modifica_equipo($auditoria,$auditor,$asig) 
  {
  	if($asig==1){
  		 $sql1="delete from equipo_auditoria
          where 
            equipo_auditoria.aud_codigo='".$auditoria."'";
			$res1=mysqli_query(Conectar::con(),$sql1);
			//echo $sql1;
  	}
  	//$filtro=3;
  	//echo $auditor;
        if(is_array($auditor)) //formo arreglo
        {
		
        foreach($auditor as $auditores){
		       $sql="insert into equipo_auditoria values('".$auditoria."','".$auditores."',now());";
		       $res=mysqli_query(Conectar::con(),$sql);
		       //echo $sql;
		       //echo "<br>";

 

      }              
  }
}   
    
	 public function dato_ficha($codigo)
    {
    	 
        $sql="select 
               planificacion_auditoria.aud_codigo,
               planificacion_auditoria.aud_anno,
               ucase(planificacion_auditoria.aud_nombre) as nombre,
               ucase(planificacion_auditoria.aud_objetivo) as objetivo,
               planificacion_auditoria.aud_horas,
               planificacion_auditoria.equipo,
               date_format(planificacion_auditoria.fecha_desde,'%d/%m/%y') as finicio,
               date_format(planificacion_auditoria.fecha_hasta,'%d/%m/%y') as ftermino,
               date_format(planificacion_auditoria.fecha_caigg,'%d/%m/%y') as caigg,
               tipo_auditoria.tip_codigo,
               tipo_auditoria.tip_descripcion,
               reparticion.rep_descripcion,
               planificacion_auditoria.aud_estamento, 
               planificacion_auditoria.est_codigo, 
               estado_auditoria.est_descripcion
             from
            planificacion_auditoria
            inner join reparticion on (planificacion_auditoria.aud_estamento = reparticion.rep_codigo)
            inner join `tipo_auditoria` on (`planificacion_auditoria`.`tip_codigo` = `tipo_auditoria`.`tip_codigo`)
          inner join `estado_auditoria` on (`planificacion_auditoria`.`est_codigo` = `estado_auditoria`.`est_codigo`)
             where
              planificacion_auditoria.aud_codigo ='".$codigo."'";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<auditoria>";
    echo "<codigo>".$rs["aud_codigo"]."</codigo>";
    echo "<anno>".$rs["aud_anno"]."</anno>";
    echo "<nombre>".$rs["nombre"]."</nombre>";
    echo "<codEstamento>".$rs["aud_estamento"]."</codEstamento>";
    echo "<estamento>".$rs["rep_descripcion"]."</estamento>";
    echo "<objetivo>".$rs["objetivo"]."</objetivo>";
    echo "<finicio>".$rs["finicio"]."</finicio>";
    echo "<ftermino>".$rs["ftermino"]."</ftermino>";
    echo "<fcaigg>".$rs["caigg"]."</fcaigg>";
    echo "<tipoAuditoria>".$rs["tip_codigo"]."</tipoAuditoria>";
    echo "<estadoAuditoria>".$rs["est_codigo"]."</estadoAuditoria>";
    echo "<hora>".$rs["aud_horas"]."</hora>";
    echo "</auditoria>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }
  
   public function update_planificacion($codAuditoria,$annoAuditoria,$nomAuditoria,$estamento,$objetivo,$hora,$finicio,$ftermino,$fcaigg,$tipoAuditoria,$estadoAuditoria)
	{
		//echo $objetivo;
		$sql="update planificacion_auditoria set aud_nombre='".$nomAuditoria."', aud_anno=".$annoAuditoria.",aud_estamento='".$estamento."',aud_objetivo='".$objetivo."',
		     aud_horas=".$hora.",fecha_desde='".$finicio."',fecha_hasta='".$ftermino."',fecha_caigg='".$fcaigg."', tip_codigo=".$tipoAuditoria.", est_codigo=".$estadoAuditoria."  where planificacion_auditoria.aud_codigo='".$codAuditoria."'";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  } 
  
     public function update_planificacionEstado($codAuditoria,$estadoAuditoria)
	{
		//echo $objetivo;
		$sql="update planificacion_auditoria set est_codigo=".$estadoAuditoria."  where planificacion_auditoria.aud_codigo='".$codAuditoria."'";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  } 
  
  		public function elimina_usuario($codigo)
	{
		$sql="delete
		      from usuario 
          where 
          usuario.per_cod='".$codigo."'";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;
	}
  
   public function desactiva_personal($cod)
	{
		
		self::elimina_usuario($cod);
		$sql="update personal set activo=0 where personal.per_codigo='".$cod."'";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  } 
  
 public function datofichaPersonal($codigo)
    {
    	 
      $sql="select 
             personal.per_codigo,
             personal.daincar_codigo,
             estructura_daincar.daincar_descripcion,
             escalafon.esc_codigo,
             grado.gra_codigo, 
             escalafon.esc_descripcion,
             grado.gra_descripcion,   
             personal.per_rut,
             concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nom_completo,
             personal.per_profesion,
             cargo_auditor.car_codigo,
             cargo_auditor.car_descripcion,
             carrera.carrera_descripcion
                            
        from
             personal
             inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
             inner join escalafon on (grado.esc_codigo = escalafon.esc_codigo)
             left outer join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
             left outer join estructura_daincar on (personal.daincar_codigo = estructura_daincar.daincar_codigo)
             left outer join carrera on (personal.per_profesion = carrera.carrera_codigo)
             where
            personal.per_codigo='".$codigo."' and personal.activo=1";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){

    echo "<funcionario>";
    echo "<codigo>".$rs["per_codigo"]."</codigo>";
    echo "<rut>".$this->formateo_rut($rs["per_rut"])."</rut>";
    echo "<codigoEscalafon>".$rs["esc_codigo"]."</codigoEscalafon>";
		echo "<codigoGrado>".$rs["gra_codigo"]."</codigoGrado>";
    echo "<escalafon>".$rs["esc_descripcion"]."</escalafon>";
    echo "<grado>".$rs["gra_descripcion"]."</grado>";
    echo "<nombre>".$rs["nom_completo"]."</nombre>";
    echo "<codigoProfesion>".$rs["per_profesion"]."</codigoProfesion>";
    echo "<profesion>".$rs["carrera_descripcion"]."</profesion>";
    echo "<cargoCodigo>".$rs["car_codigo"]."</cargoCodigo>";
    echo "<cargoDescripcion>".$rs["car_descripcion"]."</cargoDescripcion>";
    echo "<reparticion>".$rs["daincar_codigo"]."</reparticion>";
    echo "</funcionario>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }
  
    public function modifica_personal($codigo,$cargo,$dependencia,$escalafon,$grado,$profesion)
	{
		if($profesion==0 || $profesion=="")$profesion=1;
		
		$sql="update personal set daincar_codigo=".$dependencia.",esc_codigo=".$escalafon.",gra_codigo=".$grado.",car_codigo=".$cargo.",per_profesion=".$profesion." where personal.per_codigo='".$codigo."'";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  }  
  
  
   
    
      	 public function get_supervisor($aud,$asig)
    { 	
    	if($asig==1){
		  $disponible="and  personal.per_codigo not in(select    
   personal.per_codigo
from
   personal
   inner join equipo_auditoria on (personal.per_codigo = equipo_auditoria.per_codigo)
where
   equipo_auditoria.aud_codigo='".$aud."'
order by
    personal.gra_codigo)";
		  }else{
		  $disponible="";
		  }
    	 
        $sql="select 
   personal.per_codigo,
   grado.gra_descripcion as  grado,
   concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nombre_completo,
   personal.car_codigo,
   cargo_auditor.car_descripcion as cargo
from
   personal
   inner join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
   inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
where
   personal.car_codigo in(50) ".$disponible."
order by
    personal.gra_codigo";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<supervisores>";
    echo "<codigo>".$rs["per_codigo"]."</codigo>";
    echo "<grado>".$rs["grado"]."</grado>";
    echo "<nombre>".$rs["nombre_completo"]."</nombre>";
    echo "<cargo>".$rs["cargo"]."</cargo>";
    echo "</supervisores>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }
  
      	 public function get_auditor($aud,$asig)
    {
    	 
if($asig==1){
		  $disponible="and  personal.per_codigo not in(select    
   personal.per_codigo
from
   personal
   inner join equipo_auditoria on (personal.per_codigo = equipo_auditoria.per_codigo)
where
   equipo_auditoria.aud_codigo='".$aud."'
order by
    personal.gra_codigo)";
		  }else{
		  $disponible="";
		  }
    	 
        $sql="select 
   personal.per_codigo,
   grado.gra_descripcion as  grado,
   concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nombre_completo,
   personal.car_codigo,
   cargo_auditor.car_descripcion as cargo
from
   personal
   inner join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
   inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
where
   personal.car_codigo in(60) ".$disponible."
order by
    personal.gra_codigo";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<auditores>";
    echo "<codigo>".$rs["per_codigo"]."</codigo>";
    echo "<grado>".$rs["grado"]."</grado>";
    echo "<nombre>".$rs["nombre_completo"]."</nombre>";
    echo "<cargo>".$rs["cargo"]."</cargo>";
    echo "</auditores>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }  
  
   public function get_escalafon()
    {    	 	 
        $sql="select esc_codigo, esc_descripcion from escalafon where activo = 1";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<escalafon>";
    echo "<codigo>".$rs["esc_codigo"]."</codigo>";
    echo "<descripcion>".$rs["esc_descripcion"]."</descripcion>";
    echo "</escalafon>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  } 
  
 public function get_grado($escalafonCodigo, $grados)
    {    	 	 
        $sql="select gra_codigo, gra_descripcion from grado where esc_codigo = ". $escalafonCodigo;
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<grado>";
    echo "<codigo>".$rs["gra_codigo"]."</codigo>";
    echo "<descripcion>".$rs["gra_descripcion"]."</descripcion>";
    echo "</grado>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  } 
   
   		public function registra_personal($codigo,$dependencia,$rut,$escalafon,$grado,$cargo,$profesion,$ape1,$ape2,$nom1,$nom2)
	{
		 $activo=1;
		 $filtro=1;
		 //$rep="NULL";
		 //$dato="NULL";
		 
		if($profesion==0 || $profesion==""){
			$pro=1;
			}else{
			$pro=$profesion;
			}

		$sql="insert into personal values('".$codigo."',".$dependencia.",'".$rut."',".$escalafon.",".$grado.",'".$pro."',".$cargo.",'".$ape1."','".$ape2."','".$nom1."','".$nom2."',".$filtro.",".$activo.");";
		$res=mysqli_query(Conectar::con(),$sql);
		//echo $sql;

	}
	
	 	public function insertEvento($codigo,$daincar,$operacion,$modulo,$ip)
	{
	
		$sql="insert into evento
		      values('".$codigo."',".$daincar.",now(),'".$operacion."','".$modulo."','".$ip."');";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  } 
	
	public function verifica_auditoria($auditoria)
    {
        $sql="select
              planificacion_auditoria.aud_codigo
             from
             planificacion_auditoria
             where
              planificacion_auditoria.aud_codigo = '".$auditoria."'";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
       
 if($rs=mysqli_fetch_array($result)){
	echo $rs["aud_codigo"];
 }
 else{
 echo "VACIO";
 }

  } 
  
   public function verifica_funcionario($codigo)
    {
        $sql="select
              personal.per_codigo
             from
             personal
             where
              personal.per_codigo = '".$codigo."'";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
       
 if($rs=mysqli_fetch_array($result)){
	echo $rs["per_codigo"];
 }
 else{
 echo "VACIO";
 }

  } 
  
  public function dato_fichaUsuario($codigo)
    {
    	//echo $codigo;
        $sql="select 
  personal.per_codigo,
  personal.per_rut,
  concat_ws(' ', personal.per_ape1, personal.per_ape2, personal.per_nom1) as nom_completo,
  usuario.tus_codigo,
  personal.daincar_codigo,
  cargo_auditor.car_codigo,
  usuario.tus_codigo,
  escalafon.esc_codigo,
  grado.gra_codigo,
  usuario.us_clave
from
  personal
  inner join grado on (personal.gra_codigo = grado.gra_codigo) and (personal.esc_codigo = grado.esc_codigo)
  inner join escalafon on (grado.esc_codigo = escalafon.esc_codigo)
  left outer join usuario on (personal.per_codigo = usuario.per_cod)
  left outer join estructura_daincar on (personal.daincar_codigo = estructura_daincar.daincar_codigo)
  left outer join cargo_auditor on (personal.car_codigo = cargo_auditor.car_codigo)
where
  personal.per_codigo ='".$codigo."'";
//echo $sql;
$result=mysqli_query(Conectar::con(),$sql);
if($result){
header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<root>";
while($rs=mysqli_fetch_array($result)){
echo "<usuario>";
echo "<codigo>".$rs["per_codigo"]."</codigo>";
echo "<escalafon>".$rs["esc_codigo"]."</escalafon>";
echo "<grado>".$rs["gra_codigo"]."</grado>";
echo "<rut>".$this->formateo_rut($rs["per_rut"])."</rut>";
echo "<nombre>".$rs["nom_completo"]."</nombre>";
echo "<daincarCodigo>".$rs["daincar_codigo"]."</daincarCodigo>";
echo "<cargoCodigo>".$rs["car_codigo"]."</cargoCodigo>";
echo "<tipoUsuario>".$rs["tus_codigo"]."</tipoUsuario>";
echo "<clave>".$rs["us_clave"]."</clave>";
echo "</usuario>";  
}
 echo "</root>";
 }else{
 echo "VACIO";
  }
}


	    public function consulta_planificacion($parametro1,$parametro2,$parametro3,$parametro4,$parametro5)
    {
    
    //echo $parametro1."<br>";
    //echo $parametro2."<br>";
    //echo $parametro3."<br>";
    //echo $parametro4."<br>";
    //echo $parametro5."<br>";
      
if($parametro1!="0" && $parametro2!=""  && $parametro3!=0 && $parametro4!=0 && $parametro5!=0){
    	 $filtro = "where  reparticion.rep_codigo='".$parametro1."' and planificacion_auditoria.aud_nombre='".$parametro2."' and tipo_auditoria.tip_codigo=".$parametro3." and planificacion_auditoria.aud_anno=".$parametro4." and planificacion_auditoria.est_codigo=".$parametro5."";
    	}elseif($parametro1!="0" && $parametro2=="" && $parametro3==0 && $parametro4==0 && $parametro5==0){
    	 $filtro = "where  reparticion.rep_codigo='".$parametro1."'";	
    	}elseif($parametro1=="0" && $parametro2!=""  && $parametro3==0 && $parametro4==0 && $parametro5==0){
    	 $filtro = "where  planificacion_auditoria.aud_nombre='".$parametro2."'";	
    	}elseif($parametro1=="0" && $parametro2=="" && $parametro3!=0 && $parametro4==0 && $parametro5==0){
    	 $filtro = "where  tipo_auditoria.tip_codigo=".$parametro3;	
    	}elseif($parametro1=="0" && $parametro2==""  && $parametro3==0 && $parametro4!=0 && $parametro5==0){
    	 $filtro = "where planificacion_auditoria.aud_anno=".$parametro4;
    	}elseif($parametro1=="0" && $parametro2==""  && $parametro3==0 && $parametro4==0 && $parametro5!=0){
    	$filtro = "where planificacion_auditoria.est_codigo=".$parametro5;
    	}elseif($parametro1!="0" && $parametro2!=""  && $parametro3==0 && $parametro4==0 && $parametro5==0){
    		 $filtro = "where  reparticion.rep_codigo='".$parametro1."' and planificacion_auditoria.aud_nombre='".$parametro2."'";
    	}elseif($parametro1=="0" && $parametro2!=""  && $parametro3!=0 && $parametro4==0 && $parametro5==0){
    		 $filtro = "where  planificacion_auditoria.aud_nombre='".$parametro2."' and tipo_auditoria.tip_codigo=".$parametro3."";
    	}elseif($parametro1=="0" && $parametro2=="" && $parametro3!=0 && $parametro4!=0 && $parametro5==0){
    		$filtro = "where  tipo_auditoria.tip_codigo=".$parametro3." and planificacion_auditoria.aud_anno=".$parametro4."";	
    	}elseif($parametro1=="0" && $parametro2=="" && $parametro3==0 && $parametro4!=0 && $parametro5!=0){
    		$filtro = "where  planificacion_auditoria.aud_anno=".$parametro4." and estado_auditoria.est_codigo=".$parametro5."";	
    	}else{
    		$filtro="planificacion_auditoria.aud_anno=2099";
    	}

	//print_r($_POST);
       $sql="select 
              planificacion_auditoria.aud_codigo,
              planificacion_auditoria.aud_nombre,
               reparticion.rep_descripcion,
               reparticion.rep_codigo,
            planificacion_auditoria.aud_anno,
  tipo_auditoria.tip_descripcion,
  tipo_auditoria.tip_codigo,  
  estado_auditoria.est_descripcion,
  estado_auditoria.est_codigo,
  planificacion_auditoria.equipo
from
  planificacion_auditoria
  inner join reparticion on (planificacion_auditoria.aud_estamento = reparticion.rep_codigo)
  inner join tipo_auditoria on (planificacion_auditoria.tip_codigo= tipo_auditoria.tip_codigo)
  inner join estado_auditoria on (planificacion_auditoria.est_codigo= estado_auditoria.est_codigo)
".$filtro."
order by
planificacion_auditoria.aud_codigo desc";
             $res=mysqli_query(Conectar::con(),$sql);
  //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      //echo "";
	       echo "<div class='mensaje'>";
	       echo "<center>NO SE ECONTRARON COINCIDENCIAS ...</center>";
	       echo "</div>";
        exit();
       }else{
 
       	//echo "<div>";
       	//echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='btn3' id='btn3' title='Nuevo Usuario' value='NUEVO USUARIO' onClick=popup('fichaUsuario2.php'); return false;>";
       	//echo "</div>";
 //echo "<div class='form_contact'>";
 //echo "<div class='texto'><img src='./img/document-archive-icon1.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Interna</div>";
 //echo "<label class='texto'><img src='./img/archive-icon.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Carabineros</label>";
 //echo "<input type='button' id='btnSend' value='Nueva Carpeta' onClick=\"abrirVentanaRepositorio2('index.html')\">";
 //echo "<hr>";
 //echo "</div>";

        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nro.</th>";
        echo "<th>C&Oacute;DIGO</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>ESTAMENTO</th>";
        echo "<th>A&Ntilde;O</th>";
        echo "<th>TIPO DE AUDITORIA</th>";
        echo "<th>ESTADO</th>";
        echo "<th>EQUIPO</th>";
        echo "<th>MODIFICAR ESTADO</th>";
        //echo "<th>ELIMINAR</th>";
         //echo "<td colspan='3'>ACCIONES</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		 //$rowColors = Array('#F1F1F1','#FFFFFF'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
    $i=0;
        while ($row = mysqli_fetch_array($res)){
	   
	    $i++;
	    $this->repositorio[]=$row;
	     //echo $code; 
	     $estado=$row["EST_DESCRIPCION"];
        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["aud_codigo"]."</td>";
        echo "<td>".$row["aud_nombre"]."</td>";
        echo "<td>".$row["rep_descripcion"]."</td>";
        echo "<td>".$row["aud_anno"]."</td>";
        echo "<td>".$row["tip_descripcion"]."</td>";
        if($estado=="PENDIENTE" || $estado=="EJECUCION"){
	     	 echo "<td><font color='red'>".$estado."</font></td>";
	     	}else{
	     	echo "<td>".$estado."</td>";
	     	}
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaEquipoDisponible('fichaPersonalDisponibleConsulta.php?aud=".$row["aud_codigo"]."&asig=".$row["equipo"]."')\"><img src='./img/Groups-Meeting.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaRepositorio3('fichaPlanificacionConsulta.php?cod=".base64_encode($row["aud_codigo"])."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["aud_codigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["aud_codigo"]."'/></td>";
        echo "</tr>";
	    }  
	    echo "</tbody>";
	    echo "</table>";
		 //(self::cantidad_auditoria();
	   return $this->planificacion;
	   //echo "<br>";
	   
      }		

}  

  	 public function combo_estamento2()
    {
        $sql="select 
  planificacion_auditoria.aud_estamento,
  reparticion.rep_descripcion
from
  planificacion_auditoria
  inner join reparticion on (planificacion_auditoria.aud_estamento = reparticion.rep_codigo)
where
  reparticion.activo = 1
order by
  reparticion.rep_codigo";
      // echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<estamento>";
    echo "<codigo>".$rs["aud_estamento"]."</codigo>";
    echo "<descripcion>".$rs["rep_descripcion"]."</descripcion>";
    echo "</estamento>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }
  
  	public function autocompletarNombre2()
	{
		if(isset($_POST["word2"]))
		{
				$sql="select 
              planificacion_auditoria.aud_nombre
              from
             planificacion_auditoria
              where
					    planificacion_auditoria.aud_nombre like '%".$_POST["word2"]."%'
					    order by 
					    planificacion_auditoria.aud_nombre asc
					   "; 
			$result=mysqli_query(Conectar::con(),$sql);
			//echo $sql;
			while($rs=mysqli_fetch_array($result))
			{
			 //$codigo      = $rs["REPARTICION_CODIGO"];
			 $reparticion2 = $rs["aud_nombre"];
				// Mostramos las lineas que se mostrarán en el desplegable. Cada enlace,
				// tiene una funcion javascript que pasa los parámetros necesarios a la
				// función selectItem.
				echo "<a href=\"javascript:selectItem2('".$_POST["idContenido2"]."','".$reparticion2."','".$reparticion2."')\" title='".$reparticion2."'>".$reparticion2."</a><br>";
			}
		}
	}
	
		public function autocompletarProfesion()
	{
		if(isset($_POST["word3"]))
		{
	
				$sql="select
             carrera.carrera_codigo,
             carrera.carrera_descripcion
              from
              carrera 
             where
					    carrera.carrera_descripcion like '%".$_POST["word3"]."%'
					    order by 
					  carrera_descripcion asc"; 
			//}
			$res=mysqli_query(Conectar::con(),$sql);
			//echo $sql;
			while($row=mysqli_fetch_array($res))
			{
			//$idUnidad=$row["DESTACAMENTO_CODIGO"];
			$idCarrera=$row["carrera_codigo"];
			//echo $dato2;
			//$dato=$row["DESTACAMENTO_DESCRIPCION"];
			$dato=$row["carrera_descripcion"];
				// Mostramos las lineas que se mostrarán en el desplegable. Cada enlace
				// tiene una funcion javascript que pasa los parámetros necesarios a la
				// función selectItem
				echo "<a href=\"javascript:selectItem('".$_POST["idContenido3"]."','".$dato."','".$idCarrera."')\" title='$dato'>".$dato."</a><br>";
			}
		}
	}
   
}
?>