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

 
 

 $id=$_GET['id'];
 	$rs3=$bd->ejecutar("select * from anuncio where id=$id order by id desc limit 1");
	 $row2= @$bd->obtener_fila($rs3,0);
	

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
 
 

	 
 
 
 		$theDate=$_POST['theDate'].' '.$_POST['hhh'].':'.$_POST['mmm'].':00';;
		$titulo1=$_POST['titulo1'];
 $link=$_POST['link'];
 
	 $bd->ejecutar("update anuncio set nombre='$titulo1', vencimiento='$theDate', link='$link' where id=$id");
	

			 	
			 
			 	 
		
           
				 ?>
      
		
				<script type="text/javascript">
				top.location="anuncios.php";
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
      
  <table align="center">
    <tr>
      <td><span class="Verdana16Ngo"><strong>Modificar Anuncio</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" method="post" action="upanuncio.php?id=<?=$id?>" enctype="multipart/form-data">
        <table width="80%" align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td width="21%" height="38" align="left" valign="top" class="Hevel16Gris"><p><strong><span class="titulo1">Ti</span></strong><strong><span class="titulo1">tulo</span></strong></p></td>
            <td width="79%" align="left" class="menu"><textarea name="titulo1" cols="60" rows="3" class="titulo1"><?=$row2['nombre']?></textarea>            </td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="Hevel16Gris"><strong>Link completo</strong></td>
            <td class="menu" align="left"><label for="link"></label>
              <input name="link" type="text" id="link" value="<?=stripslashes($row2['link'])?>" /></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="Hevel16Gris"><strong><span class="titulo1">Fecha<br />
              Vencimiento
              <br />
               
                </span></strong></td>
            <td class="menu" align="left">
            <? 
			$thedatent=explode(" ",$row2['vencimiento']);
			
			 ?>
            
            <input name="theDate" type="text" value="<?=$thedatent[0];?>" size="15" readonly onClick="displayCalendar(document.forms[0].theDate,'yyyy-mm-dd',this)" >&nbsp;</td>
            </tr>
          <tr>
            <td height="19" align="left" valign="top" class="Hevel16Gris">Hora</td>
            <td class="menu" align="left">Hora 
            <?
		  $theh=$thedatent[1];
          if ($theh==''){ $theh=date("H:i:s"); }
		  $info=split(':',$theh);
		  ?>
            <label for="hhh"></label>
            <input name="hhh" type="text" id="hhh" size="3" maxlength="2" value="<?=$info['0'];?>" onKeyPress="return validar(event); if (this.value>23){ this.value=23 }" onMouseOut="if (this.value>23){ this.value=23 }" onBlur="if (this.value>23){ this.value=23 }" onChange="if (this.value>23){ this.value=23 }"  style="width:30px" />
          :
          <label for="mmm"></label>
          <input name="mmm" type="text" id="mmm" size="3" maxlength="2" value="<?=$info['1'];?>"  onKeyPress="return validar(event); if (this.value>59){ this.value=59 }" onMouseOut="if (this.value>59){ this.value=59 }" onBlur="if (this.value>59){ this.value=59 }" onChange="if (this.value>59){ this.value=59 }"  style="width:30px" />
          formato 24 hrs&nbsp;</td>
          </tr>
          <tr class="titulo-3">
            <td colspan="2" align="center"><label for="pnid"></label>
              <input type="submit" name="Agregar" value="Guardar Cambios" class="titulo1" />
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