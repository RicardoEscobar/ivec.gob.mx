 <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<? if ($elmenu==2){ ?> 
<link href="SpryAssets/SpryMenuBarHorizontal2.css" rel="stylesheet" type="text/css" />
<? } else { ?> 
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<? } ?>
 
<ul id="MenuBar1" class="MenuBarHorizontal" style="font-weight:bold">
  <li><a href="index.php"<? if($toy=='1'){ echo 'style="color:#EA850D"'; } ?>>INICIO</a>  </li>
  <li><a href="#" class="MenuBarItemSubmenu" <? if($toy=='2'){ echo 'style="color:#EA850D"'; } ?>>IVEC</a>
    <ul style="width:150px; background-color:#FFF">
      <li><a href="historia.php" style="color:#333; font-weight:normal">Historia</a></li>
      <li><a href="mision.php" style="color:#333; font-weight:normal">Misión, Visión y Principios</a></li>
      <li><a href="objetivos.php" style="color:#333; font-weight:normal">Objetivos</a></li>
      <li><a href="directorio.php" style="color:#333; font-weight:normal">Directorio</a></li>
      <li><a href="contraloria.php" style="color:#333; font-weight:normal">Contralor&iacute;a ciudadana </a></li>
      <li><a href="organigrama.php" style="color:#333; font-weight:normal">Organigrama </a></li>
      <li><a href="fracciones.php" style="color:#333; font-weight:normal">Transparencia </a></li>
      <li><a href="subdirecciones41.php" style="color:#333; font-weight:normal">Portal de Ética</a></li>
      
    </ul>
  </li>
  <li><a href="agenda.php" <? if($toy=='3'){ echo 'style="color:#EA850D"'; } ?>>AGENDA</a>  </li>
  <li><a href="#" class="MenuBarItemSubmenu" <? if($toy=='4'){ echo 'style="color:#EA850D"'; } ?>>RECINTOS CULTURALES</a>
    <ul style="width:150px; background-color:#FFF">
    <? $br=$bd->ejecutar("select * from recintos where edo=1 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?>
      <li style="width:150px"><a href="recintos.php?id=<?=$rrr['id']?>" style="color:#333; font-weight:normal"><?=$rrr['nombre']?></a></li>
      <? } ?>
    </ul>
  </li>
<!--  <li><a href="coros.php" <? if($toy=='9'){ echo 'style="color:#EA850D"'; } ?>>COROS Y ORQUESTAS</a></li>-->
  <li><a href="convocatorias.php" <? if($toy=='5'){ echo 'style="color:#EA850D"'; } ?>>CONVOCATORIAS</a></li>  
  <li><a href="#" class="MenuBarItemSubmenu"  <? if($toy=='7'){ echo 'style="color:#EA850D"'; } ?>>SUBDIRECCIONES</a>
  <ul style="width:150px; background-color:#FFF">
    <? $br=$bd->ejecutar("select * from recintos where edo=2 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?>
      <li style="width:150px"><a href="#" style="color:#333; text-decoration:none"><strong><?=$rrr['nombre']?></strong></a></li>
      <? } ?> 
         <? $br=$bd->ejecutar("select * from recintos where edo=3 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?>
      <li style="width:150px"><a href="subdirecciones<?=$rrr['id']?>.php?id=<?=$rrr['id']?>" style="color:#333; font-weight:normal"> &bull; <?=$rrr['nombre']?></a></li>
      <? } ?>
      
       <? $br=$bd->ejecutar("select * from recintos where edo=4 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?>
      <li style="width:150px"><a href="#" style="color:#333; text-decoration:none"><strong><?=$rrr['nombre']?></strong></a></li>
      <? } ?> 
         <? $br=$bd->ejecutar("select * from recintos where edo=5 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?>
      <li style="width:150px"><a href="subdirecciones<?=$rrr['id']?>.php?id=<?=$rrr['id']?>" style="color:#333; font-weight:normal"> &bull; <?=$rrr['nombre']?></a></li>
      <? } ?>
      
       <? $br=$bd->ejecutar("select * from recintos where edo=6 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?>
      <li style="width:150px"><a href="#" style="color:#333; text-decoration:none"><strong><?=$rrr['nombre']?></strong></a></li>
      <? } ?> 
         <? $br=$bd->ejecutar("select * from recintos where edo=7 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?>
      <li style="width:150px"><a href="subdirecciones<?=$rrr['id']?>.php?id=<?=$rrr['id']?>" style="color:#333; font-weight:normal"> &bull; <?=$rrr['nombre']?></a></li>
      <? } ?>
    </ul>
  </li>
  <li><a href="contacto.php" <? if($toy=='8'){ echo 'style="color:#EA850D"'; } ?>>CONTACTO Y CITAS</a></li>
  <li><a href="fracciones.php" <? if($toy=='6'){ echo 'style="color:#EA850D"'; } ?>>TRANSPARENCIA</a></li>
  <!-- Aquí poner código para mostrar twitter y facebook  -->  
  
  <li><?      $fini=date("Y-m").'-01';
			  $ffin=date("Y-m").'-31';
			  $bcar=$bd->ejecutar("select * from cartelera where fecha between '$fini' and '$ffin' order by id desc limit 1 ");
			  while($kcar=$bd->obtener_fila($bcar,0)){ ?>
			  <a href="admin/<?=$kcar['url']?>" target="_blank" >CARTELERA</a>
<? } ?>
  </li>
</ul>
		


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
 