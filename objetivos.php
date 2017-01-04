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
li { margin-bottom:10px }
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
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#015C5C" class="recintos" style="color:#FFF; padding-left:8px">Objetivos</td>
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
          <td colspan="2" class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td colspan="2"> 
     
          
          
       
          </td>
        </tr>
        <tr>
          <td height="1" colspan="2" align="center"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td>
        </tr>

         <tr>
           <td colspan="2" align="left" class="negro14"><table width="612" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td>
                 <img src="imagenes/pasillo2.png" alt="PASILLO2" name="PASILLO2" width="190" height="300" hspace="5" vspace="0" border="0" align="right" />
                 <ul type="circle">
                   <li>Preservar y   difundir en los ámbitos estatal, nacional e internacional, el patrimonio   cultural tangible e intangible, así como propiciar el intercambio y   circulación de los productos culturales, para el conocimiento,   reconocimiento y enriquecimiento de la cultura veracruzana.</li>
                   
                   <li>Fortalecer las   identidades y culturas veracruzanas, locales y regionales, para   garantizar su mantenimiento y continuidad; contribuir a la construcción   de relaciones interculturales respetuosas y armónicas, y por ende, al   desarrollo social del Estado.</li>
                   
                   <li>Combatir la   discriminación cultural, producto del desconocimiento de la diversidad,   mediante la difusión y el intercambio cultural.</li>
                   
                   <li>Estimular la   creación y la producción artística, así como promover el   perfeccionamiento y la actualización de los creadores de las diversas   disciplinas.</li>
                   
                   <li>Difundir ampliamente las diversas expresiones culturales que tienen lugar en Veracruz.</li>
                   
                   <li>Elevar la calidad   de los procesos educativos para alentar la creatividad y estimular la   sensibilidad hacia la diversidad de las expresiones culturales,   especialmente entre niños y jóvenes; e incidir en la formación de   promotores y creadores para la gestión y desarrollo de proyectos.</li>
                   
                   <li>Ampliar la   cobertura de los programas culturales hacia públicos con necesidades   especiales para garantizar el ejercicio de sus derechos culturales y la   equidad de los servicios institucionales.</li>
                   
                   <li>Optimizar los sistemas de planeación y evaluación acorde a las necesidades socioculturales del Estado.</li>
                   
                   <li>Fortalecer el   funcionamiento institucional para responder a las exigencias de   eficiencia, eficacia y calidad que se requieren para el logro de los   objetivos planteados.</li>
                   </ul>                 <br /></td>
               </tr>
             </table></td>
         </tr>
         <tr>
           <td colspan="2" align="left" class="Arial23Gris">&nbsp;</td></tr>
        
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