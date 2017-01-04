<? session_start();
require 'db.class.php';
require 'conf.class.php';
require 'fecha.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=5;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
$secc1=$_GET['secc1'];
if ($secc1>0){ $cad=' and id='.$secc1.' ';  }
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");

$mes=$_POST['mes'];
if ($mes==''){ $mes=13; }
$anio=$_POST['anio'];
if($anio==''){ $anio=date("Y");  }

if ($mes==13){
$hoy=date("Y-m-d");
$cad=" and ffin>='".$hoy."' ";	
} else {
if ($mes<10){ $mes='0'.$mes; }	
	
$hoy=$anio.'-'.$mes.'-01';	
$limite=$anio.'-'.$mes.'-31';	
$cad=" and ((ffin between '".$hoy."' and '".$limite."') or (finicio between '".$hoy."' and '".$limite."')) ";	

}

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
	function checa(que){
	var edo = $("#oculto"+que).val();
	if (edo==0){
		$("#oculto"+que).val(1);
		$("#info"+que).toggle("slow");
		$("#img"+que).attr("src","imagenes/del.png");
		$("#img"+que).attr("title","Ocultar Info")
	} else{
		$("#oculto"+que).val(0);
		$("#info"+que).toggle("fast");
		$("#img"+que).attr("src","imagenes/add.png");
		$("#img"+que).attr("title","Más Info")
	}
	
	for (a=1; a<32; a++){
	if (a==que){ } else {
		$("#oculto"+a).val(0);
		$("#info"+a).css("display","none");
		$("#img"+a).attr("src","imagenes/add.png");
	}
		
	}
		
	}
	
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#D24726" class="recintos" style="color:#FFF; padding-left:8px">Convocatorias</td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
      <div id="resultados">
      <table width="613" border="0" cellspacing="0" cellpadding="5">
        
        <tr>
          <td colspan="4" class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td colspan="4"> 
     
          
          
       
          </td>
        </tr>
        <tr>
          <td width="104" height="1" align="left" class="negro14">Cambiar Fecha:</td>
          <td width="120" align="left">
          <?
		  function cmes($mes)
{
	if ($mes==1) { $mletra='ENERO'; }
	if ($mes==2) { $mletra='FEBRERO'; }
	if ($mes==3) { $mletra='MARZO'; }
	if ($mes==4) { $mletra='ABRIL'; }
	if ($mes==5) { $mletra='MAYO'; }
	if ($mes==6) { $mletra='JUNIO'; }
	if ($mes==7) { $mletra='JULIO'; }
	if ($mes==8) { $mletra='AGOSTO'; }
	if ($mes==9) { $mletra='SEPTIEMBRE'; }
	if ($mes==10) { $mletra='OCTUBRE'; }
	if ($mes==11) { $mletra='NOMBIEMBRE'; }
	if ($mes==12) { $mletra='DICIEMBRE'; }
	return ($mletra);
}
		  ?>
          <label for="mes"></label>
            <select name="mes" id="mes">
             <option value="13" <? if ($mes==13){ ?> selected="selected" <? } ?> >Todas las Vigentes</option>
            <? for ($q=1; $q<13; $q++){ ?>
              <option value="<?=$q?>" <? if ($mes==$q){ ?> selected="selected" <? } ?> ><?=cmes($q);?></option>
              <? } ?>
            </select></td>
          <td width="64" align="left"><label for="anio"></label>
            <select name="anio" id="anio">
            
             <? 
			 $actual=date("Y")+2;
			 for ($q=2009; $q<$actual; $q++){ ?>
              <option value="<?=$q?>" <? if ($anio==$q){ ?> selected="selected" <? } ?> ><?=($q);?></option>
              <? } ?>
            
            </select></td>
          <td width="285" height="1" align="left"><input type="submit" name="cambiar" id="cambiar" value="Cambiar" /></td>
        </tr>
		<?
        $hoy=date("Y-m-d"); 
		$busca=$bd->ejecutar("select * from convocatorias where 1 $cad order by id asc");
		$control=0;
        while($row=$bd->obtener_fila($busca,0)){
			$control++;
			
			 
			
        ?>
         <tr>
           <td colspan="4" align="left" class="negro14">
<div style="float:left; width:600px; padding:6px 6px 0 6px">
  <table width="600" border="0" cellspacing="0" cellpadding="5"<? if ($control%2==0){ echo 'style="background-color:#cac5b8"'; } ?> >
    <tr bgcolor="<?=$color?>">
      <td width="100"><strong>Tema:</strong></td>
      <td colspan="3"><strong>
        <?=$row['tema']?>
      </strong></td>
      </tr>
    <tr>
      <td><strong>Organiza:</strong></td>
      <td colspan="3"><span class="azul12" style="font-size:14px">
        <?=$row['organiza']?>
      </span></td>
      </tr>
    <tr bgcolor="<?=$color?>">
      <td><strong>Convocatoria:</strong></td>
      <td width="200"><? if (file_exists('admin/'.$row['url1']) and $row['url1']!=''){ ?>
&nbsp;&nbsp;<a href="admin/<?=$row['url1']?>" class="Arial12Nego" target="_blank"><img src="admin/imagenes/pdf.png" width="25" height="24" /> Descargar  </a>
<? } ?></td>
      <td width="100"><strong>Resultados:</strong></td>
      <td><? if (file_exists('admin/'.$row['url2']) and $row['url2']!=''){ ?>
&nbsp;&nbsp;<a href="admin/<?=$row['url2']?>" class="Arial12Nego" target="_blank"><img src="admin/imagenes/pdf.png" width="25" height="24" /> Descargar</a>
<? } ?></td>
    </tr>
    <tr>
      <td><strong>Vigencia:</strong></td>
      <td colspan="2"  class="azul12"> 
    <strong>   Del:  </strong>
 <?=fechag($row['finicio'])?><br />

         <strong> Al:</strong>  
          <?=fechag($row['ffin'])?>
          </td>
      <td> <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas Info" id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" />
        <input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></td>
      </tr>
    <tr bgcolor="<?=$color?>">
      <td colspan="4">
    <div class="Arial12Gris" id="info<?=$control;?>" style="float:left; width:580px; padding:6px 6px 0 6px; display: none;">
<?=nl2br($row['descr1']);?> </div>
      
      </td>
    </tr>
    </table> 
    </div>
           </td>
         </tr>
         
         <? } ?>
         <tr>
           <td colspan="4" align="left" class="Arial23Gris">&nbsp;</td></tr>
        
        </table>
        
       
      </div> </form>
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