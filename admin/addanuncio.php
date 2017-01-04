<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();

 
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
	 $fot='anuncio';	 
 
 

	 
	 if ($ex=='.jpg' or $ex=='.png' or $ex=='jpg' or $ex=='png' or $ex=='.jpeg' or $ex=='jpeg'){
 
 		$theDate=$_POST['theDate'].' '.$_POST['hhh'].':'.$_POST['mmm'].':00';;
		$titulo1=$_POST['titulo1'];
		$link=$_POST['link'];
 
	 $bd->ejecutar("insert into anuncio values(NULL,'$titulo1','','$theDate',0,'$link')");
	
	$rs3=$bd->ejecutar("select id as Id from anuncio order by id desc limit 1");
	 $row2= @$bd->obtener_fila($rs3,0);
			
			$nompic1=$row2['Id'];
			
						if (!is_dir($fot)){
		  
					mkdir($fot,0777); //chmod($fot,0777);
					$dir=$fot.'/'.$fec;
					$dir2=$fot.'/'.$fec.'/thumbs';
			
			  	if (!is_dir($dir)){
					mkdir($dir,0777); //chmod($dir,0777);
					}
			  	if (!is_dir($dir2)){
					mkdir($dir2,0777); //chmod($dir,0777);
					}
			}
		  	else {
		  		$dir=$fot.'/'.$fec;
					$dir2=$fot.'/'.$fec.'/thumbs';
				
				if (!is_dir($dir)){
			
					mkdir($dir,0777); //chmod($dir,0777);
					$dir=$fot.'/'.$fec.'/';
					if (!is_dir($dir)){
			
					mkdir($dir,0777); // chmod($dir,0777);
					}  
			  	if (!is_dir($dir2)){
					mkdir($dir2,0777); //chmod($dir,0777);
					}
				}
				else {
					$dir=$fot.'/'.$fec.'/';
					$dir2=$fot.'/'.$fec.'/thumbs';
					if (!is_dir($dir)){
			
						mkdir($dir,0777);
						//chmod($dir,0777);
					}  
			  	if (!is_dir($dir2)){
					mkdir($dir2,0777); //chmod($dir,0777);
					}
				}
		  	}
			
			

			 if  (move_uploaded_file($_FILES['userfile2']['tmp_name'],$dir.$nombre_archivo2)	){
		   $ex=".jpg";
			if (file_exists($dir.$nompic1.$ex)) {
				unlink($dir.$nompic1.$ex);
			}
	    	
			rename($dir.$nombre_archivo2,$dir.$nompic1.$ex);   
			
			
			}
		
			 
			$dir2=$dir.$nompic1.$ex;
			
		   
			
			
			
			$info=getimagesize($dir.$nompic1.$ex);
		
			$ancho=$info[0];
			$alto=$info[1];
			

	
		 	$file=$dir.$nompic1.'_c'.$ex;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($dir.$nompic1.$ex);
			$IF->resize(160,'ratio');
			$IF->output('JPEG',$file);
			}

		 	$file=$dir.$nompic1.'_g'.$ex;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($dir.$nompic1.$ex);
			$IF->resize(600,'ratio');
			$IF->output('JPEG',$file);
			}

	
	
				
			
				if (file_exists($dir.$nompic1.'_2'.$ex)){
					unlink($dir.$nompic1.'_2'.$ex);
				}
				if (file_exists($dir.$nompic1.'_7'.$ex)){
					unlink($dir.$nompic1.'_7'.$ex);
				}
				if (file_exists($dir.$nompic1.'_7x'.$ex)){
					unlink($dir.$nompic1.'_7x'.$ex);
				}
				if (file_exists($dir.$nompic1.'_4z'.$ex)){
					//unlink($dir.$nompic1.'_4z'.$ex);
				}
			
			 	$bd->ejecutar("update anuncio set url='$dir' where id='$nompic1'");	
			 
			 	
			 
			 	 
		
           
				 ?>
      
		
				<script type="text/javascript">
				top.location="anuncios.php";
				</script>

             <?
	
			
			
}  else {  ?>
      
		
				<script type="text/javascript">
				alert("Formato no valido");
				top.location="addanuncio.php";
				</script>

              <?  }
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
      
  <table align="center">
    <tr>
      <td><span class="Verdana16Ngo"><strong>Agrega Anuncio</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <table width="80%" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td width="21%" align="left" valign="middle" class="Hevel16Gris"><strong><span class="titulo1">Foto</span></strong></td>
            <td width="79%" align="left" class="menu"><span class="titulo1">
              <input name="userfile2" type="file" class="titulo1" id="userfile2">        
              </span></td>
            </tr>
          <tr>
            <td height="38" align="left" valign="top" class="Hevel16Gris"><p><strong><span class="titulo1">Ti</span></strong><strong><span class="titulo1">tulo</span></strong></p></td>
            <td class="menu" align="left"><textarea name="titulo1" cols="60" rows="3" class="titulo1"><?=$titulo1?></textarea>            </td>
            </tr>
          <tr>
            <td height="15" align="left" valign="top" class="Hevel16Gris"><strong>Link Completo</strong></td>
            <td class="menu" align="left"><label for="link"></label>
              <input type="text" name="link" id="link" /></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="Hevel16Gris"><strong><span class="titulo1">Fecha<br />
              Vencimiento
              <br />
               
                </span></strong></td>
            <td class="menu" align="left"><input name="theDate" type="text" value="<?=date("Y-m-d");?>" size="15" readonly onClick="displayCalendar(document.forms[0].theDate,'yyyy-mm-dd',this)" >&nbsp;</td>
            </tr>
          <tr>
            <td height="19" align="left" valign="top" class="Hevel16Gris">Hora</td>
            <td class="menu" align="left">Hora 
            <?
		  $theh=$nf['hora'];
          if ($theh==''){ $theh=date("H:i:s"); }
		  $info=split(':',$theh);
		  ?>
            <label for="hhh"></label>
            <input name="hhh" type="text" id="hhh" size="3" maxlength="2" value="<?=$info['0'];?>" onKeyPress="return validar(event); if (this.value>23){ this.value=23 }" onMouseOut="if (this.value>23){ this.value=23 }" onBlur="if (this.value>23){ this.value=23 }" onChange="if (this.value>23){ this.value=23 }" style="width:30px"/>
          :
          <label for="mmm"></label>
          <input name="mmm" type="text" id="mmm" size="3" maxlength="2" value="<?=$info['1'];?>"  onKeyPress="return validar(event); if (this.value>59){ this.value=59 }" onMouseOut="if (this.value>59){ this.value=59 }" onBlur="if (this.value>59){ this.value=59 }" onChange="if (this.value>59){ this.value=59 }" style="width:30px" />
          formato 24 hrs&nbsp;</td>
          </tr>
          <tr class="titulo-3">
            <td colspan="2" align="center"><label for="pnid"></label>
              <input type="submit" name="Agregar" value="Agregar" class="titulo1" />
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