<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 

$_POST=$_POST;
include('class.ImageFilter.php');
require 'db.class.php';
require 'conf.class.php';

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
$guardasd=$_POST['guardass'];
if ($guardasd!=''){
$secc1=$_POST['secc1'];	
$tituloa=$_POST['tituloa'];
$theDate=$_POST['theDate'].' '.$_POST['hhh'].':'.$_POST['mmm'].':00';
$theDate2=$_POST['theDate2'].' '.$_POST['hhh2'].':'.$_POST['mmm2'].':00';
$theDate3=$_POST['theDate3'].' '.$_POST['hhh3'].':'.$_POST['mmm3'].':00';
$durae=$_POST['durae'];

$tipoa=$_POST['tipoa'];
$ftipo=$_POST['ftipo'];
if ($ftipo==0){
$theDate3=date("Y-m-d H:i:s", strtotime("$theDate + $durae hours"));
} else {
	
	$theDate=$theDate2;
}



$direcc=addslashes($_POST['direcc']);
$info=addslashes($_POST['info']);
$contacto=addslashes($_POST['contacto']);
$mapa=addslashes($_POST['mapa']);


$nombre_archivo2 = $_FILES['fotop']['name']; 
$tipo_archivo2 = $_FILES['fotop']['type']; 
$tamano_archivo2 = $_FILES['fotop']['size']; 
$ftipo=$_POST['ftipo'];
$ex=obtenerext($nombre_archivo2);
$fec=date("Y-m-d");
$fot='agenda';

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
					 
				}
				else {
					$dir=$fot.'/'.$fec.'/'; 
					if (!is_dir($dir)){
			
						mkdir($dir,0777);
						//chmod($dir,0777);
					}  
				}
		  	}	 

$url=$_POST['url'];
 $bd->ejecutar("insert into mynews values (null,'$theDate','$tituloa','$url','$tipoa','$secc1','$ftipo','','$organiza','$theDate2','$theDate3','$direcc','$info','$contacto','$mapa')");
	$nompic1=$bd->lastID(); 
  
 

   if  (move_uploaded_file($_FILES['fotop']['tmp_name'],$dir.$nombre_archivo2)){ 
 	rename($dir.$nombre_archivo2,$dir.$nompic1.$ex);   
 

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
			
	$bd->ejecutar("update mynews set url='$dir' where id=$nompic1");
	
				 ?>
      
		
				<script type="text/javascript">
				top.location="crop5.php?id=<?=$nompic1?>";
				</script>

             <?		 }	else { ?><script type="text/javascript">
				top.location="agenda.php";
				</script><? }
			 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Notas</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />

<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<script type="text/javascript" src="jquery.js"></script>
<script language="javascript">
$(document).ready(function(e) {
    $("#sxfecha").click(function(e) {
        $("#forfecha").css("display","block");
        $("#forperiodo").css("display","none");
		$("#ftipo").val(0);
    });
	
	
    $("#sxperiodo").click(function(e) {
        $("#forfecha").css("display","none");
        $("#forperiodo").css("display","block");
		$("#ftipo").val(1);
    });
});

</script>
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


<table width="900" align="center">
  <tr>
    <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
     
    <tr>
      <td align="center" ><form action="addagenda.php" method="post" enctype="multipart/form-data"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" >
        <tr class="columna">
          <td align="left"  class="negro1"><table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            <tr>
              <td colspan="8" align="center"  class="Verdana16Ngo"><strong>Agregar Evento</strong></td>
            </tr>
            <tr class="Hevel16Gris">
              <td width="15%" height="39" align="left"  class="arial13Negro">Organizador:</td>
              <td width="35%" align="left"  class="text2"><label for="organiza"></label>
                <select name="secc1" id="secc1">
              
               
                <? if ($kp['permiso']>=99) {
					$bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
					}
				if ($kp['permiso']==80) {
					$bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo>100 order by id asc"); 
					
				}
				if ($kp['permiso']==70) {
					$bs=$bd->ejecutar("select * from recintos where edo>100 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
				}
				if ($kp['permiso']<70) {
					$tipo=$kp['permiso'];
					$bs=$bd->ejecutar("select * from recintos where edo=1 and id=$tipo order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1  and id=$tipo order by id asc"); 
				}
					 ?>
                     <optgroup label="RECINTOS CULTURALES">
			 
                <? 
			  $f=0;
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
               
               <option value="<?=$rows['id']?>"><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup> <optgroup label="SUBDIRECCIONES">
                 <? 
			  $f=0;
			  
			 
			   $total=$bd->num_rows($bs2);
			  	while($rows=$bd->obtener_fila($bs2,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>"><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup>
               
              </select></td>
              <td width="15%" align="center"  class="text2">&nbsp;</td>
              <td colspan="4" align="left"  class="text2">&nbsp;</td>
              </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro">Tipo de Actividad</td>
              <td colspan="2" align="left"  class="text2"><label for="tipoa"></label>
                <input type="text" name="tipoa" id="tipoa" /></td>
              <td colspan="4" align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro">Titulo de Actividad</td>
              <td colspan="2" align="left"  class="text2"><label for="tituloa"></label>
                <input type="text" name="tituloa" id="tituloa" /></td>
              <td colspan="4" align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="hevel11Gris">
              <td align="left"  class="arial13Negro">URL: </td>
              <td colspan="2" align="left"  class="text2"><input type="text" name="url" id="url" /></td>
              <td colspan="4" align="center"  class="cinchek">*Nota: Debe ser la url completa</td>
              </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro">Tipo</td>
              <td align="left"  class="arial13Negro">
              <input name="radio" type="radio" id="sxfecha" value="sxfecha" checked="checked" />
                <label for="sxfecha">Fecha </label>
                  <input type="radio" name="radio" id="sxperiodo" value="sxperiodo" />
                    <label for="sxperiodo">Periodo</label></td>
              <td align="left"  class="arial13Negro">
              <input type="hidden" value="0" id="ftipo" name="ftipo" />
              
              &nbsp;</td>
              <td align="left"  class="arial13Negro">&nbsp;</td>
              <td align="left"  class="arial13Negro">&nbsp;</td>
              <td align="left"  class="arial13Negro">&nbsp;</td>
              <td align="left"  class="arial13Negro">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td colspan="7" align="left"  class="arial13Negro">
              <div style="float:left; width:90%" id="forfecha">
              <table>
               <tr class="arial11Negro">
              <td align="left"  class="arial13Negro">Fecha</td>
              <td align="left"  class="text2"><label for="fecha"></label>
                <input name="theDate" type="text" value="<?=date("Y-m-d");?>" size="15" readonly onClick="displayCalendar(document.forms[0].theDate,'yyyy-mm-dd',this)" ></td>
              <td align="center"  class="arial13Negro">Hora
<?
		  $theh=$nf['hora'];
          if ($theh==''){ $theh=date("H:i:s"); }
		  $info=split(':',$theh);
		  ?></td>
              <td align="left"  class="text2"><label for="hras"></label>
                <label for="hhh2"></label>
            <input name="hhh" type="text" id="hhh" size="3" maxlength="2" value="<?=$info['0'];?>" onKeyPress="return validar(event); if (this.value>23){ this.value=23 }" onMouseOut="if (this.value>23){ this.value=23 }" onBlur="if (this.value>23){ this.value=23 }" onChange="if (this.value>23){ this.value=23 }"/></td>
              <td align="center"  class="arial13Negro"> Min</td>
              <td align="left"  class="text2"><label for="min"></label>
                <label for="mmm2"></label>
          <input name="mmm" type="text" id="mmm" size="3" maxlength="2" value="<?=$info['1'];?>"  onKeyPress="return validar(event); if (this.value>59){ this.value=59 }" onMouseOut="if (this.value>59){ this.value=59 }" onBlur="if (this.value>59){ this.value=59 }" onChange="if (this.value>59){ this.value=59 }" /></td>
              <td align="left"  class="text2"><span class="arial13Negro">formato 24 hrs</span></td>
              <td align="left"  class="text2">&nbsp;</td>
              <td align="right"  class="arial12Gris">Duraci&oacute;n del Evernto</td>
              <td align="left"  class="text2"><label for="durae"></label>
                <input name="durae" type="text" id="durae" size="3" maxlength="2" value="1" onkeypress="return validar(event); if (this.value&gt;23){ this.value=23 }" onmouseout="if (this.value&gt;23){ this.value=23 }" onblur="if (this.value&gt;23){ this.value=23 }" onchange="if (this.value&gt;23){ this.value=23 }"/>
                Hrs</td>
               </tr>
              </table>
              </div>
              <div style="float:left; width:90%; display:none" id="forperiodo">
              <table>
            <tr class="Hevel16Gris" >
              <td align="left"  class="arial13Negro">Inicio</td>
              <td align="left"  class="text2"><input name="theDate2" type="text" value="<?=date("Y-m-d");?>" size="15" readonly onClick="displayCalendar(document.forms[0].theDate2,'yyyy-mm-dd',this)" /></td>
              <td align="center"  class="arial13Negro">Hora
                <?
		  $theh=$nf['hora'];
          if ($theh==''){ $theh=date("H:i:s"); }
		  $info=split(':',$theh);
		  ?></td>
              <td align="left"  class="text2"><label for="hras"></label>
                <label for="hhh2"></label>
                <input name="hhh2" type="text" id="hhh2" size="3" maxlength="2" value="<?=$info['0'];?>" onKeyPress="return validar(event); if (this.value&gt;23){ this.value=23 }" onMouseOut="if (this.value&gt;23){ this.value=23 }" onBlur="if (this.value&gt;23){ this.value=23 }" onChange="if (this.value&gt;23){ this.value=23 }"/></td>
              <td align="center"  class="arial13Negro"> Min</td>
              <td align="left"  class="text2"><label for="min"></label>
                <label for="mmm2"></label>
                <input name="mmm2" type="text" id="mmm2" size="3" maxlength="2" value="<?=$info['1'];?>"  onkeypress="return validar(event); if (this.value&gt;59){ this.value=59 }" onMouseOut="if (this.value&gt;59){ this.value=59 }" onBlur="if (this.value&gt;59){ this.value=59 }" onChange="if (this.value&gt;59){ this.value=59 }" /></td>
              <td align="left"  class="text2"><span class="arial13Negro">formato 24 hrs</span></td>
              </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro"><p>Fin</p></td>
              <td align="left"  class="text2"><input name="theDate3" type="text" value="<?=date("Y-m-d");?>" size="15" readonly onClick="displayCalendar(document.forms[0].theDate3,'yyyy-mm-dd',this)" /></td>
              <td align="center"  class="arial13Negro">Hora
                <?
		  $theh=$nf['hora'];
          if ($theh==''){ $theh=date("H:i:s"); }
		  $info=split(':',$theh);
		  ?></td>
              <td align="left"  class="text2"><label for="hras"></label>
                <label for="hhh2"></label>
                <input name="hhh3" type="text" id="hhh3" size="3" maxlength="2" value="<?=$info['0'];?>" onKeyPress="return validar(event); if (this.value&gt;23){ this.value=23 }" onMouseOut="if (this.value&gt;23){ this.value=23 }" onBlur="if (this.value&gt;23){ this.value=23 }" onChange="if (this.value&gt;23){ this.value=23 }"/></td>
              <td align="center"  class="arial13Negro"> Min</td>
              <td align="left"  class="text2"><label for="min"></label>
                <label for="mmm2"></label>
                <input name="mmm3" type="text" id="mmm3" size="3" maxlength="2" value="<?=$info['1'];?>"  onkeypress="return validar(event); if (this.value&gt;59){ this.value=59 }" onMouseOut="if (this.value&gt;59){ this.value=59 }" onBlur="if (this.value&gt;59){ this.value=59 }" onChange="if (this.value&gt;59){ this.value=59 }" /></td>
              <td align="left"  class="text2"><span class="arial13Negro">formato 24 hrs</span></td>
              </tr>
              </table>
              </div>&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro">&nbsp;</td>
              <td align="left"  class="text2">&nbsp;</td>
              <td align="center"  class="text2">&nbsp;</td>
              <td colspan="4" align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="40" align="left"  class="arial13Negro">Infomacion:</td>
              <td colspan="6" align="left"  class="text2"><textarea name="info" rows="10" id="info"></textarea></td>
              </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro">Direccion de Evento</td>
              <td colspan="6" align="left"  class="text2"><label for="direcc"></label>
                <textarea name="direcc" rows="5" id="direcc"></textarea></td>
              </tr>
            <tr class="Hevel16Gris">
              <td height="40" align="left"  class="arial13Negro">Contacto:</td>
              <td colspan="2" align="left"  class="text2"><textarea name="contacto" rows="5" id="contacto"></textarea></td>
              <td colspan="4" align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="40" align="left"  class="arial13Negro">Mapa:</td>
              <td colspan="2" align="left"  class="text2"><textarea name="mapa" rows="5" id="mapa"></textarea></td>
              <td colspan="4" align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="40" align="left"  class="arial13Negro">Imagen</td>
              <td align="left"  class="text2"><span class="menu">
                <input type="file" name="fotop" id="fotop" />
              </span></td>
              <td align="center"  class="text2">&nbsp;</td>
              <td colspan="4" align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="40" colspan="7" align="center"  class="arial13Negro"><input type="submit" name="guardass" id="guardass" value="Guardar" /></td>
              <!--<td align="left" class="text2">Grupo</td>-->              </tr>
            <?
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['artistaspage']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['artistaspage'];
		}
		$pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}				
						$sqll="Select * from artistas_datos where id in ($ids) order by nombre asc";
						$resultl =@$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
						$idgrup=$rowl['id'];
						?>
            <?  $wf++; } ?>
          </table></td>
        </tr>
      </table></form></td>
    </tr></table>
      </td>
  </tr>
  <tr>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
</table>


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