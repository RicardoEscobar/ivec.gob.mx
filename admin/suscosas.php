<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 


include ("Paginated.php");
include ("DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();


 
$id=$_GET['id'];
if($id!=''){ $_SESSION['eliddelartistaqueseve']=$id; }
$id=$_SESSION['eliddelartistaqueseve'];
$busca=$bd->ejecutar("select * from  artistas_datos   where id=$id");
$ke=$bd->obtener_fila($busca,0);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Notas</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript">
 
	function modificar(dude){
		$("#info").toggle("fast");
		$("#infou").toggle("fast");
		$("#modifica").css("display","none");
		$("#guarda").css("display","block");		
	}
	function guardar(dude){	
		$("#info").toggle("fast");
		$("#infou").toggle("fast");
		$("#modifica").css("display","block");
		$("#guarda").css("display","none");	
		var lainf = $("#lainfo").val();
		$("#info").html(lainf);
		
		 $.post("guardasusc.php", {dude:dude,lainf:lainf}, function (data) {   
				  
		 });
	}
 
</script>

</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td bgcolor="#000000" >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; /* [disabled]background-color:#000000; */">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">


<table width="908" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td colspan="4" align="center" class="Arial15Azul"><strong>Datos del Artista:</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro"><?=$ke['nombre']?>&nbsp;</td>
    </tr>
  <tr>
    <td align="center" valign="middle" class="Arial12Gris">&nbsp;</td>
    <td align="left" valign="top" class="Arial12Gris">&nbsp;</td>
    <td align="left" class="Arial12Gris">&nbsp;</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td width="116" align="center" valign="middle" class="Arial12Gris">             <? if (file_exists('../admina/'.$ke['foto'].$ke['id'].'.jpg')){ ?>
              <img src="<?='../admina/'.$ke['foto'].$ke['id'].'.jpg'?>" name="fotodude<?=$ke['id'];?>" height="80" id="fotodude<?=$ke['id'];?>" /><br />
              <? } else { ?>
              <img src="imagenes/no.png" width="80" height="80" />
<? } ?>&nbsp;</td>
    <td width="475" align="left" valign="top" class="Arial12Gris">
	<div id="info"><? $bi=$bd->ejecutar(" select * from artistas_info where dude=$id"); $ki=@$bd->obtener_fila($bi,0); echo $ki['descripcion']; ?></div>
    <div id="infou" style="display:none" >
   
    
      <table width="99%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><label for="info"></label>
            <textarea name="lainfo" rows="7" id="lainfo"><?=$ki['descripcion'];?></textarea></td>
          </tr>
      </table>
    </div>
    </td>
    <td width="210" align="left" class="Arial12Gris"><input type="button" name="modifica" id="modifica" value="Editar" onclick="javascript:modificar(<?=$id?>)" />
      <input type="hidden" name="id" id="id" />
      <input type="button" name="guarda" id="guarda" value="Guardar" onclick="javascript:guardar(<?=$id;?>)" style="display:none" /></td>
    <td width="52" align="center" class="Arial12Gris"><label for="textfield"></label></td>
  </tr>
  <tr>
    <td align="left" class="arial14Negro"><strong>Video Cargado:</strong></td>
    <td align="left" class="Arial12Gris">    <? $buaa=$bd->ejecutar("select * from artistas_videos where autor=$id");
	
	 while($kaa=$bd->obtener_fila($buaa,0)) { ?><iframe width="350" height="200" src="http://www.youtube.com/embed/<?=$kaa['url']?>" frameborder="0" allowfullscreen></iframe>
      <? if ($kaa['edo']==1){ ?>
      <a href="appvideo.php?id=<?=$kaa['id'];?>&edo=0"><img src="imagenes/ok.png" title="Aprobar" width="21" height="21" style="cursor:pointer" /></a>
      <? } else {?>   <a href="appvideo.php?id=<?=$kaa['id'];?>&edo=1"><img src="imagenes/inte.png" title="Aprobar" width="25" height="25" style="cursor:pointer"  /></a>
      <? } ?>
     <a href="delvideo.php?id=<?=$kaa['id'];?>"  onclick = "if (! confirm('¿Eliminar Video?')) return false;">
     <img src="imagenes/del.png" width="24" height="21" style="cursor:pointer" title="Eliminar"  /></a><? } if ($bd->num_rows($buaa)<1){ echo 'No hay Videos Disponibles';  } ?></td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" class="arial14Negro"><strong>Audio:</strong></td>
    <td align="left" class="Arial12Gris"><div id="audio">
    <? $buaa=$bd->ejecutar("select * from artistas_audios where autor=$id");
	 while($kaa=$bd->obtener_fila($buaa,0)) { ?>
    <object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=../<?=$kaa['url']?>" />
</object>
    <? if ($kaa['edo']==1){ ?>
    <a href="appaudio.php?id=<?=$kaa['id'];?>&edo=0"><img src="imagenes/ok.png" title="Suspender" width="21" height="21" style="cursor:pointer"  /></a>
    <? } else {?>   
    <a href="appaudio.php?id=<?=$kaa['id'];?>&amp;edo=1"><img src="imagenes/inte.png" title="Aprobar" width="25" height="25" style="cursor:pointer"   /></a>
    <? } ?> 
      <a href="delaudio.php?id=<?=$kaa['id'];?>" onclick = "if (! confirm('¿Eliminar Audio?')) return false;">
     <img src="imagenes/del.png" width="24" height="21" style="cursor:pointer" title="Eliminar"/></a>
    
    </div>
  <? } if ($bd->num_rows($buaa)<1){ echo 'No hay Audios Disponibles';  } ?>
    </td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" class="arial14Negro"><strong>Fotos:</strong></td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="Arial12Gris"><table width="98" align="left" cellspacing="8">
                <tr>
                  <!--miniaturas-->
                  <td width="29%" valign="top"><table width="94%" border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                    <? 
							 						
									
						 $busq=$bd->ejecutar("SELECT  *  FROM artistas_fotos  where autor=$id order by id desc");
						while ($row5 = $bd->obtener_fila($busq,0)) { 
						$id=$row5['id'];
				?>
                    <?  if ($k==0){
 				?>
                    <tr>
                      <?   $j=1;  }?>
                      <?  if ($j<=10)  {
						
						 ?>
                      <td width="100%" align="center" valign="top" height="66"><table width="154%" align="left" cellpadding="0" >
                        <tr>
                          <td width="201" height="87" align="center" valign="top" ><img src="../<?=$row5['url']?><?=$row5['id']?>_55.jpg" border="0" width="130" style="max-height:90px"   /></td>
                        </tr>
                        <tr>
                          <td class="Arial12Gris"><?=substr($row5['titulo'],0,50);?></td>
                        </tr>
                        <tr>
                          <td class="piefoto"><table width="69" border="0" align="center" class="otrasnotas">
                            <tr>
                              <td >   
                                <? if ($row5['edo']==0){ ?>
                            <a href="appfoto.php?id=<?=$row5['id']?>&edo=1">
                                <img src="imagenes/inte.png" title="Pendiente, Aprobar?" width="25" height="25" style="cursor:pointer"  /></a><? } else { ?>   
    <a href="appfoto.php?id=<?=$row5['id']?>&edo=0">
     <img src="imagenes/ok.png" title="Aprobado, suspender?" width="25" height="25"  /></a><? } ?>
                              </td>
                              <td >&nbsp;</td>
                              <td><a href="delfotoa.php?id=<?=$row5['id'];?>&r=nota" class="text1"  onclick = "if (! confirm('¿Realmente desea eliminar la foto?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                      <? $j=$j+1; }  
										if ($j<=5){ $k=1; }
										else { $k=0; } 
										if ($k==0){ ?>
                    </tr>
                    <?    } 
									  }  ?>
                  </table></td>
                  <!-- final miniaturas-->
                  <!--foto grande-->
                  <!--final foto grande-->
                </tr>
          </table></td>
    </tr>
</table>


           </td>
</tr>  <tr style="border: 0px; background: #000">
      <td height="37" align="left" class="bcoabajo" >
      <? include "footer.php"; ?> 
      </td>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} ?>