<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; exit(); }   


include ("Paginated.php");
include ("DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
$dato=$_POST['dato'];
if ($dato>0){
$rsx=$bd->ejecutar("select id from fracciones where numero='$dato' order by numero asc");
} else { 

$rsx=$bd->ejecutar("select id from fracciones order by numero asc");
}
  

$names= array();
while ($arra=@$bd->obtener_fila($rsx,0))
{
	$names[]=$arra['id'];

}
?>
<table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
           
            <tr class="Hevel16Gris">
              <td colspan="2" align="left"  class="text2"><strong>Nombre</strong></td>
              <!--<td align="left" class="text2">Grupo</td>-->
              <td colspan="5" align="center"  class="text2"><strong>Acciones</strong></td>
            </tr>
            <?
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['feccpage']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['feccpage'];
		}
		$pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}				
						$sqll="Select *  from fracciones where id in ($ids) order by numero asc";
						$resultl =@$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
						$idgrup=$rowl['id'];
						?>
            <tr class="Hevel16Gris" <? if ($wf%2==0) { echo $sty; } ?> >
              <td colspan="2" align="left" valign="middle"  class="Arial12Gris"> <a href="datosf.php?id=<?=$rowl['id'];?>" class="Arial12Gris666"><? echo NumerosRomanos::decimalRomano($rowl['numero']); ?> .- <?=htmlentities($rowl['titulo'])?>
              </a></td>
              <td width="27" align="center" background="../imagen/back1.jpg"  class="link">&nbsp;</td>
              <td width="11" align="center" background="../imagen/back1.jpg"  class="link">&nbsp;
              </td>
              <td width="23" align="center" background="../imagen/back1.jpg"  class="link">&nbsp;</td>
              <td width="23" align="center" background="../imagen/back1.jpg"  class="link"><a href="upfracc.php?id=<?=$rowl['id'];?>" ><img src="imagenes/up.png" border="0" title="Modificar" /></a></td>
              <td width="24" align="center" background="../imagen/back1.jpg"  class="link"><a href="delfracc.php?id=<?=$rowl['id'];?>" class="text1" onclick = "if (! confirm('&iquest;Realmente desea eliminar : <?=$rowl['nombre']?>?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a></td>
            </tr>
            <?  $wf++; } ?>
          </table>