<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();
$id=$_GET['id'];
$bdirs=$bd->ejecutar("select * from directorio where id=$id");
$kdire=@$bd->obtener_fila($bdirs,0);

 
function obtenerext($archivo)
{  $ext='';
	for ($i=1;$i<=strlen($archivo);$i++)
	{   if ($archivo[$i]=='.'){
		for ($j=$i;$j<=strlen($archivo);$j++)
		{ $ext=$ext.$archivo[$j];			
		}
		}} 
		$ext = strtolower($ext); 
		return $ext;	
}

 
 
 

$enviar2=$_POST['Agregar'];
		if (!empty($enviar2)) {

       
 

$nombre_archivo2 = $_FILES['userfile2']['name']; 
$tipo_archivo2 = $_FILES['userfile2']['type']; 
$tamano_archivo2 = $_FILES['userfile2']['size']; 

$ex=obtenerext($nombre_archivo2);

 


$msj='';


	 
	 $fec=date("Y-m-d");
	 $hora=date("H:i:s");	
	 $fot='directorio';	 
 

	 
	
 
 		 
		 $secc=$_POST['secc'];
		 $orden=$_POST['orden'];
		 $nombre=$_POST['nombre'];
		 $puesto=$_POST['puesto'];
		 $domicilio=$_POST['direccion'];
		 $telefono=$_POST['telefono'];
		 $exten=$_POST['ext'];
		 $correo=$_POST['correo'];
 /*id
recinto
orden
nombre
puesto
domicilio
telef
exten
correo
url*/
	 $bd->ejecutar("update directorio set   recinto='$secc', orden='$orden', nombre='$nombre', puesto='$puesto', domicilio='$domicilio', telef='$telefono', exten='$exten', correo='$correo' where id=$id");
 
		 if ($ex!=''){	
		 @unlink($kdire['url']);
			$nompic1=$id;
			
						if (!is_dir($fot)){
		  
					mkdir($fot,0777); //chmod($fot,0777);
					$dir=$fot.'/'.$fec;
				 
			  	if (!is_dir($dir)){
					mkdir($dir,0777); //chmod($dir,0777);
					}
			 
			}
		  	else {
		  		$dir=$fot.'/'.$fec; 
				
				if (!is_dir($dir)){
			
					mkdir($dir,0777); //chmod($dir,0777);
					$dir=$fot.'/'.$fec.'/';
					if (!is_dir($dir)){
			
					mkdir($dir,0777); // chmod($dir,0777);
					}  
			 
				}
				else {
					$dir=$fot.'/'.$fec.'/'; 
					if (!is_dir($dir)){
			
						mkdir($dir,0777);
						//chmod($dir,0777);
					}  
			 
				}
		  	}
			
			

			 if  (move_uploaded_file($_FILES['userfile2']['tmp_name'],$dir.$nombre_archivo2)	){
		  
			if (file_exists($dir.$nompic1.$ex)) {
				unlink($dir.$nompic1.$ex);
			}
	    	
			rename($dir.$nombre_archivo2,$dir.$nompic1.$ex);   
			
			
			}
		
			 
			$dir2=$dir.$nompic1.$ex;
			
		   
			
			
			
		 

	
	
				
		 
			
			 	$bd->ejecutar("update directorio set url='$dir2' where id='$nompic1'");	
			 
			 	
			 
			 	 
		}  
           
				 ?>
      
		
				<script type="text/javascript">
				top.location="directorio.php";
				</script>

             <?
	
			
			
 
		}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Agregar Foto</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
 <script language="JavaScript"> 
 function limite(que,cuanto) 
 { 
 var v=que.value 
 if(v.length>cuanto) que.value=v.substring(0,cuanto) 
 else 
 document.reduce.cont.value=cuanto-v.length 
 } 
 </script> 
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; background-color: #000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">
      
  <table width="50%" align="center">
    <tr>
      <td><span class="Verdana16Ngo"><strong>Modificar</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" method="post" action="<?=$_SERVER['PHP_SELF']?>?id=<?=$id?>" enctype="multipart/form-data">
        <table width="100%" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>Nombre:</strong></td>
            <td align="left" class="menu"><label for="nombre"></label>
              <input name="nombre" type="text" id="nombre" style="width:100%" value="<?=$kdire['nombre'];?>" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>Puesto:</strong></td>
            <td align="left" class="menu"><label for="puesto"></label>
              <input name="puesto" type="text" id="puesto" style="width:100%" value="<?=$kdire['puesto'];?>"  /></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>Orden</strong></td>
            <td align="left" class="Arial12Gris"><label for="orden"></label>
              <input name="orden" type="text" id="orden" style="width:30px" value="<?=$kdire['orden'];?>" size="5" /> 
              *El n&uacute;mero 1 aparecear primero y asi sucesivamente</td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>Direcci&oacute;n:</strong></td>
            <td align="left" class="menu"><label for="direccion"></label>
              <textarea name="direccion" rows="3" id="direccion" style="width:100%" ><?=$kdire['domicilio'];?></textarea></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>Tel&eacute;fono:</strong></td>
            <td align="left" class="menu"><label for="telefono"></label>
              <input name="telefono" type="text" id="telefono"  style="width:100%" value="<?=$kdire['telef'];?>"/></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>Ext.:</strong></td>
            <td align="left" class="menu"><label for="ext"></label>
              <input name="ext" type="text" id="ext"  style="width:40px" value="<?=$kdire['exten'];?>"/></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>Correo</strong></td>
            <td align="left" class="menu"><label for="correo"></label>
              <input name="correo" type="text" id="correo" style="width:100%" value="<?=$kdire['correo'];?>"  /></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="verdana14negro"><strong>*Recinto:</strong></td>
            <td align="left" class="menu"><label for="secc"></label>
              <select name="secc" id="secc" style="width:100%" >
              <? $secc=$kdire['recinto'];?>
              <option value="0" <? if ($secc==0){ echo 'selected="selected"'; } ?>>Solo Directorio</option>
              <?  
				 
					$bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
		 
			
					 ?>
                     <optgroup label="RECINTOS CULTURALES">
			 
                <? 
			  $f=0;
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
               
               <option value="<?=$rows['id']?>" <? if ($rows['id']==$secc){ echo 'selected="selected"'; } ?> ><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup> <optgroup label="SUBDIRECCIONES">
                 <? 
			  $f=0;
			  
			 
			   $total=$bd->num_rows($bs2);
			  	while($rows=$bd->obtener_fila($bs2,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>" <? if ($rows['id']==$secc){ echo 'selected="selected"'; } ?>><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup>
              </select></td>
          </tr>
          <tr>
            <td width="21%" align="left" valign="middle" class="verdana14negro"><strong>C.V.:</strong></td>
            <td width="79%" align="left" class="menu"><input name="userfile2" type="file" class="titulo1" id="userfile2">            </td>
            </tr>
          <tr class="titulo-3">
            <td colspan="2" align="left" class="arial11Gris">* Solo para aquellos que dirigen alg&uacute;n recinto o subdirecci&oacute;n </td>
          </tr>
          <tr class="titulo-3">
            <td colspan="2" align="center"><label for="pnid"></label>
              <input type="submit" name="Agregar" value="Guardar" class="titulo1" />
              <!--<input name="can" type="button" class="titulo1" id="can" onClick="cancelar()" value="Cancelar" />--></td>
          </tr>
          </table>
        </form></td>
      </tr>
  </table>
  </td>
  </tr>  <tr style="border: 0px; background: #000">
        <td height="37" align="left" class="bcoabajo" ><? include "footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
<? } ?>