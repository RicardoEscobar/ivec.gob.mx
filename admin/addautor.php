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
$tipo=$_POST['tipo'];
$send=$_POST['send'];
if ($send!='')
{
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
		if ($tipo==1)
		{
			@$bd->ejecutar("insert into autor values(null,'$nombre',1,0)");
		}
		else if ($tipo==2)
		{
			@$bd->ejecutar("insert into autor values(null,'$nombre',0,1)");
		}
		else if ($tipo==3)
		{
			@$bd->ejecutar("insert into autor values(null,'$nombre',1,1)");
		}
		
 
		
		?>
        <script type="text/javascript">
			document.location="AdminAutor.php"
		</script>
        <?
	}
}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Autores</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
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
<form action="addautor.php" method="post">
<table width="624" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td><table width="596" border="0" align="center" cellpadding="1" cellspacing="5">

      <tr>
        <td colspan="2" align="center" class="Verdana16Ngo"><strong>Agregar Autor</strong></td>
        </tr>
      <tr>
        <td width="100" class="Hevel16Gris"><strong>Nombre:</strong></td>
        <td width="483"><label for="nombre"></label>
          <input name="nombre" type="text" id="nombre" size="80" /></td>
      </tr>
      <tr>
        <td class="Hevel16Gris"><strong>Tipo:</strong></td>
        <td class="Hevel16Gris"> <input name="tipo" type="radio" id="tipo2" value="1" checked="checked" /> Redactor  
        	<input type="radio" name="tipo" id="tipo1" value="2" /> <label for="tipo">Fotografo</label>
          <input type="radio" name="tipo" id="tipo3" value="3" /> Ambos</td>
        </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="send" id="send" value="Agregar" />
          <input type="button" name="cancel" id="cancel" value="Cancelar" onClick="nok()" /></td>
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