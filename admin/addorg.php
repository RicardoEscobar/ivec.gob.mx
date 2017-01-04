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
	 $fot='organigrama';	 
 
 if ($ex!=''){
	 $bd->ejecutar("insert into organigrama values(NULL, '$fec','')");
 
				
			$nompic1=$bd->lastID();
			
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
			
		   
			
			
			
		 

	
	
				
		 
			
			 	$bd->ejecutar("update organigrama set url='$dir2' where id='$nompic1'");	
			 
			 	
			 
			 	
		
           
				 ?>
      
		
				<script type="text/javascript">
				top.location="organigrama.php";
				</script>

             <?
	
			 } else {
				
				 ?>
      
		
				<script type="text/javascript">
				alert("debe seleccionar una imagen");
				</script>

             <? 
			 }
			
  
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
 <script type="text/javascript">

function Verify(objForm) {
var arrExtensions=new Array("jpg", "jpeg", "png");
var objInput = objForm.elements["userfile2"];
var strFilePath = objInput.value;
var arrTmp = strFilePath.split(".");
var strExtension = arrTmp[arrTmp.length-1].toLowerCase();
var blnExists = false;
for (var i=0; i<arrExtensions.length; i++) {
if (strExtension == arrExtensions[i]) {
blnExists = true;
break;
}
}
if (!blnExists)
alert("El archivo no es una imagen");
return blnExists;
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
      <td><span class="Verdana16Ngo"><strong>Agrega Organigrama</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" onsubmit="return Verify(this);" method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <table width="100%" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td width="21%" align="left" valign="middle" class="verdana14negro"><strong>Imagen</strong></td>
            <td width="79%" align="left" class="menu"><input name="userfile2" type="file" class="titulo1" id="userfile2">            </td>
          </tr>
          <tr class="titulo-3">
            <td colspan="2" align="left" class="arial11Gris">&nbsp;</td>
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