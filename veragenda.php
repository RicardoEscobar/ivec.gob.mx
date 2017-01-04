<? session_start();
require 'db.class.php';
require 'conf.class.php';
require 'fecha.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=3;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc1=$_GET['secc1'];
if ($secc1!=''){ $_SESSION['laseccesws']=$secc1; }
$secc1=$_SESSION['laseccesws'];

$datepicker=$_GET['datepicker'];
if ($datepicker==''){ $datepicker=date("Y-m-d"); }
 
if ($secc1>0){ $cad=' and secc1='.$secc1.' ';  }

$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$colores=array('#EA870F','#C41230','#368B8F','#006210','#0071C4','#D24726','#03B3B2','#FF8F32','#005D47','#FD7726','#B60016','#666666');
$id=$_GET['id'];
		$eventos=$bd->ejecutar("select * from mynews where id=$id"); 
		$row=$bd->obtener_fila($eventos,0);
		$secc1=$row['secc1'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instituto Veracruzano de la Cultura :: Artistas</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #F2F2F2;
}
</style>
</head> 
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
 
	
	function  busqueda(){
		var buscar=$("#buscar").val();
		$.post("buscara.php", {buscar:buscar}, function (data) {
			$("#resultados").html(data);
			
		});
	}
</script>
    <script src="src/js/jscal2.js"></script>
    <script src="src/js/lang/es.js"></script>
    
    <link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="src/css/steel/steel.css" />
    
    
              <link href="css_pirobox/style_1/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/pirobox_extended.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox_ext({
	piro_speed : 700,
		bg_alpha : 0.5,
		piro_scroll : true // pirobox always positioned at the center of the page
	});
});
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="17%" height="64" align="left" bgcolor="#EA870F" class="gris25" style="padding:10px"><a   style="color:#FFF" href="agenda.php?secc1=0" class="recintos">Agenda</a></td>
    <td width="83%" bgcolor="#EA870F"></td>
  </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <table width="613" border="0" cellspacing="2" cellpadding="3">
    <? $foto='admin/'.$row['url'].$row['id'].'_gx.jpg'; 
	$urlf2='admin/'.$row['url'].$row['id'].'.jpg'; 
		if(file_exists($foto)){ ?>
        <tr>
          <td colspan="2"> <a href="<?=$urlf2;?>" rel="gallery"  class="pirobox_gall"> <img src="<?=$foto?>" width="600" title="Ver Tamaño Completo"  /></a></td>
        </tr>
        <? } ?>
    
        <tr>
          <td colspan="2" class="negro15" style="color:#C41230"><?=$row['descri']?></td>
        </tr>
        <tr>
          <td colspan="2" class="negro19"><?=$row['newstitle']?></td>
        </tr>
    
        <tr>
          <td colspan="2" class="Arial12Gris">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="Arial12Gris"><?=nl2br($row['extra'])?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <? if ($row['newslink']!='') {?>
        <tr>
          <td colspan="2" class="negro12"><a href="<?=$row['newslink']?>" class="azult"><strong>LINK:</strong></a><a href="<?=$row['newslink']?>" class="azult"> 
            <?=$row['newslink']?>
          </a></td>
        </tr><? } ?>
        <tr>
          <td width="168">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td style="border-bottom:#666 1px solid"><strong class="Arial12Nego">Dirección del Evento:</strong></td>
          <td width="50%" class="Arial12Nego" style="border-bottom:#666 1px solid"><strong>Fecha</strong></td>
        </tr>
        <tr>
          <td colspan="2"> 
     
          
          
       
          </td>
        </tr>
        <tr>
          <td height="1" rowspan="3" align="left" valign="top"><span class="Arial12Gris">
            <?=nl2br($row['direccion'])?>
          </span></td>
          <td height="0" align="left" class="Arial12Gris">
        
          <strong>Inicio:</strong>  <?  $tdatet=explode(" ",$row['newsdate']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);
			echo fechag($row['newsdate']);
			  if ($hora!='00:00'){ echo ' '.$hora.' Hrs'; } 
			 ?>    <br />
            <br />
            
            <? if ($row['secc2']==1) { ?>
            <strong>Periodo:</strong> <br />
            <strong>des </strong><br />
              <?  $tdatet=explode(" ",$row['inicio']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);
				echo fechag($row['inicio']);
			  if ($hora!='00:00'){ echo ' '.$hora.' Hrs'; } 
			 ?> <br />		<strong>al</strong><br />
  <?  $tdatet=explode(" ",$row['fin']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5); 
				echo fechag($row['fin']);
			  if ($hora!='00:00'){ echo ' '.$hora.' Hrs'; } 
			 ?> <? } ?>
            <br />
            <strong></strong></td>
        </tr>
        <tr>
          <td width="50%" class="Arial12Nego" style="border-bottom:#666 1px solid"><strong>Organizador</strong></td>
          </tr>
        <tr>
          <td   align="left" class="Arial12Gris"> 
                     <? if ($secc1>0) { ?>  <?
	  $baso=$bd->ejecutar("select * from recintos where id=$secc1   order by id desc limit 1");
$kaso=$bd->obtener_fila($baso,0);
echo $kaso['nombre'];
	  ?> <? } ?>   &nbsp;
         </td>
    
        </tr>
     
         <tr>
           <td width="168" rowspan="2" valign="top" style="/* [disabled]border-bottom:#666 1px solid; */"><? $video=stripslashes($row['mapa']);
	$video=str_replace('width','width="295" xx',$video);
	$video=str_replace('height','height="300" yy',$video);
	echo $video
?></td>
          <td height="1" style="border-bottom:#666 1px solid" align="left" class="Arial23Gris"><strong class="Arial12Nego">Contacto</strong></td>
         </tr>
         <tr>
           <td align="left" valign="top" class="Arial12Gris"><?=nl2br($row['contacto'])?></td>
         </tr>
         <tr>
           <td height="1" colspan="2" align="left"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td>
         </tr>
        <tr>
          <td height="1" colspan="2" align="center">&nbsp;</td>
        </tr>
        
       
     
      </table>
      </div>
      </td>
      <td width="17">&nbsp;</td>
      <td width="300" valign="top" bgcolor="#E8E2D4">
	  <div style="float: left; width: 100%; background-color: #F2F2F2; margin-bottom: 15px;">
	    <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #EA870F;"><strong>Otros Eventos</strong></div>
	  </div>
	  
	  <? 
		$desde=date("Y-m-d").' 00:00:01';
		$hastax=date("Y-m-d H:i:s"); 
		$fd=0;
		$eventos=$bd->ejecutar("select * from mynews where fin >= '$hastax' order by rand() limit 3 ");
		while($row=$bd->obtener_fila($eventos,0)){
			$fd++;
			$tdatet=explode(" ",$row['newsdate']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);
			$foto='admin/'.$row['url'].$row['id'].'.jpg';
			$foto='admin/'.$row['url'].$row['id'].'_cx.jpg';
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_c.jpg'; }			
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_gx.jpg'; }
			$secc=$row['secc1'];
			$bsec=$bd->ejecutar("select * from recintos where id=$secc");
			$rows=$bd->obtener_fila($bsec,0);
			
			
		 ?><div style="width: 270px; margin: 7px auto;" id="mydiv<?=$fd?>">
        <table width="100%" align="left" cellpadding="5" cellspacing="5" bgcolor="#666666"  >
          <tr>
            <td align="center" valign="middle" class="negro12" style="padding:13px 0">
			 <a href="veragenda.php?id=<?=$row['id']?>" > <? if(file_exists($foto)){ ?>
              <img src="<?=$foto?>" style="max-height:120px; max-width:270px"  />
              <? } else { ?>
              <img src="admin/imagenes/no.png" width="120" height="120" align="absmiddle"  />
              <?  } ?></a>
            </td>
          </tr>
          <tr>
            <td align="left" class="especial" style="padding-left:0px"><?=$row['descri']?>            </td>
          </tr>
          <tr>
            <td class="menu"><strong>
              <?=$row['newstitle']?>
            </strong></td>
          </tr>
          <tr>
            <td class="negro12"><span class="Arial12Bco">
              <?=$rows['nombre']?>
            </span></td>
          </tr>
          <tr>
            <td class="negro12"><span class="Arial15bco">
            <?=fechag($fecha)?> / 
              <?=$hora?> 
              Hrs
            </span></td>
          </tr>
          <tr>
            <td class="negro15" align="center"><img src="imgs/grishor.jpg" width="150" /></td>
          </tr>
        </table>
        <table width="200" align="left" cellpadding="5" cellspacing="5">
          <tr>
            <td height="7">&nbsp;</td>
          </tr>
        </table></div>
        <? } ?> </td>
    </tr>
    </table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>