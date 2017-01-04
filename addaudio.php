<? session_start();
require 'db.class.php';
require 'conf.class.php';
include('admin/class.ImageFilter.php');
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=6;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];

if ($atiene!='ok') {  echo '<script language="javascript"> document.location="artistas.php" </script>'; exit(); } 
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");

 
$busca=$bd->ejecutar("select * from  artistas_datos   where id=$aid");
$ke=$bd->obtener_fila($busca,0);

function obtenerext($archivo)
{  $ext='';
	for ($i=1;$i<=strlen($archivo);$i++)
	{   if ($archivo[$i]=='.'){
		for ($j=$i;$j<=strlen($archivo);$j++)
		{ $ext=$ext.$archivo[$j];			
		}
		}} 
		$ext = strtolower($ext); 
		return $ext;	
}
$enviar2=$_POST['Agregar'];
		if (!empty($enviar2)) {
			
		
			
			$nombre_archivo2 = $_FILES['userfile2']['name']; 
			$tipo_archivo2 = $_FILES['userfile2']['type']; 
			$tamano_archivo2 = $_FILES['userfile2']['size'];			
			$ex=obtenerext($nombre_archivo2);
			
			if ($tamano_archivo2>5206000){
			?>
      
		
				<script type="text/javascript">
				alert("El tamaño del archivo no debe exeder los 5Mb"); 
				</script>

              <? 
			} else { 
				?>
      
		
				<script type="text/javascript">
				alert("Espere mientras se carga el archivo, la pagina redireccionara automaticamente al finalizar"); 
				</script>

              <? 
			$title=$_POST['titulo'];
			 $fec=date("Y-m-d");
			 $hora=date("H:i:s");
			 $fot='admina/audios';	
			 $dirxc=$fot.'/'.$fec.'/';
			 if ($ex=='.mp3' or $ex=='mp3'){
				 	 $bd->ejecutar("insert into artistas_audios values(NULL,'$aid','$title','$dirxc','$fec','0')");
					 $nompic1=$bd->lastID();
					 
					 	if (!is_dir($fot)){
		  
					mkdir($fot,0777); //chmod($fot,0777);
					$dir=$fot.'/'.$fec.'/';
					 
			
			  	if (!is_dir($dir)){
					mkdir($dir,0777); //chmod($dir,0777);
					}
			  
			}
		  	else {
		  		$dir=$fot.'/'.$fec; 
				
				if (!is_dir($dir)){
			
					mkdir($dir,0777); //chmod($dir,0777);
					$dir=$fot.'/'.$fec.'/';
					if (!is_dir($dir)){
			
					mkdir($dir,0777); // chmod($dir,0777);
					}  
			  
				}
				else {
					$dir=$fot.'/'.$fec.'/'; 
					if (!is_dir($dir)){
			
						mkdir($dir,0777);
						//chmod($dir,0777);
					}  
				}
		  	}
			
			 if  (move_uploaded_file($_FILES['userfile2']['tmp_name'],$dir.$nombre_archivo2)	){
 
			if (file_exists($dir.$nompic1.$ex)) {
				unlink($dir.$nompic1.$ex);
			}
	    	
			rename($dir.$nombre_archivo2,$dir.$nompic1.$ex);   
			
			
			 		$fulldil=$dirxc=$fot.'/'.$fec.'/'.$nompic1.$ex;
				 	 $bd->ejecutar("update artistas_audios set url='$fulldil' where id=$nompic1");
			}
			
	 
			?>
      
		
				<script type="text/javascript"> 
				top.location="admina.php";
				</script>

              <?
			 
			}  else {  ?>
      
		
				<script type="text/javascript">
				alert("Formato no valido");
				top.location="addaudio.php";
				</script>

              <?  } }
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
</style>
</head>
<script language="javascript" src="jquery.js"></script>
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
	function  loggeo(){
		var eluser=$("#user").val();
		var elpass=$("#passw").val();
		
	$.post("entraa.php", {eluser:eluser,elpass:elpass}, function (data) {
		$("#error").html(data);
		data = data.trim();   
		if (data == 'ok'){ 
		$("#iniciars").toggle("fast");
		$("#entradiv").toggle("fast");
			$.post("entraa.php", {eluser:eluser,elpass:elpass,ok:1}, function (data) {
				$("#entradiv").html(data);
			
				});
		}
	});
 
	}
	
	function  busqueda(){
		var buscar=$("#buscar").val();
		$.post("buscar.php", {buscar:buscar}, function (data) {
			$("#resultados").html(data);
			
		});
	}
	function checadiponible(){
		var elegido=$("#usuario").val();
		elegido = elegido.trim();  
		$.post("admin/checa.php", {elegido:elegido}, function (data) {
				data = data.trim();
				data=parseInt(data);
				if ($("#usuario").val() != ''){
				if (data==0){
				try { $("#usuario").removeClass("cerror");  } catch(err) { } 
				try { $("#usuario").addClass("cok"); } catch(err) { }
				try { $("#elbotn").css("display","block"); } catch(err) { }
				$('#resultado').html("");	
				$('#bandera').val('0');	
				 }
				
				else {
				try {  $("#usuario").removeClass("cok");   } catch(err) { }
				try {  $("#usuario").addClass("cerror"); } catch(err) { }
				$('#resultado').html("No disponible");		
				$('#bandera').val('1');	
				 }
				}
							
	  	 	 });
	}
	function checapass(){
		var uno = $("#elpass1").val();
		var dos = $("#elpass2").val();
		
		if (dos=='') {
			$('#edopass').val("1");	 
			$("#elpass1").addClass("cinchek"); 
			$("#elpass2").addClass("cinchek");  
		}
		else if (uno!=dos ) { 
			$('#edopass').val("1");	 
			$("#elpass1").removeClass("cinchek"); 
			$("#elpass2").removeClass("cinchek");  				
			$("#elpass1").addClass("cerror"); 
			$("#elpass2").addClass("cerror"); 
			$('#resultado2').html("Contraseñas <br>No Coinciden");	
		}
		else if (uno==dos ) { 
			$('#edopass').val("0");	 	
			$("#elpass1").removeClass("cinchek"); 
			$("#elpass2").removeClass("cinchek");  				
			$("#elpass1").removeClass("cerror"); 
			$("#elpass2").removeClass("cerror"); 	
			$("#elpass1").addClass("cok"); 
			$("#elpass2").addClass("cok"); 
			$('#resultado2').html("");	
			$("#elbotn").css("display","block");
		}
		
		
	}
	function checaeso(){
		var passok = $('#edopass').val();	
		var banok = $('#bandera').val();
		var emako = $('#esmail').val();
		var nook = $("#nombre").val();
				
		if (passok=='0' & banok=='0' & emako=='0' & nook!=''){ 
		 	
		
		}
		else { 
		$("#elbotn").css("display","none");
		alert("Algunos datos estan incorrectos");
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
	function emailc(){
	  if($("#correo").val() == '')
        {
           $("#esmail").val("1");
        }
		else if(validar_email($("#correo").val()))
        {
            	try { $("#correo").removeClass("cerror");  } catch(err) { } 
				try { $("#correo").addClass("cok"); } catch(err) { }
				try { $("#elbotn").css("display","block"); } catch(err) { }
				$('#resultado3').html("");	
				$("#esmail").val("0");
        }else
        {
            	try { $("#correo").removeClass("cok");  } catch(err) { } 
				try { $("#correo").addClass("cerror"); } catch(err) { }
		         $("#elbotn").css("display","none");
				$('#resultado3').html("Correo no <br> Válido");	
				$("#esmail").val("1");
        }	
	} 
 
	function modificar(dude){
		$("#info").toggle("fast");
		$("#infou").toggle("fast");
		$("#modifica").css("display","none");
		$("#guarda").css("display","block");		
	}
	function guardar(dude){	
		$("#info").toggle("fast");
		$("#infou").toggle("fast");
		$("#modifica").css("display","block");
		$("#guarda").css("display","none");	
		var lainf = $("#lainfo").val();
		$("#info").html(lainf);
		
		 $.post("admin/guardasusc.php", {dude:dude,lainf:lainf}, function (data) {   
				  
		 });
	}
 
</script>
 <script type="text/javascript">

function Verify(objForm) {
var arrExtensions=new Array("mp3");
var objInput = objForm.elements["userfile2"];
var strFilePath = objInput.value;
var arrTmp = strFilePath.split(".");
var strExtension = arrTmp[arrTmp.length-1].toLowerCase();
var blnExists = false;
for (var i=0; i<arrExtensions.length; i++) {
if (strExtension == arrExtensions[i]) {
blnExists = true;
break;
}
}
if (!blnExists)
alert("El archivo no es un mp3");
return blnExists;
}
</script>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(document).ready(function() {
	$("input:text").addClass("inputsDeTexto");
	$("input:password").addClass("inputsDeTexto");
	$("input:submit").addClass("botones");
	$("input:button").addClass("botones");
	$("select").addClass("inputsDeTexto");
	$("textarea").addClass("inputsDeTexto");    
});
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="17%" height="64" align="right" bgcolor="#C41230"><a href="artistas.php?secc=<?=$secc?>"><img src="imagenes/artistas.png" width="149" height="29" border="0" /></a></td>
    <td width="83%" bgcolor="#C41230"><? include "menu2.php"; ?></td>
  </tr>
</table>
</div>
<div style="width: 930px; float: left; z-index: 8888888888;">
  <table width="100%" border="0" cellspacing="0">
    <tr>
      <td width="24%" height="45" bgcolor="#333333" style="padding:10px 2px 10px 10px"><label for="buscar"></label>
        <input type="text" name="buscar" id="buscar" style="width:98%" onKeyUp="busqueda()" onKeyPress="busqueda()" /></td>
      <td width="76%" bgcolor="#333333" style="padding:10px 2px "><img src="imagenes/bbuscar.png" width="50" height="26" style="cursor:pointer" onDblClick="busqueda()" /></td>
      </tr>
  </table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados"><table width="613" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td colspan="4" align="center" class="Arial15Azul"><strong>Datos del Artista:</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro"><?=$ke['nombre']?>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4" align="center" valign="middle" class="Arial12Gris"><table align="center">
      <tr>
        <td><span class="Verdana16Ngo"><strong>Agrega Audio</strong></span></td>
      </tr>
      <tr>
        <td align="center"><form action="addaudio.php" method="post" enctype="multipart/form-data" name="reduce" id="reduce">
          <table width="80%" align="center" cellpadding="4" cellspacing="4">
            <tr>
              <td width="21%" align="left" valign="middle" class="Hevel16Gris"><strong><span class="titulo1">mp3</span></strong></td>
              <td width="79%" align="left" class="menu"><span class="titulo1">
                <input name="userfile2" type="file" class="titulo1" id="userfile2" />
              </span></td>
            </tr>
            <tr>
              <td height="38" align="left" valign="top" class="Hevel16Gris"><strong><span class="titulo1">Pie<br />
                </span></strong></td>
              <td class="menu" align="left"><span class="titulo1">
                <textarea name="titulo" cols="60" rows="3" class="titulo1"  ></textarea>
                </span></td>
            </tr>
            <tr class="titulo-3">
              <td colspan="2" align="center"><label for="pnid"></label>
                <input type="submit" name="Agregar" value="Agregar" class="titulo1" />
                <!--<input name="can" type="button" class="titulo1" id="can" onClick="cancelar()" value="Cancelar" />--></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table>      <label for="textfield"></label></td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="Arial12Gris">&nbsp;</td>
  </tr>
</table></div>
      </td>
      <td width="17">&nbsp;</td>
      <td width="300" valign="top" bgcolor="#E8E2D4"><div style="width:275px; margin:12px; float:left">
      <?  if ($aid!='' and $aid>0){ $d=''; $a='none'; } else { $d='none'; $a==''; }?>     
      <div id="entradiv" style="float: left; width: 275px; background-color: #C41230; display: <?=$d;?>;" >  
        <table width="275" border="0" cellspacing="0" cellpadding="7">
          <tr>
            <td rowspan="3" align="center" class="Arial12Bco">
            <? $baa=$bd->ejecutar("select * from artistas_datos where id=$aid"); 
					$kea=$bd->obtener_fila($baa,0);
					$url1='';	
					$url1='admina/'.$kea['foto'].$kea['id'].'_s.jpg';
					if (!file_exists($url1)){
					$url1='admina/'.$kea['foto'].$kea['id'].'.jpg'; }
					if (!file_exists($url1)){
					$url1="admin/imagenes/no.png"; }
			 ?>
            <img src="<?=$url1?>" width="60" style="background-color:#666;" class="imagenborde" />
            </td>
            <td class="Arial12Bco">Bienvenido:<br /><strong>
              <?=$anombre?>
            </strong></td>
          </tr>
          <tr>
            <td class="Arial12Bco"><a href="admina.php?id=<?=$aid?>" class="Arial12Bco"><strong>Administrar mis datos</strong></a></td>
            </tr>
          <tr>
            <td><a href="sale.php" class="Arial12Bco"><strong>salir</strong></a></td>
            </tr>
        </table>
      </div>
      
      <div id="iniciars" style="float:left; width:275px;display: <?=$a;?>;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" class="Arial23Gris">INICIAR SESI&Oacute;N</td>
            </tr>
          <tr bgcolor="#C41230">
            <td>
            
            
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="33%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr bgcolor="#C41230">
            <td align="right" class="Arial12Bco">Usuario:</td>
            <td><label for="user"></label>
              <input type="text" name="user" id="user" style="width:98%" /></td>
          </tr>
          <tr bgcolor="#C41230">
            <td align="right" class="Arial12Bco">Contraseña:</td>
            <td><label for="passw"></label>
              <input type="password" name="passw" id="passw" style="width:98%" /></td>
          </tr>
          <tr bgcolor="#C41230">
            <td>&nbsp;</td>
            <td align="right"><img src="imagenes/entra.png" width="50" height="26" style="cursor:pointer;" onClick="javascript:loggeo()" /></td>
            </tr>
          <tr bgcolor="#C41230">
            <td colspan="2" align="center" class="Arial12Bco"><a href="registro.php" class="Arial12Bco"><strong>Registrarse</strong></a></td>
          </tr>
          <tr bgcolor="#C41230">
            <td colspan="2" align="center" class="Arial12Bco"><div class="Arial12Bco" id="error">&nbsp;</div></td>
            </tr>
</table>
</td>
          </tr>
        </table>
        </div>
        
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