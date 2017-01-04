<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=2;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
$secc1=$_GET['secc1'];
if ($secc1>0){ $cad=' and id='.$secc1.' ';  }
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
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
<script language="javascript" src="jquery.js"></script>
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
 
	
	function  busqueda(){
		var buscar=$("#buscar").val();
		$.post("buscara.php", {buscar:buscar}, function (data) {
			$("#resultados").html(data);
			
		});
	}
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td align="left" bgcolor="#006210" class="recintos" style="color:#FFF">Historia</td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <table width="613" border="0" cellspacing="0" cellpadding="5">
        
        <tr>
          <td class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td> 
     
          
          
       
          </td>
        </tr>
        <tr>
          <td height="1px" align="center"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td>
        </tr>

         <tr>
          <td height="1px" align="left" class="Arial23Gris"><table border="0" cellpadding="3" cellspacing="3" width="99%">
            <tbody>
              <tr>
                <td class="negro14" style="text-align:justify"><img src="imagenes/historia_ivec.jpg" width="270" height="280" border="0" align="right" style="padding:0 0 8px 8px"  />En   pleno Centro Histórico del Puerto de Veracruz se ubica el bello   edificio del siglo XVIII que alberga al Instituto Veracruzano de la   Cultura. El inmueble es parte de las edificaciones coloniales que   todavía conserva la ciudad y una de sus características son los muros de   piedra múcara, rasgo de la arquitectura colonial porteña.<br />
                  <br />
                  Desde su origen, el antiguo convento del siglo XVIII,   de Betlehemitas, fue Convento Hospital, dándole el nombre de los Santos   Reyes o el de Nuestra Señora de Belén. El establecimiento hospitalario   empezó a funcionar por medio de los frailes en 1775. Para 1789 esta   institución atendía a mil quinientos convalecientes por año.<br />
                  <br />
                  El Convento Hospital de los Betlehemitas dio servicio   hasta principios del siglo XIX, ya que la orden de los frailes encargada   de administrarlo fue inhabilitada por la Corte de España en 1820. A   solicitud del Ayuntamiento de Veracruz al Gobierno Central, en 1823 los   bienes de los Betlehemitas pasaron a manos de las autoridades porteñas a   través de la Junta de Caridad, quienes tomaron el edificio para   trasladar allí al Hospital Civil de San Sebastián (llamado así en honor   al Santo Patrono de la Ciudad), que no contaba con un inmueble propio.   El Hospital cambió su nombre por el de Hospital Civil Aquiles Serdán, a   principios de 1916.<br />
<br />
                  Dos   siglos después de la fundación del Convento de los Betlehemitas, en   1975, se anunciaba su cierre al decidir el Gobernador del Estado, Rafael   Hernández Ochoa, la fusión del Hospital Aquiles Serdán y el Hospital   Regional de la ciudad de Veracruz.<br />
                    <br />
                    Después de estar cerrado por cinco años, el edificio   fue restaurado por el Gobierno de Veracruz y en 1987, por iniciativa de   Ley, se crea el Instituto Veracruzano de la Cultura, otorgándosele   dichas instalaciones como su sede.<br />
                    <br />
                    Los amplios pasillos y jardines del antiguo convento   de los Betlemitas son ahora espacios que sirven como marco a un sin fin   de actividades artístico-culturales que ponen de manifiesto la riqueza   cultural de Veracruz. </td>
              </tr>
              </tbody>
          </table></td></tr>
        
        <tr>
          <td height="1px" align="left">&nbsp;</td>
        </tr>
        <tr>
          <td height="1px" align="center">&nbsp;</td>
        </tr>
        

     
      </table>
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