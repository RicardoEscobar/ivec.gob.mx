<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 


include ("Paginated.php");
include ("DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();


$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);
if ($kp['catalogo']!=0){

	



$rsx=$bd->ejecutar("select id from autor where id!=1 order by nombre asc");
$names= array();
while ($arra=@$bd->obtener_fila($rsx,0))
{
	$names[]=$arra['id'];

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Autores</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float:left; width:960px; background-color:#000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">

<table align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
    <table width="501" border="0" align="center" cellpadding="4" cellspacing="0" class="link" >
      <tr>
        <td colspan="5" align="center"  class="Verdana16Ngo"><strong>Autores <? if ($kp['catalogo']==7 or $kp['catalogo']==5 or $kp['catalogo']==3 or $kp['catalogo']==1){ ?><a href="addautor.php"><img src="imagenes/m.png" border="0"  title="Nuevo"/></a><? } ?></strong></td>
      </tr>
      <tr class="Hevel16Gris">
        <td align="left"><strong>Nombre del Autor</strong></td>
        <td align="left"><strong>Notas</strong></td>
        <td align="left"  class="text2"><strong>Foto</strong></td>
        <!--<td align="left" class="text2">Grupo</td>-->
        <td align="center"  class="text2"><strong>Acciones</strong></td>
      </tr>
          
          <?
		  						
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['scverautor']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['scverautor'];
		}
		$pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}
						
						$sqll="Select * from autor where id in ($ids) order by nombre asc";
						$resultl = @$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl = @$bd->obtener_fila($resultl,0)){
						$idgrup=$rowl['id'];
						//$resf1=@mysql_query("select * from galeriafoto where id_gal=$id_gal");
						//$rowf1=@mysql_fetch_array($resf1);
						//$imprgal=$rowf1['url'].$rowf1['id'].'_11.jpg';
						?>
      <tr class="columna" <? if ($wf%2==0) { echo $sty; } ?>>
        <td width="222" align="left"  class="Arial12Gris">
          <?=$rowl['nombre']?></td>
        <td width="49" align="left"  class="negro1">
		<? if ($rowl['nota']==1){ ?> <a href="upa.php?n=1&id=<?=$rowl['id'];?>"><img src="imagenes/notaon.png" border="0" title="Cambiar"></a> 
          <? }else{ ?> <a href="upa.php?n=0&id=<?=$rowl['id'];?>"><img src="imagenes/notaoff.png" border="0" title="Cambiar"></a> <? } ?></td>
        <td width="33" align="left"  class="negro1">
		<? if ($rowl['foto']==1){ ?> <a href="upa.php?f=1&id=<?=$rowl['id'];?>"><img src="imagenes/fot.png" border="0" title="Cambiar"></a> <? } else { ?>
        <a href="upa.php?f=0&id=<?=$rowl['id'];?>"><img src="imagenes/fotoff.png" border="0" title="Cambiar"></a> <? } ?></td>
        <td width="145" align="center" background="../imagen/back1.jpg"  class="link">&nbsp;&nbsp;<? if ($kp['catalogo']==7 or $kp['catalogo']==6 or $kp['catalogo']==3 or $kp['catalogo']==2){ ?><a href="updateautor.php?id=<?=$rowl['id'];?>"><img src="imagenes/up.png" border="0" title="Modificar" /></a>&nbsp;&nbsp;<?  } ?>
       <? if ($kp['catalogo']==7 or $kp['catalogo']==6 or $kp['catalogo']==5 or $kp['catalogo']==4){ ?>
        <a href="delautor.php?id=<?=$rowl['id'];?>" class="text1"  onclick = "if (! confirm('¿Realmente desea eliminar a: <?=$rowl['nombre']?>?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a><? } ?></td>
      </tr>
     <?  $wf++; } ?>
    </table>
   </td>
  </tr>
  <tr>
    <td align="center" class="Arial12Gris"><form action="<?=$_SERVER['php_self']; ?>" method="get" name="form1" class="Arial12Gris" id="form1">
      <?php  $pagedResults->setLayout(new DoubleBarLayout());
	      echo $pagedResults->fetchPagedNavigation(); ?>
      ir a pagina
      <input name="page" type="text"  id="page" size="5" style="width:50px" />
      <input type="submit" name="ir" value="ir" />
    </form></td>
  </tr>
  <tr>
    <td align="center"><img src="lingris.jpg" width="768" height="1" /></td>
  </tr>
</table>
           </td>
</tr>  <tr style="border:0px; background:#000000">
      <td height="37" align="left" class="bcoabajo" >
      <? include "footer.php"; ?> 
      </td>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; }  } ?>