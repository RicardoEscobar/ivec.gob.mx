<? session_start();
require 'db.class.php';
require 'conf.class.php';
require 'fecha.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=4;
$_SESSION['voyparader']='artistas';
$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
if ($secc!='' and $secc>0){ $cd=',secc:'.$secc; } else { $cd=''; }  
$id=$_GET['id'];
if (!is_numeric($id)){ echo '<script language="javascript">  top.location="index.php"; </script>'; exit();  }
$colores=array('#EA870F','#C41230','#368B8F','#006210','#006699','#D24726','#1c557d','#FF8F32','#006210','#FD7726','#B60016','#666666','#83BEE8');
$br=$bd->ejecutar("select * from recintos where id=$id");
$krecin=$bd->obtener_fila($br,0);

$dia= strftime("%d");

$mes= strftime("%B");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instituto Veracruzano de la Cultura :: Recintos Culturales</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
background-color: #F2F2F2;
}
#lat0 td, #lat1 td, #lat2 td, #lat3 td {
padding: 4px 8px;
/* [disabled]border:1px solid #006; */
/* [disabled]border-radius: 7px; */
}
#lat1, #lat2, #lat3 table {
margin:0 0 8px 0;
}
a { color:#<?=$colores[$id-1]?> }
</style>
<style type="text/css" media="all">
@import url("scroll/bx.css");

</style>

<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="scroll/jquery-1.3.2.js"></script>
<script type="text/javascript" src="scroll/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scroll/jquery.bxSlider.js"></script>
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
</script>

    <script src="src/js/jscal2.js"></script>
    <script src="src/js/lang/es.js"></script>
    <link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="src/css/steel/steel.css" />
<script language="javascript">
	var fechax=0;	
		
function cambia(){
	var fecha=$("#datepicker").val();
	var monthNames=new Array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','Diciembre');
	if (fecha!=''){
		$("#calen").html('<div style="margin:170px auto;width:50px"<center><img src="loader.gif" /></center></div>');
		var arr=fecha.split("-");
		var mes=arr[1];
		if (mes=='01'){ mes=1; }
		if (mes=='02'){ mes=2; }
		if (mes=='03'){ mes=3; }
		if (mes=='04'){ mes=4; }
		if (mes=='05'){ mes=5; }
		if (mes=='06'){ mes=6; }
		if (mes=='07'){ mes=7; }
		if (mes=='08'){ mes=8; }
		if (mes=='09'){ mes=9; } 
		mes=parseInt(mes)-1;
		var meso=monthNames[mes];
		var dia=arr[2];
		$("#fechadia").html(dia+" "+meso);
		setTimeout(function(){
		$.post("caled.php", {fecha:fecha,dato:<?=$id?>}, function (data){ 
		 $("#resultados").html(""); $("#calen").html(data);
		});  }, 1000);
  
		setTimeout("checador()", 100);
	}
	else { $("#resultados").html("Seleccione una fecha");  }
}
$(document).ready(function(e) {
    $("#datepicker").change(function(e) {
        cambia();
    });
	$(document).scroll(function(e) {
      
	  
		
    });
});

function checador(){
var fecha=$("#datepicker").val(); 
if (fecha == fechax ){ 
setTimeout("checador()", 100);
}
 else { 
	fechax=fecha;
	cambia();
}  

}

setTimeout("repite()", 100);
var verx=0;
function ver(){
	$("#eldiv1").toggle("fast");
	$("#eldiv2").toggle("fast");
	verx = 0;	
}
function ver2(){
	if (verx==1){
	$("#eldiv1").css("display","block");
	$("#eldiv2").css("display","none");	
	}
}
function cambiax(){
	verx=1;
}
    </script>
    
</head>
<body onload="checador()">
<div style="width:930px; margin:auto;  ">
<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="79%" align="left" bgcolor="<?=$colores[$id-90]?>" class="recintos"><a href="admin/recintos/2012-11-13/Biografia.pdf">Joaquín Sorolla</a></td>
</tr>
</table>
</div>
<div style="width: 930px; float: left; height:auto;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td valign="top"><div style="width: 930px; height:300px; overflow:hidden; display:block; float: left;">
    <script type="text/javascript">
(function($){	
  $(function(){
    $('#slider1').bxSlider({
      auto: true,
      pager: true
    });
  });	
}(jQuery))
</script>
<div class="demo-wrap">
  <ul id="slider1">
 
<? 
$bn=$bd->ejecutar("select * from fotosr where recinto=$id"); 
while(@$rownf=@$bd->obtener_fila($bn)) {

	$url1='admin/'.$rownf['url'].$rownf['id'].'_g.jpg';


?>
  <li>
    <div style="float:left; width:930px;; height:300px" >
   <img src="<?=$url1;?>" width="930" height="300"  border="0" style="z-index:200"/>    
    </div>
  </li>
  <?  } ?>

  </ul>
  
  
</div>
  
  </div>
  </td>
</tr>
<tr>
  <td valign="top">
    <div style="width: 930px; float: left;"><img src="imagenes/pinacoteca.png" width="930" height="" /></div>
    </td>
</tr>
<tr>
  <td valign="top">
  <div  >
   <div style="float:left; width:930px; height:auto;">
   <div style="float:left; width:930px; height:auto;" id="eldiv1">
    <table width="930" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="914">
          <div class="especial" style="float: left; padding: 4px 7px; min-width: 235px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-90];?>;">
            <p>Prodigios  de Luz.</p>
          </div>
          
          &nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="12">&nbsp;</td>
        </tr>
      
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding:5px"><p><a href=&quot;admin/recintos/2012-11-13/Biografia.pdf>Joaquín Sorolla y sus contemporáneos.</a></p></td>
        <td>&nbsp;</td>
        <td rowspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Arial12Gris" style="padding:5px 10px"><p>*Una  de las tres magnas exposiciones con que concluye el Ivec el 2012<br />
          *El  público estará en contacto con los maestros de la pintura europea.  <br />
          *Se  inaugura el próximo miércoles 21 y se exhibirá hasta el 15 de febrero de 2013.</p>
          <p><br />
            <strong>Orizaba, Ver., 09 de noviembre  de 2012.-</strong> El  Gobierno del Estado, en el marco del 25 Aniversario del  Instituto Veracruzano de la Cultura y el 20  Aniversario del Museo de Arte del Estado, con apoyo del Conaculta,  presenta a todo el público, la exposición  temporal: <em>Prodigios de Luz, Joaquín  Sorolla y sus contemporáneos,</em> muestra que reúne obras de pintura española  en transición de los siglos XIX al XX.<br /><br />
            Ésta  es una de las tres grandes exposiciones con que la administración del doctor  Javier Duarte de Ochoa, concluye las actividades culturales del 2012, junto con  la de &ldquo;100 años de Paisaje en Veracruz&rdquo;, que se exhibirá a partir del  día 15 de este mes en la Galería Veracruzana de Arte del World Trade Center  Veracruz. Y la colección del gran pintor Diego Rivera que se mostrará en el  Recinto sede del Ivec<br /><br />
            Joaquín Sorolla y sus contemporáneos es  una magna selección  de obras del gran artista valenciano y de algunos de los pintores más  destacados del arte español, que   conforman la exposición Prodigios de luz, Joaquín Sorolla y sus  contemporáneos, que se inaugura el próximo miércoles 21 de  este mes,   en el Museo de Arte del Estado de Veracruz, ubicado en esta ciudad.<br /><br />
            Prodigios  de luz, Joaquín Sorolla y sus contemporáneos, es una muestra conformada por 36  obras, 35 de ellos procedentes del Museo de Bellas Artes de la Habana Cuba y  una del Museo Nacional de San Carlos, del Instituto Nacional de Bellas Artes,  que busca acercar al público veracruzano la obra de este genio del  impresionismo europeo, pero también la de sus contemporáneos, que formaron  parte de un movimiento poco estudiado y que algunos expertos califican como &ldquo;Luminismo&rdquo;.<br /><br />
            La  exposición incluye uno de los últimos lienzos que pintó Sorolla, se trata de  &ldquo;Niño comiendo sandía&rdquo; un óleo que data de 1920. También se exhibe &ldquo;Elena entre  rosas&rdquo;, un retrato de su hija, que bien podría haber sido pintado en el jardín  de su casa de Madrid.<br /><br />
            Se trata de una de las grandes  muestras que se exhiben en el país en este 2012,  fue posible gracias a la integración de los  acervos de la Painters Society y la colaboración del Museo Nacional de Arte de  la Habana y el préstamo de una obra del Museo Nacional de San Carlos informo el  director general  del Instituto Veracruzano  de la Cultura,  maestro Alejandro Mariano  Pérez.</p>
          <p>Está  diseñada para acercar a la sociedad veracruzana con la obra de los maestros de  la pintura europea más representativa dentro de la contemporaneidad del artista  universal Diego Rivera y obedece a la política de estado implementada por el  Gobernador del Estado, doctor Javier Duarte de Ochoa de intercambio cultural,  Joaquín Sorolla y sus contemporáneos, llega a Veracruz en contraprestación por  la itinerancia de la Colección Diego Rivera por España en el año 2011.<br /><br />
            Se  exhiben en esta exposición 16 obras de Sorolla, y se suponen un reflejo de la  evolución de su producción desde el año 1887 hasta 1920, tres años antes de su  muerte. Se exhiben además las pinturas de ocho artistas valencianos más como  Manuel Benedito o Ignacio Pinazo; de los catalanes Hermenegildo Anglada  Camarasa y Santiago Rusiñol; del sevillano Gonzalo Bilbao y del vasco Ignacio  Zuloaga.<br /><br />
            La  sede es el Museo de Arte del Estado de Veracruz, ubicado en el Antiguo Oratorio  San Felipe Neri de esta ciudad  (Oriente  4 sin número, esquina <u>S</u>ur 23, teléfono (272) 72 4 32 00) del 21 de este  mes al 15 de febrero de 2013 y es posible gracias al subsidio 2012 recibido del  Consejo Nacional para la Cultura y las Artes.<br />
            La  inauguración se llevará a cabo el miércoles 21 de este mes  en punto de las 20:00 horas. </p>
            
            <a href=&quot;admin/recintos/2012-11-13/Biografia.pdf>Biografía</a>
            </td>
        <td>&nbsp;</td>
        </tr>
        </table>
        </div>
        <div style="float:left; width:930px; height:auto; display:none" id="eldiv2" onmouseover="cambiax()" onmouseout="ver2()">
        <table width="930" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="346">
          <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-1];?>;"><strong>Semblanza</strong></div>
          
          &nbsp;</td>
        <td>&nbsp;</td>
        <td width="584">&nbsp;</td>
        </tr>
      
      <tr>
        <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="Arial12Gris" style="padding:5px">
          <? $bn=$bd->ejecutar("select * from fotosr where recinto=$id order by id asc limit 1"); 
while(@$rownf=@$bd->obtener_fila($bn,0)) {

	$url1='admin/'.$rownf['url'].$rownf['id'].'_g.jpg'; ?><img src="<?=$url1?>" width="300" height="120" align="left" style="padding:0 7px 7px 0" /><? } ?>
          <?=nl2br(($krecin['historia']))?>
  <br /></td>
      </tr>
      </table>
        </div>
        
         <div style="float:left; width:930px; height:auto;" onmouseover="ver2()">
        
           <table width="930" border="0" cellspacing="0" cellpadding="0">
        <?  if ($krecin['actividades']!='' or $krecin['areas']!=''){ ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
        </tr>
        <? } ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>
      <table width="930" border="0" cellspacing="0" cellpadding="0" onmouseover="cambiax(); ver2()">
      <tr>
        <td>&nbsp;</td>
        </tr>
      </table>
      </div>
      </div>
  </div>
  </td><div style="width:15px"></div>
</tr>
</table>
</div>
<div style="width: 930px; float: left; height: 10px;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>