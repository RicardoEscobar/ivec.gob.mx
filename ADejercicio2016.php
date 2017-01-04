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

<div style="width:930px; margin:auto; ">

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
              <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 19px" width="300"> 
                <span class="negro19"> Adjudicaciones Directas: Ejercicio 2016 </span><br />
                <span style="color:#333; font-size: 15px"> Responsable de la Información: Subdirección Administrativa.<br /> 
                </span></td>
            </tr>
          </table></td>
        </tr>

        <tr>
          <td colspan="4" align="left" class="Arial12Nego"><table width="600" border="0" align="center" cellpadding="5" cellspacing="0" >
           
            <tr class="Hevel16Gris" >
              <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 19px" width="300"><ul type=circle>
                <li><span class="negro19">Enero</span><br /><br />
                  <ul>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/TarjetasInformativas/Enero2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                    <!--<li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-01-25/1403.pdf" target="_blank"><span style="color:#333; font-size: 15px">Reporte Mensual de Contratos, Fianzas y Entrega de Bienes y/o Servicios 1a Quincena Enero 2016</span></a><br /><br /></li>-->
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-02-03/1404.%20qna%20enero%202016.pdf.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                    <!--<li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-02-03/1405.pdf" target="_blank"><span style="color:#333; font-size: 15px">Reporte Mensual de Contratos, Fianzas y Entrega de Bienes y/o Servicios 2a Quincena Enero 2016</span></a><br /><br /></li>-->
                  </ul>
                </li>
                <li><span class="negro19">Febrero</span><br /><br />
                  <ul>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-02-16/1406.iv.pdf.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-03-03/1413.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                  </ul>
                </li>
                <li><span class="negro19">Marzo</span><br /><br />
                  <ul>
                    <li><a href=" http://litorale.com.mx/ivec/admin/fracciones/2016-03-21/1452.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-04-05/1485.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                  </ul>
                </li>
                <li><span class="negro19">Abril</span><br /><br />
                  <ul>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/2016-04-18/1498.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_ABRIL2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                  </ul>
                </li>
                <li><span class="negro19">Mayo</span><br /><br />
                  <ul>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_MAYO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_MAYO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                  </ul>
                </li>
                <li><span class="negro19">Junio</span><br /><br />
                <ul>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_JUNIO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                    <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_JUNIO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                  </ul>
                </li>
                <li><span class="negro19">Julio</span><br /><br />
                    <ul>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_JULIO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_JULIO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                      </ul>
                </li>
                <li><span class="negro19">Agosto</span><br /><br />
                    <ul>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_AGOSTO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_AGOSTO_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                    </ul>
                </li>
                <li><span class="negro19">Septiembre</span><br /><br />
                    <ul>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_SEPTIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_1Q_SEPTIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena - Contratos y Fianzas</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_SEPTIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_2Q_SEPTIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena - Contratos y Fianzas</span></a><br /><br /></li>
                    </ul>
                </li>
                <li><span class="negro19">Octubre</span><br /><br />
                  <ul>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_OCTUBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_1Q_OCTUBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena - Contratos y Fianzas</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_OCTUBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_2Q_OCTUBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena - Contratos y Fianzas</span></a><br /><br /></li>
                    </ul>
                </li>
                <li><span class="negro19">Noviembre</span><br /><br />
                  <ul>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_NOVIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_1Q_NOVIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena - Contratos y Fianzas</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_NOVIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena (Actualizada)</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_2Q_NOVIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena - Contratos y Fianzas</span></a><br /><br /></li>
                    </ul>
                </li>
                <li><span class="negro19">Diciembre</span><br /><br />
                  <ul>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_1Q_DICIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_1Q_DICIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">1a Quincena - Contratos y Fianzas</span></a><br /><br /></li>
                      <!--<li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/REP_2Q_NOVIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena</span></a><br /><br /></li>
                      <li><a href="http://litorale.com.mx/ivec/admin/fracciones/FraccionXIV/AdjudicacionesDirectas/CONTRATOS_2Q_NOVIEMBRE_2016.pdf" target="_blank"><span style="color:#333; font-size: 15px">2a Quincena - Contratos y Fianzas</span></a><br /><br /></li>-->
                    </ul>
                </li>
                <li><span class="negro19">Diciembre</span><br /><br /></li>
                
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