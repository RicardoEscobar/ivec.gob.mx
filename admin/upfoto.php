<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();

$idnota=$_GET['idnota'];
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
if (empty($pos)){
	$pos=0;
}


$msj='';


	 
	 $fec=date("Y-m-d");
	 $hora=date("H:i:s");	
	 $fot='fotos';	
	 if ($diapo!=0) {
			
	//$bd->ejecutar("update foto set diapo=0 where diapo='$diapo' and diapo<>0");
			}
	 if ($notaid>0){
	/*$bf=$bd->ejecutar("select * from foto where id_nota=$notaid");
	$kbr=@$bd->obtener_fila($bf,0);
	$urlbk=$kbr['url'].$kbr['id'];
	@unlink($urlbk.'.jpg');
	@unlink($urlbk.'_3.jpg');
	@unlink($urlbk.'_4.jpg');
	 $bd->ejecutar("delete from foto where id_nota=$notaid");*/
	 }
	 $tiar=$_POST['tipoar'];
	 $fddi=$_POST['fdia'];
	 $lug=$_POST['lugar'];
	 $mark=1; $diapo=0;$tiar=0; $fddi=0;
	 
	 	$otroa=$_POST['otroa'];
	$otrolug=$_POST['otrolug'];
	if($fotog==1 and $otroa!='')
	{
		$bak=$bd->ejecutar("select * from autor where nombre='$otroa'");
		$kbak=@$bd->obtener_fila($bak,0);
		$fotog=$kbak['id'];
		if ($fotog=='') {
		@$bd->ejecutar("insert into autor values(null,'$otroa',0,1)");
		$idau=$bd->ejecutar("select * from autor order by id desc limit 1");
		$kau9=@$bd->obtener_fila($idau,0);
		$fotog=$kau9['id']; }
	}
	if($lug==1 and $otrolug!='')
	{
		$blk=$bd->ejecutar("select * from lugar where nombre='$otrolug'");
		$kblk=@$bd->obtener_fila($blk,0);
		$lug=$kblk['id'];
		if ($lug=='') {
	@$bd->ejecutar("insert into lugar values(null,'$otrolug')");
	$idauw=$bd->ejecutar("select * from lugar order by id desc limit 1");
	$kauww=@$bd->obtener_fila($idauw,0);
	$lug=$kauww['id']; }
	}
	 
	 
	 if ($ex=='.jpg' or $ex=='.png' or $ex=='jpg' or $ex=='png' or $ex=='.jpeg' or $ex=='jpeg'){
	// $bd->ejecutar("delete from foto where id_nota=$notaid");
	 $bd->ejecutar("update nota set foto='si' where id_nota=$notaid");
	 $bd->ejecutar("insert into foto values(NULL,'$titulo1','$title','$fec','$hora','$fotog','$lug','$pnid','','$mark','$notaid','0','$diapo','$tiar','$fddi',0)");
	
	$rs3=$bd->ejecutar("select id as Id from foto order by id desc limit 1");
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
		
			//////////////////////////////////////
			$dir2=$dir.$nompic1.$ex;
			
		    if ($seccion!=11) {
			
			
			
			$info=getimagesize($dir.$nompic1.$ex);
		
			$ancho=$info[0];
			$alto=$info[1];
			

		 	//////////////  Principal ///////////////////////////////
		
			////////  medio////////////////////////////
		 	$file=$dir.$nompic1.'_3'.$ex;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($dir.$nompic1.$ex);
			$IF->resize(400,'ratio');
			$IF->output('JPEG',$file);
			}
            
			$file=$dir.$nompic1.'_4'.$ex;
						if (file_exists($file)){
//						unlink($file);
//						}
//							if(!file_exists($file))
//						{
//						$IF = new ImageFilter;
//						$IF->loadImage($dir.$nompic1.$ex);
//					    $IF->resize(131,'211');
//						$IF->output('JPEG',$file);
					
			}
			$file=$dir.$nompic1.'_4x'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						/*$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize(320,'ratio');
						$IF->output('JPEG',$file);*/
					
			}
			$file=$dir.$nompic1.'_4z'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize(150,'ratio');
						$IF->output('JPEG',$file);
					
			}
			$file=$dir.$nompic1.'_e'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize(420,'ratio');
						$IF->output('JPEG',$file);
					
			}
			
			$file=$dir.$nompic1.'_ev'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize(355,'ratio');
						$IF->output('JPEG',$file);
					
			}
			$file=$dir.$nompic1.'_ex'.$ex;
						if (file_exists($file)){
						unlink($file);
						}
							if(!file_exists($file))
						{
						$IF = new ImageFilter;
						$IF->loadImage($dir.$nompic1.$ex);
					    $IF->resize(470,'ratio');
						$IF->output('JPEG',$file);
					
			}
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
				
				$file=$dir.$nompic1.'_7'.$ex;
				if (file_exists($file)){
					unlink($file);
				}
				if(!file_exists($file))
				{
/*						$IF = new ImageFilter;
					$IF->loadImage($dir.$nompic1.$ex);
					$IF->resize(600,'ratio');  
					$IF->output('JPEG',$file);*/
				}
				
				$file=$dir.$nompic1.'_7x'.$ex;
				if (file_exists($file)){
					unlink($file);
				}
				if(!file_exists($file))
				{
	/*				$IF = new ImageFilter;
					$IF->loadImage($dir.$nompic1.$ex);
					$IF->resize(368,'ratio');
					$IF->output('JPEG',$file);*/
				}
				
           
				
				$as=$i;
				$js=$j;
				$fs=$f;
				$oas=$i;
				$ojs=$j;
				$ofs=$f;
				while ($i<=$f  and 1==2) {}  
				if ($ancho>=600){
					$ir='ok';
				while ($as<=$fs  and 1==2) {}
				while ($oas<=$ofs  and 1==2) {}
				}
				
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
					//unlink($dir.$nompic1.'_4z'.$ex);
				}
			
			 	$bd->ejecutar("update foto set url='$dir' where id='$nompic1'");	
			 
			 	
			 
			 	 
			if ($aud=='si'){
		  ?>
    <script type="text/javascript">
					document.location="audio/agregadoc.php?id=<?php echo $tsel['id_nota']; ?>&ref=<?=$ref?>&ids=<?=$ids?>"
					</script>
              <?
              }
			  else
			  {
				 ?>
      
		
				<script type="text/javascript">
				top.location="crop3.php?id=<?=$nompic1;?>";
				</script>

              <?
			  }
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

			$titulo="";
			$cadxx="Foto Agregada";
			}	
			
			}else {
			
	
		$titulo="";
		$cadxx="Foto Agregada";
			} 
}  else {  ?>
      
		
				<script type="text/javascript">
				alert("Formato no valido");
				top.location="upfoto.php?idnota=<?=$idnota;?>";
				</script>

              <?  }
		}
$aut=$bd->ejecutar("select * from autor where foto=1 order by nombre asc");
$lug=$bd->ejecutar("select * from lugar order by nombre asc");
$pvkg=$bd->ejecutar("select * from galeria where id=$gpoid");
$rsfot=@$bd->obtener_fila($pvkg,0);

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
      <td align="center"><form name="reduce" method="post" action="upfoto.php?ref=<?=$ref?>&ids=<?=$ids;?>&idnota=<?=$idnota;?>&ir=<?=$ir;?>" enctype="multipart/form-data">
        <table width="80%" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td width="21%" align="left" valign="middle" class="Hevel16Gris"><strong><span class="titulo1">Foto</span></strong></td>
            <td width="79%" align="left" class="menu"><span class="titulo1">
              <input name="userfile2" type="file" class="titulo1" id="userfile2">        
              </span></td>
            </tr>
          <tr>
            <td height="38" align="left" valign="top" class="Hevel16Gris"><p><strong><span class="titulo1">Ti</span></strong><strong><span class="titulo1">tulo</span></strong></p></td>
            <td class="menu" align="left"><span class="titulo1">
              <textarea name="titulo1" cols="60" rows="3" class="titulo1"><?=$titulo1?></textarea>
              </span></td>
            </tr>
          <tr>
            <td height="38" align="left" valign="top" class="Hevel16Gris"><strong><span class="titulo1">Pie<br />
               
                </span></strong></td>
            <td class="menu" align="left"><span class="titulo1">
              <textarea name="titulo" cols="60" rows="3" class="titulo1"  ><?=$titulo?></textarea>
              </span></td>
            </tr>
          <tr>
            <td height="7" align="left" valign="middle" class="Hevel16Gris"><strong>Autor</strong></td>
            <td align="left" class="menu"><label for="autor"></label>
              <select name="autor" class="titulo1" id="autor">
                <?php while($rtr=@$bd->obtener_fila($aut,0)){?>
                <?php if ($rsfot['id_autor']==$rtr['id']){?>
                <option value="<?=$rtr['id'];?>" selected="selected"><?php echo $rtr['nombre']; ?></option>
                <?php } else{?>
                <option value="<?=$rtr['id'];?>"><?php echo $rtr['nombre']; ?></option>
                <?php }?>
                <?php }?>
                </select>
              <span class="tex">&oacute;
                <label for="otroa"></label>
                <input name="otroa" type="text" id="otroa" size="40" />
                </span></td>
            </tr>
          <tr>
            <td height="8" align="left" valign="middle" class="Hevel16Gris"><strong>Lugar</strong></td>
            <td align="left" class="menu"><label for="lugar"></label>
              <select name="lugar" class="titulo1" id="lugar">
                <?php while($rt1=@$bd->obtener_fila($lug,0)){?>
                <?php if ($rsfot['id_lugar']==$rt1['id']){?>
                <option value="<?=$rt1['id'];?>" selected="selected"><?php echo $rt1['nombre']; ?></option>
                <?php } else{?>
                <option value="<?=$rt1['id'];?>"><?php echo $rt1['nombre']; ?></option>
                <?php }?>
                <?php }?>
                </select>
              <span class="tex">&oacute;
                <label for="otrolug"></label>
                <input name="otrolug" type="text" id="otrolug" size="40" />
                </span></td>
            </tr>
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