<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=2;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
$secc1=$_GET['secc1'];
if ($secc1>0){ $cad=' and id='.$secc1.' ';  }
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$id=$_GET['id'];


function cmes($mes)
{
	if ($mes==0) { $mletra='GENERAL'; }
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
	if ($mes==11) { $mletra='NOVIEMBRE'; }
	if ($mes==12) { $mletra='DICIEMBRE'; }
	return ($mletra);
}
$fecha=$_POST['fecha'];
 if ($fecha==''){ $fecha='2012-G'; }
$fechaw=explode("-",$fecha);
$elano=$fechaw[0];
$elmes=$fechaw[1];

if ($fecha!=''){
if ($elmes=="G"){ 
 $bax=$bd->ejecutar("select * from fracc_contenido where fracc=$id and mes='0' order by id desc");
}
else if ($elmes=="T"){
 $bax=$bd->ejecutar("select * from fracc_contenido where fracc=$id and ano=$elano order by ano desc, mes asc");
} else {
 $bax=$bd->ejecutar("select * from fracc_contenido where fracc=$id and ano=$elano and mes=$elmes order by ano desc, mes asc");	
} }
else {  $baxx=$bd->ejecutar("select * from fracc_contenido where fracc=$id order by ano desc, mes asc limit 1");
$kba=$bd->obtener_fila($baxx,0);
$elano=$kba['ano'];
$elmes='T';
$bax=$bd->ejecutar("select * from fracc_contenido where fracc=$id and ano=$elano order by ano desc, mes asc");


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
    <td height="64" align="left" bgcolor="#0071C4" class="gris25" style="color:#FFF; padding-left:8px"><a href="fracciones.php" class="recintos"  style="color:#FFF;" >Transparencia</a></td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <form method="post" action="datosf.php?id=<?=$id?>">
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
          <td colspan="4" align="left" class="Arial12Nego"><table width="600" border="0" align="center" cellpadding="5" cellspacing="0" >
            <?
	 			$sqll="Select *  from fracciones where id=$id order by numero asc";
						$resultl =@$bd->ejecutar($sqll); 
						$total=$bd->num_rows($resultl);
						$wf=0;
						$wz=0;
						$control=0;
						$sty='; background-color:#F0F0F0  ';
						 $rowl =@$bd->obtener_fila($resultl, 0);
							$control++;
						$idgrup=$rowl['id'];
						?>
            <tr class="Hevel16Gris" >
              <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 19px" width="300"><strong>Fracción <? echo NumerosRomanos::decimalRomano($rowl['numero']); ?>.- </strong> <span class="negro19">
                <?=$rowl['titulo']?>
                </span><br />
                <br /><span style="color:#333">
                <?=nl2br($rowl['descrip'])?></span></td>
            </tr>
          </table></td>
        </tr>
     
        <tr>
          <td width="121" align="left"><strong class="negro15">Cambiar Fecha:</strong></td>
          <td width="344" align="left"><label for="fecha"></label>
            <select name="fecha" id="fecha" onchange="document.forms[1].submit()">
          <option value="2012-G" <? if ( $fecha=='2012-G' ){ echo 'selected="selected"'; } ?>>General</option>
            <? $ba=$bd->ejecutar("select ano from fracc_contenido where fracc=$id  and ano>0 group by ano order by ano desc"); 
			
			while($roa=$bd->obtener_fila($ba,0)){
			?>
            <optgroup label="<?=$roa['ano']?>">
            <option value="<?=$roa['ano'].'-T';?>"<? if ( $fecha==$roa['ano'].'-T' or ($fecha=='') ){ echo 'selected="selected"'; } ?> >Todos de <?=$roa['ano'];?></option>
            <? $ano=$roa['ano'];
			$bm=$bd->ejecutar("select mes from fracc_contenido where fracc=$id and ano=$ano and mes>0  group by mes order by mes asc ");
			  while($rom=$bd->obtener_fila($bm,0)){ ?>            
              <option value="<?=$ano.'-'.$rom['mes']?>"<? if ( $fecha==($ano.'-'.$rom['mes']) ){ echo 'selected="selected"'; } ?> ><?=cmes($rom['mes'])?></option>
              <? } ?>
              </optgroup>
             <? } ?>
            </select></td>
          <td width="54" align="left">&nbsp;</td>
          <td width="54" align="left">&nbsp;</td>
        </tr>
   <tr>
          <td align="left" class="Arial23Gris">
		  <?  if ($elmes!="G"){ ?>
		  <?=$elano;?>&nbsp;<? } ?></td>
          <td align="left" class="Arial23Gris">&nbsp;</td>
          <td align="left">&nbsp;</td>
          <td align="left"> </td>
        </tr>
        <?
		$mesa='';  
		while($row=$bd->obtener_fila($bax,0)){ 
	 
		$mes=$row['mes'];
		if ($mes!=$mesa){
		$conta=1;
		 ?>
           <tr>
             <td align="left">&nbsp;</td>
             <td colspan="3" align="left"><span class="Arial23Gris">
               <?   echo cmes($mes); $mesa=$mes;  ?>
             </span></td>
             </tr>
            <? } ?>
           <tr>
             <td align="right" class="negro14"><?=$conta?> .-</td>
             <td colspan="3" align="left" class="negro14">
			 <? if (file_exists('admin/'.$row['url']) and $row['url']!=''){ ?><a href="<?='admin/'.$row['url']?>" class="negro14" target="_blank" ><? } ?>
			 <?=$row['titulo']?>
			 <? if (file_exists('admin/'.$row['url']) and $row['url']!=''){ ?></a><? } ?>
             
             
             </td>
             </tr>
           <tr>
           <? 
		$conta++; } ?>
             <td align="right">&nbsp;</td>
             <td colspan="3" align="left">&nbsp;</td>
             </tr>
           <tr>
          <td align="right">&nbsp;</td>
          <td colspan="3" align="left">&nbsp;</td>
          </tr>
         </table>
         </form>
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