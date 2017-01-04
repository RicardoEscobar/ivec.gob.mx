<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 	
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();

$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);

if ($kp['notas']==7 or $kp['notas']==6 or $kp['notas']==3 or $kp['notas']==2){

$id=$_GET['id'];
$kn=$bd->ejecutar("select * from nota where id_nota='$id'");
$nf=@$bd->obtener_fila($kn,0);
$aut=$bd->ejecutar("select * from autor where nota=1 order by nombre asc");
$lug=$bd->ejecutar("select * from lugar order by nombre asc");
$secc=$bd->ejecutar("select * from seccion where 1 order by nombre asc");
$subsecc=$bd->ejecutar("select * from secccv where 1 order by nombre asc");
$bconv=$bd->ejecutar("select * from convenios where 1 order by convenio asc");

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
if (1==1){?>
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

<script language="javascript">
$(document).ready(function() {
$().ajaxStart(function() {
$('#loading').show();
$('#result').hide();
}).ajaxStop(function() {
$('#loading').hide();
$('#result').fadeIn('slow');
});
$('#form, #fat, #fo1').submit(function() {
$.ajax({
type: 'POST',
url: $(this).attr('action'),
data: $(this).serialize(),
success: function(data) {
$('#result1').html(data);
}
})
return false;
}); 
}) 
</script>
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
      
      
    
    <form action="mnota.php" method="post" name="fo1dd" id="fo1dd">
      <table width="830" align="center" cellpadding="1" cellspacing="2" >
        <tr>
          <td colspan="4" align="center" ></td>
        </tr>
        <tr>
          <td colspan="4" align="center" class="titulonot"></td>
        </tr>
        <tr>
          <td colspan="4" align="center" nowrap="nowrap" class="Verdana16Ngo"><strong>Modificar Nota</strong><input name="idd" type="hidden" id="idd" value="<?=$id;?>" size="8" />&nbsp;&nbsp;
          
        </tr>
        <tr>
          <td width="111" nowrap="nowrap" class="arial14Azul"><strong class="arial11Gris"><br />
            **Obligatorio </strong></td>
          <td colspan="3" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td width="111" align="left" valign="top" class="Hevel16Gris"><strong><span class="grla">Titulo**</span></strong></td>
          <td colspan="3" align="center"><div align="left">
            <span class="grla">
            <input name="titulo" type="text" id="titulo" value="<?=str_replace('"','&quot;',stripslashes($nf['titulo'])); ?>" size="80" />
            </span></div></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="Hevel16Gris"><strong><span class="grla">Resumen**</span></strong></td>
          <td colspan="3" align="center"><div align="left">
            <span class="grla">
            <textarea name="resumen" cols="80" rows="3" id="resumen"><?=stripslashes($nf['resumen']); ?></textarea>
          </span></div></td>
        </tr>
        <tr>
          <td height="328" align="left" valign="top" class="Hevel16Gris"><strong><span class="grla">Texto**</span></strong></td>
          <td colspan="3" align="left">
          <?
		  
		  $texto=$nf['texto'];
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
          <br /><textarea name="texto" cols="80" rows="17" class="tex" id="texto"><?=stripslashes($texto); ?></textarea>
            
           
          </td>
        </tr>

        
        <tr>
          <td align="left" class="Hevel16Gris"><strong>Link</strong></td>
          <td colspan="3" align="left"><label for="link"></label>
            <input name="link" type="text" id="link" value="<?=str_replace('"','&quot;',stripslashes($nf['link'])); ?>" /></td>
          </tr>
        <tr>
          <td align="left" class="Hevel16Gris"><strong><span class="grla">   
		  <?php if ($nf['foto']=='si') { echo 'Agregar Foto'; }  else { echo 'Modificar Foto';  }?></span></strong></td>
          <td width="175" align="left"><span class="Arial12Gris">
            <input type="radio" name="agregar" id="agregar1" value="1"  />
            <label for="agregar">Si 
              <input name="agregar" type="radio" id="agregar2" value="0"  />
              No</label>
            </span>
            <label for="agregar"></label></td>
          <td align="right" class="Hevel16Gris">&nbsp;</td>
          <td align="left">&nbsp;</td>
          </tr>
        <tr>
          <td align="left" valign="top" class="Hevel16Gris"><strong>Seccion</strong></td>
          <td width="175" align="left" valign="top"><label for="seccion"></label>
            <select name="seccion" id="seccion"    style="max-width:200px">
               <?php while($rtss=@$bd->obtener_fila($secc,0)){?>
              <?php if ($nf['seccion']==$rtss['id']){?>
              <option value="<?=$rtss['id'];?>" selected="selected"><?php echo $rtss['nombre']; ?></option>
              <?php } else{?>
              <option value="<?=$rtss['id'];?>"><?php echo $rtss['nombre']; ?></option>
              <?php }?>
              <?php }?>
          </select></td>
        </tr>
        <tr>
          <td align="left" class="Hevel16Gris"><strong><span class="grla"> Autor</span></strong></td>
          <td colspan="3" align="left"><select name="autor" class="titulo1" id="autor"  style="max-width:200px">
            <?php while($rtr=@$bd->obtener_fila($aut,0)){?>
            <?php if ($nf['id_autor']==$rtr['id']){?>
            <option value="<?=$rtr['id'];?>" selected="selected"><?php echo $rtr['nombre']; ?></option>
            <?php } else{?>
            <option value="<?=$rtr['id'];?>"><?php echo $rtr['nombre']; ?></option>
            <?php }?>
            <?php }?>
            </select><span class="tex">&oacute;</span><input name="otroa" type="text" id="otroa" size="50"  style="max-width:200px" /></td>
        </tr>
        <tr>
          <td align="left" class="Hevel16Gris"><strong>Lugar</strong></td>
          <td colspan="3" align="left"><select name="lugar" class="titulo1" id="lugar"  style="max-width:200px">
            <?php while($rt1=@$bd->obtener_fila($lug,0)){?>
            <?php if ($nf['id_lugar']==$rt1['id']){?>
            <option value="<?=$rt1['id'];?>" selected="selected"><?php echo $rt1['nombre']; ?></option>
            <?php } else{?>
            <option value="<?=$rt1['id'];?>"><?php echo $rt1['nombre']; ?></option>
            <?php }?>
            <?php }?>
          </select>
            <span class="tex">&oacute;</span>
            <label for="lugaq"></label>            <input name="lugaq" type="text" id="lugaq" size="50"  style="max-width:200px" /></td>
        </tr>
        <tr class="Hevel16Gris">
          <td align="left" class="Hevel16Gris"><strong>Fecha</strong></td>
          <?
		  $theDate=$nf['fecha'];
          if ($theDate==''){ $theDate=date("Y-m-d"); }
		  ?>
          <td align="left"> <input name="theDate" type="text" id="theDate" onClick="displayCalendar(document.forms[0].theDate,'yyyy-mm-dd',this)" value="<?=$theDate;?>" size="15" readonly >
            <!--<input type="button" value="Cal" onClick="displayCalendar(document.forms[0].theDate,'yyyy-mm-dd',this)">--></td>
          <td width="258" align="left"><strong>Hora 
            <?
		  $theh=$nf['hora'];
          if ($theh==''){ $theh=date("H:i:s"); }
		  $info=split(':',$theh);
		  ?>
            <label for="hhh"></label>
            <input name="hhh" type="text" id="hhh" size="3" maxlength="2" value="<?=$info['0'];?>" onKeyPress="return validar(event); if (this.value>23){ this.value=23 }" onmouseout="if (this.value>23){ this.value=23 }" onblur="if (this.value>23){ this.value=23 }" onchange="if (this.value>23){ this.value=23 }"  style="max-width:20px"/>
          :
          <label for="mmm"></label>
          <input name="mmm" type="text" id="mmm" size="3" maxlength="2" value="<?=$info['1'];?>"  onKeyPress="return validar(event); if (this.value>59){ this.value=59 }" onmouseout="if (this.value>59){ this.value=59 }" onblur="if (this.value>59){ this.value=59 }" onchange="if (this.value>59){ this.value=59 }"  style="max-width:20px" />
          formato 24 hrs</strong></td>
          <td width="258" align="left">&nbsp;</td>
        </tr>
          <tr>
            <td colspan="4" align="center" class="arial14Negro" style="padding:10px 0; text-align: left; color: #900; text-transform: uppercase;"><div id="result1"></div></td>
          </tr>
          <tr>
      
          <td colspan="4" align="center" style="padding:10px 0"><input type="button" name="Cancelar" id="Cancelar" value="Cancelar Edicion"  onclick="javascript:document.location='vernota.php'"/>
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
} 
else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; } 

} ?>