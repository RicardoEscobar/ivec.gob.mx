<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 $ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }  else {


require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
$ae=$_GET['ae'];

$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);

if ($kp['notas']==7 or $kp['notas']==5 or $kp['notas']==3 or $kp['notas']==1){ 
	
	

$ref=$_GET['ref'];
$ids=$_SESSION['utttt'];

$aut=$bd->ejecutar("select * from autor where nota=1 order by nombre asc");
$lug=$bd->ejecutar("select * from lugar order by nombre asc");
$secc=$bd->ejecutar("select * from seccion where id not in (3) order by nombre asc");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?> :. Admin - Agregar Notas</title>
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
<? if ($ae==1){?>
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
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
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

<link href="../css/estilos.css" rel="stylesheet" type="text/css" />


</head>

<body ><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr>
  <td bgcolor="#000000" >
  <? include ('header.php'); ?>
 
  <div style="float:left; width:960px; background-image:url(../imagenes/menu.png); background-repeat:repeat-x">
    <? include ('menu.php'); ?>
</div>
 
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
      


    
    <form action="agregar.php?ref=<?=$ref;?>&ids=<?=$ids;?>" method="post" name="agrega" id="agrega">
      <table width="766" align="center" cellpadding="2" cellspacing="2"   >
        <tr>
          <td colspan="3" align="center" ></td>
        </tr>
        <tr>
          <td colspan="3" align="center" class="titulonot"></td>
        </tr>
        <tr>
          <td colspan="3" align="center" nowrap="nowrap" class="Verdana16Ngo"><strong>Agregar Nota</strong>
          &nbsp;&nbsp; 
          </td>
        </tr>
        <tr>
          <td width="87" nowrap="nowrap" class="texto">&nbsp;</td>
          <td width="657" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top" class="Hevel16Gris"><strong><span class="grla">Titulo</span></strong></td>
          <td colspan="2" align="left"><input name="titulo" type="text" id="titulo" value="" size="80" /></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="Hevel16Gris"><strong><span class="grla">Resumen</span></strong></td>
          <td colspan="2" align="left"><textarea name="resumen" cols="80" rows="4" id="resumen"></textarea></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="Hevel16Gris"><strong><span class="grla">Texto</span></strong></td>
          <td colspan="2" align="left"><textarea name="texto" cols="80" rows="17" class="tex" id="texto"></textarea>
               	</td>
        </tr>
        <tr>
          <td align="left" class="Hevel16Gris"><strong>Link</strong></td>
          <td colspan="2" align="left"><label for="link"></label>
            <input type="text" name="link" id="link" /></td>
        </tr>
        <tr>
          <td align="left" class="Hevel16Gris"><strong>Agregar foto:</strong></td>
          <td colspan="2" align="left"><span class="Arial12Gris">
            <input type="radio" name="agregar" id="agregar1" value="1" />
            <label for="agregar">Si 
              <input name="agregar" type="radio" id="agregar2" value="0" checked="checked" />
              No</label>
          </span>
            <label for="agregar"></label></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="Hevel16Gris"><strong>Seccion</strong></td>
          <td width="139" align="left" valign="top"><label for="seccion"></label>
            <select name="seccion" id="seccion"   style="max-width:200px">
               <?php while($rtss=@$bd->obtener_fila($secc,0)){?>
              <?php if ($ids==$rtss['id']){?>
              <option value="<?=$rtss['id'];?>" selected="selected"><?php echo $rtss['nombre']; ?></option>
              <?php } else{?>
              <option value="<?=$rtss['id'];?>"><?php echo $rtss['nombre']; ?></option>
              <?php }?>
              <?php }?>
          </select></td>
        </tr>
        <tr>
          <td align="left" class="Hevel16Gris"><strong>Autor</strong></td>
          <td colspan="2" align="left"><select name="autor" class="titulo1" id="autor" style="max-width:200px">
            <?php 
			
			while($rtr=@$bd->obtener_fila($aut,0)){?>
            <option value="<?=$rtr['id'];?>"><?php echo $rtr['nombre']; ?></option>
            <?php }?>
            </select> 
            &oacute; 
            <label for="otroa"></label>            <input name="otroa" type="text" id="otroa" size="50"  style="max-width:200px"/></td>
        </tr>
        <tr>
          <td align="left" class="Hevel16Gris"><strong>Lugar</strong></td>
          <td colspan="2" align="left"><select name="lugar" class="titulo1" id="lugar"  style="max-width:200px">
            <?php while($rt1=@$bd->obtener_fila($lug,0)){?>
            <?php if ($rsfot['id_lugar']==$rt1['id']){?>
            <option value="<?=$rt1['id'];?>"><?php echo $rt1['nombre']; ?></option>
            <?php } else{?>
            <option value="<?=$rt1['id'];?>"><?php echo $rt1['nombre']; ?></option>
            <?php }?>
            <?php }?>
            </select>
            <span class="tex">&oacute;</span> 
            <label for="lugaq"></label>
            <input name="lugaq" type="text" id="lugaq" size="50" style="max-width:200px" /></td>
        </tr>
       <tr>
         <td colspan="3" align="center" class="grla" style="padding:10px 0"><label for="moment"></label>
           <input name="agrega2" type="submit" id="agrega2" value="Agregar" />           &nbsp;&nbsp;&nbsp;
           <input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="javascript:document.location='vernota.php'" /></td>
       </tr>
        </table>

</form>

</td>
  </tr>  <tr style="border:0px">
      <td height="37" align="left" class="bcoabajo" >
      <div style="float:left; width:960px; margin: 5px 0 7px 0; background-color: #E9E9E9; height: 33px;">
        <div class="hevel11Gris" style="float:left; width:300px; margin: 10px 0 7px 20px; background-color: #E9E9E9;"><?=$pageTitle;?> Derechos Reservados 2011 </div>

    </div>
      </td>
  </tr>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} 
else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; } 

} ?>