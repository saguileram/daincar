<?php
require_once("class_conexion.php");


class Repositorio
{
	private $repositorio;
	private $documento;
	private $verifica;
	
	public function __construct()
	{
		$this->repositorio=array();
		$this->documento=array();
		$this->carpeta=array();
		$this->cantidadAuditoria=array();
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
					    and reparticion.activo=1
					    order by 
					    reparticion.rep_descripcion asc
					    "; 
			$result=mysqli_query(Conectar::con(),$sql);
			//echo $sql;
			while($rs=mysqli_fetch_array($result))
			{
			 $codigo      = $rs["rep_codigo"];
			 $reparticion = $rs["rep_descripcion"];
				// Mostramos las lineas que se mostrarán en el desplegable. Cada enlace,
				// tiene una funcion javascript que pasa los parámetros necesarios a la
				// función selectItem.
				echo "<a href=\"javascript:selectItem('".$_POST["idContenido"]."','".$reparticion."','".$codigo."')\" title='".$reparticion."'>".$reparticion."</a><br>";
			}
		}
	}
	
	public function autocompletarNombre()
	{
		if(isset($_POST["word2"]))
		{
				$sql="select 
              repositorio_auditoria.rep_audnombre
              from
             repositorio_auditoria
              where
					    repositorio_auditoria.rep_audnombre like '%".$_POST["word2"]."%'
					    order by 
					    repositorio_auditoria.rep_audnombre asc
					   "; 
			$result=mysqli_query(Conectar::con(),$sql);
			//echo $sql;
			while($rs=mysqli_fetch_array($result))
			{
			 //$codigo      = $rs["REP_CODIGO"];
			 $reparticion2 = $rs["rep_audnombre"];
				// Mostramos las lineas que se mostrarán en el desplegable. Cada enlace,
				// tiene una funcion javascript que pasa los parámetros necesarios a la
				// función selectItem.
				echo "<a href=\"javascript:selectItem2('".$_POST["idContenido2"]."','".$reparticion2."','".$reparticion2."')\" title='".$reparticion2."'>".$reparticion2."</a><br>";
			}
		}
	}
	
	  public function verifica_carpeta($carpeta)
    {
        $sql="select
              repositorio_auditoria.rep_audcodigo
             from
              repositorio_auditoria
             where
              repositorio_auditoria.rep_audcodigo = '".$carpeta."'";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
       
 if($rs=mysqli_fetch_array($result)){
	echo $rs["rep_audcodigo"];
 }
 else{
 echo "VACIO";
 }

  }   
	
	public function insert_repositorio($codAuditoria,$nomAuditoria,$annoAuditoria,$estamento,$tipoAuditoria,$cantHallazgo)
	{
		$sql="insert into repositorio_auditoria
		      values('".$codAuditoria."','".$nomAuditoria."',".$annoAuditoria.",'".$estamento."',".$tipoAuditoria.",".$cantHallazgo.",now(),0);";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
		$ruta = "../documentos/".$codAuditoria;
    mkdir($ruta, 0777, true);
  } 
  
  public function insertEvento($codigo,$daincar,$operacion,$modulo,$ip)
	{
	
		$sql="insert into evento
		      values('".$codigo."',".$daincar.",now(),'".$operacion."','".$modulo."','".$ip."');";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  } 

    public function lista_repositorio($orden,$perfil)
    {
    if($orden==1){
    	$ordenamiento="repositorio_auditoria.rep_audnombre desc";
    }elseif($orden==2){
    	$ordenamiento="repositorio_auditoria.rep_audanno desc";
    }elseif($orden==3){
    	$ordenamiento="reparticion.rep_descripcion asc";
    }
    else{
    	$ordenamiento="repositorio_auditoria.rep_audanno desc";
    }
	//print_r($_POST);
       $sql="select 
              repositorio_auditoria.rep_audcodigo,
              repositorio_auditoria.rep_audnombre,
               reparticion.rep_descripcion,
            repositorio_auditoria.rep_audanno,
  tipo_auditoria.tip_descripcion,
  repositorio_auditoria.rep_audhallazgo,
  repositorio_auditoria.rep_fechacreacion,
  repositorio_auditoria.activo
from
  repositorio_auditoria
  inner join reparticion on (repositorio_auditoria.rep_audestamento = reparticion.rep_codigo)
    inner join tipo_auditoria on (repositorio_auditoria.rep_audtipo = tipo_auditoria.tip_codigo)
order by
".$ordenamiento."
limit 300
             ";
             $res=mysqli_query(Conectar::con(),$sql);
   //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      //echo "";
        exit();
       }else{
 
       	//echo "<div>";
       	//echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='btn3' id='btn3' title='Nuevo Usuario' value='NUEVO USUARIO' onClick=popup('fichaUsuario2.php'); return false;>";
       	//echo "</div>";
 echo "<div class='form_contact'>";
 //echo "<div class='texto'><img src='./img/document-archive-icon1.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Interna</div>";
// echo "<label class='texto'><img src='./img/archive-icon.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Carabineros</label>";
 echo "<input type='button' id='btnSend' value='Nueva Carpeta' onClick=\"abrirVentanaRepositorio2('fichaRepositorio.php')\">";
 //echo "<hr>";
 echo "</div>";

        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nro.</th>";
        echo "<th>C&Oacute;DIGO</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>ESTAMENTO</th>";
        echo "<th>A&Ntilde;O</th>";
        echo "<th>TIPO DE AUDITORIA</th>";
        echo "<th>HALLAZGOS</th>";
        echo "<th>CARPETA</th>";
        echo "<th>EDITAR</th>";
        echo "<th>ELIMINAR</th>";
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
        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["rep_audcodigo"]."</td>";
        echo "<td>".$row["rep_audnombre"]."</td>";
        echo "<td>".$row["rep_descripcion"]."</td>";
        echo "<td>".$row["rep_audanno"]."</td>";
        echo "<td>".$row["tip_descripcion"]."</td>";
        echo "<td>".$row["rep_audhallazgo"]."</td>";
       // echo "<td>".cantidad_documento()."</td>";
       //if($row["ACTIVO"]==0){
       // echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('docu.php?cod=".$row["REP_AUDCODIGO"]."')\"><img src='./img/Places-folder-icon.png' border='0' align='middle' alt='Carpeta-".$row["REP_AUDCODIGO"]."'/></a><input type='hidden' id='codUsuario' value='".$row["REP_AUDCODIGO"]."'/></td>";
       //}else{
       	echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaDocumento.php?cod=".base64_encode($row["rep_audcodigo"])."')\"><img src='./img/Places-folder-documents-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."'/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
       //	}
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaRepositorio2('fichaRepositorioMod.php?cod=".base64_encode($row["rep_audcodigo"])."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"eliminaCarpeta('".$code."');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='carpetaB' value='".$row["REP_AUDCODIGO"]."'/></td>";
       if($perfil==30){
        echo "<td><a href='javascript:void(0);' onclick=\"alert('ACCESO RESTRINGIDO ...')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
       }else{
       	echo "<td><a href='javascript:void(0);' onclick=\"verificaEliminaCarpeta('".$row['rep_audcodigo']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
       }
        //echo "<td><a href='javascript:void(0);' onclick=\"eliminaCarpeta('".$row['REP_AUDCODIGO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"verificaDocumento('carpetaBD');\"><img src='./img/Adobe-PDF-Document-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='text' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
      // echo "<td><a href='javascript:void(0);' onClick=\"eliminaDocumento('carpetaBD','documentoBD');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='documentoBD' value='".$row["DOC_NOMARCHIVO"]."'/><input type='hidden' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteUsuario('codUsuario');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' id='codUsuario' value='".$row["PER_CODIGO"]."'/></td>";
        //echo "<td><a href=\"datosUsuario.php?cod=".base64_encode($row["REP_AUDCODIGO"])."\" onClick=\"popup('datosUsuario.php?cod=".base64_encode($row["REP_AUDCODIGO"])."'); return false;\"><img src='./img/editar.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "</tr>";
	    }  
	    echo "</tbody>";
	    echo "</table>";
		 //self::cantidad_auditoria();
	   return $this->repositorio;
	   echo "<br>";
	   
      }		

}

	public function insert_documento($codAuditoria,$nomDocumento,$descDocumento,$tipoDocumento,$otroInforme,$archivo,$extension)
	{
		$ruta= $codAuditoria."/".$archivo;
		$sql="insert into documento_auditoria
		      values('".$codAuditoria."','".$nomDocumento."','".$descDocumento."',".$tipoDocumento.",'".$otroInforme."','".$archivo."','".$extension."','".$ruta."',now());";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  } 

public function lista_documento($codAuditoria,$perfil)
    {
		//$cod=base64_decode($_POST["cod"]);
		//$cod1=$_POST["cod"];
		//echo $cod;
	//print_r($_POST);
       $sql="select 
  documento_auditoria.rep_audcodigo,
  documento_auditoria.doc_nombre,
  documento_auditoria.doc_descripcion,
  tipo_informe.tip_descripcion,
  documento_auditoria.doc_otroinforme,
  tipo_informe.tip_codinfforme,
  documento_auditoria.doc_nomarchivo,
  documento_auditoria.doc_extension,
  date_format(documento_auditoria.doc_fechacreacion,'%d/%m/%y %h:%i:%s') as fecha_creacion,
  repositorio_auditoria.activo
 from
  documento_auditoria
  inner join  repositorio_auditoria on (documento_auditoria.rep_audcodigo =  repositorio_auditoria.rep_audcodigo)
  inner join tipo_informe on (documento_auditoria.doc_tipoinforme = tipo_informe.tip_codinfforme)
where
  documento_auditoria.rep_audcodigo = '".$codAuditoria."'";
             $res=mysqli_query(Conectar::con(),$sql);
   //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      echo "";
        exit();
       }else{
       	echo "<br>";
       	//echo "<div style='text-align: left;'>";
       	//echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='btn3' id='btn3' title='Nuevo Usuario' value='NUEVO USUARIO' onClick=popup('fichaUsuario2.php'); return false;>";
       	//echo "</div>";
       	echo "<div class='lineaDatos1'>";
       	echo "<b>DOCUMENTOS ASOCIADOS:&nbsp;</b>";
       	$cantidad=self::cantidad_documento($codAuditoria);
       	echo "</div>";
       
       if($cantidad==0){
	      self::update_estado($codAuditoria);
	    }
       	echo "<br>";
 //  echo "DOCUMENTOS ASOCIADOS:&nbsp;".self::cantidad_documento($codAuditoria)."";
	      echo "<br>";
        echo "<table>";
         echo "<thead>";
         echo "<tr>";
         echo "<th>Nro.</th>";
         //echo "<td>NOMBRE</td>";
         echo "<th>DESCRIPCI&Oacute;N</th>";
         echo "<th>TIPO DE INFORME</th>";
         echo "<th>ARCHIVO</th>";
         echo "<th>FECHA DE CREACION</th>";
         echo "<th>ELIMINAR</th>";
         //echo "<td colspan='2'>ACCIONES</td>";
         echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		 $rowColors = Array('#F1F1F1','#FFFFFF'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
    $i=0;
        while ($row = mysqli_fetch_array($res)){
	    $i++;
	    $this->documento[]=$row;

        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        //echo "<td>".$row["DOC_NOMBRE"]."</td>";
        echo "<td>".$row["doc_descripcion"]."</td>";
        if($row["tip_codinfforme"]==60){
        echo "<td>".$row["doc_otroinforme"]."</td>";
        }else{
        echo "<td>".$row["tip_descripcion"]."</td>";
        }
       if($row["doc_extension"]==".DOC" ||  $row["doc_extension"]==".DOCX"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/palabra.png' border='0'> </a></td>";
       }elseif($row["doc_extension"]==".XLS" || $row["doc_extension"]==".XLSX"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/sobresalir1.png' border='0'> </a></td>";
       }elseif($row["doc_extension"]==".PDF"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/pdf1.png' border='0'> </a></td>";
       }elseif($row["doc_extension"]==".PPT" || $row["doc_extension"]==".PPTX"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/powerpoint.png' border='0'> </a></td>";
       }else {
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/text-icon.png' border='0'> </a></td>";
       }
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteUsuario('codUsuario');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' id='codUsuario' value='".$row["PER_CODIGO"]."'/></td>";
        //echo "<td><a href=\"datosUsuario.php?cod=".base64_encode($row["PER_CODIGO"])."\" onClick=\"popup('datosUsuario.php?cod=".base64_encode($row["PER_CODIGO"])."'); return false;\"><img src='./img/editar.png' border='0' align='middle' alt='Ver'/></a></td>";
        //echo "<td><a href='./documentos/".$row["REP_AUDCODIGO"]."/".$row["DOC_NOMARCHIVO"]."' target='_blank'><img src='img/eliminar.jpg' width='28' height='28' border='0'> </a></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"eliminaDocumento('carpetaBD','documentoBD');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='documentoBD' value='".$row["DOC_NOMARCHIVO"]."'/><input type='hidden' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
        echo "<td>".$row["fecha_creacion"]."</td>";
        if($perfil==30){
        echo "<td><a href='javascript:void(0);' onclick=\"alert('ACCESO RESTRINGIDO ...')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        }else{
        	echo "<td><a href='javascript:void(0);' onclick=\"eliminaDocumento('".$row['rep_audcodigo']."','".$row['doc_nomarchivo']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        	}
        echo "</tr>";
	    }  
	     echo "</tbody>";
	    echo "</table>";
		echo "<br>";
	   return $this->documento;
      }	
    }		
    
   public function eliminar_documento($carpeta,$documento)
	{
		$archivo="../documentos/".$carpeta."/".$documento;
		//echo $archivo;
		$sql="delete
		     from 
		      documento_auditoria
         where 
          documento_auditoria.doc_nomarchivo = '".$documento."'";
		$result=mysqli_query(Conectar::con(),$sql);
		unlink($archivo);
		//echo $sql;
	}
	
	 public function cantidad_auditoria()
	{
		$sql="select
          count(*) as cant_auditorias
         from
          repositorio_auditoria";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;
    echo "<table border='0' width='68%' align='center'>";
    while ($rs = mysqli_fetch_array($result)){
    echo "<tr class='lineaDatos1'>"; 		
    echo "<td><b>AUDITORIAS REGISTRADAS:</b>&nbsp;".$rs["cant_auditorias"]."</td>";
    echo "</tr>";
	  }  
	  echo "</table>";  		
	}
	
	 public function formateo_rut($rut_param)
	 { 
     $parte4 = substr($rut_param, -1); // seria solo el numero verificador 
     $parte3 = substr($rut_param, -4,3); // la cuenta va de derecha a izq  
     $parte2 = substr($rut_param, -7,3);  
     $parte1 = substr($rut_param, 0,-7); //de esta manera toma todos los caracteres desde el 8 hacia la izq 
     
     return $parte1.".".$parte2.".".$parte3."-".$parte4; 
   } 
   
    public function busca_repositorio($nombre,$orden)
    {
    	    if($orden==1){
    	$ordenamiento="repositorio_auditoria.rep_audnombre desc";
    }elseif($orden==2){
    	$ordenamiento="repositorio_auditoria.rep_audanno desc";
    }elseif($orden==3){
    	$ordenamiento="reparticion.rep_descripcion desc";
    }else{
    	$ordenamiento="repositorio_auditoria.rep_audcodigo";
    }
	//print_r($_POST);
       $sql="select 
              repositorio_auditoria.rep_audcodigo,
              repositorio_auditoria.rep_audnombre,
               reparticion.rep_descripcion,
            repositorio_auditoria.rep_audanno,
  tipo_auditoria.tip_descripcion,
  repositorio_auditoria.rep_audhallazgo,
  repositorio_auditoria.rep_fechacreacion,
  repositorio_auditoria.activo
from
  repositorio_auditoria
  inner join reparticion on (repositorio_auditoria.rep_audestamento = reparticion.rep_codigo)
    inner join tipo_auditoria on (repositorio_auditoria.rep_audtipo = tipo_auditoria.tip_codigo)
where repositorio_auditoria.rep_audnombre like '%".$nombre."%'
order by
".$ordenamiento."
limit 25

             ";
             $res=mysqli_query(Conectar::con(),$sql);
   //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      echo "";
        exit();
       }else{
       	echo "<br>";
       	//echo "<div style='text-align: left;'>";
       	//echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='btn3' id='btn3' title='Nuevo Usuario' value='NUEVO USUARIO' onClick=popup('fichaUsuario2.php'); return false;>";
       	//echo "</div>";
	      //echo "<br>";
	             	echo "<table border='0' width='20%' align='right'>";
	      echo "<tr>";
        echo "<td><input type='submit' name='btn3' id='btn3' title='Nuevo Usuario' value='CREAR CARPETA' onclick=abrirVentanaRepositorio('fichaCarpetaAuditoria.php');></td>";
        echo "</tr>";
        echo "</table>";
        echo "<br>";
        echo "<br>";
         echo "<br>";
        echo "<table border='0' width='75%' cellspacing='1' cellpadding='1' align='center'>";
                 echo "<tr align='center'>";
         echo "<td colspan='9'>RPEOSITORIO DIRECCION AUDITORIA INTERNA (DAICAR)</td>";
         echo "</tr>";
         echo "<tr class='lineaDatos2' align='center'>";
         echo "<td>N&#176;</td>";
         echo "<td>C&Oacute;DIGO</td>";
         echo "<td>NOMBRE</td>";
         echo "<td>ESTAMENTO</td>";
         echo "<td>ANNO</td>";
          echo "<td>HALLAZGOS</td>";
         //echo "<td>CARPETA</td>";
                  echo "<td>CARPETA</td>";
         echo "<td>EDITAR</td>";
         echo "<td>ELIMINAR</td>";
         //echo "<td colspan='2'>ACCIONES</td>";
         echo "</tr>";
		 $rowColors = Array('#FFFFFF','#E9EAED'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
    $i=0;
        while ($row = mysqli_fetch_array($res)){
	    $i++;
	    $this->repositorio[]=$row;
        echo "<tr id='marca' style='background-color:".$rowColors[$nRow++ % count($rowColors)].";' align='center' class='lineaDatos1'>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["rep_audcodigo"]."</td>";
        echo "<td>".$row["rep_audnombre"]."</td>";
        echo "<td>".$row["rep_descripcion"]."</td>";
        echo "<td>".$row["rep_audanno"]."</td>";
        echo "<td>".$row["rep_audhallazgo"]."</td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaDocumentoAuditoria.php?cod=".$row["REP_AUDCODIGO"]."')\"><img src='./img/Places-folder-blue-icon.png' border='0' align='middle' alt='Carpeta-".$row["REP_AUDCODIGO"]."'/></a><input type='hidden' id='codUsuario' value='".$row["REP_AUDCODIGO"]."'/></td>";
         if($row["ACTIVO"]==0){
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaDocumentoAuditoria.php?cod=".$row["rep_audcodigo"]."')\"><img src='./img/Places-folder-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."'/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
       }else{
       	echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaDocumentoAuditoria.php?cod=".$row["rep_audcodigo"]."')\"><img src='./img/Places-folder-documents-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."'/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
       	}
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaModCarpetaAuditoria.php?cod=".$row["rep_audcodigo"]."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
         echo "<td><a href='javascript:void(0);' onclick=\"eliminaCarpeta('".$row['rep_audcodigo']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
         //echo "<td><a href='javascript:void(0);' onClick=\"eliminaCarpeta('carpetaB');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='carpetaB' value='".$row["REP_AUDCODIGO"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteUsuario('codUsuario');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' id='codUsuario' value='".$row["PER_CODIGO"]."'/></td>";
        //echo "<td><a href=\"datosUsuario.php?cod=".base64_encode($row["PER_CODIGO"])."\" onClick=\"popup('datosUsuario.php?cod=".base64_encode($row["PER_CODIGO"])."'); return false;\"><img src='./img/editar.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "</tr>";
	    }  
	    echo "</table>";
		 // echo "<br>";
		 if($nombre!=""){
		 self::coincidencia($nombre);
	 }else{
	 	self::cantidad_auditoria();
	 }
	   return $this->repositorio;
	   //echo "<br>";
	   
      }		

}

	 public function coincidencia($nombre)
	{
		$sql="Select
          count(*) as cant_encontradas
         from
          repositorio_auditoria
         where
          repositorio_auditoria.rep_audnombre like '%".$nombre."%'";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;
    echo "<table border='0' align='center'>";
    while ($rs = mysqli_fetch_array($result)){
    echo "<tr>"; 		
    echo "<td>COINCIDENCIAS:&nbsp;".$rs["cant_encontradas"]."</td>";
    echo "</tr>";
	  }  
	  echo "</table>";  		
	}
	
		 public function cantidad_documento($carpeta)
	{
		$sql="select
          count(*) as cant_documentos
         from
          documento_auditoria
         where
          documento_auditoria.rep_audcodigo='".$carpeta."'";
		$result=mysqli_query(Conectar::con(),$sql);
	 //if($result!=0){
	//echo $sql;

    while ($rs = mysqli_fetch_array($result)){

      echo $rs["cant_documentos"];

	  }  

	//}else{
	//	echo "VACIO";
	 //}
	}
	
	 public function eliminar_carpeta($carpeta)
	{
		$ruta="../documentos/".$carpeta;
		//echo $ruta;
		$sql="delete
		     from 
		      repositorio_auditoria
         where 
          repositorio_auditoria.rep_audcodigo = '".$carpeta."'";
		$result=mysqli_query(Conectar::con(),$sql);
		rmdir($ruta);
		//echo $sql;
	}
	
	 public function dato_carpeta($carpeta)
    {
    	 
        $sql="select
              repositorio_auditoria.rep_audcodigo,
              repositorio_auditoria.rep_audnombre,
              repositorio_auditoria.rep_audanno,
              repositorio_auditoria.rep_audestamento,
              reparticion.rep_descripcion,
              tipo_auditoria.tip_codigo,
              repositorio_auditoria.rep_audhallazgo
             from
              repositorio_auditoria
              inner join reparticion on (repositorio_auditoria.rep_audestamento = reparticion.rep_codigo)
              inner join tipo_auditoria on (repositorio_auditoria.rep_audtipo = tipo_auditoria.tip_codigo)
             where
              repositorio_auditoria.rep_audcodigo='".$carpeta."'";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<carpeta>";
    echo "<codigo>".$rs["rep_audcodigo"]."</codigo>";
    echo "<nombre>".$rs["rep_audnombre"]."</nombre>";
    echo "<anno>".$rs["rep_audanno"]."</anno>";
    echo "<codEstamento>".$rs["rep_audestamento"]."</codEstamento>";
    echo "<estamento>".$rs["rep_descripcion"]."</estamento>";
    echo "<hallazgo>".$rs["rep_audhallazgo"]."</hallazgo>";
    echo "<tipoAuditoria>".$rs["tip_codigo"]."</tipoAuditoria>";
    echo "</carpeta>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }

  	public function update_repositorio($codAuditoria,$nomAuditoria,$annoAuditoria,$estamento,$tipoAuditoria,$cantHallazgo)
	{
		$sql="update repositorio_auditoria set rep_audnombre='".$nomAuditoria."', rep_audanno=".$annoAuditoria.",rep_audestamento='".$estamento."',
		      rep_audtipo=".$tipoAuditoria.", rep_audhallazgo=".$cantHallazgo." where repositorio_auditoria.rep_audcodigo='".$codAuditoria."'";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  }  
  
  public function verifica_carpetita($carpeta)
    {
        $sql="select
          documento_auditoria.rep_audcodigo
         from
          documento_auditoria
         where
          documento_auditoria.rep_audcodigo = '".$carpeta."'";
       echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
       
 if($rs=mysqli_fetch_array($result)){
	echo $rs["rep_audcodigo"];
 }
 else{
 echo "VACIO";
 }
} 

  public function update_estado($codAuditoria)
	{
		$sql="update repositorio_auditoria set activo=1 
		     where repositorio_auditoria.rep_audcodigo='".$codAuditoria."'";
		$result=mysqli_query(Conectar::con(),$sql);
		//echo $sql;	
  }  
  
  
  public function lista_anno($anno)
    {

	//print_r($_POST);
       $sql="select 
              repositorio_auditoria.rep_audcodigo,
              repositorio_auditoria.rep_audnombre,
               reparticion.rep_descripcion,
            repositorio_auditoria.rep_audanno,
  tipo_auditoria.tip_descripcion,
  repositorio_auditoria.rep_audhallazgo,
  repositorio_auditoria.rep_fechacreacion,
  repositorio_auditoria.activo
from
  repositorio_auditoria
  inner join reparticion on (repositorio_auditoria.rep_audestamento = reparticion.rep_codigo)
    inner join tipo_auditoria on (repositorio_auditoria.rep_audtipo = tipo_auditoria.tip_codigo)
    where rep_audanno = ".$anno."
order by
repositorio_auditoria.rep_audnombre

             ";
             $res=mysqli_query(Conectar::con(),$sql);
   //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      //echo "";
        exit();
       }else{
 
       	//echo "<div>";
       	//echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='btn3' id='btn3' title='Nuevo Usuario' value='NUEVO USUARIO' onClick=popup('fichaUsuario2.php'); return false;>";
       	//echo "</div>";
 //echo "<div class='form_contact'>";
 //echo "<div class='texto'><img src='./img/document-archive-icon1.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Interna</div>";
 //echo "<label class='texto'><img src='./img/archive-icon.png' class='alineadoTextoImagenCentro' border='0'/>&nbsp;Repositorio Auditoria Interna</label>";
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
        echo "<th>HALLAZGOS</th>";
        echo "<th>CARPETA</th>";
        echo "<th>EDITAR</th>";
        echo "<th>ELIMINAR</th>";
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
        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["rep_audcodigo"]."</td>";
        echo "<td>".$row["rep_audnombre"]."</td>";
        echo "<td>".$row["rep_descripcion"]."</td>";
        echo "<td>".$row["rep_audanno"]."</td>";
        echo "<td>".$row["tip_descripcion"]."</td>";
        echo "<td>".$row["rep_audhallazgo"]."</td>";
       // echo "<td>".cantidad_documento()."</td>";
       if($row["ACTIVO"]==0){
       echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaDocumento.php?cod=".$row["rep_audcodigo"]."')\"><img src='./img/Places-folder-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."'/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
       }else{
       	echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaDocumento.php?cod=".$row["rep_audcodigo"]."')\"><img src='./img/Places-folder-documents-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."'/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
       	}
        echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaRepositorio2('mod.php?cod=".$row["rep_audcodigo"]."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"eliminaCarpeta('".$code."');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='carpetaB' value='".$row["REP_AUDCODIGO"]."'/></td>";
        echo "<td><a href='javascript:void(0);' onclick=\"verificaEliminaCarpeta('".$row['rep_audcodigo']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        //echo "<td><a href='javascript:void(0);' onclick=\"eliminaCarpeta('".$row['REP_AUDCODIGO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"verificaDocumento('carpetaBD');\"><img src='./img/Adobe-PDF-Document-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='text' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
      // echo "<td><a href='javascript:void(0);' onClick=\"eliminaDocumento('carpetaBD','documentoBD');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='documentoBD' value='".$row["DOC_NOMARCHIVO"]."'/><input type='hidden' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteUsuario('codUsuario');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' id='codUsuario' value='".$row["PER_CODIGO"]."'/></td>";
        //echo "<td><a href=\"datosUsuario.php?cod=".base64_encode($row["REP_AUDCODIGO"])."\" onClick=\"popup('datosUsuario.php?cod=".base64_encode($row["REP_AUDCODIGO"])."'); return false;\"><img src='./img/editar.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "</tr>";
	    }  
	    echo "</tbody>";
	    echo "</table>";
		 //self::cantidad_auditoria();
	   return $this->repositorio;
	   echo "<br>";
	   
      }		

}
  
  	
	    public function consulta_repositorio($parametro1,$parametro2,$parametro3,$parametro4)
    {
    
    //echo $parametro1;
    //echo $parametro2;
    //echo $parametro3;
    //echo $parametro4;
      
if($parametro1!="0" && $parametro2!=""  && $parametro3!=0 && $parametro4!=0){
    	 $filtro = "where  reparticion.rep_codigo='".$parametro1."' and repositorio_auditoria.rep_audnombre='".$parametro2."' and tipo_auditoria.tip_codigo=".$parametro3." and repositorio_auditoria.rep_audanno=".$parametro4." ";
    	}elseif($parametro1!="0" && $parametro2=="" && $parametro3==0 && $parametro4==0){
    	 $filtro = "where  reparticion.rep_codigo='".$parametro1."'";	
    	}elseif($parametro1=="0" && $parametro2!=""  && $parametro3==0 && $parametro4==0){
    	 $filtro = "where  repositorio_auditoria.rep_audnombre='".$parametro2."'";	
    	}elseif($parametro1=="0" && $parametro2=="" && $parametro3!=0 && $parametro4==0){
    	 $filtro = "where  tipo_auditoria.tip_codigo=".$parametro3;	
    	}elseif($parametro1=="0" && $parametro2==""  && $parametro3==0 && $parametro4!=0){
    	 $filtro = "where  repositorio_auditoria.rep_audanno=".$parametro4;
    	}elseif($parametro1!="0" && $parametro2!=""  && $parametro3==0 && $parametro4==0){
    		 $filtro = "where  reparticion.rep_codigo='".$parametro1."' and repositorio_auditoria.rep_audnombre='".$parametro2."'";
    	}elseif($parametro1=="0" && $parametro2!=""  && $parametro3!=0 && $parametro4==0){
    		 $filtro = "where  repositorio_auditoria.rep_audnombre='".$parametro2."' and tipo_auditoria.tip_codigo=".$parametro3."";
    	}elseif($parametro1=="0" && $parametro2=="" && $parametro3!=0 && $parametro4!=0){
    		$filtro = "where  tipo_auditoria.tip_codigo=".$parametro3." and repositorio_auditoria.rep_audanno=".$parametro4."";	
    	}elseif($parametro1!="0" && $parametro2!=""  && $parametro3!=0 && $parametro4==0){
    		$filtro = "where  reparticion.rep_codigo='".$parametro1."' and tipo_auditoria.tip_codigo=".$parametro3."";
    	}elseif($parametro1=="0" && $parametro2!=""  && $parametro3!=0 && $parametro4!=0){
    		$filtro = "where  repositorio_auditoria.rep_audnombre='".$parametro2."' and tipo_auditoria.tip_codigo=".$parametro3." and repositorio_auditoria.rep_audanno=".$parametro4."";
    	}

	//print_r($_POST);
       $sql="select 
              repositorio_auditoria.rep_audcodigo,
              repositorio_auditoria.rep_audnombre,
               reparticion.rep_descripcion,
              reparticion.rep_codigo,
            repositorio_auditoria.rep_audanno,
  tipo_auditoria.tip_descripcion,
  tipo_auditoria.tip_codigo,
  repositorio_auditoria.rep_audhallazgo,
  repositorio_auditoria.rep_fechacreacion,
  repositorio_auditoria.activo
from
  repositorio_auditoria
  inner join reparticion on (repositorio_auditoria.rep_audestamento = reparticion.rep_codigo)
    inner join tipo_auditoria on (repositorio_auditoria.rep_audtipo = tipo_auditoria.tip_codigo)
".$filtro."
order by
repositorio_auditoria.rep_audcodigo desc";
             $res=mysqli_query(Conectar::con(),$sql);
  //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      //echo "";
	       echo "<div class='mensaje'>";
	       echo "<center>Registros no encontrados</center>";
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
        echo "<th>HALLAZGOS</th>";
        echo "<th>CARPETA</th>";
        //echo "<th>EDITAR</th>";
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
        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        echo "<td>".$row["rep_audcodigo"]."</td>";
        echo "<td>".$row["rep_audnombre"]."</td>";
        echo "<td>".$row["rep_descripcion"]."</td>";
        echo "<td>".$row["rep_audanno"]."</td>";
        echo "<td>".$row["tip_descripcion"]."</td>";
        echo "<td>".$row["rep_audhallazgo"]."</td>";
       // echo "<td>".cantidad_documento()."</td>";
       //if($row["ACTIVO"]==0){
       // echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('docu.php?cod=".$row["REP_AUDCODIGO"]."')\"><img src='./img/Places-folder-icon.png' border='0' align='middle' alt='Carpeta-".$row["REP_AUDCODIGO"]."'/></a><input type='hidden' id='codUsuario' value='".$row["REP_AUDCODIGO"]."'/></td>";
       //}else{
       	echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaDocumento('fichaDocumentoConsulta.php?cod=".$row["rep_audcodigo"]."')\"><img src='./img/Places-folder-documents-icon.png' border='0' align='middle' alt='Carpeta-".$row["rep_audcodigo"]."'/></a><input type='hidden' id='codUsuario' value='".$row["rep_audcodigo"]."'/></td>";
       //	}
       //echo "<td><a href='javascript:void(0);' onClick=\"abrirVentanaRepositorio2('mod.php?cod=".$row["REP_AUDCODIGO"]."')\"><img src='./img/Pencil-icon.png' border='0' align='middle' alt='Carpeta-".$row["REP_AUDCODIGO"]."' height='' width=''/></a><input type='hidden' id='codUsuario' value='".$row["REP_AUDCODIGO"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"eliminaCarpeta('".$code."');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='carpetaB' value='".$row["REP_AUDCODIGO"]."'/></td>";
       //echo "<td><a href='javascript:void(0);' onclick=\"verificaEliminaCarpeta('".$row['REP_AUDCODIGO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        //echo "<td><a href='javascript:void(0);' onclick=\"eliminaCarpeta('".$row['REP_AUDCODIGO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"verificaDocumento('carpetaBD');\"><img src='./img/Adobe-PDF-Document-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='text' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
      // echo "<td><a href='javascript:void(0);' onClick=\"eliminaDocumento('carpetaBD','documentoBD');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='documentoBD' value='".$row["DOC_NOMARCHIVO"]."'/><input type='hidden' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteUsuario('codUsuario');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' id='codUsuario' value='".$row["PER_CODIGO"]."'/></td>";
        //echo "<td><a href=\"datosUsuario.php?cod=".base64_encode($row["REP_AUDCODIGO"])."\" onClick=\"popup('datosUsuario.php?cod=".base64_encode($row["REP_AUDCODIGO"])."'); return false;\"><img src='./img/editar.png' border='0' align='middle' alt='Ver'/></a></td>";
        echo "</tr>";
	    }  
	    echo "</tbody>";
	    echo "</table>";
		 //(self::cantidad_auditoria();
	   return $this->repositorio;
	   //echo "<br>";
	   
      }		

}  

	 public function combo_nombre()
    {
    	 
        $sql="select 
  repositorio_auditoria.rep_audnombre
from
  repositorio_auditoria";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<combo>";
    echo "<nombre>".$rs["rep_audnombre"]."</nombre>";
    echo "</combo>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }
  
  	 public function combo_estamento()
    {
    	 
        $sql="select 
  repositorio_auditoria.rep_audestamento,
  reparticion.rep_descripcion
from
  repositorio_auditoria
  inner join reparticion on (repositorio_auditoria.rep_audestamento = reparticion.rep_codigo)
where
  reparticion.activo = 1
order by
  reparticion.rep_codigo";
       //echo $sql;
       $result=mysqli_query(Conectar::con(),$sql);
  if($result){
	header ("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  echo "<root>";
 while($rs=mysqli_fetch_array($result)){
    echo "<estamento>";
    echo "<codigo>".$rs["rep_audestamento"]."</codigo>";
    echo "<descripcion>".$rs["rep_descripcion"]."</descripcion>";
    echo "</estamento>";  
}
 echo "</root>";
 }else{
   echo "VACIO";
 }

  }
  
  public function lista_documento2($codAuditoria)
    {
		//$cod=base64_decode($_POST["cod"]);
		//$cod1=$_POST["cod"];
		//echo $cod;
	//print_r($_POST);
       $sql="select 
  documento_auditoria.rep_audcodigo,
  documento_auditoria.doc_nombre,
  documento_auditoria.doc_descripcion,
  tipo_informe.tip_descripcion,
  documento_auditoria.doc_otroinforme,
  tipo_informe.tip_codinfforme,
  documento_auditoria.doc_nomarchivo,
  documento_auditoria.doc_extension,
  repositorio_auditoria.activo
 from
  documento_auditoria
  inner join  repositorio_auditoria on (documento_auditoria.rep_audcodigo =  repositorio_auditoria.rep_audcodigo)
  inner join tipo_informe on (documento_auditoria.doc_tipoinforme = tipo_informe.tip_codinfforme)
where
  documento_auditoria.rep_audcodigo = '".$codAuditoria."'";
             $res=mysqli_query(Conectar::con(),$sql);
   //echo $sql;
	// verificamos que no haya error 
       if (! $res){
       //echo "<script type='text/javascript'>alert('Ingrese fechas a Desvalidar.');</script>";
	   
	      echo "";
        exit();
       }else{
       	echo "<br>";
       	//echo "<div style='text-align: left;'>";
       	//echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='btn3' id='btn3' title='Nuevo Usuario' value='NUEVO USUARIO' onClick=popup('fichaUsuario2.php'); return false;>";
       	//echo "</div>";
       	echo "<div class='lineaDatos1'>";
       	echo "<b>DOCUMENTOS ASOCIADOS:&nbsp;</b>";
       	$cantidad=self::cantidad_documento($codAuditoria);
       	echo "</div>";
       
       if($cantidad==0){
	      self::update_estado($codAuditoria);
	    }
       	echo "<br>";
 //  echo "DOCUMENTOS ASOCIADOS:&nbsp;".self::cantidad_documento($codAuditoria)."";
	      echo "<br>";
        echo "<table>";
         echo "<thead>";
         echo "<tr>";
         echo "<th>Nro.</th>";
         //echo "<td>NOMBRE</td>";
         echo "<th>DESCRIPCI&Oacute;N</th>";
         echo "<th>TIPO DE INFORME</th>";
         echo "<th>ARCHIVO</th>";
         //echo "<th>ELIMINAR</th>";
         //echo "<td colspan='2'>ACCIONES</td>";
         echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		 $rowColors = Array('#F1F1F1','#FFFFFF'); $nRow = 0; 
    //obtenemos los datos resultado de la consulta 
    $i=0;
        while ($row = mysqli_fetch_array($res)){
	    $i++;
	    $this->documento[]=$row;

        echo "<tr>"; 		
        echo "<td>".$i."</td>";
        //echo "<td>".$row["DOC_NOMBRE"]."</td>";
        echo "<td>".$row["doc_descripcion"]."</td>";
        if($row["tip_codinfforme"]==60){
        echo "<td>".$row["doc_otroinforme"]."</td>";
        }else{
        echo "<td>".$row["TIP_DESCRIPCION"]."</td>";
        }
       if($row["doc_extension"]==".DOC" ||  $row["doc_extension"]==".DOCX"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/palabra.png' border='0'> </a></td>";
       }elseif($row["doc_extension"]==".XLS" || $row["doc_extension"]==".XLSX"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/sobresalir1.png' border='0'> </a></td>";
       }elseif($row["doc_extension"]==".PDF"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/pdf1.png' border='0'> </a></td>";
       }elseif($row["doc_extension"]==".PPT" || $row["doc_extension"]==".PPTX"){
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/powerpoint.png' border='0'> </a></td>";
       }else {
        echo "<td><a href='./documentos/".$row["rep_audcodigo"]."/".$row["doc_nomarchivo"]."' target='_blank'><img src='img/text-icon.png' border='0'> </a></td>";
       }
        //echo "<td><a href='javascript:void(0);' onClick=\"deleteUsuario('codUsuario');\"><img src='./img/eliminar.png' border='0' align='middle' alt='Ver'/></a><input type='hidden' id='codUsuario' value='".$row["PER_CODIGO"]."'/></td>";
        //echo "<td><a href=\"datosUsuario.php?cod=".base64_encode($row["PER_CODIGO"])."\" onClick=\"popup('datosUsuario.php?cod=".base64_encode($row["PER_CODIGO"])."'); return false;\"><img src='./img/editar.png' border='0' align='middle' alt='Ver'/></a></td>";
        //echo "<td><a href='./documentos/".$row["REP_AUDCODIGO"]."/".$row["DOC_NOMARCHIVO"]."' target='_blank'><img src='img/eliminar.jpg' width='28' height='28' border='0'> </a></td>";
        //echo "<td><a href='javascript:void(0);' onClick=\"eliminaDocumento('carpetaBD','documentoBD');\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a><input type='hidden' id='documentoBD' value='".$row["DOC_NOMARCHIVO"]."'/><input type='hidden' id='carpetaBD' value='".$row["REP_AUDCODIGO"]."'/></td>";
        //echo "<td><a href='javascript:void(0);' onclick=\"eliminaDocumento('".$row['REP_AUDCODIGO']."','".$row['DOC_NOMARCHIVO']."')\"><img src='./img/Actions-edit-delete-icon.png' border='0' align='middle' alt='Eliminar'/></a></td>";
        echo "</tr>";
	    }  
	     echo "</tbody>";
	    echo "</table>";
		echo "<br>";
	   return $this->documento;
      }	
    }	
	
}



 
