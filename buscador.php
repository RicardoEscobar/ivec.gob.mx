<? session_start(); 
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
function replace($cadena){
$cadena=str_replace("select","",$cadena);
$cadena=str_replace("delete","",$cadena);
$cadena=str_replace("drop","",$cadena);
$cadena=str_replace("'","",$cadena);
$cadena=str_replace("*","",$cadena);
$cadena=str_replace(";","",$cadena);
$cadena=str_replace("?","",$cadena);
$cadena=str_replace(">","",$cadena);
$cadena=str_replace("<","",$cadena);
$cadena=str_replace("script","",$cadena);
return $cadena;
}

include ("admin/Paginated.php");
include ("admin/DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();


$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];

$tipo=$_POST['tipo'];
if ($tipo!=''){ $_SESSION['eltipoesde']=$tipo; }
$tipo=$_SESSION['eltipoesde'];

$busked=$_POST['busked'];
if ($busked!=''){ $_SESSION['elbukedesde']=$busked; }
$busked=$_SESSION['elbukedesde'];


$buskda=$_POST['busked'];

if ($buskda!='')
{
  $_SESSION['ppbusk']=$buskda;
}
$buskda=$_SESSION['ppbusk'];

$como=$_POST['como'];
if ($como!='') { $_SESSION['comolaquieres']=$como; }
if ($como==''){ $como=$_SESSION['comolaquieres']; }
if ($como=='td'){	
$buskda2=$_SESSION['ppbusk'];
}
else {
$buskda2='"'.$_SESSION['ppbusk'].'"'; }
$buskda=replace($buskda);
$buskda2=replace($buskda2);

if ($busked!=''){ 
if ($tipo>0){ $cadf=' and tipo='.$tipo; } 
$rsx= $bd->ejecutar("select id from buscador where 1 $cadf and  MATCH (titulo,resumen) AGAINST ('$buskda2' in boolean mode) order by tipo desc, id desc");
 

$k3k=@$bd->num_rows($rsx);
if ($k3k<1){

$rsx= $bd->ejecutar("select id from buscador where 1 $cadf and  titulo  like '%$buskda2%' or resumen like '%$buskda2%' order by tipo desc, id desc");
}
}
$names= array();
while ($arra=@$bd->obtener_fila($rsx,0))
{
	$names[]=$arra['id'];

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
#resultados a {
	/* [disabled]color:#005D47; */
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
	function checa(que){
	var edo = $("#oculto"+que).val();
	if (edo==0){
		$("#oculto"+que).val(1);
		$("#info"+que).toggle("slow");
		$("#img"+que).attr("src","imagenes/del.png");
	} else{
		$("#oculto"+que).val(0);
		$("#info"+que).toggle("fast");
		$("#img"+que).attr("src","imagenes/add.png");
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
    <td height="64" align="left" bgcolor="#005D47" class="gris25" style="color:#FFF; padding-left:8px">Buscador</td>
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
          <td class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td> 
     
          
          
       
          </td>
        </tr>
        <tr>
          <td height="1" align="center">
          <form action="buscador.php" method="post" name="elform1">
          <table height="70px" align="left" cellpadding="0" cellspacing="5">

  <tr><td><input name="busked" type="text" class="negro15" id="busked" style=" width:200px;" value="<?=$buskda?>" /></td>
    <td><label for="tipo"></label>
      <select name="tipo" class="negro15" id="tipo">
        <option value="0" <? if ($tipo==0){ echo 'selected="selected"'; } ?> >Todos</option>
        <option value="1" <? if ($tipo==1){ echo 'selected="selected"'; } ?> >Notas</option>
        <option value="2" <? if ($tipo==2){ echo 'selected="selected"'; } ?> >Agenda</option>
        <option value="3" <? if ($tipo==3){ echo 'selected="selected"'; } ?> >Artistas</option>
      </select></td>
    <td rowspan="2"><input type="image" src="imgs/buscar.jpg" width="50" height="26" border="0"/></td>
    <td rowspan="2">&nbsp;&nbsp;&nbsp;</td></tr>
  <tr>
    <td colspan="2" class="Arial12Nego"><input name="como" type="radio" id="searchphraseexact" value="ok" <? if ($como!='td') { $no='no'; ?>checked="checked" <? } ?> />
Frase exacta
              <input name="como" id="searchphraseexact2" value="td" type="radio"  <? if ($no!='no') { $no='si'; ?>checked="checked" <? } ?> />
                Cualquier palabra &nbsp;</td>
    </tr>
          </table>
    </form>
    
    </td>
        </tr>
         <tr>
           <td align="left" class="negro14">&nbsp;</td>
         </tr>
         <tr>
           <td align="left" class="Arial23Gris"><div style="width:580px; margin:5px 0 0 2px; float: left;">
             
             
          <? 
		  $page=$_GET['page'];
		  $pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}
			$conta=0;
		  
		  
			 $not49=$bd->ejecutar("select * from buscador where id in ($ids) $cadf order by tipo desc, id desc limit 12" );
			 $kk=1;
			 $t49=@$bd->num_rows($not49);
			 
			 while($row49=@$bd->obtener_fila($not49,0)){
				 
				 if ($row49['tipo']==1){ //Nota 
				 $togo='nota.php'; 
				 $tipoes='Nota';
				 $idn49=$row49['id'];
				 $fo49=$bd->ejecutar("select * from foto where id_nota=$idn49 order by id asc limit 1");
				 $kf49=@$bd->obtener_fila($fo49,0);
				 $url49='';
				 $url49='admin/'.$kf49['url'].$kf49['id'].'_57.jpg';  
				 } else  if ($row49['tipo']==2) {  //agenda
				 $tipoes='Agenda';
					$togo='veragenda.php'; 
				 $idn49=$row49['id'];
				  $fo49=$bd->ejecutar("select * from mynews where id=$idn49 order by id asc limit 1");
				 $kf49=@$bd->obtener_fila($fo49,0);
				 $url49='';
				 $url49='admin/'.$kf49['url'].$kf49['id'].'_c.jpg';  
				 } else { //artistas
				 $tipoes='Artistas';
					$togo='verartistas.php'; 
					 $url49='admina/'.$row49['fecha'].$row49['id'].'_c.jpg';  
				 }
				 
				 
			 ?>
          <? if ( $kk==1 or $kk==3 or $kk==5  or $kk==7  or $kk==9  or $kk==11 ) { ?>
 <div style="width:580px; float: left;">
               <? }  ?>
               
               <div style="width:280px; float: left; margin: 4px 3px;">
              
                 <div class="Arial12Rojo" style="width:280px; float: left; margin: 4px 0; text-transform:uppercase">
                   <?=$tipoes;?></div>
                  
                 <div class="georgia26Azul" style="width:280px; float: left; margin: 4px 0;"><a href="<?=$togo;?>?id=<?=$row49['id'];?>" class="negro19"><?=stripslashes($row49['titulo']);?>
                 </a></div>
                 <div class="Arial12Gris" style="width:280px; float: left; margin: 4px 0;">
                 <? if (file_exists($url49)) { ?>
                 <div style="float:left; width:100px; padding-bottom:6px; background:url(imagenes/fff.png) bottom left no-repeat;"><a href="<?=$togo;?>?id=<?=$row49['id'];?>" class="negro19">
                 <img src="<?=$url49;?>" width="96"  align="left" style="margin:0 4px 0 0" alt="<?=$kf49['titulo'];?>"/></a>
                 </div>
				 <? } ?>
                  <?=stripslashes(substr(strip_tags($row49['resumen']),0,200));?>...<br />
                   <br />
             
                 </div>
               </div>
               
               <? if ($kk==2 or $kk==4 or $kk==6 or $kk==8  or $kk==10  or $kk==12 or $kk==$t49){ ?>
<div style="width:580px; float: left;">
<div style="width: 280px; float: left; margin: 4px 3px; border-bottom: 1px solid #005D47;"></div>

 
<div style="width: 280px; float: left; margin: 4px 3px; border-bottom: 1px solid #005D47;"></div>
 </div>

          
               </div>
               <? } ?>
			   <? $kk++; } ?>
               <div class="Arial12Gris" style="float:left; width:580px">
               <style> a{ color:#E5B449; text-decoration:none;  } a:hover { text-decoration:underline; } </style>
					<form id="form1" name="form1" method="get" action="<?=$_SERVER['php_self']; ?>">
<?php  $pagedResults->setLayout(new DoubleBarLayout());

	      echo $pagedResults->fetchPagedNavigation(); ?>
                      ir a pagina
                      <input name="page" type="text"  id="page" size="5" />
                      <input type="submit" name="ir" value="ir" />
                 </form>               
               </div>
        </div></td></tr>
        
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