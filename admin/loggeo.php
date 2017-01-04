<? setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$n=$_GET['n'];
$p=$_GET['p'];
$m=$_GET['m'];

if ($n!=1) { $msj1='nombre de usuario'; }
if ($p!=1) { $msj2='password'; }

if ($m==1) {
$msj='Datos incorrectos: '.$msj1.', '.$msj2; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Arimo|Voltaire|Oswald|Shanti' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Loggueo de Ususario</title>
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
<tr><td bgcolor="#000000" >
<div style="width:960; background-color:#000">
      <img src="../imgs/headivec.png" width="928" height="68" />
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
      
      
      
      <form action="entra.php" method="post" name="login">
  <table width="484" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF" style="/* [disabled]padding-top:20px; */ /* [disabled]padding-bottom:20px; */ margin-bottom: 10px; margin-top: 20px;">
    <tr>
      <td colspan="2" align="center" class="georgia19Gris">Logueo de Usuario</td>
      </tr>
    <tr>
      <td colspan="2" align="center" class="nombrecol"><?=$msj;?></td>
    </tr>
    <tr>
      <td width="103" class="calibri18Azul">Usuario</td>
      <td width="383"><label for="user"></label>
        <input name="user" type="text" id="user" size="60" /></td>
      </tr>
    <tr>
      <td class="calibri18Azul">Contrase&ntilde;a</td>
      <td><label for="pass"></label>
        <input name="pass" type="password" id="pass" size="060" /></td>
      </tr>
    <tr>
      <td colspan="2" align="center"><input name="entrar" type="submit" class="pcontacto" id="entrar" value="Entrar" /></td>
      </tr>
  </table>
  </form>
  
  
  </td>
  </tr>  <tr  >
      <td height="37" align="left" bgcolor="#000000" class="bcoabajo" ><? include "footer.php"; ?></td>
    </tr>
</table>
</body>
</html>