<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=6;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];


$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");

$buscar=$bd->ejecutar("select * from  artistas_datos where id=$aid");
$kea=$bd->obtener_fila($buscar,0);
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
		$.post("admin/checa.php", {elegido:elegido,idbato:<?=$aid?>}, function (data) {
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
</script>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(document).ready(function() {
	$("input:text").addClass("inputsDeTexto");
	$("input:password").addClass("inputsDeTexto");
	$("input:submit").addClass("botonesz");
	$("input:button").addClass("botonesz");
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
    <td width="17%" height="64" align="left" bgcolor="#C41230" style="padding:10px"><a href="artistas.php?secc=0" class="recintos">Artistas</a></td>
    <td width="83%" bgcolor="#C41230"><? include "menu2.php"; ?></td>
  </tr>
</table>
</div>
<div style="width: 930px; float: left; z-index: 8888888888;">
  <table width="100%" border="0" cellspacing="0">
    <tr>
      <td width="24%" height="45" bgcolor="#333333" class="Arial12Bco" style="padding:10px 2px 10px 10px"><label for="buscar"></label>
        Buscar Artista:<br />
  <input type="text" name="buscar" id="buscar" style="width:98%; border-radius:0px" onkeyup="busqueda()" onkeypress="busqueda()" /></td>
      <td width="76%" bgcolor="#333333" style="padding:10px 2px ">&nbsp;</td>
      </tr>
  </table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
     <table align="center">
    <tr>
      <td><span class="Arial15Azul"><strong>Modificar mis Datos</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" method="post" action="upartista.php?id=<?=$id?>" enctype="multipart/form-data">
        <table align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td height="38" align="left" valign="top" class="negro12"><p><strong>Nombre<span class="titulo1"></span></strong></p></td>
            <td colspan="2" align="left" class="menu"><input name="nombre" type="text" class="titulo1" id="nombre" value="<?=$kea['nombre']?>" size="60" />
              <input name="idtipo" type="hidden" id="idtipo" value="<?=$id?>" /></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Seleccionar un Usuario</strong></td>
            <td width="54%" align="left" class="menu"><label for="usuario"></label>
              <input name="usuario" type="text" class="cok" id="usuario" autocomplete="off" onblur="javascript:checadiponible()" onmouseout="javascript:checadiponible()" onkeypress="javascript:checadiponible()" onkeydown="javascript:checadiponible()" onkeyup="javascript:checadiponible()" value="<?=$kea['usuario']?>"/>
              <input name="bandera"  id="bandera" type="hidden" value="0" /></td>
            <td width="28%" align="left" class="menu"><label for="resultado"></label>
              <div class="Arial11RojoM" id="resultado" ></div></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Contrase&ntilde;a</strong></td>
            <td align="left" class="menu"><label for="elpass1"></label>
              <input name="elpass1" type="password" class="cok" id="elpass1"  autocomplete="off" onkeypress="checapass()" onkeyup="checapass()" value="<?=$kea['password']?>" /></td>
            <td rowspan="2" align="left" class="menu"><div class="Arial11RojoM" id="resultado2" ></div></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Repita Contrase&ntilde;a</strong></td>
            <td align="left" class="menu"><label for="elpass2"></label>
              <input name="elpass2" type="password" class="cok" id="elpass2"   autocomplete="off"  onkeypress="checapass()" onkeyup="checapass()" value="<?=$kea['password']?>"  />
              <input name="edopass" type="hidden" id="edopass" value="0" /></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Telefono</strong></td>
            <td align="left" class="menu"><label for="telefono"></label>
              <input name="telefono" type="text" id="telefono" value="<?=$kea['telefono']?>" /></td>
            <td align="left" class="menu">&nbsp;</td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Correo</strong></td>
            <td align="left" class="menu"><label for="correo"></label>
              <input name="correo" type="text" class="cok" id="correo" onclick="emailc()" onmouseout="emailc()"  onkeypress="emailc()" onkeyup="emailc()" value="<?=$kea['email']?>" onfocusout="emailc()"  />
              <input name="esmail" type="hidden" id="esmail" value="0" /></td>
            <td align="left" class="menu"><div class="Arial11RojoM" id="resultado3" ></div></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Direccion</strong></td>
            <td colspan="2" align="left" class="menu"><label for="direccion"></label>
              <textarea name="direccion" rows="5" id="direccion"><?=$kea['direccion']?>
            </textarea></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Seccion</strong></td>
            <td align="left" class="menu"><label for="secc1"></label>
              <select name="secc1" id="secc1">
                <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from artistas_seccion order by id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){ $f++; if ($rows['tipo']==1){  if ($ban==1){ ?>
                </optgroup>
                <?  }  ?>
                <optgroup label="<?=$rows['nombre'];?>">
                  <? $ban=1; } else { ?>
                  <option value="<?=$rows['id']?>" <? if ($rows['id']==$kea['seccion']) { echo ' selected="selected"'; } ?>>
                    <?=$rows['nombre'];?>
                    </option>
                  <? }  if ($f==$total) { ?>
                  </optgroup>
                <?  }   }  ?>
              </select></td>
            <td align="left" class="menu">&nbsp;</td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Sitio Personal</strong></td>
            <td colspan="2" align="left" class="menu"><label for="sitio"></label>
              <input name="sitio" type="text" id="sitio" value="<?=$kea['sitiopersonal']?>" /></td>
          </tr>
          <tr>
            <td width="18%" height="15" align="left" valign="top" class="negro12"><strong>Curriculum</strong></td>
            <td align="left" class="menu"><label for="curri"></label>
              <input type="file" name="curri" id="curri" />              &nbsp;</td>
            <td rowspan="2" align="left" class="Arial11RojoM">En caso de seleccionar archivos se reemplazaran los anteriores</td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12"><strong>Foto de perfil</strong></td>
            <td align="left" class="menu"><label for="fotop"></label>
              <input type="file" name="fotop" id="fotop" /></td>
            </tr>
          <tr>
            <td height="15" align="left" valign="top" class="negro12">&nbsp;</td>
            <td colspan="2" align="left" class="menu">&nbsp;</td>
          </tr>
          <tr class="titulo-3">
            <td colspan="3" align="center"><label for="pnid"></label>
              <input id="elbotn" type="submit" name="Agregar" value="Guardar" class="titulo1" onMouseOver="checaeso()" />
              <!--<input name="can" type="button" class="titulo1" id="can" onClick="cancelar()" value="Cancelar" />--></td>
          </tr>
          </table>
        </form></td>
      </tr>
  </table>
      </div>
      </td>
      <td width="17">&nbsp;</td>
      <td width="300" valign="top" bgcolor="#E8E2D4">    <div style="width:275px; margin:12px auto">
      <div style="width: 275px; /* [disabled]margin:12px; */ float: left">
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
            <td align="right"><img src="imagenes/entra.png" width="50" height="26" style="cursor:pointer;" onclick="javascript:loggeo()" /></td>
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