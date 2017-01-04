<? session_start();
require 'db.class.php';
require 'conf.class.php';
include "fecha.php";
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
	var total= $("#totalcampo").val();
	total=parseInt(total);
	for (a=1; a<=total; a++){
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
    <td height="64" align="left" bgcolor="#0071C4" class="recintos" style="color:#FFF; padding-left:8px">Transparencia</td>
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
          <td align="left" class="Arial12Nego">Información Pública señalada en el Artículo 8 de la Ley 848 de Transparencia y Acceso a la Información Pública para el 
Estado de Veracruz de Ignacio de la Llave<br />
<br />
"Con fundamento en los artículos 2, fracción IV, 17, 18, 19, 20, 21, 22, 23 y 24 de la Ley 848 y lineamientos quinto y sexto de los Lineamientos Generales para elaborar formatos de solicitudes de acceso a la información pública y corrección de datos personales, se informa que todos los datos personales que constan en los archivos del Instituto Veracruzano de la Cultura se encuentran protegidos y únicamente podrán divulgarse para fines estadísticos".</td>
        </tr>
        <tr>
          <td align="center">
            <table width="600" border="0" align="center" cellpadding="5" cellspacing="0" >
              
              <?
	 			$sqll="Select *  from fracciones where 1 order by numero asc";
						$resultl =@$bd->ejecutar($sqll); 
						$total=$bd->num_rows($resultl);
						$wf=0;
						$wz=0;
						$control=0;
						$sty='; background-color:#F0F0F0  ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
							$control++;
						$idgrup=$rowl['id'];
						?><? if ($wf%2==0) { ?>
              <tr class="Hevel16Gris" ><? } ?>
                <td align="left" valign="middle"  class="Arial12Rojo" style="font-size: 13px; border:1px #666666 solid  <? if ($wz%2==0) { echo $sty; } ?>" width="300"><strong>Fracción <? echo NumerosRomanos::decimalRomano($rowl['numero']); ?>.-</strong> 
                
                <? if ($rowl['numero']==3){ $urlxc='directorio';} else { $urlxc='datosf'; } ?>
                <a href="<?=$urlxc?>.php?id=<?=$rowl['id'];?>" class="negro12">
                  <?=$rowl['titulo']?>
                  </a> 
                  <?
				  $idf=$rowl['id'];
				  $bfx=$bd->ejecutar("select * from fracc_contenido where fracc=$idf order by id desc limit 1");
				  while($rod=@$bd->obtener_fila($bfx,0)){
				  $lefec=explode("/",$rod['url']);
				  ?><br /><span style="font-size:11px">Actualizado Abril 2016 </span>
				 
				  
				  <!--	O R I G I N A L
				  ?><br /><span style="font-size:11px">Actualizado <?=fechacp($lefec[1])?> </span> 
					-->

				  <? }  ?>
                  
                  <? if (trim($rowl['descrip']!='')){ ?>
                  <img src="imagenes/add.png" alt="Mas/Menos Info" name="img<?=$control;?>" id="img<?=$control;?>" style="cursor:pointer" title="Mas/Menos Info" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /><div class="Arial12Gris" id="info<?=$control;?>" style="float:left; width:290px; padding:8px 0 3px 0; display:none;"><?=nl2br($rowl['descrip'])?></div>
                  <? } ?>
                  </td>
                
                <? if ($wf%2!=0 or $wf==$total) { ?>
                </tr><?  $wz++; } ?>
              <?  $wf++; } ?>
              </table> <input name="totalcampo" id="totalcampo" type="hidden" value="<?=$total?>" /></td>
        </tr>

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