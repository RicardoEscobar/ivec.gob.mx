<? session_start();
require 'db.class.php';
require 'conf.class.php';
require 'fecha.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=3;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc1=$_GET['secc1'];
if ($secc1!=''){ $_SESSION['laseccesws']=$secc1; }
$secc1=$_SESSION['laseccesws'];

$datepicker=$_GET['datepicker'];
if ($datepicker==''){ $datepicker=date("Y-m-d"); }
 
if ($secc1>0){ $cad=' and secc1='.$secc1.' ';  }

$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$colores=array('#C41230','#C41230','#006210','#D24726');
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
    <script src="src/js/jscal2.js"></script>
    <script src="src/js/lang/es.js"></script>
    <link rel="stylesheet" type="text/css" href="src/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="src/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="src/css/steel/steel.css" />
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="17%" height="64" align="left" bgcolor="#EA870F" class="gris25"><a   style="color:#FFF" href="agenda.php?secc1=0" class="recintos">Agenda</a></td>
    <td width="57%" bgcolor="#EA870F"></td>
    <td width="26%" bgcolor="#EA870F"><?
              $fini=date("Y-m").'-01';
			  $ffin=date("Y-m").'-31';
			  $bcar=$bd->ejecutar("select * from cartelera where fecha between '$fini' and '$ffin' order by id desc limit 1 ");
			  while($kcar=$bd->obtener_fila($bcar,0)){ ?>
				  
				<a href="admin/<?=$kcar['url']?>" target="_blank" class="Arial15bco">Descargar Cartelera del mes </a>
<? } ?></td>
  </tr>
</table>
</div>
<div style="width: 930px; float: left; z-index: 8888888888;">
<form method="get" action="agenda.php">
  <table width="100%" border="0" cellspacing="0">
    <tr>
      <td width="24%" height="45" bgcolor="#333333" style="padding:10px 2px 10px 10px"><label for="buscar"></label>
        <select name="secc1" id="secc1" onchange="document.forms[1].submit()">
           <option value="0" <? if (0==$secc1) { echo 'selected="selected"'; } ?>>Todos</option>
        <optgroup label="RECINTOS CULTURALES">
			  <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>" <? if ($rows['id']==$secc1) { echo 'selected="selected"'; } ?>><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup> <optgroup label="SUBDIRECCIONES">
                 <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>"<? if ($rows['id']==$secc1) { echo 'selected="selected"'; } ?> ><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup>
               
        </select></td>
      <td width="8%" bgcolor="#333333" style="padding:10px 2px "><input type="text" name="datepicker" id="datepicker"   size="12"  class="naranja121" onchange="cambia()" value="<?=$datepicker;?>" /> <script type="text/javascript"> 
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
<script language="javascript">
$(document).ready(function($){

    var div_alto1 = $("#mydiv1").height();
    var div_alto2 = $("#mydiv2").height();
    var div_alto3 = $("#mydiv3").height();
//alert (div_alto1+" "+div_alto2+" "+div_alto3)
	if (div_alto1 > div_alto2)
	{ 
		if (div_alto1>div_alto3){
			
			$("#mydiv1").height(div_alto1+10);
			$("#mydiv2").height(div_alto1+10);
			$("#mydiv3").height(div_alto1+10);
		} else {			
			$("#mydiv1").height(div_alto3+10);
			$("#mydiv2").height(div_alto3+10);
			$("#mydiv3").height(div_alto3+10);
		}
	 }
	else { 
		if (div_alto2>div_alto3){
			$("#mydiv1").height(div_alto2+10);
			$("#mydiv2").height(div_alto2+10);
			$("#mydiv3").height(div_alto2+10);
		} else {			
			$("#mydiv1").height(div_alto3+10);
			$("#mydiv2").height(div_alto3+10);
			$("#mydiv3").height(div_alto3+10);
		}
	 }
	
     
	   
	    
});
    </script> 
 </td>
      <td width="68%" bgcolor="#333333" style="padding:10px 2px "><input type="image" src="imagenes/abuscar.png" width="50" height="26" style="cursor:pointer" ondblclick="busqueda()" /></td>
      </tr>
  </table>
  </form>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <table width="613" border="0" cellspacing="0" cellpadding="5">

        <tr>
          <td    <? if ($secc1>0) { ?>  class="artistas" style="padding:10px"<? } ?> >
                     <? if ($secc1>0) { ?>  <?
	  $baso=$bd->ejecutar("select * from recintos where id=$secc1   order by id desc limit 1");
$kaso=$bd->obtener_fila($baso,0);
echo $kaso['nombre'];
	  ?> <? } ?>  
         </td>
        </tr>
        <tr>
          <td class="Arial50C666"><? 
		$desde=date("Y-m-d").' 00:00:01';
		$hastax=date("Y-m-d H:i:s"); 
		$fd=0; 
		$idsp='0';
		$eventos=$bd->ejecutar("select * from mynews  where 1 $cad and fin >= '$hastax' order by rand() limit 3 ");
		while($row=$bd->obtener_fila($eventos,0)){
			$fd++;
			$idsp.=','.$row['id'];
			$tdatet=explode(" ",$row['newsdate']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);
			$foto='admin/'.$row['url'].$row['id'].'.jpg';
			$foto='admin/'.$row['url'].$row['id'].'_cx.jpg';
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_c.jpg'; }			
			if (!file_exists($foto)){
			$foto='admin/'.$row['url'].$row['id'].'_gx.jpg'; }
			$secc=$row['secc1'];
			$bsec=$bd->ejecutar("select * from recintos where id=$secc");
			$rows=$bd->obtener_fila($bsec,0);
			
			
		 ?><div style="float: left; width: 190px; margin-right:10px; background-color:<?=$colores[$fd];?>" id="mydiv<?=$fd?>">
        <table width="195" align="left" cellpadding="5" cellspacing="0"  >
          <tr>
            <td height="130" align="center" valign="middle" class="negro12">
			 <a href="veragenda.php?id=<?=$row['id']?>" ><? if(file_exists($foto)){ ?>
              <img src="<?=$foto?>" style="max-height:120px; max-width:170px"  />
              <? } else { ?>
              <img src="admin/imagenes/no.png" width="120" height="120" align="absmiddle"  />
              <?  } ?></a>
            </td>
          </tr>
          <tr>
            <td class="negro12"><span class="especial">
              <?=$row['descri']?>
            </span></td>
          </tr>
          <tr>
            <td class="menu"><strong>
              <?=$row['newstitle']?>
            </strong></td>
          </tr>
          <tr>
            <td class="negro12"><span class="Arial12Bco">
              <?=$rows['nombre']?>
            </span></td>
          </tr>
          <tr>
            <td class="negro12"><span class="Arial15bco">
            <?=fechag($fecha)?> / 
              <? if ($hora!='00:00'){ echo $hora; } ?> 
              Hrs
            </span></td>
          </tr>
          <tr>
            <td class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="150" /></td>
          </tr>
        </table>
        <table width="200" align="left" cellpadding="5" cellspacing="5">
          <tr>
            
          </tr>
        </table></div>
                <? } ?> 
          </td>
        </tr>
        <tr>
          <td> 
     
          
          
       
          </td>
        </tr>
        <tr>
          <td height="1px" align="center"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td>
        </tr>
    
		<?
		if ($datepicker!='') { $cad2=" and (newsdate between '".$datepicker." 00:00:01' and '".$datepicker." 23:59:59' or fin>='".$datepicker." 00:00:01' ) "; 
			$eventos=$bd->ejecutar("select * from mynews where 1 $cad $cad2 and id not in ($idsp) order by newsdate asc ");
		//echo "select * from mynews where 1 $cad $cad2 order by newsdate asc ";
		} else {
		//echo "select * from mynews where 1 $cad and newsdate between '$desde' and '$hasta' order by newsdate desc ";
			$eventos=$bd->ejecutar("select * from mynews where 1 $cad and newsdate between '$desde' and '$hasta'  and id not in ($idsp) order by newsdate desc "); }
			
			if ($bd->num_rows($eventos)>0){
		?>
         <tr>
          <td height="1px" align="left" class="Arial23Gris"><?=$row['nombre']?></td></tr>
        
        <tr>
          <td height="1px" align="left">
           <table>
        <? 
		
		$desde=date("Y-m-d").' 00:00:01';
		$hasta=date("Y-m-d").' 23:59:59';
	
		while($row=$bd->obtener_fila($eventos,0)){
			$tdatet=explode(" ",$row['newsdate']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);
			$foto='admin/'.$row['url'].$row['id'].'.jpg';	
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
        <td width="152" rowspan="2" class="negro12">
       <a href="veragenda.php?id=<?=$row['id']?>" >  <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="68" height="42" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></a></td>
        <td width="152" class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td width="190" class="azul12"><?=$rows['nombre']?></td>
        <td width="79" rowspan="2" class="negro15"><? if ($hora!='00:00'){ echo $hora.' Hrs'; } ?> </td>
        <td width="6" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong><?=$row['newstitle']?></strong></td>
        <td width="190" class="azul12">  <?=fechag($row['newsdate'])?></td>
      </tr>
   
        
           
     
 
           
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
        <? } ?></table></td>
        </tr>
        <tr>
          <td height="1px" align="center">&nbsp;</td>
        </tr>
        
        <? }   ?>
     
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