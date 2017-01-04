<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 

 
 
//Para utilizar la función, se le manda una fecha como parámetro, por ejemplo, si se quisiera imprimir la fecha actual, utilizaríamos el siguiente código:
 


$dia= strftime("%d");

$mes= strftime("%B");

$calen=$_GET["datepicker"];

if (!empty($calen)){
	
	
	$dia=$calen[8].$calen[9];
 // $mes=$calen[5].$calen[6];
  
 
	
	}
	$elmenu=2;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Instituto Veracruzano de la Cultura</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script.js"></script>
</head>
<script>
 var imagxx=0;
 function MM_preloadImages() { //v3.0
  
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
 function trap() 
  {
  
  MM_preloadImages('imgs/1_1.jpg','imgs/2_1.jpg','imgs/4_1.jpg','imgs/3_1.jpg','imgs/5_1.jpg','imgs/6_1.jpg','imgs/7_1.jpg','imgs/8_1.jpg');
    tiempo1(2);
  }
 
 function fout()
{
fadeEffect.init('imagprin',1);
}


function tiempo1(x){
var diss = document.all.imagprin;
	diss.style.opacity = '0';
	

document.all.imagprin.src='imgs/1_1.jpg';
setTimeout("fout()", 100);




imagxx=1;

//document.all.label.text='1';
if (x==2){
setTimeout("tiempo2(2)", 8000);
}
}
function tiempo2(x){
imagxx=2;
var diss = document.all.imagprin;
	diss.style.opacity = '0';
document.all.imagprin.src='imgs/2_1.jpg';
setTimeout("fout()", 100);


if (x==2){
setTimeout("tiempo3(2)",8000);
}
}
function tiempo3(x){
imagxx=3;
var diss = document.all.imagprin;
	diss.style.opacity = '0';
document.all.imagprin.src='imgs/3_1.jpg';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo4(2)", 8000);
}
}
function tiempo4(x){
imagxx=4;
var diss = document.all.imagprin;
	diss.style.opacity = '0';
document.all.imagprin.src='imgs/4_1.jpg';
setTimeout("fout()", 100);


if (x==2){
setTimeout("tiempo5(2)", 8000);
}
}
function tiempo5(x){
imagxx=5;
var diss = document.all.imagprin;
	diss.style.opacity = '0';
document.all.imagprin.src='imgs/5_1.jpg';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo6(2)", 8000);
}
}
function tiempo6(x){
imagxx=6;
var diss = document.all.imagprin;
	diss.style.opacity = '0';
document.all.imagprin.src='imgs/6_1.jpg';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo7(2)", 8000);
}
}
function tiempo7(x){
imagxx=7;
var diss = document.all.imagprin;
	diss.style.opacity = '0';
document.all.imagprin.src='imgs/7_1.jpg';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo8(2)", 8000);
}
}
function tiempo8(x){
imagxx=8;
var diss = document.all.imagprin;
	diss.style.opacity = '0';
document.all.imagprin.src='imgs/8_1.jpg';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo1(2)", 8000);
}
}
</script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
 	<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		changeYear:true,
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		yearRange:'2012:2030',
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });
    </script>
</head>

<body topmargin="0" rightmargin="0" leftmargin="0" bottommargin="0" bgcolor="#F2F2F2" onload="trap()">
<!--TOP-->
<div style="width:100%; background-image:url(imgs/header.jpg);  background-position:top; background-repeat:no-repeat;">
	<div style="width:930px; margin:auto; height:10px;">
    </div>

	<div style="width:930px; margin:auto;  background-image:url(imgs/headivec.png); background-position:center; background-repeat:no-repeat; height:70px;"><table height="70px" align="right" cellpadding="0" cellspacing="0">

  <tr><td><input name="" type="text" style="height:25px; border:none; width:200px;" /></td><td><img src="imgs/buscar.jpg" width="50" height="26" border="0"/></td>
    <td>&nbsp;&nbsp;&nbsp;</td></tr></table>
	</div>

	<div style="width: 930px; margin: auto; margin-top: 45px; height: 25px;" class="menu"><? include "menu.php"; ?>
    </div>

	<div style="width:930px; margin:auto;  margin-top:10px; background-color:#FFFFFF;"><table align="center">
  <tr>
    <td rowspan="4"><img src="imgs/dp1.jpg" name="imagprin" id="imagprin" /></td>
    <td><img src="imgs/1_2.jpg"  onclick="tiempo1(1);" onmouseover="this.style.cursor='hand'" /></td>
    <td><img src="imgs/2_2.jpg" onclick="tiempo2(1);" onmouseover="this.style.cursor='hand'" /></td>
  </tr>
  <tr>
    <td><img src="imgs/3_2.jpg" onclick="tiempo3(1);" onmouseover="this.style.cursor='hand'" /></td>
    <td><img src="imgs/4_2.jpg" onclick="tiempo4(1);" onmouseover="this.style.cursor='hand'" /></td>
  </tr>
  <tr>
    <td><img src="imgs/5_2.jpg" onclick="tiempo5(1);" onmouseover="this.style.cursor='hand'" /></td>
    <td><img src="imgs/6_2.jpg" onclick="tiempo6(1);" onmouseover="this.style.cursor='hand'" /></td>
  </tr>
  
  <tr><td><img src="imgs/7_2.jpg" onclick="tiempo7(1);" onmouseover="this.style.cursor='hand'" /></td>
    <td><img src="imgs/8_2.jpg" onclick="tiempo8(1);" onmouseover="this.style.cursor='hand'" /></td>
  </tr></table>
	</div>
	<div style="width:930px; margin:auto; background-image:url(imgs/sombra.jpg); background-position:center; background-repeat:no-repeat; height:39px;">&nbsp;
    </div>
</div>
<!--FINTOP-->
<!--MIDDLE-->
<div style="width:100%; background-color:#f2f2f2; margin-top:10px; min-height:1000px; ">

	<div style="width:930px; margin:auto; min-height:350px;">

		<div style="width:315px; float:left;"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><img src="imgs/noticias.png" /></td>
  </tr>
  <tr>
    <td height="330px" valign="top" bgcolor="#FFFFFF">
    
    <table width="96%" align="center">
    <? 
	$bn=$bd->ejecutar("select id_nota,titulo,resumen from nota where 1 order by id_nota desc limit 5");
	
	while($rownf=@$bd->obtener_fila($bn)) {
    $idnota1=$rownf['id_nota'];
	$ids.=','.$idnota1;
	$bfot1=$bd->ejecutar("select * from foto where id_nota=$idnota1 order by id desc limit 1");
	$kfot1=$bd->obtener_fila($bfot1,0);
	$url1='';	
	$url1='admin/'.$kfot1['url'].$kfot1['id'].'_3.jpg';
	  ?>
      <tr>
        <td class="azult" <? if (file_exists($url1)){ ?> <? } ?>><strong><a href="nota.php?id=<?=($rownf['id_nota'])?>" title="23ª Feria Nacional del Libro Infantil y Juvenil
 Xalapa"><?=($rownf['titulo'])?></a> </strong></td>
        </tr>
      <tr><td><? if (file_exists($url1)){ ?> <img src="<?=$url1?>" width="90" height="68" border="0" align="left" style="padding:0 5px 3px 0"  /><? } ?>
       <span class="gris12"> <?=($rownf['resumen'])?>
      </span></td>
        </tr>
   
      <tr>
        <td height="9px" <? if (file_exists($url1)){ ?> <? } ?>></td>
        </tr>   
      <? } ?>
    
    </table>
    
    </td>
  </tr></table>
		</div>

		<div style="width:585px; float:right;"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><img src="imgs/agenda.png" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="330px"><? if (!empty($calen)){
	
	
	
	 ?><table width="582">
      <tr>
        <td colspan="5"><form action="index.php" method="get"> <table width="406" align="right"><tr><td width="161"><img src="imgs/calendario.jpg" />	<div class="arte1" id="contenido-demo">	
	<input type="text" name="datepicker" id="datepicker" readonly="readonly" size="12"  class="naranja121"/><input type="submit" class="naranja121" value="Cambiar" />
     </div>  </td><td width="202" class="gris25"><?=$dia?> <?=$mes?></td>
        </tr></table></form></td>
        </tr>
      
      <tr>
        <td colspan="5" class="naranja121">&nbsp;</td>
        </tr>
 
      
        <tr>
        <td rowspan="2" class="negro12"><img src="imgs/mini5.jpg" width="68" height="42" /></td>
        <td class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Pinacoteca Diego Rivera</td>
        <td width="46" rowspan="2" class="negro15">12:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Memorias de corta duración</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="negro15" align="center" height="3"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
           <tr>
        <td width="81" rowspan="2" class="negro12"><img src="imgs/mini6.jpg" width="68" height="42" /></td>
        <td width="170" class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Galería de arte contemporáneo de Xalapa</td>
        <td width="46" rowspan="2" class="negro15">10:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Ensayos de Orquesta</strong></td>
      </tr>
    
      <tr>
        <td colspan="5" class="negro15" align="center" height="6"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
 <tr>
        <td rowspan="2" class="negro12"><img src="imgs/mini3.jpg" width="68" height="42" /></td>
        <td class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Sala grande del Teatro del Estado</td>
        <td width="46" rowspan="2" class="negro15">19:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Viernes de OSX</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
            
      <tr>
        <td rowspan="2" class="negro12"><img src="imgs/mini4.jpg" width="68" height="42" /></td>
        <td class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Colegio Preparatorio de Xalapa</td>
        <td width="46" rowspan="2" class="negro15">14:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Psycho-Path el reencuentro</strong></td>
      </tr>
     
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
  </table> <? } else  {?>
  
  <table width="582">
      <tr>
        <td colspan="5"><form action="index.php" method="get"> <table width="406" align="right"><tr><td width="121"><img src="imgs/calendario.jpg" />	<div class="arte1" id="contenido-demo">	
	<input type="text" name="datepicker" id="datepicker" readonly="readonly" size="12"  class="naranja121"/><input type="submit" class="naranja121" value="Cambiar" />
     </div>  </td><td width="161" class="gris25"><?=$dia?> <?=$mes?></td>
        </tr></table></form></td>
        </tr>
      
      <tr>
        <td colspan="5" class="naranja121">&nbsp;</td>
        </tr>
      <tr>
        <td width="81" rowspan="2" class="negro12"><img src="imgs/mini6.jpg" width="68" height="42" /></td>
        <td width="170" class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Galería de arte contemporáneo de Xalapa</td>
        <td width="46" rowspan="2" class="negro15">10:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Ensayos de Orquesta</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="negro15" align="center" height="3"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
      
      <tr>
        <td rowspan="2" class="negro12"><img src="imgs/mini5.jpg" width="68" height="42" /></td>
        <td class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Pinacoteca Diego Rivera</td>
        <td width="46" rowspan="2" class="negro15">12:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Memorias de corta duración</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="negro15" align="center" height="6"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
       
      <tr>
        <td rowspan="2" class="negro12"><img src="imgs/mini4.jpg" width="68" height="42" /></td>
        <td class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Colegio Preparatorio de Xalapa</td>
        <td width="46" rowspan="2" class="negro15">14:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Psycho-Path el reencuentro</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
     
      <tr>
        <td rowspan="2" class="negro12"><img src="imgs/mini3.jpg" width="68" height="42" /></td>
        <td class="negro12"><span class="naranja121">Música</span></td>
        <td width="254" rowspan="2" class="azul12">Sala grande del Teatro del Estado</td>
        <td width="46" rowspan="2" class="negro15">19:00</td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong>Viernes de OSX</strong></td>
      </tr>
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
  </table> 
  <?  } ?>  
    
    </td>
  </tr></table>
		</div>
        <div style="width:100%; float:left;">
        <? $bua=$bd->ejecutar("select * from artistas_datos where edo=1 order by rand() limit 1");
		$kea=$bd->obtener_fila($bua,0);	
		$ida=$kea['id'];
		$ids=$kea['seccion'];
		$bai=$bd->ejecutar("select * from artistas_info where dude=$ida");
		$kai=$bd->obtener_fila($bai,0);	
		$bass=$bd->ejecutar("select * from artistas_seccion where id=$ids");
		$kass=$bd->obtener_fila($bass,0);
		$baso=$bd->ejecutar("select * from artistas_seccion where id<$ids and tipo=1 order by id desc limit 1");
		$kaso=$bd->obtener_fila($baso,0);
		
		 ?>
        
        
		<div style="width:470px; float:left; margin-top:10px;"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><img src="imgs/artistas.png" /></td>
  </tr>
  <tr>
    <td bgcolor="#000" height="280px"  style="background-position:center; background-repeat:no-repeat; vertical-align:top">
    
    <table>
      <tr>
        <td colspan="4" class="arte1" height="5"></td>
        </tr>
      <tr>
      <td width="194" class="arte1" style="padding-left:7px"><?=$kaso['nombre'];?></td>
      <td width="140" class="arte1"><?=$kass['nombre'];?></td>
      <td width="10">&nbsp;</td>
      <td width="104">&nbsp;</td>
    </tr>
      <tr>
        <td colspan="4" height="7"></td>
        </tr>
      <tr>
        <td rowspan="2" align="center" valign="middle">             <? if (file_exists('admina/'.$kea['foto'].$kea['id'].'.jpg')){ ?>
              <img src="<?='admina/'.$kea['foto'].$kea['id'].'.jpg'?>" name="fotodude<?=$kea['id'];?>" width="160" id="fotodude<?=$kea['id'];?>" />              <? } else { ?>
              <img src="admin/imagenes/no.png" width="160" style="background-color:#666;" class="imagenborde" />
<? } ?></td>
        <td valign="top" class="arte2"><?=(substr($kai['descripcion'],0,300))?>...</td>
        <td valign="top"><img src="imgs/lingris.jpg" /></td>
        <td valign="middle" class="arte2">  <? $bua=$bd->ejecutar("select * from artistas_datos where id!=$ida and edo=1 order by rand() limit 3"); while($kua=@$bd->obtener_fila($bua,0)){  echo $kua['nombre'].'<br>';  } ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right" valign="top" class="amarillo"><a href="artistas.php" class="amarillo">ver mas </a>&nbsp; &nbsp; </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="60">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    
    </td>
  </tr></table>
  <div style="float: left; position: relative; bottom: 60px; min-width: 450px">
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="cartista" style="padding: 5px 20px; min-width: 90%;"><?=$kea['nombre'];?></td>
  </tr>
</table>

  </div>
		</div>
		<div style="width:445px; float:right; margin-top:10px;"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><img src="imgs/video.png" /></td>
  </tr>
  <tr>
    <td bgcolor="#fff" align="center" height="255px"><iframe src="http://player.vimeo.com/video/14383161" width="437" height="245" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> </td>
  </tr>
  <tr>
    <td height="25px" align="left" bgcolor="#fff" class="negro14">Veracruz </td>
  </tr>
		</table>
	  </div>
      </div>
 <div style="width:100%; float:left;">
	  <div style="width:680px; float:left; margin-top:10px;"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><img src="imgs/recintos.png" /></td>
  </tr>
  <tr>
    <td bgcolor="#fff" height="280px" align="center">
    
    <table cellpadding="0" cellspacing="0"><tr><td><table>
      <tr>
        <td class="negro19">Teatro del Estado</td>
      </tr>
      <tr>
        <td height="10px"></td>
      </tr>
      <tr><td><img src="imgs/teatro.jpg" /></td></tr></table></td>
        <td>&nbsp;</td>
        <td>
      
      <table><tr>
        <td><img src="imgs/recinto1.jpg" /></td>
        <td><img src="imgs/recinto2.jpg" /></td>
        </tr>
        <tr>
          <td><img src="imgs/recinto3.jpg" /></td>
          <td><img src="imgs/recinto1.jpg" /></td>
          </tr>
        <tr>
          <td><img src="imgs/recinto2.jpg" /></td>
          <td><img src="imgs/recinto3.jpg" /></td>
          </tr>
      </table>      </td></tr></table>
    
    </td>
  </tr></table>
		</div>
	
		<div style="width:240px; float:right; margin-top:10px;"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><img src="imgs/social.png" /></td>
  </tr>
  <tr>
    <td bgcolor="#fff" height="280px"><script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 3,
  interval: 30000,
  width: 228,
  height: 190,
  theme: {
    shell: {
      background: '#ffffff',
      color: '#000000'
    },
    tweets: {
      background: '#ffffff',
      color: '#4d4d4d',
      links: '#ff6600'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: true,
    behavior: 'default'
  }
}).render().setUser('IvecPinacoteca').start();
</script></td>
  </tr></table>
		</div>
      </div>
         
  </div>
</div>









<!--FINMIDDLE-->
<!--PIE-->
<div style="width: 100%; float: left; margin-top: 20px; background-color: #FFF;">
<? include "footer.php"; ?>
      </div>
<!--FINPIE-->


</body>
</html>
