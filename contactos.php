<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=8;


$n=$_GET['n'];
$email=$_GET['email'];


if ($n!='' and is_numeric($n)){
		$busr=$bd->ejecutar("select nombre from recintos where id=$n");
		$krec=$bd->obtener_fila($busr);
		$krec['nombre']=': '.$krec['nombre'];
}

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
$secc1=$_GET['secc1'];
if ($secc1>0){ $cad=' and id='.$secc1.' ';  }
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");


$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$mensaje=$_POST['mensaje'];
$enviar=$_POST['enviar'];
if ($enviar!=''){
if ($nombre!='' and $correo!='' and $mensaje!=''){
	if ($bd->comprobaremail($correo)==1){
		
		
		 
		
		
					$cuerpo ='<table width="650" border="0" align="center" cellpadding="5" cellspacing="5" style="border:#000 dotted 1px">
					  <tr>
						<td colspan="2" align="center"><h2>IVEC Buzón</h2></td>
					  </tr>
					  <tr>
						<td width="93" height="20"><h3>Nombre:</h3></td>
						<td ><h4>'.$nombre.'</h4></td>
  					  </tr> 
					  <tr>
						<td ><h3>Correo</h3></td>
						<td ><h4>'.$correo.'</h4></td>
					  </tr>
					  <tr>
						<td valign="top"><h3>Texto:</h3></td>
						<td valign="top"><p>'.$mensaje.'</p></td>
					  </tr>
					  <tr>
						<td colspan="2">&nbsp;</td>
					  </tr>
					</table>';
					
					$headers = "MIME-Version: 1.0\r\n"; 
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
					//dirección del remitente 
					
					$headers .= "From: <".$correo.">\r\n"; 
					//dirección de respuesta, si queremos que sea distinta que la del remitente 
					//$headers .= "Reply-To: <magocaos@gmail.com>\r\n"; 
					//ruta del mensaje desde origen a destino 
					$headers .= "Return-path: From: <".$correo.">\r\n"; 
					
					$headers2 = "MIME-Version: 1.0\r\n"; 
					$headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
					//dirección del remitente 
					
					$headers2 .= "From: <noreply@ivec.gob.mx>\r\n"; 
					//dirección de respuesta, si queremos que sea distinta que la del remitente 
					//$headers .= "Reply-To: <magocaos@gmail.com>\r\n"; 
					//ruta del mensaje desde origen a destino 
					$headers2 .= "Return-path: From: <".$correo.">\r\n"; 
					
					if ($email!='' and $bd->comprobaremail($email)==1){
						$mail2=$email;
					} else {
					$mail2='contacto@ivec.gob.mx'; }
					//$mail2='magocaos@gmail.com';
					$asuntos='Contacto IVEC';
					@mail($mail2,$asuntos,$cuerpo,$headers) ;
					@mail($email,$asuntos,$cuerpo,$headers2) ;
	echo ' <script language="javascript"> alert("Mensaje enviado, Gracias"); </script> ';
		
	}
	else {
		echo '<script language="javascript">
				alert("El correo no es valido");
			</script>';
	}
} else {
	
		echo '<script language="javascript">
				alert("Debe llenar los campos antes de enviar el mensaje");
			</script>';
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instituto Veracruzano de la Cultura :: Artistas</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #F2F2F2;
}
li { margin-bottom:10px }
#resultados a { color:#B60016; }
</style>
</head>
<script language="javascript" src="jquery.js"></script>
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
 
function checas(){
	var nombre = $("#nombre").val();
	var correo = $("#correo").val();
	var mensaje = $("#correo").val();
	var esmail =  $("#esmail").val();
	
	if($("#correo").val() == '')
        {
           $("#esmail").val("1");
        }
		else if(validar_email($("#correo").val()))
        {
            
				$("#esmail").val("0");
        }else
        {
         
				$("#esmail").val("1");
        }	
	
	if (nombre=='' | correo=='' | mensaje=='' | esmail=='1'){	
	if (esmail=='1'){ alert("El correo no es valido"); } else {	
	alert("Debe completar los datos primero"); }
	$("#eldiv").css("display","none");		
	}
	
}
 function validar_email(valor)
    {
        // creamos nuestra regla con expresiones regulares.
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        // utilizamos test para comprobar si el parametro valor cumple la regla
        if(filter.test(valor))
            return true;
        else
            return false;
    }
	 
function activa(){
	$("#eldiv").css("display","block");
}
	
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#B60016" class="recintos" style="color:#FFF; padding-left:8px">Contacto<?=$krec['nombre']?></td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top">
        <div id="resultados">
          <table width="915" border="0" align="center" cellpadding="5" cellspacing="0">
            
            <tr>
              <td colspan="3" class="Arial50C666">
                
                </td>
              </tr>
            <tr>
              <td colspan="3"> 
                
                
                
                
                </td>
              </tr>
            <tr>
              <td height="1" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="1" rowspan="4" align="center" bgcolor="#F2F2F2">&nbsp;</td>
              <td width="258" rowspan="4" align="center" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            <tr>
              <td width="626" align="left" bgcolor="#FFFFFF" class="negro14"><br />
                Contáctanos y coméntanos tus propuestas, ideas críticas y opiniones generales acerca de todos los asuntos relacionados con la preservación, promoción y difusión de la cultura.<br />
                <br />
                Participa<p>&nbsp;</p></td>
              </tr>
              <tr width="626" align="left" bgcolor="#FFFFFF" class="negro14">
                <td ><table bgcolor="#CEFFED"><tr><td width="150px"></td><td width="326px" bgcolor="#BBF2D2"  border="1" ><p>Para citas con el Director del IVEC
                    <br />
ponerse en contacto unica y exclusivamente con<br />
Lic. Julio Cesar Sastré Cuevas<br />
Teléfono Veracruz :  01(229)32 13 31, <br />
Teléfono Xalapa &nbsp;&nbsp;&nbsp;:01(228)18 91 98, 01(228)18 04 12 <br />
                Correo :  juliosastre76@hotmail.com </p></td><td width="150px"></td></tr></table></td></tr>
            <tr>
              <td align="left" bgcolor="#FFFFFF" class="negro19">
              <form method="post" action="contacto.php?n=<?=$n?>&email=<?=$email?>">
              <table width="323" border="0" align="center" cellpadding="1" cellspacing="1">
                <tbody>
                  <tr>
                    <td align="left">Nombre</td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><input name="nombre" type="text" id="nombre"  onmouseover="activa()" value="<?=$nombre?>" size="65" maxlength="100" /></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">Correo electrónico</td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><input name="correo" type="text" id="correo"  onmouseover="activa()" value="<?=$correo?>" size="65" maxlength="100" /></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top"><span class="menu">
                      <input type="hidden" name="esmail" id="esmail" />
                    </span></td>
                    </tr>
                  <tr>
                    <td align="left" valign="top">Mensaje</td>
                    </tr>
                  <tr>
                    <td valign="top"><textarea name="mensaje"  id="mensaje" cols="50" rows="7" onmouseover="activa()"><?=$mensaje?></textarea></td>
                    </tr>
                  <tr>
                    <td valign="top"> </td>
                    </tr>
                  <tr>
                    <td valign="top"><div id="eldiv" align="center"  onmouseover="checas()">
                      <input name="enviar" type="submit" class="negro19" id="enviar" value="Enviar" />
                    </div></td>
                    </tr>
                  <tr>
                    <td valign="top" align="center">&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
                </form>
                </td>
            </tr>
            <tr>
              <td align="left" bgcolor="#FFFFFF" class="Arial23Gris">&nbsp;</td>
            </tr>
            </table>
          </div>
      </td>
      </tr>
    </table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>