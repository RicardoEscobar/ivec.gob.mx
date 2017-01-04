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

if ($luser==1){

 
$sendd=$_POST['sendd'];
$nombre=$_POST['nombre'];
$luser=$_POST['luser'];
$lpass=($_POST['lpass']);
$secc1=$_POST['secc1'];

$notas        =7;//+$_POST['noa']+$_POST['nou']+$_POST['nod'];
$galerias     =7;//+$_POST['gaa']+$_POST['gau']+$_POST['gad'];
$video        =7;//+$_POST['via']+$_POST['viu']+$_POST['vid'];
$reportero    =7;//+$_POST['rea']+$_POST['reu']+$_POST['red'];
$columnas     =7;//+$_POST['coa']+$_POST['cou']+$_POST['cod'];
$encuestas    =7;//+$_POST['ena']+$_POST['enu']+$_POST['end'];
$publicidad   =7;//+$_POST['pua']+$_POST['puu']+$_POST['pud'];
$edicion      =7;//+$_POST['eia']+$_POST['eiu']+$_POST['eid'];
$conoce       =7;//+$_POST['cva']+$_POST['cvu']+$_POST['cvd'];
$clasificados =7;//+$_POST['cla']+$_POST['clu']+$_POST['cld'];
$boletinc     =7;//+$_POST['boa']+$_POST['bou']+$_POST['bod'];
$boletine     =7;//+$_POST['boen'];
$catalogo     =7;//+$_POST['caa']+$_POST['cau']+$_POST['cad'];

if ($sendd=='')
{
}
else
{
	if ($nombre=='')
	{
		?>
        <script type="text/javascript">
		alert ("El nombre,usuaio y contraseña no deben quedarse en blanco");
		</script>
        <?
	}
	else
	{
		$direcc=$_POST['direcc'];
		$cel=$_POST['cel'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$rfc=$_POST['rfc'];
		@$bd->ejecutar("insert into admin values (null,'$nombre', '$secc1', '$luser', '$lpass','$notas','$galerias','$video','$reportero','$columnas','$encuestas','$publicidad','$edicion','$conoce','$clasificados','$boletinc','$boletine','$catalogo')");
		
	 
		?>
        <script type="text/javascript">
		   document.location="AdminAdmin.php";
		</script>
        <?
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Administradores</title>
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
   document.location="AdminAdmin.php";
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
    <td height="400" align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">




<form action="<? $_SERVER['php_self'];?>" method="post">
<table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td><table width="400" border="0" align="center" cellpadding="1" cellspacing="5">

      <tr>
        <td colspan="2" align="center" class="georgia19Gris"><strong>Agregar Administradores</strong></td>
        </tr>
      <tr>
        <td width="100" class="Hevel16Gris">Nombre:</td>
        <td><label for="nombre"></label>
          <input name="nombre" type="text" id="nombre" size="50" value="<?=$nombre;?>" /></td>
      </tr>
      <tr>
        <td align="left" class="Hevel16Gris">Usuario:</td>
        <td align="left"><label for="luser"></label>
          <input name="luser" type="text" id="luser" size="50" value="" /></td>
      </tr>
      <tr>
        <td align="left" class="Hevel16Gris">Contrase&ntilde;a:</td>
        <td align="left"><label for="lpass"></label>
          <input name="lpass" type="text" id="lpass" size="50" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle" class="Hevel16Gris"><strong>PERMISOS</strong></td>
        </tr>
      <tr>
        <td align="left" class="Hevel16Gris">Seccion</td>
        <td align="left" class="Hevel16Gris"><select name="secc1" id="secc1">
         <option value="100">Administrador General</option>
         <option value="99">Administrador General solo Agenda</option>
        <optgroup label="RECINTOS CULTURALES">
         <option value="80">Todos los Recintos</option>
			  <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>"><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup> <optgroup label="SUBDIRECCIONES">
               
         <option value="70">Todas las Subdirecciones</option>
                 <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>"><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup>
               
              </select></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="sendd" id="sendd" value="Agregar" />
          <input type="button" name="cancel" id="cancel" value="Cancelar" onClick="nok()"/></td>
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
} 
else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; } 

} ?>