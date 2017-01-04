<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=6;
$_SESSION['voyparader']='artistas';
$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
if ($secc!='' and $secc>0){ $cd=',secc:'.$secc; $cadena=' and seccion='.$secc; } else { $cd=''; $cadena=''; } 
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$colores=array('#EA870F','#C41230','#368B8F','#006210','#0071C4','#D24726','#03B3B2','#FF8F32','#005D47','#FD7726','#B60016','#666666');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instituto Veracruzano de la Cultura :: Artistas</title>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
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
	function  loggeo(){
		var eluser=$("#user").val();
		var elpass=$("#passw").val();
		
	$.post("entraa.php", {eluser:eluser,elpass:elpass}, function (data) {
		$("#error").html(data);
		data = data.trim();   
		if (data == 'ok'){ 
		$("#iniciars").toggle("fast");
		$("#entradiv").toggle("fast");
			$.post("entraa.php", {eluser:eluser,elpass:elpass,ok:1}, function (data) {
				$("#entradiv").html(data);
			
				});
		}
	});
 
	}
	
	function  busqueda(){
		var buscar=$("#buscar").val();
		$.post("buscar.php", {buscar:buscar<?=$cd?>}, function (data) {
			$("#resultados").html(data);
			
		});
	}
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="17%" height="64" align="left" bgcolor="#C41230" style="padding:10px"><a href="artistas.php?secc=0" class="recintos">Artistas</a></td>
    <td width="83%" bgcolor="#C41230"><? include "menu2.php"; ?></td>
  </tr>
</table>
</div>
<div style="width: 930px; float: left; z-index: 8888888888;">
  <table width="100%" border="0" cellspacing="0">
    <tr>
      <td width="24%" height="45" bgcolor="#333333" class="Arial12Bco" style="padding:10px 2px 10px 10px"><label for="buscar"></label>
        Buscar Artista:<br />
        <input type="text" name="buscar" id="buscar" style="width:98%" onkeyup="busqueda()" onkeypress="busqueda()" /></td>
      <td width="76%" bgcolor="#333333" style="padding:10px 2px ">&nbsp;</td>
      </tr>
  </table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 
    <tr> 
      <td valign="top" bgcolor="#FFFFFF"   <? if ($secc>0) { ?>  class="artistas" style="padding:10px"<? } ?> >
        <? if ($secc>0) { ?>  <?
	  $baso=$bd->ejecutar("select * from artistas_seccion where id<$secc and tipo=1 order by id desc limit 1");
$kaso=$bd->obtener_fila($baso,0);
echo $kaso['nombre'];
	  ?><? } ?></td>
      <td width="17" rowspan="2">&nbsp;</td>
      <td width="300" rowspan="2" valign="top" bgcolor="#E8E2D4">    <div style="width:275px; margin:12px auto">
      <div style="width: 275px; /* [disabled]margin:12px; */ float: left">
      <?  if ($aid!='' and $aid>0){ $d=''; $a='none'; } else { $d='none'; $a==''; }?>     
      <div id="entradiv" style="float: left; width: 275px; background-color: #C41230; display: <?=$d;?>;" >  
        <table width="275" border="0" cellspacing="0" cellpadding="7">
          <tr>
            <td rowspan="3" align="center" class="Arial12Bco">
            <? $baa=$bd->ejecutar("select * from artistas_datos where id=$aid"); 
					$kea=$bd->obtener_fila($baa,0);
					$url1='';	
					$url1='admina/'.$kea['foto'].$kea['id'].'_s.jpg';
					if (!file_exists($url1)){
					$url1='admina/'.$kea['foto'].$kea['id'].'.jpg'; }
					if (!file_exists($url1)){
					$url1="admin/imagenes/no.png"; }
			 ?>
            <img src="<?=$url1?>" width="60" style="background-color:#666;" class="imagenborde" />
            </td>
            <td class="Arial12Bco">Bienvenido:<br /><strong>
              <?=$anombre?>
            </strong></td>
          </tr>
          <tr>
            <td class="Arial12Bco"><a href="admina.php?id=<?=$aid?>" class="Arial12Bco"><strong>Administrar mis datos</strong></a></td>
            </tr>
          <tr>
            <td><a href="sale.php" class="Arial12Bco"><strong>salir</strong></a></td>
            </tr>
        </table>
      </div>
      
      <div id="iniciars" style="float:left; width:275px;display: <?=$a;?>;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" class="Arial23Gris">INICIAR SESI&Oacute;N</td>
            </tr>
          <tr bgcolor="#C41230">
            <td>
            
            
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="33%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr bgcolor="#C41230">
            <td align="right" class="Arial12Bco">Usuario:</td>
            <td><label for="user"></label>
              <input type="text" name="user" id="user" style="width:98%" /></td>
          </tr>
          <tr bgcolor="#C41230">
            <td align="right" class="Arial12Bco">Contraseña:</td>
            <td><label for="passw"></label>
              <input type="password" name="passw" id="passw" style="width:98%" /></td>
          </tr>
          <tr bgcolor="#C41230">
            <td>&nbsp;</td>
            <td align="right"><img src="imagenes/entra.png" width="50" height="26" style="cursor:pointer;" onclick="javascript:loggeo()" /></td>
            </tr>
          <tr bgcolor="#C41230">
            <td colspan="2" align="center" class="Arial12Bco"><a href="registro.php" class="Arial12Bco"><strong>Registrarse</strong></a></td>
          </tr>
          <tr bgcolor="#C41230">
            <td colspan="2" align="center" class="Arial12Bco"><div class="Arial12Bco" id="error">&nbsp;</div></td>
            </tr>
</table>
</td>
          </tr>
        </table>
        </div>
        
        </div>
        </div>        </td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
        <div id="resultados">
          <table width="613" border="0" cellspacing="0" cellpadding="5">
            <?  $cuanto=count($abcd);
			$idnot='0';
	  for ($i=0;$i<$cuanto;$i++){
		  $letra=$abcd[$i];
		  $bual=$bd->ejecutar("select * from artistas_datos where (edo=1 and  nombre like '$letra%' $cadena) and id not in ($idnot) order by nombre asc");
		 if ($bd->num_rows($bual)>0){
		  
	   ?>     
            <tr>
              <td class="Arial50C666"><?=$abcd[$i];?>&nbsp;</td>
              </tr>
            <tr>
              <td><?
           while($eae=$bd->obtener_fila($bual,0)){
		$ida=$eae['id'];
		$idnot.=','.$ida;
		$ids=$eae['seccion']; 
		$bass=$bd->ejecutar("select * from artistas_seccion where id=$ids");
		$kass=$bd->obtener_fila($bass,0);
		$baso=$bd->ejecutar("select * from artistas_seccion where id<$ids and tipo=1 order by id desc limit 1");
		$kaso=$bd->obtener_fila($baso,0);
			   $ourl='';	
					$ourl='admina/'.$eae['foto'].$eae['id'].'_s.jpg';
					if (!file_exists($ourl)){
					$ourl='admina/'.$eae['foto'].$eae['id'].'.jpg'; }
					if (!file_exists($ourl)){
					$ourl="admin/imagenes/no.png"; }
		  ?>
                <? for($a=0;$a<5;$a++){ ?> <? } ?>
                <div style="width: 100px; height: 230px; float: left; margin-left: 10px; margin-right: 10px">
                  <table width="100" border="0" cellspacing="0">
                    <tr>
                      <td>
                      <div style="float: left; width: 100px; height: 133px; overflow:hidden; display:block">
                      <a href="verartistas.php?id=<?=$eae['id']?>"><img src="<?=$ourl?>" width="100" height="133" class="imagenborde" style="background-color:#666;" /></a>
                      </div>
                      </td>
                      </tr>
                    <tr>
                      <td class="Arial12Nego" style="padding:3px"><?=$eae['nombre']?></td>
                      </tr>
                    <tr>
                      <td class="Arial12Rojo"  style="padding:3px"><?=$kaso['nombre'].' / '.$kass['nombre'];?></td>
                      </tr>
                    </table>
                  
                  </div>
                
                
                
                <? } ?>
                </td>
              </tr>
            <tr>
              <td height="1px" align="center"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td>
              </tr>
            <? } } ?>
            </table>
          </div>
        </td>
    </tr>
    </table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>