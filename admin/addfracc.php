<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }  else {


require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();

$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);
if ($kp['catalogo']==7 or $kp['catalogo']==5 or $kp['catalogo']==3 or $kp['catalogo']==1){

$nombre=$_POST['nombre'];
$numero=$_POST['numero'];
$detalle=$_POST['detalle'];

$send=$_POST['send'];
if ($send!='')
{
	if ($nombre=='' or $numero=='')
	{
		?>
        <script type="text/javascript">
			alert ("El titulo  y el numero no deben quedarse en blanco");
		</script>
        <?
	}
	else
	{ 
			@$bd->ejecutar("insert into fracciones values(null,'$numero','$nombre','$detalle')");
		 
		 
		  
	 
		
 
		
		?>
        <script type="text/javascript">
			document.location="fracciones.php"
		</script>
        <?
	}
}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?=$pageTitle;?>
:. Admin - Fracciones</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<script language="javascript">
 
function activa(){ 
	$("#send").css("display","block");
}
function checa(){
	    var numero=$("#numero").val();
		var titulo=$("#nombre").val();
		titulo=titulo.trim();
		if (numero=='' | titulo=='' ){
			$("#send").css("display","none");
			alert ("El titulo  y el numero no deben quedarse en blanco");
		}
			
}
</script>

<script language="javascript" src="validacion.js"></script>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float:left; width:960px; background-color:#000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
<form action="addfracc.php" method="post">
<table width="624" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td><table width="596" border="0" align="center" cellpadding="1" cellspacing="5">

      <tr>
        <td colspan="4" align="center" class="Verdana16Ngo"><strong>Agregar Fraccion</strong></td>
        </tr>
      <tr>
        <td colspan="2" class="Hevel16Gris"><strong>N&uacute;mero:</strong></td>
        <td colspan="2"><label for="numero"></label>
          <input name="numero" type="text" id="numero" size="5" style="width:50px" onkeypress="return entero(event)" onkeyup="activa()" />
          en decimal</td>
      </tr>
      <tr>
        <td width="100" colspan="2" class="Hevel16Gris"><strong>Titulo:</strong></td>
        <td width="483" colspan="2"><label for="nombre"></label>
          <input name="nombre" type="text" id="nombre" size="80" onkeypress="activa()" onkeyup="activa()" onmouseover="activa()"/></td>
      </tr>
      <tr>
        <td colspan="2" class="Hevel16Gris"><strong>Detalle:</strong></td>
        <td colspan="2" class="Hevel16Gris"><label for="detalle"></label>
          <textarea name="detalle" rows="5" id="detalle" style="width:100%"></textarea></td>
        </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center"><input type="button" name="cancel" id="cancel" value="Cancelar" onclick="document.location='fracciones.php';" /></td>
        <td align="center"><input type="submit" name="send" id="send" value="Agregar" onmouseover="checa()" /></td>
      </tr>
    </table></td>
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
</html>
<? 
$bd->liberarawilly();
} else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; }  } ?>