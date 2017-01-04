<? session_start();
require 'db.class.php';
require 'conf.class.php';
require 'fecha.php';
include('admin/class.ImageFilter.php');
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 

$fecha=$_POST['fecha'];
$dato=$_POST['dato'];
if ($dato>0){ $cadx=' and secc1='.$dato;  }
?>

<table>
 
        <? 
		$x=0;
		$desde=$fecha.' 00:00:01';
		$hasta=$fecha.' 23:59:59';
		$eventos1=$bd->ejecutar("select * from mynews where newsdate between '$desde' and '$hasta' $cadx  and secc2=0 order by newsdate asc limit 6 "); $cuantos=$bd->num_rows($eventos);
		while($row=$bd->obtener_fila($eventos1,0)){
			$x++;
			$tdatet=explode(" ",$row['newsdate']);
			$fecha=$tdatet[0];
			$hora=substr($tdatet[1],0,5);
			$foto='admin/'.$row['url'].$row['id'].'_cx.jpg';
			if (!file_exists($foto)){ 
			
			$file='admin/'.$row['url'].$row['id'].'_cx.jpg';
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage('admin/'.$row['url'].$row['id'].'.jpg');
			$IF->resize(160,'ratio');
			$IF->output('JPEG',$file);
			}
			
			}
			
			$secc=$row['secc1'];
			$bsec=$bd->ejecutar("select * from recintos where id=$secc");
			$rows=$bd->obtener_fila($bsec,0);
			
			if ($x==1){
		 ?>
        
         <tr>
        <td colspan="5" class="negro12" align="center" height="5"><strong>Eventos del día</strong></td>
        </tr>
        <? } ?>
        
                <tr>
        <td width="170" rowspan="2" align="center" class="negro12">
        <a href="veragenda.php?id=<?=$row['id']?>" > <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></a></td>
        <td width="170" class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td width="234" rowspan="2" class="azul12">
		<? 
		if ($rows['id']<14){ $vea='recintos.php?id='.$rows['id']; }
		else if ($rows['id']>13 and $rows['id']<24){ $vea='subdirecciones'.$rows['id'].'.php?id='.$rows['id']; }
		else { $vea='coros.php'; }		
		?><a href="<?=$vea?>" class="azul12" >
		<?=$rows['nombre']?></a></td>
        <td width="150" rowspan="2" class="negro15" style="font-size:14px"><? if ($hora!='00:00'){ echo $hora.' Hrs'; } ?></td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12">
        <a href="veragenda.php?id=<?=$row['id']?>"  class="negro12"> 
        <strong><?=$row['newstitle']?></strong></a></td>
      </tr>
   
        
           
     
 
           
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr> 
        
        <? } ?>
          <tr>
        <td colspan="5" class="negro12" align="center" height="5"><strong>Otros Eventos</strong></td>
        </tr>
             <? 
		$limite=6-$cuantos; 
		$hoy=date("Y-m-d H:i:s") ; 
		$tope=$fecha.' 23:59:59';    
		$eventos=$bd->ejecutar("select * from mynews where  fin>='$tope' and inicio<='$tope' and secc2=1  limit $limite");
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
        <td width="170" rowspan="2" align="center" class="negro12">
        <a href="veragenda.php?id=<?=$row['id']?>" > <? if(file_exists($foto)){ ?> <img src="<?=$foto?>" width="100" /><? } else { ?>
        <img src="admin/imagenes/no.png" width="60" height="60" /><?  } ?></a></td>
        <td width="170" class="negro12"><span class="naranja121"><?=$row['descri']?></span></td>
        <td width="234" rowspan="2" class="azul12"><?=$rows['nombre']?></td>
           <td width="150" rowspan="2" class="Arial12Nego"><strong>Del</strong> <?=fechacp($row['inicio']);?><br />
<strong>al</strong> <?=fechacp($row['fin']);?></td>
        <td width="7" rowspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td class="negro12"><strong><?=$row['newstitle']?></strong></td>
      </tr>
   
        
           
     
 
           
      <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        
        <? } ?>
        
        <?  if ($bd->num_rows($eventos)<1 and $bd->num_rows($eventos1)<1) { ?>
          <tr>
        <td colspan="5" align="center"  class="Arial12Nego">No hay eventos disponibles</td>
        </tr>
          <tr>
        <td colspan="5" class="negro15" align="center" height="5"><img src="imgs/grishor.jpg" width="569" /></td>
        </tr>
        <? } ?> 
        </table>