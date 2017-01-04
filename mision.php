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
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#006699" class="recintos" style="color:#FFF; padding-left:8px">Misión, Visión y Principios</td>
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
           <td colspan="2" align="left" class="Arial23Gris"><table width="612" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #006699;"><strong>Misión</strong></div></td>
               <td width="205" rowspan="8" align="center" valign="top"><div style="float: left; width: 99%; text-align: center;"><img src="imagenes/pasillo.png" width="189" height="245" border="0" align="middle" /></div><br />
                 <div style="float: left; width: 99%; text-align: center; margin-top: 15px;"><img src="imagenes/fuente.png" width="131" height="160" border="0" align="middle" /></div></td>
             </tr>
             <tr>
               <td class="negro14">Preservar,   promover y difundir cultura, por medio de la participación amplia y   plural de la ciudadanía para fortalecer los valores y el patrimonio   cultural de los veracruzanos.</td>
               </tr>
             <tr>
               <td>&nbsp;</td>
               </tr>
             <tr>
               <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #006699;"><strong>Visión</strong></div></td>
               </tr>
             <tr class="negro14">
               <td><p>La   sociedad veracruzana ejerce de manera plena y responsable su derecho a   la cultura, reconoce el carácter plural de su identidad y valora la   diversidad cultural como elemento sustancial de la existencia humana. La   cultura veracruzana dialoga con las culturas del país y del mundo. Las   acciones culturales se definen y desarrollan mediante el consenso y la   participación activa de la ciudadanía; la labor institucional se realiza   de forma profesional, comprometida, respetuosa, eficiente y   transparente</p></td>
               </tr>
             <tr>
               <td>&nbsp;</td>
               </tr>
             <tr>
               <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #006699;"><strong>Principios</strong></div></td>
               </tr>
             <tr class="negro14">
               <td valign="top"><br />
                 &bull; Reconocimiento de la diversidad cultural<br />
                 <br />
                 &bull; Participación social<br />
                 <br />
                 &bull; Equidad de género<br />
                 <br />
                 &bull; Transparencia en la actividad cultural</td>
               </tr>
             <tr>
               <td>&nbsp;</td>
               </tr>
             <tr>
               <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #006699;"><strong>Código de Conducta</strong></div></td>
               </tr>
             <tr class="negro14">             	
               <td valign="top"><br />
                 &bull; <a href="admin/convocatorias/2015-05-26/CODIGO_DE_CONDUCTA.pdf"> Descargar Codigo de Conducta</a><br />
                 <br />
                 </td>                 
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