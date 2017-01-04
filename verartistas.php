<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=6;
$_SESSION['voyparader']='artistas';
$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
if ($secc!='' and $secc>0){ $cd=',secc:'.$secc; } else { $cd=''; }  
$id=$_GET['id'];
if (!is_numeric($id)){ echo '<script language="javascript">  top.location="artistas.php"; </script>'; exit();  }
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
#lat0 td, #lat1 td, #lat2 td, #lat3 td {
padding: 4px 8px;
/* [disabled]border:1px solid #006; */
/* [disabled]border-radius: 7px; */
}
#lat1, #lat2, #lat3 table {
margin:0 0 8px 0;
}
</style>
</head>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script language="javascript" src="jquery.js"></script>
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
function  loggeo(){
var eluser=$("#user").val();
var elpass=$("#passw").val();
$.post("entraa.php", {eluser:eluser,elpass:elpass}, function (data) {
$("#error").html(data);
data = data.trim();   
if (data == 'ok'){ 
$("#iniciars").toggle("fast");
$("#entradiv").toggle("fast");
$.post("entraa.php", {eluser:eluser,elpass:elpass,ok:1}, function (data) {
$("#entradiv").html(data);
});
}
});
}
function  busqueda(){
var buscar=$("#buscar").val();
$.post("buscar.php", {buscar:buscar<?=$cd?>}, function (data) {
$("#resultados").html(data);
});
}
</script>
<body oncontextmenu="return false" onkeydown="return false">
<div style="width:930px; margin:auto;  ">
<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="17%" height="64" align="left" bgcolor="#C41230" style="padding:10px"><a href="artistas.php?secc=0" class="recintos">Artistas</a></td>
<td width="83%" bgcolor="#C41230"><? include "menu2.php"; ?></td>
</tr>
</table>
</div>
<div style="width: 930px; float: left; z-index: 8888888888;">
<table width="100%" border="0" cellspacing="0">
<tr>
  <td width="24%" height="45" bgcolor="#333333" class="Arial12Bco" style="padding:10px 2px 10px 10px"><label for="buscar"></label>
    Buscar Artista:<br />
  <input type="text" name="buscar" id="buscar" style="width:98%" onkeyup="busqueda()" onkeypress="busqueda()" /></td>
<td width="76%" bgcolor="#333333" style="padding:10px 2px ">&nbsp;</td>
</tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top" bgcolor="#FFFFFF">
<div id="resultados">
<table width="613" border="0" cellspacing="0" cellpadding="5" id="lat0">
<? $bual=$bd->ejecutar("select * from artistas_datos where id=$id order by nombre asc");
$eae=$bd->obtener_fila($bual,0); 
$ida=$eae['id'];
$ids=$eae['seccion']; 
$binf=$bd->ejecutar("select * from artistas_info where dude=$ida");
$keinfo=$bd->obtener_fila($binf,0);
$bass=$bd->ejecutar("select * from artistas_seccion where id=$ids");
$kass=$bd->obtener_fila($bass,0);
$baso=$bd->ejecutar("select * from artistas_seccion where id<$ids and tipo=1 order by id desc limit 1");
$kaso=$bd->obtener_fila($baso,0);
$ourl='';
$ourl='admina/'.$eae['foto'].$eae['id'].'_s.jpg';
if (!file_exists($ourl)){
$ourl='admina/'.$eae['foto'].$eae['id'].'.jpg'; }
if (!file_exists($ourl)){
$ourl="admin/imagenes/no.png"; }
$fotofondo='img/'.$kaso['id'].'.png';
if (!file_exists($fotofondo)){
$busq=$bd->ejecutar("SELECT  *  FROM artistas_fotos  where edo=1 and autor =$id order by rand()");	
$row5 = $bd->obtener_fila($busq,0);
$fotofondo=$row5['url'].$row5['id'].'_4.jpg';
}
?>
<tr>
<td height="1px" align="center" style="padding:0px">
<div style="float: left; width: 613px; height: 265px; overflow: hidden; display: block;">
<div style="float: left; width: 613px; height: 265px;">
<img src="img/default.png" width="613" height="265" style="background-image:url(<?=$fotofondo?>); background-size: cover; background-position:center; background-repeat:no-repeat; width:613px; height:265px" /> 
</div>
<div style="float: left; width: 613px; height: 83px; background:url(imagenes/fartis.png);  position: relative; top: -83px;"><table width="603" border="0" cellspacing="0" cellpadding="5">
<tr>
<td width="129"><div style="float: left; width: 108px; height: 150px; position: relative; top: -50px; text-align: center;"><img src="<?=$ourl?>" width="100" class="imagenborde" style="background-color:#666; border:2px solid #FFF; border-radius:0px" /></div></td>
<td width="454" valign="top"><span class="Arial15bco">
<?=$kaso['nombre'].' / '.$kass['nombre'];?>      
<br /> 
</span><span class="Arial25Ama">
<?=$eae['nombre']?></span></td>
</tr>
</table>
</div>
</div>
</td>
</tr>
<tr>
<td height="1px" align="left" class="artistas">SEMBLANZA</td>
</tr>
<tr>
<td height="1px" align="left" class="Arial12Gris"><?=nl2br($keinfo['descripcion']);?>&nbsp;</td>
</tr>
<tr>
<td height="1px" align="center">&nbsp;</td>
</tr>
</table>
</div>
</td><div style="width:15px"></div>
<td width="17">
</td>
<td width="300" valign="top" bgcolor="#E8E2D4">
<? 
$busq=$bd->ejecutar("SELECT  *  FROM artistas_fotos  where edo=1 and autor =$id order by id desc");
if ($bd->num_rows($busq)>0){ ?>
<table width="300" border="0" cellspacing="0" cellpadding="5" id="lat1">
<tr>
<td><span class="artistas">GALER&Iacute;A</span>
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
</td>
</tr>
<tr>
<td style="padding:0px">
<table border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" >
<?  $j=0;		
$busq=$bd->ejecutar("SELECT  *  FROM artistas_fotos  where edo=1 and autor =$id order by id desc");
$tfot=$bd->num_rows($busq);
while ($row5 = $bd->obtener_fila($busq,0)) { 
$lafotoes=$row5['url'].$row5['id'].'_4.jpg';
if (!file_exists($lafotoes)){ $lafotoes=$row5['url'].$row5['id'].'.jpg'; }
?> 
<?  if($j==0 or $j%3==0 ) { ?> <tr> <? } ?>
<td align="center" valign="top" height="66" style="padding:4px"> 
 <a href="<?=$lafotoes?>" rel="gallery"  class="pirobox_gall" title="<?=$row5['descrip'];?>">
<img src="<?=$row5['url']?><?=$row5['id']?>_55.jpg" border="0" width="87" style="max-height:90px"   /></a></td>
<? $j=$j+1; ?>
<?  if($j%3==0 or $j==$tfot) { ?> </tr><? } ?>
<?  }  ?>
</table>
</td>
</tr>
<tr>
<td><div style="background-color: #999; height: 1px;"></div></td>
</tr>
</table>
<? } ?>
<?
$buaa=$bd->ejecutar("select * from artistas_videos where edo=1 and autor=$id");
$totalvide=$bd->num_rows($buaa);
while($kaa=$bd->obtener_fila($buaa,0)) {
$elvideo=$kaa['id'];
?> 
<table width="300" border="0" cellspacing="0" cellpadding="5"  id="lat2">
<tr>
<td><span class="artistas">VIDEO</span></td>
</tr>
<tr>
<td>  <!--   <iframe width="285" height="200" src="http://www.youtube.com/embed/<?=$kaa['url']?>" frameborder="0" allowfullscreen></iframe>-->

<object width="285" height="200"><param name="movie" value="http://www.youtube.com/v/<?=$kaa['url']?>?version=3&amp;hl=es_MX"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?=$kaa['url']?>?version=3&amp;hl=es_MX" type="application/x-shockwave-flash" width="285" height="200" allowscriptaccess="always" allowfullscreen="true" wmode="transparent"></embed></object>
</td>
</tr>
<tr>
<td class="Arial12Gris"><?=$kaa['descrip']?> </td>
</tr>
<tr>
<td><div style="background-color: #999; height: 1px;"></div></td>
</tr>
</table>
<? } ?> 
<? $buaa=$bd->ejecutar("select * from artistas_audios where edo=1 and autor=$id");
while($kaa=$bd->obtener_fila($buaa,0)) {
$elaudio=$kaa['id'];
?>     
<table width="300" border="0" cellspacing="0" cellpadding="5"  id="lat3">
<tr>
<td><span class="artistas">AUDIO</span></td>
</tr>
<tr>
<td>    <object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
<param name="movie" value="player_mp3.swf" />
<param name="bgcolor" value="#ffffff" />
<param name="FlashVars" value="mp3=<?=$kaa['url'];?>" />
</object></td>
</tr>
<tr>
<td class="Arial12Gris"><?=$kaa['descrip']?></td>
</tr>
<tr>
<td><div style="background-color: #999; height: 1px;"></div></td>
</tr>
</table>
<? } ?>
</td>
</tr>
</table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>