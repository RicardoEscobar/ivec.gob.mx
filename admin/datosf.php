<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 


include ("Paginated.php");
include ("DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';

function mes($mes){
	switch ($mes) {
		case 0:
			return "General";
			break;
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

$bd=Db::getInstance();

$id=$_GET['id'];
if ($id!=''){ $_SESSION['iddelafraccion']=$id; }
$fracc=$_SESSION['iddelafraccion'];

$rsx=$bd->ejecutar("select id from fracc_contenido where fracc=$fracc order by ano desc, mes desc");	
  

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
<title><?=$pageTitle;?>:. Admin - Notas</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<script language="javascript">
function buscar(){
	var dato = $("#numero").val(); 
	var mes  = $("#mes").val();
	var idf  = <?=$fracc?>;
	
	$.post("buscafd.php", {dato:dato, mes:mes, idf:idf}, function(data){
		$("#resultado").html(data);
	});
}

</script>


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
          <td align="left"  class="negro1">
             <table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            <tr>
              <td colspan="5" align="center"  class="Verdana16Ngo"><strong>Administrar Doctos de Fracciones 
                <a href="adddocf.php"><img src="imagenes/m.png" border="0"  title="Nuevo"/></a></strong></td>
              <td colspan="2" align="center"  class="Verdana16Ngo">&nbsp;</td>
              </tr>
            <tr class="Hevel16Gris">
              <td width="58" align="left"  class="Arial12Gris">Buscar por a&ntilde;o:</td>
              <td width="80" align="left"  class="Arial12Gris"><label for="numero"></label>
                <input name="numero" type="text" id="numero" style="width:40px" autocomplete="off" onkeyup="buscar()" value="<?=date("Y")?>" /></td>
              <td width="68" align="left"  class="Arial12Gris">Mes</td>
              <td width="135" align="left"  class="Arial12Gris"><label for="mes"></label>
                <select name="mes" id="mes" onchange="buscar()">
	              <option value="-1" selected="selected">Seleccione</option>
                  <option value="0">Todos</option>
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select></td>
              <td width="161" align="left"  class="Arial12Gris">&nbsp;</td>
              <td width="50" align="center"  class="text2">&nbsp;</td>
            </tr>
            </table>
          <div id="resultado">
          <table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            
            <tr class="Hevel16Gris">
              <td width="75" align="left"  class="text2"><strong>A&ntilde;o</strong></td>
              <td width="59" align="left"  class="text2"><strong>Mes</strong></td>
              <td width="294" align="left"  class="text2"><strong> Titulo</strong></td>
              <!--<td align="left" class="text2">Grupo</td>-->
              <td colspan="2" align="center"  class="text2"><strong>Acciones</strong></td>
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
              <td align="left" valign="middle"  class="Arial12Gris"> 
			  <? if ($rowl['mes']>0){ 
			  echo $rowl['ano']; } else { echo '- - - -'; } ?> </td>
              <td align="left" valign="middle"  class="Arial12Gris"><?=mes($rowl['mes']) ?> </td>
              <td align="left" valign="middle"  class="Arial12Gris"><?=$rowl['titulo']?>              </td>
              <td align="center" background="../imagen/back1.jpg"  class="link">              <a href="upddocf.php?id=<?=$rowl['id'];?>" ><img src="imagenes/up.png" border="0" title="Modificar" /></a></td>
              <td align="center" background="../imagen/back1.jpg"  class="link"><a href="deldocf.php?id=<?=$rowl['id'];?>" class="text1" onclick = "if (! confirm('&iquest;Realmente desea eliminar : <?=$rowl['nombre']?>?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a></td>
            </tr>
            <?  $wf++; } ?>
          </table>
          </div>
          </td>
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