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


$rsx=$bd->ejecutar("select id from directorio order by orden asc");	
  

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
<title>
<?=$pageTitle;?>
:. Admin - Cartelera</title>
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
      <td align="center" ><table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" >
        <tr class="columna">
          <td align="left"  class="negro1"><table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            <tr class="Hevel16Gris" <? if ($wf%2==0) { echo $sty; } ?> >
              <td colspan="2" align="left" valign="middle"  class="Arial12Gris"><table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
                <tr>
                  <td colspan="7" align="center"  class="Verdana16Ngo"><strong>Administrar Directorio <a href="adddirec.php"><img src="imagenes/m.png" border="0"  title="Nuevo"/></a></strong></td>
                </tr>
                <tr class="Hevel16Gris">
                  <td height="28" align="left"  class="text2"><strong>Nombre</strong></td>
                  <td align="left"  class="text2"><strong>Puesto</strong></td>
                  <td align="left"  class="text2"><strong>Orden</strong></td>
                  <td width="40" align="left"  class="text2"><strong>Curriculum</strong></td>
                  <!--<td align="left" class="text2">Grupo</td>-->
                  <td colspan="2" align="center"  class="text2"><strong>Acciones</strong></td>
                </tr>
                <?
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['pagedirectorioxxxx']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['pagedirectorioxxxx'];
		}
		$pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}				
						$sqll="Select * from   directorio  where id in ($ids) order by orden asc";
						$resultl =@$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
						$idgrup=$rowl['id'];
						?>
                <tr class="Hevel16Gris" <? if ($wf%2==0) { echo $sty; } ?> >
                  <td align="left" valign="middle"  class="Arial12Gris"><?=$rowl['nombre']?></td>
                  <td align="left" valign="middle"  class="Arial12Gris"><?=$rowl['puesto']?></td>
                  <td align="left" valign="middle"  class="Arial12Gris"><?=$rowl['orden']?></td>
                  <td align="center" valign="middle"  class="Arial12Gris"><? if (file_exists($rowl['url'])){ ?>
                    <a href="<?=$rowl['url'];?>" target="_blank"><img src="imagenes/pdf.png" width="25" height="24" /></a>
                    <? } else { ?>
                    <img src="imagenes/pdfn.png" width="25" height="24" />
                    <? } ?></td>
                  <td width="20" align="center" background="../imagen/back1.jpg"  class="link"><a href="updirec.php?id=<?=$rowl['id'];?>" ><img src="imagenes/up.png" border="0" title="Modificar" /></a></td>
                  <td width="20" align="center" background="../imagen/back1.jpg"  class="link"><a href="deldirec.php?id=<?=$rowl['id'];?>" class="text1" onclick = "if (! confirm('&iquest;Realmente desea eliminar : <?=$rowl['nombre']?>?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a></td>
                </tr>
                <?  $wf++; } ?>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr></table>
      </td>
  </tr>
  <tr>
    <td align="center" class="Arial12Gris">
    <form id="form1" name="form1" method="get" action="<? $_SERVER['php_self']; ?>">
      <p>
        <?php  $pagedResults->setLayout(new DoubleBarLayout());
	      echo $pagedResults->fetchPagedNavigation(); ?>
        ir a pagina
        <input name="page" type="text"  id="page" size="5" style="width:50px" />
        <input type="submit" name="ir" value="ir" />
      </p>
    </form>
    </td>
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