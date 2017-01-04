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
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instituto Veracruzano de la Cultura</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">

</style>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="admin/jquery.js"></script>
</head>
<script> 
 var imagxx=0;
 function MM_preloadImages() { //v3.0
  <?  
  $hoy=date("Y-m-d H:i:s");
  $buscaim=$bd->ejecutar("select * from anuncio where vencimiento>='$hoy' order by rand() limit 8");
  $kf1=$bd->obtener_fila($buscaim,0);
  $laf1='admin/'.$kf1['url'].$kf1['id'].'_g.jpg';
  $lac1='admin/'.$kf1['url'].$kf1['id'].'_c.jpg';
  if (!file_exists($laf1)){ $laf1='imgs/1_1.jpg'; $lac1='imgs/1_2.jpg';  }
  
  $kf2=$bd->obtener_fila($buscaim,0);
  $laf2='admin/'.$kf2['url'].$kf2['id'].'_g.jpg';
  $lac2='admin/'.$kf2['url'].$kf2['id'].'_c.jpg';
  if (!file_exists($laf2)){ $laf2='imgs/2_1.jpg'; $lac2='imgs/2_2.jpg';  }
  
  $kf3=$bd->obtener_fila($buscaim,0);
  $laf3='admin/'.$kf3['url'].$kf3['id'].'_g.jpg';
  $lac3='admin/'.$kf3['url'].$kf3['id'].'_c.jpg';
  if (!file_exists($laf3)){ $laf3='imgs/3_1.jpg'; $lac3='imgs/3_2.jpg';  }
  
  $kf4=$bd->obtener_fila($buscaim,0);
  $laf4='admin/'.$kf4['url'].$kf4['id'].'_g.jpg';
  $lac4='admin/'.$kf4['url'].$kf4['id'].'_c.jpg';
  if (!file_exists($laf4)){ $laf4='imgs/4_1.jpg'; $lac4='imgs/4_2.jpg';  }
  
  $kf5=$bd->obtener_fila($buscaim,0);
  $laf5='admin/'.$kf5['url'].$kf5['id'].'_g.jpg';
  $lac5='admin/'.$kf5['url'].$kf5['id'].'_c.jpg';
  if (!file_exists($laf5)){ $laf5='imgs/5_1.jpg'; $lac5='imgs/5_2.jpg';  }
  
  $kf6=$bd->obtener_fila($buscaim,0);
  $laf6='admin/'.$kf6['url'].$kf6['id'].'_g.jpg';
  $lac6='admin/'.$kf6['url'].$kf6['id'].'_c.jpg';
  if (!file_exists($laf6)){ $laf6='imgs/6_1.jpg'; $lac6='imgs/6_2.jpg';  }
  
  $kf7=$bd->obtener_fila($buscaim,0);
  $laf7='admin/'.$kf7['url'].$kf7['id'].'_g.jpg';
  $lac7='admin/'.$kf7['url'].$kf7['id'].'_c.jpg';
  if (!file_exists($laf7)){ $laf7='imgs/7_1.jpg'; $lac7='imgs/7_2.jpg';  }
  
  $kf8=$bd->obtener_fila($buscaim,0);
  $laf8='admin/'.$kf8['url'].$kf8['id'].'_g.jpg';
  $lac8='admin/'.$kf8['url'].$kf8['id'].'_c.jpg';
  if (!file_exists($laf8)){ $laf8='imgs/8_1.jpg'; $lac8='imgs/8_2.jpg';  }
   ?>
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
 function trap() 
  {
  
  MM_preloadImages('<?=$laf1?>','<?=$laf2?>','<?=$laf3?>','<?=$laf4?>','<?=$laf5?>','<?=$laf6?>','<?=$laf7?>','<?=$laf8?>');
    tiempo1(2);
  }
 
 function fout()
{
fadeEffect.init('imagprin',1);
}


function tiempo1(x){
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
	

document.getElementById('imagprin').src='<?=$laf1?>';
setTimeout("fout()", 100);




imagxx=1;

//document.all.label.text='1';
if (x==2){
setTimeout("tiempo2(2)", 8000);
}
}
function tiempo2(x){
imagxx=2;
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
document.getElementById('imagprin').src='<?=$laf2?>';
setTimeout("fout()", 100);


if (x==2){
setTimeout("tiempo3(2)",8000);
}
}
function tiempo3(x){
imagxx=3;
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
document.getElementById('imagprin').src='<?=$laf3?>';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo4(2)", 8000);
}
}
function tiempo4(x){
imagxx=4;
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
document.getElementById('imagprin').src='<?=$laf4?>';
setTimeout("fout()", 100);


if (x==2){
setTimeout("tiempo5(2)", 8000);
}
}
function tiempo5(x){
imagxx=5;
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
document.getElementById('imagprin').src='<?=$laf5?>';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo6(2)", 8000);
}
}
function tiempo6(x){
imagxx=6;
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
document.getElementById('imagprin').src='<?=$laf6?>';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo7(2)", 8000);
}
}
function tiempo7(x){
imagxx=7;
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
document.getElementById('imagprin').src='<?=$laf7?>';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo8(2)", 8000);
}
}
function tiempo8(x){
imagxx=8;
var diss = document.getElementById('imagprin');
	diss.style.opacity = '0';
document.getElementById('imagprin').src='<?=$laf8?>';
setTimeout("fout()", 100);

if (x==2){
setTimeout("tiempo1(2)", 8000);
}
}
</script>
    <script src="src/js/jscal2.js"></script>
    <script src="src/js/lang/es.js"></script>
    <link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="src/css/steel/steel.css" />
<script language="javascript">
	var fechax=0;	
		
function cambiaFecha(){
	var fecha=$("#datepicker").val();
	var monthNames=new Array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','Diciembre');
	if (fecha!=''){
		$("#calen").html('<table width="100" border="0" align="center" cellpadding="10" cellspacing="0"><tr><td align="center"><img src="loader.gif" /></td></tr></table>');
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
		$.post("caled.php", {fecha:fecha}, function (data){ 
		 $("#resultados").html(""); $("#calen").html(data);
		 
		 $.post("cambiacarte.php", {fecha:fecha}, function (data){  
		 $("#cartelerax").html(data); }); 
		 
		 
		});  }, 1000);
  
    	
		 
		 
		setTimeout("checador()", 100);
	}
	else { $("#resultados").html("Seleccione una fecha");  }
}
$(document).ready(function(e) {
    $("#datepicker").change(function(e) {
        cambiaFecha();
    });
});

function checador(){

	
var fecha=$("#datepicker").val(); 
if (fecha == fechax ){ 
setTimeout("checador()", 100);
}
 else { 
	fechax=fecha;
	cambiaFecha();
}  

}

setTimeout("repite()", 100);
    </script>
   <script language="javascript">
$(document).ready(function($){

    var div_alto1 = $("#mydiv1").height();
    var div_alto2 = $("#mydiv2").height();

	if (div_alto1 > div_alto2)
	{ 
	$("#mydiv2").height(div_alto1);
	 }
	else { 
	$("#mydiv1").height(div_alto2);
	 }
	
var div_alto1 = $("#mydiv1").height();
    var div_alto2 = $("#mydiv2").height();
	
	//alert (div_alto1+" "+div_alto2);
	
    var div_alto3 = $("#mydiv3").height();
    var div_alto4 = $("#mydiv4").height();
	
	if (div_alto3 > div_alto4)
	{ 
	$("#mydiv4").height(div_alto3);
	 }
	else { 
	$("#mydiv3").height(div_alto4);
	 }
	   
	    
});
    </script> 
    
</head>

<body bottommargin="0" bgcolor="#F2F2F2" onload="trap(); checador()">
<!--TOP-->

<? $bf=$bd->ejecutar("select * from fotosr where recinto=100 order by id desc limit 1");
	$kfo=$bd->obtener_fila($bf,0);
	$leurl='admin/'.$kfo['url'].$kfo['id'].'.jpg';
	if (!file_exists($leurl)){ $leurl='imgs/header.jpg'; }

  ?>
<div style="width:100%; background-image:url(<?=$leurl;?>);  background-position:top; background-repeat:no-repeat;">
	<div style="width:930px; margin:auto; height:10px;">
    </div>

	<div style="width:930px; margin:auto;  background-image:url(imgs/headivec.png); background-position:center; background-repeat:no-repeat; height:70px;"><? include "headers.php";?>
	</div>

	<div style="width: 930px; margin: auto; margin-top: 45px; height: 25px;" class="menu"><? include "menu.php"; ?>
    </div>

	<div style="width:930px; margin:auto;  margin-top:10px; background-color:#FFFFFF;"><table align="center">
  <tr>
    <td rowspan="4" valign="top"><img src="<?=$laf1?>" name="imagprin" width="600" height="350" id="imagprin" style="cursor:pointer" /></td>
    <td><img src="<?=$lac1?>"  onclick="tiempo1(1);" onmouseover="this.style.cursor='hand'" width="155" height="85" style="cursor:pointer"  /></td>
    <td><img src="<?=$lac2?>" onclick="tiempo2(1);" onmouseover="this.style.cursor='hand'"  width="155" height="85" style="cursor:pointer" /></td>
  </tr>
  <tr>
    <td><img src="<?=$lac3?>" onclick="tiempo3(1);" onmouseover="this.style.cursor='hand'"  width="155" height="85" style="cursor:pointer" /></td>
    <td><img src="<?=$lac4?>" onclick="tiempo4(1);" onmouseover="this.style.cursor='hand'"  width="155" height="85" style="cursor:pointer" /></td>
  </tr>
  <tr>
    <td><img src="<?=$lac5?>" onclick="tiempo5(1);" onmouseover="this.style.cursor='hand'"  width="155" height="85" style="cursor:pointer" /></td>
    <td><img src="<?=$lac6?>" onclick="tiempo6(1);" onmouseover="this.style.cursor='hand'"  width="155" height="85" style="cursor:pointer" /></td>
  </tr>
  
  <tr><td><img src="<?=$lac7?>" onclick="tiempo7(1);" onmouseover="this.style.cursor='hand'" width="155" height="85"  style="cursor:pointer" /></td>
    <td><img src="<?=$lac8?>" onclick="tiempo8(1);" onmouseover="this.style.cursor='hand'" width="155" height="85"  style="cursor:pointer" /></td>
  </tr></table>
	</div>
	<div style="width:930px; margin:auto; background-image:url(imgs/sombra.jpg); background-position:center; background-repeat:no-repeat; height:39px;">&nbsp;
    </div>
</div>
<!--FINTOP-->
<!--MIDDLE-->
<div style="width:100%; background-color:#f2f2f2; margin-top:10px; min-height:1000px; ">

	<div style="width:930px; margin:auto; min-height:350px;">
<table width="930" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="315"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #C41230;"><strong>Noticias</strong></div></td>
    <td>&nbsp;</td>
    <td width="585"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #EA870F;"><strong>Agenda</strong></div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="96%" align="center">
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
    
    </table></td>
    <td>&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF"><table width="582">
      <tr>
        <td colspan="5"><table width="100%" align="right"><tr>
              <td width="206" id="cartelerax"><?
              $fini=date("Y-m").'-01';
			  $ffin=date("Y-m").'-31';
			  $bcar=$bd->ejecutar("select * from cartelera where fecha between '$fini' and '$ffin' order by id desc limit 1 ");
			  while($kcar=$bd->obtener_fila($bcar,0)){ ?>
				  
				<a href="admin/<?=$kcar['url']?>" target="_blank" class="Arial12Rojo">Descargar Cartelera del mes </a>
<? } ?></td>
              
              <td width="149"><img src="imgs/calendario.jpg" />	<div class="arte1" id="contenido-demo" style="float:left; width:99%">	
	<input type="text" name="datepicker" id="datepicker"   size="12"  class="naranja121" onchange="cambiaFecha()"/>
  
    
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
    <input name="Botón" type="button" class="naranja121" value="Cambiar" onclick="cambiaFecha()" />
     </div> <div class="naranja121" id="resultados" style="float: left; width: 100%;"></div> </td>
              <td width="206" class="gris25" id="fechadia"><?=$dia?> <?=$mes?></td>
        </tr></table></td>
        </tr>
      
      <tr>
        <td colspan="5" valign="top" class="naranja121">
        <div id="calen">
        <table>
        <? 
		
		$desde=date("Y-m-d").' 00:00:01';
		$hasta=date("Y-m-d").' 23:59:59';
		$eventos=$bd->ejecutar("select * from mynews where newsdate between '$desde' and '$hasta' order by newsdate asc limit 6 "); $cuantos=$bd->num_rows($eventos);
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
        <td width="170" rowspan="2" align="center" class="negro12"> <a href="veragenda.php?id=<?=$row['id']?>" >
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></a></td>
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
		$eventos=$bd->ejecutar("select * from mynews where  fin>='$tope'  limit $limite");
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
        <a href="veragenda.php?id=<?=$row['id']?>" >
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></a></td>
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
        <td colspan="5" class="naranja121">&nbsp;</td>
      </tr>
 

  </table></td>
  </tr>
</table>
<div style="width: 100%; float: left; height: auto; margin-top: 10px;"><table width="930" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #002749;"><strong>Artistas</strong></div></td>
    <td><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #C41230; cursor:pointer" onclick="document.location='video.php';"><strong>Video</strong></div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#000000" style="padding:0 0 7px 0">
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
        
        
		<div style="width:470px; float:left; margin-top:10px;"><table cellpadding="0" cellspacing="0" width="100%"  >
 
  <tr>
    <td colspan="2" valign="top" bgcolor="#000" class="Arial15bco"  style="background-position: center; background-repeat: no-repeat; vertical-align: top; padding: 7px;"><?=$kaso['nombre'];?>
/
<?=$kass['nombre'];?>    </td>
  </tr>
  <tr>
    <td width="36%" rowspan="2" valign="top" bgcolor="#000"  style="background-position: center; background-repeat: no-repeat; vertical-align: top; padding: 7px;">	<? if (file_exists('admina/'.$kea['foto'].$kea['id'].'_c.jpg')){ ?> <div style=" width:150px; height:200px">
        <div style=" width:150px; height:200px">
        <img src="<?='admina/'.$kea['foto'].$kea['id'].'_c.jpg'?>" name="fotodude<?=$kea['id'];?>" width="150" height="200" class="" id="fotodude<?=$kea['id'];?>"/>       
        </div>
        <div style="width: 150px; height: 208px; position: relative; top: -208px" class="otrafoto"></div></div>
                     <? } else { ?>
              <img src="admin/imagenes/no.png" width="150" style="background-color:#666;" class="imagenborde" />
<? } ?></td>
    <td width="64%" valign="top" bgcolor="#000"  style="background-position:center; background-repeat:no-repeat; vertical-align:top; padding: 7px;"><span class="arte2">
      <?=(substr($kai['descripcion'],0,300))?>
      ...</span></td>
  </tr>
  <tr>
    <td valign="baseline" bgcolor="#000"  style="background-position:center; background-repeat:no-repeat; vertical-align:top; padding: 7px;"><a href="artistas.php" class="amarillo">ver mas </a></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" bgcolor="#000"  style="background-position:center; background-repeat:no-repeat; vertical-align:top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top" bgcolor="#000"  style="background-position:center; background-repeat:no-repeat; vertical-align:top">  <div style="float: left; min-width: 450px; margin-bottom: 15px;">
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="cartista" style="padding: 5px 20px; min-width: 90%;"><?=$kea['nombre'];?></td>
  </tr>
</table>

  </div></td>
  </tr>
		</table>

		</div></td>
    <td valign="top" bgcolor="#F2F2F2">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF" style="padding:0 0 7px 0"><div style="width: 445px; float: right; /* [disabled]margin-top: 10px; */ /* [disabled]height: 374px; */">
      <table cellpadding="0" cellspacing="0" width="100%"    >
        <tr>
          <td height="255px" align="center" valign="middle" bgcolor="#fff"><? $bb=$bd->ejecutar("select * from videos order by vp desc, Id desc limit 1"); 
	$kev=$bd->obtener_fila($bb,0);  
	
	  $video=stripslashes($kev['thumb']);
	$video=str_replace('width','width="437" xx',$video);
	$video=str_replace('height','height="246" yy',$video);
	echo $video
 
	 ?></td>
        </tr>
        <tr>
          <td align="left" valign="baseline" bgcolor="#fff" class="negro14" style="padding:5px"><strong><? echo $kev['resumen']; ?></strong><br />
            <? echo substr($kev['descri'],0,100); ?>... </td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

    </div>
 <div style="width: 100%; float: left; margin-top: 10px;">
	  <div style="width: 680px; float: left; /* [disabled]margin-top:10px; */"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #EA870F;"><strong>Recintos Culturales</strong></div></td>
  </tr>
  <tr>
    <td height="280px" align="center" valign="top" bgcolor="#fff" style="padding:7px">
    
    <table width="665" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td colspan="3" class="artistas" id="recintoname" style="font-size: 50px;">Teatro del Estado</td>
        </tr>
        <script language="javascript">
		function cambianr(nombre){
			$("#recintoname").html(nombre);
		}
		</script>
        <? for ($f=0; $f<12; $f=$f+3){ ?>
        <?  $brecinto=$bd->ejecutar("select * from recintos where edo=1 order by id asc limit $f,3");  
 
		?>
      <tr>
        <td width="33%"><? 
		$krec=$bd->obtener_fila($brecinto,0);
		$idre=$krec['id'];
		$bn=$bd->ejecutar("select * from fotosr where recinto=$idre order by id asc limit 1"); 
        $rownf=@$bd->obtener_fila($bn,0);
		$url1='';
		$url1='admin/'.$rownf['url'].$rownf['id'].'_c.jpg';
         ?>
          <a href="recintos.php?id=<?=$idre?>"><img src="<?=$url1?>" width="208" onmouseover="cambianr('<?=$krec['nombre']?>')" alt="<?=$krec['nombre']?>"  /></a></td>
        <td width="33%"><? 
		$krec=$bd->obtener_fila($brecinto,0);
		$idre=$krec['id'];
		$bn=$bd->ejecutar("select * from fotosr where recinto=$idre order by id asc limit 1");
        $rownf=@$bd->obtener_fila($bn,0);
		$url1='';
		$url1='admin/'.$rownf['url'].$rownf['id'].'_c.jpg';
         ?>
          <a href="recintos.php?id=<?=$idre?>"><img src="<?=$url1?>" width="208" onmouseover="cambianr('<?=$krec['nombre']?>')" alt="<?=$krec['nombre']?>"  /></a></td>
        <td width="33%"><? 
		$krec=$bd->obtener_fila($brecinto,0);
		$idre=$krec['id'];
		$bn=$bd->ejecutar("select * from fotosr where recinto=$idre order by id asc limit 1");
        $rownf=@$bd->obtener_fila($bn,0);
		$url1='';
		$url1='admin/'.$rownf['url'].$rownf['id'].'_c.jpg';
         ?>
           <a href="recintos.php?id=<?=$idre?>"><img src="<?=$url1?>" width="208" onmouseover="cambianr('<?=$krec['nombre']?>')" alt="<?=$krec['nombre']?>"  /></a></td>
      </tr>
    <? } ?>
      
    </table></td>
  </tr></table>
		</div>
	
		<div style="width: 240px; float: right; /* [disabled]margin-top:10px; */"><table cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td align="left"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #002749;"><strong>Social</strong></div></td>
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
  height: 310,
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
}).render().setUser('ivec_oficial').start();
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
