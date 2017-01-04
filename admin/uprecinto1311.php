<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 	
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
 

$id=$_GET['id'];
$kn=$bd->ejecutar("select * from recintos where id='$id'");
$nf=@$bd->obtener_fila($kn,0);
 
 
 $agrega2=$_POST['agrega2'];
 if ($agrega2!=''){
	 $nombre=addslashes($_POST['nombre']);
	 $historia=addslashes($_POST['historia']);
	 $actividad=addslashes($_POST['actividad']);
	 $areas=addslashes($_POST['areas']);
	 $direccion=addslashes($_POST['direccion']);
	 $mapa=addslashes($_POST['mapa']);
	 
	 
	 $bd->ejecutar("update recintos set nombre='$nombre', historia='$historia', actividades='$actividad', areas='$areas', direccion='$direccion', mapa='$mapa' where id=$id");
	 echo "<script language=\"javascript\"> document.location=\"verfotor.php\"; </script>";
	 
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Modificar Nota</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>

<script language="javascript">
function valida(vard){
	
	if (vard==19)
	{
	div = document.getElementById('flotante');
	div.style.display = '';
	} else {
	div = document.getElementById('flotante');
	div.style.display='none';
	}
}
</script>
<script type="text/javascript">
function validar(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron = /\d/; // Solo acepta números
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
} 
</script>


<? $ae=$_GET['ae']; 
if (3==1){?>
<!-- TinyMCE -->
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options     
		language : "es", // change language here
        mode : "exact",
        elements : "texto",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "tinymce/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "tinymce/lists/template_list.js",
		external_link_list_url : "tinymce/lists/link_list.js",
		external_image_list_url : "tinymce/lists/image_list.js",
		media_external_list_url : "tinymce/lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

<? } ?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<link href="../css/estilos.css" rel="stylesheet" type="text/css" /><script language="javascript" src="jquery-1.3.min.js"></script>

 
</head>

<body ><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr>
  <td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float:left; width:960px; background-color:#000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
      
      
    
    <form action="uprecinto.php?id=<?=$id?>" method="post" name="fo1dd" id="fo1dd">
      <table width="830" align="center" cellpadding="0" cellspacing="5" >
        <tr>
          <td colspan="2" align="center" ></td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="titulonot"></td>
        </tr>
        <tr>
          <td colspan="2" align="center" nowrap="nowrap" class="Verdana16Ngo"><strong>Modificar Recinto</strong>
            <input name="idd" type="hidden" id="idd" value="<?=$id;?>" size="8" />&nbsp;&nbsp;
          
        </tr>
        <tr>
          <td width="102" nowrap="nowrap" class="arial14Azul"><strong class="arial11Gris">
          
          
          <br />
          </strong></td>
          <td width="716" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td width="102" align="left" valign="top" class="arial14Negro"><strong> Nombre</strong></td>
          <td align="center"><div align="left">
            <span class="grla">
            <input name="nombre" type="text" id="nombre" value="<?=str_replace('"','&quot;',stripslashes($nf['nombre'])); ?>" size="80" />
            </span></div></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="arial14Negro"><strong>Semblanza</strong></td>
          <td align="center"><div align="left">
<textarea name="historia" cols="80" rows="8" id="historia"><?=stripslashes($nf['historia']); ?></textarea>
          </div></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="arial14Negro"><strong>Actividades</strong></td>
          <td align="left">
          <?
		  
		  $texto=$nf['actividades'];
		  $texto=str_replace('\"','"',$texto);
		  $texto=str_replace("\'",'"',$texto);
		  
		  
		    $texto2 = eregi_replace("<head[^>]*>.*</head>"," ",$texto);
			$texto2 = eregi_replace("<script[^>]*>.*</script>"," ",$texto2);
			$texto2 = eregi_replace("<style[^>]*>.*</style>"," ",$texto2);
			$texto2 = eregi_replace("<[^>]*>"," ",$texto2);
			$texto2 = eregi_replace("&nbsp;","",$texto2);
		  //$texto2 = strip_tags($nf['texto']); 
		if ($texto2==$texto) { 
		//echo 'No tiene editor';
		  $texto3=str_replace('<br><br>','',$texto2);
			if ($texto3==$texto2) {
				//$texto=nl2br($texto);
			}
		 }
		else 
		{
			//echo 'Tiene';
			}
		  
		   ?>
          </div>
          <br /><textarea name="actividad" cols="80" rows="8" class="tex" id="actividad"><?=stripslashes($texto); ?></textarea>
            
           
          </td>
        </tr>

        
        <tr>
          <td align="left" class="arial14Negro"><strong>Areas</strong></td>
          <td align="left"><?
		  
		  $texto=$nf['areas'];
		  $texto=str_replace('\"','"',$texto);
		  $texto=str_replace("\'",'"',$texto);
		  
		  
		    $texto2 = eregi_replace("<head[^>]*>.*</head>"," ",$texto);
			$texto2 = eregi_replace("<script[^>]*>.*</script>"," ",$texto2);
			$texto2 = eregi_replace("<style[^>]*>.*</style>"," ",$texto2);
			$texto2 = eregi_replace("<[^>]*>"," ",$texto2);
			$texto2 = eregi_replace("&nbsp;","",$texto2);
		  //$texto2 = strip_tags($nf['texto']); 
		if ($texto2==$texto) { 
		//echo 'No tiene editor';
		  $texto3=str_replace('<br><br>','',$texto2);
			if ($texto3==$texto2) {
				//$texto=nl2br($texto);
			}
		 }
		else 
		{
			//echo 'Tiene';
			}
		  
		   ?>
            </div>
            <br />
            <textarea name="areas" cols="80" rows="8" class="tex" id="areas"><?=stripslashes($texto); ?>
            </textarea></td>
          </tr>
        <tr>
            <td align="left" class="arial14Negro"  ><strong>Direcci&oacute;n</strong></td>
            <td align="left"><?
		  
		  $texto=$nf['direccion'];
		  $texto=str_replace('\"','"',$texto);
		  $texto=str_replace("\'",'"',$texto);
		  
		  
		    $texto2 = eregi_replace("<head[^>]*>.*</head>"," ",$texto);
			$texto2 = eregi_replace("<script[^>]*>.*</script>"," ",$texto2);
			$texto2 = eregi_replace("<style[^>]*>.*</style>"," ",$texto2);
			$texto2 = eregi_replace("<[^>]*>"," ",$texto2);
			$texto2 = eregi_replace("&nbsp;","",$texto2);
		  //$texto2 = strip_tags($nf['texto']); 
		if ($texto2==$texto) { 
		//echo 'No tiene editor';
		  $texto3=str_replace('<br><br>','',$texto2);
			if ($texto3==$texto2) {
				//$texto=nl2br($texto);
			}
		 }
		else 
		{
			//echo 'Tiene';
			}
		  
		   ?>
              </div>
              <br />
              <textarea name="direccion" cols="80" rows="8" class="tex" id="direccion"><?=stripslashes($texto); ?>
              </textarea></td>
          </tr>
          <tr>
            <td align="left" class="arial14Negro" style="padding:10px 0"><strong>Mapa</strong></td>
            <td align="left" style="padding:10px 0"><textarea name="mapa" cols="80" rows="8" class="tex" id="mapa"><?=stripslashes($nf['mapa']); ?>
              </textarea></td>
          </tr>
          <tr>
      
          <td colspan="2" align="center" style="padding:10px 0"><input type="button" name="Cancelar" id="Cancelar" value="Cancelar Edicion"  onclick="javascript:document.location='verfotor.php'"/>
            <input name="agrega2" type="submit" class="texto4" id="agrega2" value="Guardar Cambios" /></td>
      
        </tr>
      </table>

</form>
    
  
</td>
  </tr>  <tr style="border:0px; background:#000000">
      <td height="37" align="left" class="bcoabajo" >
      <? include "footer.php"; ?> 
      </td>
</table>
</body>
</html><? 
$bd->liberarawilly();
 

} ?>