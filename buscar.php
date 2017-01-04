<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$buscar=$_POST['buscar'];
 
$una=substr($buscar,0,1);


$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
?><table width="613" border="0" cellspacing="0" cellpadding="5">  <tr>
          <td class="Arial50C666"><?=strtoupper($una);?>&nbsp;</td>
        </tr> <?
		  $bual=$bd->ejecutar("select * from artistas_datos where nombre like '$buscar%' and edo=1 order by nombre asc");
		 if ($bd->num_rows($bual)>0 and $buscar!=''){
		  
	   ?>     
      
        <tr>
          <td><?
           while($eae=$bd->obtener_fila($bual,0)){
		$ida=$eae['id'];
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
    <td><a href="verartistas.php?id=<?=$eae['id']?>"><img src="<?=$ourl?>" width="100" style="background-color:#666;" class="imagenborde" /></a></td>
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
        <? }  
		else if ($buscar==''){ ?>
		     <?  $cuanto=count($abcd);
	  for ($i=0;$i<$cuanto;$i++){
		  $letra=$abcd[$i];
		  $bual=$bd->ejecutar("select * from artistas_datos where edo=1 and nombre like '$letra%' order by nombre asc");
		 if ($bd->num_rows($bual)>0){
		  
	   ?>     
        <tr>
          <td class="Arial50C666"><?=$abcd[$i];?>&nbsp;</td>
        </tr>
        <tr>
          <td><?
           while($eae=$bd->obtener_fila($bual,0)){
		$ida=$eae['id'];
		$ids=$eae['seccion']; 
		$bass=$bd->ejecutar("select * from artistas_seccion where id=$ids");
		$kass=$bd->obtener_fila($bass,0);
		$baso=$bd->ejecutar("select * from artistas_seccion where edo=1 and  id<$ids and tipo=1 order by id desc limit 1");
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
    <td><img src="<?=$ourl?>" width="100" style="background-color:#666;" class="imagenborde" /></td>
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
		  <? } else { ?> 
		
		 <tr>
          <td class="Arial12Nego" align="center">No se han encontrado resultados</td>
        </tr>
         <tr>
          <td height="1px" align="center"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td>
        </tr>
		<? }?>
      </table>