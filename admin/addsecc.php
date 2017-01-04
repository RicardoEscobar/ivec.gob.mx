<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {


require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();

$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);
if ($kp['catalogo']==7 or $kp['catalogo']==5 or $kp['catalogo']==3 or $kp['catalogo']==1){

$sendd=$_POST['sendd'];
$nombre=$_POST['nombre'];
$menu=$_POST['menu'];
$munni=$_POST['muni'];
$secc=$_POST['secc'];
if ($sendd=='')
{
}
else
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
		@$bd->ejecutar("insert into seccion values (null,'$nombre')");
			/*Para Bitacora Espacial de Buzz Lightyear */
						$busar1=mysql_query("select * from seccion order by id desc limit 1 ");
						$ronb=@mysql_fetch_array($busar1);
							$idnotad=$ronb['id'];
							$acciond='Agrega Seccion';
						    $horaddd=date("H:i:s");
							$fechadd= date("Y-m-d");	
							$nombred=$_SESSION['dictamenombre'];
							$iduserd=$_SESSION['pkiduser'];
							mysql_query("insert into bitacora values (null,$iduserd,$idnotad,'$acciond','$fechadd','$horaddd','','','$nombre')");
						
						/* fin de Bitacora Espacaial*/
			
	

		
		
		?>
        <script type="text/javascript">
		  document.location="secciones.php";
		</script>
        <?
		
		
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Secciones</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function nok(){ 
   document.location="secciones.php";
} 

</script>
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float:left; width:960px; background-color:#000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding:10px 0">

<form action="addsecc.php" method="post">

<table width="596" border="0" align="center" cellpadding="1" cellspacing="5">

      <tr>
        <td colspan="2" align="center" class="Verdana16Ngo"><strong>Agregar Secci&oacute;n</strong></td>
        </tr>
      <tr>
        <td width="97" class="Hevel16Gris"><strong>Nombre:</strong></td>
        <td width="480"><label for="nombre"></label>
          <input name="nombre" type="text" id="nombre" size="80" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="sendd" id="sendd" value="Agregar" />
          <input type="button" name="cancel" id="cancel" value="Cancelar" onClick="nok()"/></td>
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