<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 

require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);
if ($kp['catalogo']==7 or $kp['catalogo']==6 or $kp['catalogo']==3 or $kp['catalogo']==2){

if (isset($_GET['id'])){$id=$_GET['id'];}
else{$id=$_POST['id'];}
$aut=@$bd->ejecutar("select * from lugar where id=$id");
$autor=@$bd->obtener_fila($aut,0);
$nombre=$autor['nombre'];


$send=$_POST['send'];

if ($send!='')
{
$nombrep=$_POST['nombre'];
$tipo=$_POST['tipo'];
$send=$_POST['send'];
if ($nombre=='')
	{
		?>
        <script type="text/javascript">
			alert ("El nombre no debe quedarse en blanco");
		</script>
        <?
	}
	else
	{

			$bd->ejecutar("update lugar set nombre='$nombrep' where id=$id ");

		?>
        <script type="text/javascript">
			document.location="AdminLugar.php"
		</script>
        <?
	}
}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Lugares</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
	<script type="text/javascript">
function nok(){ 
   document.location="AdminLugar.php";
} 

</script>
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
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">
    
<form action="updatelugar.php" method="post">
<table width="604" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="785"><table width="596" border="0" align="center" cellpadding="1" cellspacing="5">

      <tr>
        <td colspan="2" align="center" class="Verdana16Ngo"><strong>Modificar Lugar</strong></td>
        </tr>
      <tr>
        <td width="100" class="Arial12Gris">Nombre:</td>
        <td width="483"><label for="nombre"></label>
          <input name="nombre" type="text" id="nombre" size="80" value="<?=$nombre?>" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><label for="id"></label>
          <input type="hidden" name="id" id="id" value="<?=$id?>" />
          <input type="submit" name="send" id="send" value="Guardar" />
          <input type="button" name="cancel" id="cancel" value="Cancelar"  onclick="nok()"/></td>
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