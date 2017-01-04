<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 


include ("Paginated.php");
include ("DoubleBarLayout.php") ;
include('class.ImageFilter.php');
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();

$igp=$_GET['igp'];

$r=$_GET['r'];
$ref='videos.php';

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
 

 



$enviar2=$_POST['Agregar'];
		if (!empty($enviar2)) {

       
	

$nombre_archivo2 = $_FILES['userfile2']['name']; 
$tipo_archivo2 = $_FILES['userfile2']['type']; 
$tamano_archivo2 = $_FILES['userfile2']['size']; 

$ex=obtenerext($nombre_archivo2);

$title=addslashes($_POST['titulo']);
$titulo1=addslashes($_POST['titulo1']);
$fec=date("Y-m-d");
$hora=date("H:i:s");	
$fot='video';	
$secc=$_POST['secc'];
$dia=$_POST['dia'];
$lugar=$_POST['lugar'];
$autor=$_POST['autor'];
$cvid=addslashes($_POST['cvid']);
if ($ex!='' and ($ex=='jpg' or $ex=='png' or $ex=='.jpg' or $ex=='.png')){
	$vp=$_POST['vp'];
	if ($vp==1){
	$bd->ejecutar("update videos set vp=0");
	}
			 
	 $bd->ejecutar("insert into videos values (NULL,'$titulo1','$title','$fec','','$secc','$cvid','$hora','0','$vp')");	
	 $rs3=$bd->ejecutar("select Id from videos order by Id desc limit 1");
	 $row2=@$bd->obtener_fila($rs3,0);
} else {
?><script language="javascript">
alert("Debes seleccionar algun video")
document.location='<?=$_SERVER['HTTP_REFERER'];?>';  </script><?	
}
				
	$idnotad=$row2['Id'];
	$titulod=$row2['titulo'];					
	$acciond='Agrega Foto';
	$horaddd=date("H:i:s");
	$fechadd= date("Y-m-d");	

			$nompic1=$row2['Id'];
			
			if (!is_dir($fot)){
		  
					mkdir($fot,0777); 
					$dir=$fot.'/'.$fec;
			
			  	if (!is_dir($dir)){
			
						mkdir($dir,0777);
					
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
			

			 if  (move_uploaded_file($_FILES['userfile2']['tmp_name'],$dir.$nombre_archivo2)){
		   $ex=".jpg";
			if (file_exists($dir.$nompic1.$ex)) {
				unlink($dir.$nompic1.$ex);
			}
	    	
			rename($dir.$nombre_archivo2,$dir.$nompic1.$ex);   
			
			
			}
		
			//////////////////////////////////////
			$dir2=$dir.$nompic1.$ex;
			
		    if ($seccion!=11) {
			
			
			
			$info=getimagesize($dir.$nompic1.$ex);
		
			$ancho=$info[0];
			$alto=$info[1];

		 	
			
            if ($alto<$ancho)
			{
					$file=$dir.$nompic1.'_3'.$ex;
				if (file_exists($file)){
				unlink($file);
				}
				if(!file_exists($file))
				{
			
				$IF = new ImageFilter;
				$IF->loadImage($dir.$nompic1.$ex);
				$IF->resize(500,'ratio');
				$IF->output('JPEG',$file);
				}
			}
			else if ($ancho<$alto)
			{
						$file=$dir.$nompic1.'_3'.$ex;
					if (file_exists($file)){
					unlink($file);
					}
					if(!file_exists($file))
					{
				
					$IF = new ImageFilter;
					$IF->loadImage($dir.$nompic1.$ex);
					$IF->resize('ratio',500);
					$IF->output('JPEG',$file);
					}
			}
			else
			{
				$file=$dir.$nompic1.'_3'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize(500,'ratio');
						$IF->output('JPEG',$file);
					
						}
			}
			
			$info33=getimagesize($dir.$nompic1.'_3'.$ex);
		
			$ancho33=$info33[0];
			$alto33=$info33[1];
		
	
			$file=$dir.$nompic1.'_11'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						/*$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize('ratio',200);
						$IF->output('JPEG',$file);*/
					
			}
			$file=$dir.$nompic1.'_11x'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						/*$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize('ratio',430);
						$IF->output('JPEG',$file);
					*/
			}
			//if ($alto>$ancho)
            if (2>1) {
            	$info=getimagesize($dir.$nompic1.$ex);
		     	if (file_exists($ruta.$id.'_8'.$ext)){
					unlink($ruta.$id.'_8'.$ext);
				}
				$file=$dir.$nompic1.'_8'.$ex;
				if (file_exists($file)){
					unlink($file);
				}
				$ancho2=$info[0];
				$alto2=$info[1];
				$k=$alto2/40;
				$f=(int) $k;
				$f=$f-2;
				$i=1; $j=0;
				
				
				
			
				
           
				
				
				
				
				$ancho2=$info[0];
				$alto2=$info[1];
				$k=$alto2/40;
				$f=(int) $k;
				$f=$f-2;
				$i=1; $j=0;
				
			
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
					unlink($dir.$nompic1.'_4z'.$ex);
				}
			
			 	$bd->ejecutar("update videos set url='$dir' where Id='$nompic1'");	
			 		
			 		?><script language="javascript"> 
					
					top.location="videos.php"; 
                    
                    </script>  <? 	 
			 	 
			if ($aud=='si'){  }
			else { ?> <? }
			
			} 
			
		else {
		
		$file=$dir.$nompic1.'_4'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.'_3'.$ex);
					    $IF->resize(105,'ratio');
						$IF->output('JPEG',$file);
					
			}
		
			  $file=$dir.$nompic1.'_2'.$ex;
			if (file_exists($file)){
				unlink($file);
				}
				if (file_exists($dir.$nompic1.'_9'.$ex)){
				unlink($dir.$nompic1.'_9'.$ex);
				}
			if (file_exists($dir.$nompic1.'_8c'.$ex)){
				unlink($dir.$nompic1.'_8c'.$ex);
				}
				if (file_exists($dir.$nompic1.'_8'.$ex)){
				unlink($dir.$nompic1.'_8'.$ex);
				}
				if (file_exists($dir.$nompic1.'_10'.$ex)){
				unlink($dir.$nompic1.'_10'.$ex);
				}
				if (file_exists($dir.$nompic1.'_2'.$ex)){
				unlink($dir.$nompic1.'_2'.$ex);
				}
			
			
			$bd->ejecutar("update videos set url='$dir' where Id='$nompic1'");
			
			$titulo="";
			$cadxx="Foto Agregada";
			}	
			
			}else {
			
			$bd->ejecutar("update videos set url='$dir' where Id='$nompic1'");	
			
		$cadxx="Foto Agregada";
			} 
}


 

 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?=$pageTitle;?>
:. Admin - Frecciones</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<script language="javascript">
function buscar(dato){ 
	$.post("buscaf.php", {dato:dato}, function(data){
		$("#resultado").html(data);
	});
}

</script>


<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
 

</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td bgcolor="#000000" >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; /* [disabled]background-color:#000000; */">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">

 <form name="form1" method="post" action="<?=$_SERVER['php_self'];?>?ref=<?=$ref?>&ids=<?=$ids;?>&igp=<?=$igp;?>&r=<?=$r;?>" enctype="multipart/form-data">
    <table width="500" align="center" cellpadding="4" cellspacing="4">
      <tr>
        <td width="21%" align="left" class="Arial12Gris"><strong><span class="titulo1">Screen</span></strong></td>
        <td width="79%" align="left" class="menu"><span class="Arial12Gris">
          <input name="userfile2" type="file" class="titulo1" id="userfile2">        
          *imagen en jpg o png</span></td>
      </tr>
      <tr>
        <td height="38" class="Arial12Gris" align="left"><strong>Título</strong></td>
        <td class="menu" align="left"><input name="titulo1" type="text" class="titulo1" value="<?=$titulo1?>" size="60" /></td>
      </tr>
      <tr>
        <td height="15" align="left" class="Arial12Gris"><strong><span class="titulo1">Pie</span></strong></td>
        <td class="menu" align="left"><textarea name="titulo" cols="60" rows="3" class="titulo1"><?=$titulo?></textarea></td>
      </tr>
      <tr>
        <td height="7" align="left" class="Arial12Gris"><strong>Codigo del video</strong></td>
        <td align="left" class="georgia12azulK">
          <label for="cvid"></label>
          <textarea name="cvid" cols="20" id="cvid"></textarea>
          <label for="secc"> </label></td>
      </tr>
      <tr>
        <td height="7" align="left" class="Arial12Gris"><strong>Lugar</strong></td>
        <td align="left" class="menu">
          <label for="secc"></label>
          <select name="secc" id="secc">
            
            <option value="0">General</option><optgroup label="RECINTOS CULTURALES">
 <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>"><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup> <optgroup label="SUBDIRECCIONES">
                 <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>"><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup>
               
            </select>
          &nbsp;<strong><span class="Arial12Gris">Principal 
          <input type="radio" name="vp" id="vp1" value="1" />
          <label for="vp1">Si</label>
          <input name="vp" type="radio" id="vp2" value="0" checked="checked" />
          <label for="vp2">Solo Galer&iacute;a</label>
          </span></strong></td>
      </tr>
      <tr class="titulo-3">
        <td colspan="2" align="center"><label for="pnid"></label>
          <input type="submit" name="Agregar" value="Agregar" class="titulo1" />
          </td>
      </tr>
    </table>
  </form>


           </td>
</tr>  <tr style="border: 0px; background: #000">
      <td height="37" align="left" class="bcoabajo" >
      <? include "footer.php"; ?> 
      </td>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} ?>