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
$id=41;
if (!is_numeric($id)){ echo '<script language="javascript">  top.location="index.php"; </script>'; exit();  }
$colores=array('','','','','','','','','','','','','#EA870F','#C41230','#368B8F','#5c6f99','#0071C4','#D24726','#03B3B2','#FF8F32','#005D47','#FD7726','#B60016','#666666');
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
<!-- SE AGREGO CODIGO EN BGCOLOR -->
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

<!-- NUEVO CODIGO 22-06-2016 -->


<div style="width:930px; margin:auto;  margin-top:3px;">

<table>
<!-- PRIMER RENGLON -->
<tr><td>
<td>&nbsp;</td>
<td><div align="center" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://litorale.com.mx/ivec/admin/convocatorias/2016-06-28/CodigoEtica.pdf" target="_blank"  title="Código de Ética">
      <img src="imgs/ce.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>
<td>&nbsp;</td>
</tr>

<!-- SEGUNDO RENGLON -->
<tr><td>
<td><div align="left" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://litorale.com.mx/ivec/admin/fracciones/Fraccion_I/6CODIGO_DE_CONDUCTA.pdf" target="_blank"  title="Codigo de Conducta">
      <img src="imgs/cc.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>
<td>
	<div align="left" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://litorale.com.mx/ivec/admin/convocatorias/2016-10-10/QuejasYSugerencias.docx" target="_blank"  title="Quejas y Sugerencias">
      <img src="imgs/quejas.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
	</div>
</td>
<td><div align="right" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://www.litorale.com.mx/ivec/admin/fracciones/2016-05-26/1504.pdf" target="_blank"  title="Lineamientos">
      <img src="imgs/l.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>
</tr>

<!-- TERCER RENGLON -->
<tr><td>
<td>&nbsp;</td>
<td><div align="right" style="margin:auto; width:307px;  margin-top:10px; min-height:120px;"><a a href="http://www.litorale.com.mx/ivec/admin/fracciones/2016-05-26/1503.pdf" target="_blank"  title="Integrantes">
      <img src="imgs/i.png" width="307" height="120" align="right" style="padding:0 3px 3px 0"  /></a>
</div></td>
<td>&nbsp;</td>
</tr>
</table>
</div>

<!-- CUARTO RENGLON -->
<tr><td>
<td>&nbsp;</td>
<td><div align="right" style="margin:auto; width:200px;  margin-top:2px; min-height:20px;">
</div></td>
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

<div style="width:930px; margin:auto;  ">
<?  include "footer.php"; ?></div>

</body>
</html>