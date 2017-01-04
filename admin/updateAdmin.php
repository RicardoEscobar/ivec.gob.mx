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


$id=$_GET['id'];
$buk=@$bd->ejecutar("select * from admin where id=$id");
$kbuk=@$bd->obtener_fila($buk,0);

 
$sendd=$_POST['sendd'];
$nombre=$_POST['nombre'];
$luser=$_POST['luser'];
$lpass=$_POST['lpass'];

if ($lpass!=$kbuk['pass']){
$lpass=($lpass);	
}
$sendd=$_POST['sendd'];

 


if ($sendd=='')
{
}
else
{
	if ($nombre=='' or $luser=='' or $lpass=='')
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
$secc1=$_POST['secc1'];
		/*  	telefono 	correo 	rfc 	cel */
		@$bd->ejecutar("update admin set nombre='$nombre', log='$luser', pass='$lpass', permiso='$secc1' where id=$id");
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
<title><?=$pageTitle;?> :. Admin - Administradores</title>
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
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">





<form action="<? $_SERVER['php_self'];?>?id=<?=$id;?>" method="post">
<table width="616" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td><table width="500" border="0" align="center" cellpadding="1" cellspacing="5">

      <tr>
        <td colspan="2" align="center" class="georgia19Gris"><strong>Modificar  Usuarios</strong></td>
        </tr>
      <tr>
        <td width="100" class="Hevel16Gris">Nombre:</td>
        <td width="483"><label for="nombre"></label>
          <input name="nombre" type="text" id="nombre" size="50" value="<?=$kbuk['nombre'];?>" /></td>
      </tr>
      <tr>
        <td align="left" class="Hevel16Gris">Usuario:</td>
        <td align="left"><label for="luser"></label>
          <input name="luser" type="text" id="luser" size="50" value="<?=$kbuk['log'];?>" /></td>
      </tr>
      <tr>
        <td align="left" class="Hevel16Gris">Contrase&ntilde;a:</td>
        <td align="left" class="arial11Gris" title="Para cambiar solo escriba su nueva contraseña"><label for="lpass"></label>
          <input name="lpass" type="text" id="lpass" size="50" value="<?=$kbuk['pass'];?>"/></td>
      </tr>
    
      <tr>
        <td colspan="2" align="center" valign="middle" class="Hevel16Gris"><strong>PERMISOS</strong></td>
        </tr>
      <tr>
        <td align="left" class="Hevel16Gris">Seccion</td>
        <td align="left" class="Hevel16Gris"><select name="secc1" id="secc1">
         <option value="100" <? if ($kbuk['permiso']==100){ echo 'selected="selected"'; } ?>  >Administrador General</option>
         <option value="99" <? if ($kbuk['permiso']==99){ echo 'selected="selected"'; } ?> >Administrador General solo Agenda</option>
        <optgroup label="RECINTOS CULTURALES">
         <option value="80" <? if ($kbuk['permiso']==80){ echo 'selected="selected"'; } ?> >Todos los Recintos</option>
			  <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>"  <? if ($kbuk['permiso']==$rows['id']){ echo 'selected="selected"'; } ?> ><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup> <optgroup label="SUBDIRECCIONES">
               
         <option value="70"  <? if ($kbuk['permiso']==80){ echo 'selected="selected"'; } ?> >Todas las Subdirecciones</option>
                 <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>" <? if ($kbuk['permiso']==$rows['id']){ echo 'selected="selected"'; } ?> ><?=$rows['nombre'];?></option>
                
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