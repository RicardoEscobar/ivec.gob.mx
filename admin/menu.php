<?
$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);

?>
<link href='http://fonts.googleapis.com/css?family=Arimo|Voltaire|Oswald|Shanti' rel='stylesheet' type='text/css'>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<ul id="MenuBar1" class="MenuBarHorizontal">

<? if ($kp['permiso']==100){ ?>
  <li><a href="#" class="MenuBarItemSubmenu">Catalogos</a>
    <ul> 
      <li><a href="AdminAutor.php">Autores</a></li>
     <!-- <li><a href="secciones.php">Secciones</a></li> --> 
      <li><a href="AdminLugar.php">Lugares</a></li> 
       <? if ($luser==1) { ?> 
      <li><a href="AdminAdmin.php">Administradores</a></li> 
    <? } ?>
    
    </ul>
  </li> 
  <li><a href="vernota.php?ids=r"  >Notas</a>
 
  </li>
  
  <li><a href="artistas.php" >Artistas</a></li>
   
 <? } ?>
  <li><a href="agenda.php">Agenda</a>
  <li><a href="verfotor.php"> Recintos</a>
  
 <? if ($kp['permiso']==100){ ?>
  <li><a href="convocatorias.php">Convocatorias</a>
 
 
      <li><a href="anuncios.php">Anuncios</a></li>
      <li><a href="fracciones.php">Fracciones</a></li>
  
  <li><a href="cartelera.php">Cartelera</a></li> 
    <li><a href="videos.php">Video</a></li>
    <li><a href="directorio.php">Directorio</a></li>
    <li><a href="organigrama.php">Organigrama</a></li>
  <? } ?>
  <li><a href="../index.php" target="_blank">Ver Portada</a></li>
  <li><a href="sale.php" class="MenuBarItemSubmenu">Salir</a>
    <ul>
      <li><a href="sale.php">Cerrar Sesion de: <?=$_SESSION['dictamenombre'];?></a></li>
    </ul>
  </li>
</ul>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
<script language="javascript" src="jquery.js"></script>
<script language="javascript">
$(document).ready(function() {
	$("input:text").addClass("inputsDeTexto");
	$("input:password").addClass("inputsDeTexto");
	$("input:submit").addClass("botones");
	$("input:button").addClass("botones");
	$("select").addClass("inputsDeTexto");
	$("textarea").addClass("inputsDeTexto");    
});
</script>