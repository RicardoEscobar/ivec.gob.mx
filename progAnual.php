<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
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
li { margin-bottom:10px }
</style>
</head>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#0071C4" class="gris25" style="color:#FFF; padding-left:8px"><a href="fracciones.php" class="recintos"  style="color:#FFF;" >Transparencia</a></td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <form method="post" action="datosf.php?id=<?=$id?>">
      <table width="613" border="0" cellspacing="0" cellpadding="5">
        
        <tr>
          <td colspan="4" class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td colspan="4"> 
     
          </td>
        </tr>
        <tr>
          <td colspan="4" align="left" class="Arial12Nego"><table width="600" border="0" align="center" cellpadding="5" cellspacing="0" >
            
            <tr class="Hevel16Gris" >
              <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 19px" width="300"> <span class="negro19">
               Programa Anual de Adquisiciones <!--<?=$rowl['titulo']?>-->
                </span><br />
                
                <!--Las convocatorias a los procedimientos administrativos de licitación pública, licitación restringida o simplificada, 
                incluidos los contratos o pedidos resultantes, además, de elaborarse un listado con las ofertas económicas consideradas. 
                En el caso de los procedimientos administrativos de licitación.<?=nl2br($rowl['descrip'])?></span></td>-->
            </tr>
          </table></td>
        </tr>

        <tr>
          <td colspan="4" align="left" class="Arial12Nego"><table width="600" border="0" align="center" cellpadding="5" cellspacing="0" >
           
            <tr class="Hevel16Gris" >
              <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 19px" width="300"><ul type=circle>
                <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-02-17/1408.pdf" target="_blank"><span class="negro19">Programa Anual de Adquisiciones 2016</span><br /><br /></li>
                <li><a href="http://www.litorale.com.mx/ivec/admin/fracciones/2016-03-21/PAA2015.pdf" target="_blank"><span class="negro19">Programa Anual de Adquisiciones 2015</span><br /><br /></li>
                <li><a href="http://www.litorale.com.mx/ivec/admin/fracciones/2014-03-14/965.pdf" target="_blank"><span class="negro19">Programa Anual de Adquisiciones 2014</span><br /><br /></li>
                <li><a href="http://www.litorale.com.mx/ivec/admin/fracciones/2016-03-21/PAA2013.pdf"><span class="negro19">Programa Anual de Adquisiciones 2013</span><br /><br /></li>

              </ul></td>
            </tr>
          </table></td>
        </tr>
         </table>
         </form>
      </div>
      </td>
      <td width="17">&nbsp;</td>
      <td width="300" valign="top" bgcolor="#E8E2D4">&nbsp;</td>
    </tr>
    </table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>