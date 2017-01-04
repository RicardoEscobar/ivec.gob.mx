<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; exit(); }   
function mes($mes){
	switch ($mes) {
		case 1:
			return "Enero";
			break;
		case 2:
			return "Febrero";
			break;
		case 3:
			return "Marzo";
			break;
		case 4:
			return "Abril";
			break;
		case 5:
			return "Mayo";
			break;
		case 6:
			return "Junio";
			break;
		case 7:
			return "Julio";
			break;
		case 8:
			return "Agosto";
			break;
		case 9:
			return "Septiembre";
			break;
		case 10:
			return "Octubre";
			break;
		case 11:
			return "Nobiembre";
			break;
		case 12:
			return "Diciembre";
			break;
	}
	
	
	}

include ("Paginated.php");
include ("DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
$dato=$_POST['dato'];
$mes=$_POST['mes'];
$idf=$_POST['idf'];

if ($mes>0){ $cad='and mes='.$mes; } else { $cad=''; }

$rsx=$bd->ejecutar("select id from fracc_contenido where fracc=$idf and ano=$dato $cad order by ano desc, mes asc");

  

$names= array();
while ($arra=@$bd->obtener_fila($rsx,0))
{
	$names[]=$arra['id'];

}
?>
<table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            
            <tr class="Hevel16Gris">
              <td width="75" align="left"  class="text2"><strong>A&ntilde;o</strong></td>
              <td width="59" align="left"  class="text2"><strong>Mes</strong></td>
              <td width="294" align="left"  class="text2"><strong> Titulo</strong></td>
              <!--<td align="left" class="text2">Grupo</td>-->
              <td colspan="5" align="center"  class="text2"><strong>Acciones</strong></td>
            </tr>
            <?
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['feccpagedc']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['feccpagedc'];
		}
		$pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;   
		}				
						$sqll="Select *  from fracc_contenido where id in ($ids) order by ano desc, mes asc";
						$resultl =@$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
						$idgrup=$rowl['id'];
						?>
            <tr class="Hevel16Gris" <? if ($wf%2==0) { echo $sty; } ?> >
              <td align="left" valign="middle"  class="Arial12Gris"> <?=$rowl['ano']?> </td>
              <td align="left" valign="middle"  class="Arial12Gris"><?=mes($rowl['mes']) ?> </td>
              <td align="left" valign="middle"  class="Arial12Gris"><?=htmlentities($rowl['titulo'])?>              </td>
              <td width="27" align="center" background="../imagen/back1.jpg"  class="link">&nbsp;</td>
              <td width="11" align="center" background="../imagen/back1.jpg"  class="link">&nbsp;
              </td>
              <td width="23" align="center" background="../imagen/back1.jpg"  class="link">&nbsp;</td>
              <td width="23" align="center" background="../imagen/back1.jpg"  class="link"><a href="upddocf.php?id=<?=$rowl['id'];?>" ><img src="imagenes/up.png" border="0" title="Modificar" /></a></td>
              <td width="24" align="center" background="../imagen/back1.jpg"  class="link"><a href="deldocf.php?id=<?=$rowl['id'];?>" class="text1" onclick = "if (! confirm('&iquest;Realmente desea eliminar : <?=$rowl['nombre']?>?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a></td>
            </tr>
            <?  $wf++; } ?>
          </table>