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
$id=21;
if (!is_numeric($id)){ echo '<script language="javascript">  top.location="index.php"; </script>'; exit();  }
$colores=array('#EA870F','#C41230','#368B8F','#006210','#0071C4','#D24726','#03B3B2','#FF8F32','#005D47','#FD7726','#B60016','#666666');
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
a { color:#<?=$colores[$id-11]?> }
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
    </script>
    
</head>
<body onload="checador()">
<div style="width:930px; margin:auto;  ">
<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="64" align="left" bgcolor="<?=$colores[$id-11]?>" class="recintos" style="padding:6px 6px"><?=$krecin['nombre'];?></td>
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
    <table width="930" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="346">
          <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-11];?>;"><strong>Semblanza</strong></div>
          
          &nbsp;</td>
        <td>&nbsp;</td>
        <td width="584">  <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-11];?>;"><strong>Agenda</strong></div></td>
        </tr>
      
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding:5px">
         <? $bn=$bd->ejecutar("select * from fotosr where recinto=$id order by id asc limit 1"); 
while(@$rownf=@$bd->obtener_fila($bn,0)) {

	$url1='admin/'.$rownf['url'].$rownf['id'].'_g.jpg'; ?><img src="<?=$url1?>" width="300" height="120" /><? } ?></td>
        <td>&nbsp;</td>
        <td rowspan="2" valign="top" bgcolor="#FFFFFF"><table width="582">
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
		$eventos=$bd->ejecutar("select * from mynews where secc1=$id and newsdate between '$desde' and '$hasta' order by newsdate asc limit 6 "); $cuantos=$bd->num_rows($eventos);
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
        <td width="170" rowspan="2" align="center" class="negro12">
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></td>
        <td width="170" class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td width="254" rowspan="2" class="azul12"><?=$rows['nombre']?></td>
        <td width="46" rowspan="2" class="negro15"><?=$hora?></td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong><?=$row['newstitle']?></strong></td>
      </tr>
   
        
           
     
 
           
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
        <? } ?>
        
             <? 
		
		$limite=6-$cuantos;
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
        <td width="170" rowspan="2" align="center" class="negro12">
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></td>
        <td width="170" class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td width="254" rowspan="2" class="azul12"><?=$rows['nombre']?></td>
        <td width="46" rowspan="2" class="negro15"><?=$hora?></td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong><?=$row['newstitle']?></strong></td>
      </tr>
   
        
           
     
 
           
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
        <? } ?>
        </table>
        </div>
        
        &nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right" class="naranja121"><a href="agenda.php?secc1=<?=$id?>" class="naranja121">Ver Agenda Completa</a></td>
      </tr>
 

  </table></td>
        </tr>
      <tr>
        <td bgcolor="#FFFFFF" class="Arial12Gris" style="padding:5px 10px"><?=nl2br($krecin['historia'])?></td>
        <td>&nbsp;</td>
        </tr>
        <?  if ($krecin['actividades']!='' or $krecin['areas']!=''){ ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><table width="930" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="57%"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-11];?>;"><strong>Actividades</strong></div></td>
            <td height="10" rowspan="2">&nbsp;</td>
            <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-11];?>;"><strong>Areas</strong></div></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"  class="Arial12Gris" style="padding:5px 10px"><?=nl2br($krecin['actividades'])?></td>
            <td valign="top" bgcolor="#FFFFFF"  class="Arial12Gris" style="padding:5px 10px"><?=nl2br($krecin['areas'])?></td>
          </tr>
        </table></td>
        </tr>
        <? } ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-11];?>;"><strong>Dirección</strong></div></td>
        <td>&nbsp;</td>
        <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-11];?>;"><strong>Mapa</strong></div></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF" class="Arial12Nego" style="padding:7px 5px"><?=nl2br($krecin['direccion'])?></td>
        <td>&nbsp;</td>
        <td rowspan="3" valign="top" bgcolor="#FFFFFF"><?=($krecin['mapa'])?> </td>
      </tr>
      <tr>
        <td valign="top" style="padding:7px 5px"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: <?=$colores[$id-11];?>;"><strong>Contacto</strong></div></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF" class="Arial12Nego" style="padding:7px 5px"><?
        
	 
function url($text){ 
        $text = html_entity_decode($text); 
        $text = " ".$text; 
        $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.~#?&//=]+)', 
                '<a href="\1">\1</a>', $text); 
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_+.~#?&//=]+)', 
                '<a href="\1">\1</a>', $text); 
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.~#?&//=]+)', 
        '\1<a href="http://\2">\2</a>', $text); 
        $text = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})', 
        '<a href="mailto:\1">\1</a>', $text); 
        return $text; 
} 


 

echo   nl2br(url($krecin['contacto']));

?>
		 </td>
        <td>&nbsp;</td>
        </tr>
      </table>
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