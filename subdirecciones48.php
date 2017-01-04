<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=7;
$_SESSION['voyparader']='artistas';
$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
if ($secc!='' and $secc>0){ $cd=',secc:'.$secc; } else { $cd=''; }  
$id=48;
if (!is_numeric($id)){ echo '<script language="javascript">  top.location="index.php"; </script>'; exit();  }
$colores=array('','','','','','','','','','','','','#EA870F','#C41230','#368B8F','#006210','#0071C4','#D24726','#03B3B2','#FF8F32','#005D47','#FD7726','#B60016','#666666');
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
a { color:#<?=$colores[$id-26]?> }
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
function cambia(){
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
<td height="64" align="left" bgcolor="<?=$colores[$id-26]?>" class="recintos" style="padding:6px 6px"><?=$krecin['nombre'];?></td>
</tr>
</table>
</div>
<div style="width: 930px; float: left; /* [disabled]margin: 10px 0; */">
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
  <td valign="top" bgcolor="#FFFFFF">
    <div style="width: 930px; float: left;">
      <img src="imagenes/pinacoteca.png" width="930" height="" />
      </div>
    </td>
</tr>
<tr>
  <td valign="top">
  <div  >
    <div style="float:left; width:930px; height:auto;">
   <div style="float:left; width:930px; height:auto;" id="eldiv1">
    <table width="930" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="346">
          <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-26];?>;"><strong>Semblanza</strong></div>
          
          &nbsp;</td>
        <td>&nbsp;</td>
        <td width="584">  <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-26];?>;"><strong>Agenda</strong></div></td>
        </tr>
      
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding:5px">
         <? $bn=$bd->ejecutar("select * from fotosr where recinto=$id order by id asc limit 1"); 
while(@$rownf=@$bd->obtener_fila($bn,0)) {

	$url1='admin/'.$rownf['url'].$rownf['id'].'_g.jpg'; ?><img src="<?=$url1?>" width="300" height="120" /><? } ?></td>
        <td>&nbsp;</td>
        <td rowspan="2" valign="top" bgcolor="#FFFFFF">
        
        <table>
      <tr>
        <td colspan="5" valign="top"><table width="406" align="right"><tr><td width="161"><img src="imgs/calendario.jpg" />	<div class="arte1" id="contenido-demo" style="float:left; width:99%">	
	<input type="text" name="datepicker" id="datepicker"   size="12"  class="naranja121" onchange="cambia()"/>
  
    
 <script type="text/javascript"> 
var cal = Calendar.setup({
onSelect: function(cal) { cal.hide() },
showTime: false,
animation: true,
fdow: 0,
weekNumbers: true,
}); 
cal.manageFields("datepicker", "datepicker", "%Y-%m-%d");
cal.getFirstDate();
</script> 
    <input name="Botón" type="button" class="naranja121" value="Cambiar" onclick="cambia()" />
     </div> <div class="naranja121" id="resultados" style="float: left; width: 100%;"></div> </td><td width="202" class="gris25" id="fechadia"><?=$dia?> <?=$mes?></td>
        </tr></table></td>
        </tr>
      
      <tr>
        <td colspan="5" valign="top" class="naranja121">
        <div id="calen">
        <table>
        <? 
		
		$desde=date("Y-m-d").' 00:00:01';
		$hasta=date("Y-m-d").' 23:59:59';
		$eventos=$bd->ejecutar("select * from mynews where secc1=$id and newsdate between '$desde' and '$hasta' order by newsdate asc limit 7 "); $cuantos=$bd->num_rows($eventos);
		while($row=$bd->obtener_fila($eventos,0)){
			$tdatet=explode(" ",$row['newsdate']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);
			$foto='admin/'.$row['url'].$row['id'].'_cx.jpg';
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_c.jpg'; }			
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_gx.jpg'; }
			$secc=$row['secc1'];
			$bsec=$bd->ejecutar("select * from recintos where id=$secc");
			$rows=$bd->obtener_fila($bsec,0);
			
			
		 ?>
        
                <tr>
        <td width="117" rowspan="2" align="center" class="negro12">
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></td>
        <td class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td rowspan="2" class="azul12"><?=$rows['nombre']?></td>
        <td rowspan="2" class="negro15"><?=$hora?></td>
        <td rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong><?=$row['newstitle']?></strong></td>
      </tr>
   
        
           
     
 
           
      <tr>
        <td colspan="5" class="negro15" align="center"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
        <? } ?>
        
             <? 
		
		$limite=7-$cuantos;
		$tope=date("Y-m-d").' 23:59:59';   		
		$eventos=$bd->ejecutar("select * from mynews where  secc1=$id and  fin>='$tope'  limit $limite ");
		$cuantos=$bd->num_rows($eventos);
		while($row=$bd->obtener_fila($eventos,0)){
			$tdatet=explode(" ",$row['newsdate']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);	$foto='admin/'.$row['url'].$row['id'].'_cx.jpg';
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_c.jpg'; }			
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_gx.jpg'; }
			$secc=$row['secc1'];
			$bsec=$bd->ejecutar("select * from recintos where id=$secc");
			$rows=$bd->obtener_fila($bsec,0);
			
			
		 ?>
        
                <tr>
        <td rowspan="2" align="center" class="negro12">
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></td>
        <td class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td rowspan="2" class="azul12"><?=$rows['nombre']?></td>
        <td rowspan="2" class="negro15"><?=$hora?></td>
        <td rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong><?=$row['newstitle']?></strong></td>
      </tr>
           
      <tr>
        <td colspan="5" class="negro15" align="center"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
        <? } ?>
        </table>
        </div>
        
        &nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right" class="naranja121"><a href="agenda.php?secc1=<?=$id?>" class="naranja121">Ver Agenda Completa</a></td>        
      </tr>
      <tr>&nbsp;</tr> <tr>&nbsp;</tr> <tr>&nbsp;</tr>
      <tr>					
      		<td colspan="5" align="right" class="naranja121"><a href="http://litorale.com.mx/ivec/admin/convocatorias/2016-09-09/MapaMunicipiosCasaCultura.pdf" class="naranja121"> Ver mapa de municipios de casas de la cultura</a></td>
 		</tr>
  </table></td>
        </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Arial12Gris" style="padding:5px 10px"><?=nl2br(substr($krecin['historia'],0,800))?>...<br />
<br />
<img src="imagenes/add.png" width="51" height="11" border="0" align="right" style="padding-bottom:7px; cursor:pointer;" onclick="ver()" /></td>
        <td>&nbsp;</td>
        </tr>
        </table>
        </div>
        <div style="float:left; width:930px; height:auto; display:none" id="eldiv2" onmouseover="cambia()" onmouseout="ver2()">
        <table width="930" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="346">
          <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-26];?>;"><strong>Semblanza</strong></div>
          
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
 
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    
     </tr>

     <tr>
     
     <td rowspan="2"><div align="left" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="https://catalogocineclubivec.wordpress.com/" target="_blank"  title="Apoyo a Proyectos de Cine Club">
      <img src="imgs/ApoyoCine.png" width="305" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
      </div></td>
      <td>&nbsp;</td>  
      <td rowspan="2"><div align="center" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://litorale.com.mx/ivec/admin/convocatorias/2016-06-06/DirectorioCasasCultura2016.pdf" target="_blank"  title="Directorio de Casas de la Cultura">
      <img src="imgs/DirCasas.png" width="305" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
      </div></td>
      <td>&nbsp;</td>  
      <td rowspan="2"><div align="right" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="https://www.google.com/maps/d/u/1/edit?mid=1PWeXmo4NxXv2qhCyGlQbtMrRvFQ" class="naranja121" target="_blank"  title="Mapa de Casas de la Cultura"> 
      <img src="imgs/MapaCasas.png  " width="305" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
      </div></td>

     </tr>
    
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    
     </tr>
     <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

     <tr>
       
     </tr>
     <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>


      <tr>
        <td rowspan="2"><div class="especial" style="float: left; padding: 4px 7px; min-width: 130px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-26];?>;"><strong>Contacto</strong></div></td>
<td>&nbsp;</td>        
        <!--<td rowspan="2"><div class="especial" style="float: left; padding: 4px 7px; min-width: 150px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-26];?>;"><strong>Directorio Telefónico</strong></div></td>  
<td>&nbsp;</td> Se quito el 13 de Julio del 2016-->
        <td rowspan="2"><div class="especial" style="float: left; padding: 4px 7px; min-width: 150px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-26];?>;"><strong>Cartelera</strong></div></td>
<td>&nbsp;</td>
        <td rowspan="2"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-26];?>;"><strong>Convocatoria</strong></div></td>        
      </tr>  

      <tr>
        
      </tr>
          
      <tr>
         <td valign="top" bgcolor="#FFFFFF" class="Arial12Nego" style="padding:7px 5px"><?
        
	 
function url($text,$id){ 
        $text = html_entity_decode($text); 
        $text = " ".$text; 
        $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.~#?&//=]+)', 
                '<a href="\1">\1</a>', $text); 
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_+.~#?&//=]+)', 
                '<a href="\1">\1</a>', $text); 
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.~#?&//=]+)', 
        '\1<a href="http://\2">\2</a>', $text); 
        $text = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})', 
        '<a href="contacto.php?n='.$id.'&email=\1">\1</a>', $text); 
        return $text; 
} 


 

echo   nl2br(url($krecin['contacto'],$id));

?>
          </td>
      <td>&nbsp;</td>   
      <!--<td rowspan="2" valign="top" bgcolor="#FFFFFF" style="padding:10px"><a a href="http://litorale.com.mx/ivec/admin/convocatorias/2016-06-06/DirectorioCasasCultura2016.pdf" target="_blank"  title="Directorio Telefonico de Casas de la Cultura">
      <img src="imgs/CasasCultura.jpg" width="240" height="80" align="center" style="padding:0 10px 10px 0"  alt="" /></a></td>
		<td>&nbsp;</td> SE QuiTO el 13 de Julio del 2016-->     
      <td rowspan="2" valign="top" bgcolor="#FFFFFF" style="padding:10px"><a a href="http://litorale.com.mx/ivec/admin/convocatorias/2016-06-06/CarteleraJunio2016.pdf" target="_blank"  title="Cartelera Casas de la Cultura">
      <img src="imgs/CarteleraCasas.png" width="200" height="80" align="center" style="padding:0 10px 10px 0"  alt="" /></a></td>
		<td>&nbsp;</td>
		<td rowspan="2" valign="top" bgcolor="#FFFFFF" style="padding:10px"> <p> <span class="Arial12Nego"><br /></span></p> </td>      
      <!--<td rowspan="2" valign="top" bgcolor="#FFFFFF" style="padding:10px"> <p> <span class="Arial12Nego"><strong><a href="admin/

      convocatorias/2015-06-01/3ConvocatoriaCasasDeCultura.pdf" class="Arial12Nego">Descargar:<br />
			3a Convocatoria de Estimulos a Proyectos Culturales y Artísticos de Casas de la Cultura  2015</a></span></p> </td>-->	
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