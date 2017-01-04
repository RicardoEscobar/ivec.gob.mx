<? session_start();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 
include ("Paginated.php");
include ("DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';
require "../fecha.php";
$bd=Db::getInstance();
include('xml.php');
$luser=$_SESSION['pkiduser'];
$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);
if ($kp['notas']!=0){
$ksec=$_GET['ids'];
$xkw='id_nota';
$ordenw='desc';
$donde2=$ksec;
if ($donde2!='')
{
$_SESSION['utttt']=$donde2;
}
$donde=$_SESSION['utttt'];
if ($donde=='r')
{
$msj='Notas Recientes';
$sql1="select id_nota from nota order by id_nota desc ";	
}
else if ($donde=='p')
{
$msj='Notas Principales';
$sql1="select id_nota from nota where 1 and posicion>=1 order by posicion asc ";	
}
else if ($donde=='a')
{
$msj='Notas Del Archivo';
$sql1="select id_nota from nota where seccion not in (select id from seccion )order by id_nota desc ";	
}
else if ($donde>=1)
{
$secc=$donde;
$bsecc="select * from seccion where id=$secc";
$kbsecc=$bd->ejecutar($bsecc);
$ksecc=@$bd->obtener_fila($kbsecc,0);
$msj='Notas Seccion: '.$ksecc['nombre'];
$sql1="select id_nota from nota where seccion=$donde order by id_nota desc ";	
}
else {
$msj='Notas Recientes';
$sql1="select id_nota from nota order by id_nota desc ";
}
$notas=$bd->ejecutar($sql1);	 
$names= array();
while ($arra=@$bd->obtener_fila($notas,0))
{
$names[]=$arra['id_nota'];
}
$page = $_GET['page'];
if ($page!='')
{
$_SESSION['pageparanotas']=$page;
}
if ($page=='')
{
$page=$_SESSION['pageparanotas'];
}
$pagedResults = new Paginated($names, 12, $page);
$ids='0';
while($row = $pagedResults->fetchPagedRow()) {
$ids.=','.$row;
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
background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >
<div  style="float:left; width:960px; ">
<? include "header.php"; ?>
<div style="float: left; width: 960px; background-color: #000000">
<? include ('menu.php'); ?>
</div>
</div>
</td></tr>
<td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
<table width="90%" border="0" align="center" cellpadding="6" cellspacing="0" >
<tr>
<td colspan="2" align="center" class="Verdana16Ngo">Notas 
  <? if ($kp['notas']==7 or $kp['notas']==5 or $kp['notas']==3 or $kp['notas']==1){ ?>
  <a href="nota.php?ids=<?=$ksec;?>"><img src="imagenes/m.png" border="0"  title="Nuevo"/></a>
  <? } ?>
</td>
<td align="center" class="Verdana16Ngo">&nbsp;</td>
<td align="center" class="Verdana16Ngo">&nbsp;</td>
<td align="center" class="Verdana16Ngo">&nbsp;</td>
<td align="center" class="Verdana16Ngo">&nbsp;</td>

</tr>
<tr>
<td colspan="2" align="left" class="Arial12Gris"><form method="get" action="<? $_SERVER['php_self']; ?>"><?=$msj;?> &nbsp;&nbsp;&nbsp; 
Ver notas por:<input type="hidden" name="page" value="1" />
<select name="ids" class="copy" onchange='document.forms[0].submit();' style="max-width:150px">
<option value="r" <? if ('r'==$donde or 0==$donde) {?> selected="selected"<? }?>>
Recientes</option>
 
<? 
$tipomenu2 = "select * from seccion order by nombre";
$ktio=$bd->ejecutar($tipomenu2);
while ($tipome2=@$bd->obtener_fila($ktio,0))  {
?>
<option value="<?=$tipome2['id']?>" <? if ($tipome2['id']==$donde) {?> selected="selected"<? }?>>
<?=($tipome2['nombre'])?>
</option>
<?
}
?>
</select> </form><br /></td>
<td align="left" class="Arial12Gris">&nbsp;</td>
<td align="left" class="Arial12Gris">&nbsp;</td>
<td align="left" class="Arial12Gris">&nbsp;</td>
<td align="left" class="Arial12Gris">&nbsp;</td>
</tr>
<tr class="arial14Azul">
<td align="left" class="tituloc" ><strong>Titulo nota</strong></td>
<td align="left" class="tituloc" ><strong>Seccion</strong></td>
<!--<td align="left" class="text2">Grupo</td>-->
<td colspan="4" align="center" class="tituloc" ><strong>Acciones</strong></td>
</tr>
<?
if ($donde=='p')
{
$sqlql="select * from nota where id_nota in ($ids) order by posicion asc";
}
else {
$sqlql="select * from nota where id_nota in ($ids) order by id_nota desc";
}
$resultl=$bd->ejecutar($sqlql);
$wf=0;
while ($rowl=@$bd->obtener_fila($resultl,0)){
$idgrup=$rowl['id_nota'];
$sty='style=" background-color:#F0F0F0" ';
?>
<tr class="Arial12Gris" <? if ($wf%2==0) { echo $sty; } ?> >
<td align="left"><?=($rowl['titulo'])?>. <br /> <span class="Arial11RojoM">
  <?=fechag($rowl['fecha'])?>
  . - <?=hora($rowl['hora'])?>.</span></td>
<td align="left"><?php 
		$idsecc=$rowl['seccion'];
		$secc="select * from seccion where id=$idsecc";
		$ksecc=$bd->ejecutar($secc);
	    $sef=@$bd->obtener_fila($ksecc,0);
		echo ($sef['nombre']); ?>&nbsp;</td>
<td align="center"   class="link"><? 
$bif=$rowl['id_nota'];
$bf=$bd->ejecutar("select id from foto where id_nota=$bif");
$tot=$bd->num_rows($bf);
if ($tot>0){ ?>
  <a href="verfoton.php?id=<?=$rowl['id_nota'];?>&amp;"> <img src="imagenes/Slideshow.png" width="25" border="0" /> </a>
  <? } else { ?>
  <img src="imagenes/qfotoff.png" width="25" border="0" />
  <? } ?></td>
<td align="center"   class="link"><a href="upfoto.php?idnota=<?=$rowl['id_nota'];?>">
<?  if ($tot>0){ ?>
<img src="imagenes/fot.png" width="23" height="17" border="0" title="Nota con Foto" />
<? } else { ?>
<img src="imagenes/fotoff.png" width="23" height="17" border="0" title="Nota sin Foto" />
<? } ?>
</a></td>
<td align="center"   class="link">
  <? if ($kp['notas']==7 or $kp['notas']==6 or $kp['notas']==3 or $kp['notas']==2){ ?>
  <a href="upnota.php?id=<?=$rowl['id_nota'];?>&ids=<?=$ksec;?>" ><img src="imagenes/up.png" border="0" title="Modificar" /></a>
  <? } ?></td>
<td align="center"   class="link">
  <? if ($kp['notas']==7 or $kp['notas']==6 or $kp['notas']==5 or $kp['notas']==4){ ?>
  <a href="delnota.php?id=<?=$rowl['id_nota'];?>&ids=<?=$ksec;?>" class="text1" onclick = "if (! confirm('¿Realmente desea eliminar la nota?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a><? } ?>
</td>
</tr>
<?  $wf++; } ?>
<tr>
<td colspan="6">
<form action="<? $_SERVER['php_self']; ?>" method="get" name="form1" class="hevel11Gris" id="form1">
<?php  $pagedResults->setLayout(new DoubleBarLayout());
echo $pagedResults->fetchPagedNavigation(); ?> 
<span class="copy">ir a pagina</span>
<input name="page" type="text"  id="page" size="5" style="width:50px" /><input type="submit" name="ir" value="ir" />
</form>
</td>
</tr>
</table>
</td>
</tr>  <tr style="border: 0px; background: #000000">
<td height="37" align="left" class="bcoabajo" >
<? include "footer.php"; ?> 
</td>
</tr>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} 
else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; } 
} ?>