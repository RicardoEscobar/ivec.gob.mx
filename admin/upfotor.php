<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();

$idnota=$_GET['rec'];
$ir=$_GET['ir'];
if ($ir!=''){ $_SESSION['iradonde']='foton.php'; }

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

 
$pnid=$_POST['pnid'];
 $titulo=$_POST['titulo'];
  $titulo1=$_POST['titulo1'];
 $autor=$_POST['autor']; 
 $lugar=$_POST['lugar'];
$sel=$bd->ejecutar("select * from nota where id_nota=$idnota id order by id_nota desc limit 1");
$tsel=@$bd->obtener_fila($sel,0);
$aud=$tsel['audio'];
$notaid=$idnota;

  $gpoid=$_GET['idgpo'];

  if ($gpoid==''){$gpoid=0;}
 
// Autor//
$autorq=$bd->ejecutar("select * from autor where tipo=1");

// Lugar//
$lugarq=$bd->ejecutar("select * from lugar");


$enviar2=$_POST['Agregar'];
		if (!empty($enviar2)) {

       
	   if (empty($notaid)) {
  $notaid=2;
  }

$nombre_archivo2 = $_FILES['userfile2']['name']; 
$tipo_archivo2 = $_FILES['userfile2']['type']; 
$tamano_archivo2 = $_FILES['userfile2']['size']; 

$ex=obtenerext($nombre_archivo2);

$title=$_POST['titulo'];
 $titulo1=$_POST['titulo1'];
$lug=$_POST['lugar'];
$fotog=$_POST['autor'];
$principal=$_POST['principal'];
$mark=$_POST['marca'];
$knota=$_POST['knota'];
 
	 $fec=date("Y-m-d");
	 $hora=date("H:i:s");	
	 $fot='recintos';	
 
	 $tiar=$_POST['tipoar'];
	 $fddi=$_POST['fdia'];
	 $lug=$_POST['lugar'];
	 $mark=1; $diapo=0;$tiar=0; $fddi=0;
	 
	 	$otroa=$_POST['otroa'];
	$otrolug=$_POST['otrolug'];

	 
	 
	 if ($ex=='.jpg' or $ex=='.png' or $ex=='jpg' or $ex=='png' or $ex=='.jpeg' or $ex=='jpeg'){
	 
	 $edo=$_POST['edo'];
	 $bd->ejecutar("insert into  fotosr values(NULL,'$idnota','','$edo')");
	 
			
			$nompic1=$bd->lastID();
			
		if (!is_dir($fot)){
		  
					mkdir($fot,0777); //chmod($fot,0777);
					$dir=$fot.'/'.$fec.'/';
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
			$file=$dir.$nompic1.'_ex'.$ex;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($dir.$nompic1.$ex);
			$IF->resize(930,'ratio');
			$IF->output('JPEG',$file);
			}
            
			
			
			$bd->ejecutar("update  fotosr set url='$dir' where id='$nompic1'");	
			 
			 	
			 
			 	 
	 
				 ?>
      
		
				<script type="text/javascript">
				top.location="crop4.php?id=<?=$nompic1;?>";
				</script>

              <?
		 
			
			
		 
			
			
			
			
		 
}  else {  ?>
      
		
				<script type="text/javascript">
				alert("Formato no valido");
				top.location="upfotor.php?rec=<?=$idnota;?>";
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
      <td><span class="Verdana16Ngo"><strong>Agrega Foto</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" method="post" action="upfotor.php?rec=<?=$idnota;?>" enctype="multipart/form-data">
        <table width="80%" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td width="21%" align="left" valign="middle" class="Hevel16Gris"><strong><span class="titulo1">Foto</span></strong></td>
            <td width="79%" align="left" class="menu"><span class="titulo1">
              <input name="userfile2" type="file" class="titulo1" id="userfile2">        
              </span></td>
            </tr>
         <!-- <tr>
            <td height="38" align="left" valign="top" class="Hevel16Gris"><p><strong>Estado</strong></p></td>
            <td class="menu" align="left"><span class="titulo1">
              <select name="edo" id="edo">
                  <option value="1">Activo</option>
                  <option value="0">suspendido</option>
                </select>
              </span></td>
            </tr>-->
          <tr class="titulo-3">
            <td colspan="2" align="center"><label for="pnid"></label>
              <input type="hidden" name="pnid" id="pnid" value="<?=$gpoid?>">         <input type="submit" name="Agregar" value="Agregar" class="titulo1" />
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