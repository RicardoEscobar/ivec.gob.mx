<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();

 
 $id=$_GET['id'];
 $bua=$bd->ejecutar("select * from artistas_datos where id=$id");
 $kea=@$bd->obtener_fila($bua,0);
 
	

$enviar2=$_POST['Agregar'];
		if (!empty($enviar2)) {

       
 $nombre=$_POST['nombre'];
 $usuario=$_POST['usuario'];
 $elpass1=$_POST['elpass1'];
 $elpass2=$_POST['elpass2'];
 $telefono=$_POST['telefono'];
 $correo=$_POST['correo'];
 $direccion=$_POST['direccion'];
 $secc1=$_POST['secc1'];
 $sitio=$_POST['sitio'];

 

$msj='';

$fec=date("Y-m-d");
$fot='../admina/artistas';
$laurlo='artistas/'.$fec.'/';

 
 
$bd->ejecutar("update artistas_datos set usuario='$usuario', password='$elpass1', nombre='$nombre', email='$correo', direccion='$direccion', telefono='$telefono', seccion='$secc1', sitiopersonal='$sitio' where id=$id");
	$nompic1=$bd->lastID(); 
  
 		 	
			 
			 	 
		
           
				 ?>
      
		
				<script type="text/javascript">
				top.location="artistas.php";
				</script>

             <?
	
			
			
 
		}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Agregar Foto</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
 <script language="JavaScript"> 
 function limite(que,cuanto) 
 { 
 var v=que.value 
 if(v.length>cuanto) que.value=v.substring(0,cuanto) 
 else 
 document.reduce.cont.value=cuanto-v.length 
 } 
 </script> 
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
	function checadiponible(){
		var elegido=$("#usuario").val();
		var idbato=$("#idtipo").val();
		elegido = elegido.trim();  
		$.post("checa.php", {elegido:elegido,idbato:idbato}, function (data) {
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

</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; background-color: #000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">
      
  <table align="center">
    <tr>
      <td><span class="Verdana16Ngo"><strong>Modificar  Artista</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" method="post" action="upartista.php?id=<?=$id?>" enctype="multipart/form-data">
        <table align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td width="18%" height="38" align="left" valign="top" class="verdana14negro"><p><strong>Nombre<span class="titulo1"></span></strong></p></td>
            <td colspan="2" align="left" class="menu"><input name="nombre" type="text" class="titulo1" id="nombre" value="<?=$kea['nombre']?>" size="60" />
              <input name="idtipo" type="hidden" id="idtipo" value="<?=$id?>" /></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Seleccionar un Usuario</strong></td>
            <td width="54%" align="left" class="menu"><label for="usuario"></label>
              <input name="usuario" type="text" class="cok" id="usuario" autocomplete="off" onBlur="javascript:checadiponible()" onMouseOut="javascript:checadiponible()" onKeyPress="javascript:checadiponible()" onKeyDown="javascript:checadiponible()" onKeyUp="javascript:checadiponible()" value="<?=$kea['usuario']?>"/><input name="bandera"  id="bandera" type="hidden" value="0" /></td>
            <td width="28%" align="left" class="menu"><label for="resultado"></label>
              <div class="Arial11RojoM" id="resultado" ></div></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Contrase&ntilde;a</strong></td>
            <td align="left" class="menu"><label for="elpass1"></label>
              <input name="elpass1" type="password" class="cok" id="elpass1"  autocomplete="off" onKeyPress="checapass()" onKeyUp="checapass()" value="<?=$kea['password']?>" /></td>
            <td rowspan="2" align="left" class="menu"><div class="Arial11RojoM" id="resultado2" ></div></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Repita Contrase&ntilde;a</strong></td>
            <td align="left" class="menu"><label for="elpass2"></label>
              <input name="elpass2" type="password" class="cok" id="elpass2"   autocomplete="off"  onkeypress="checapass()" onKeyUp="checapass()" value="<?=$kea['password']?>"  />
              <input name="edopass" type="hidden" id="edopass" value="0" /></td>
            </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Telefono</strong></td>
            <td align="left" class="menu"><label for="telefono"></label>
              <input name="telefono" type="text" id="telefono" value="<?=$kea['telefono']?>" /></td>
            <td align="left" class="menu">&nbsp;</td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Correo</strong></td>
            <td align="left" class="menu"><label for="correo"></label>
              <input name="correo" type="text" class="cok" id="correo" onClick="emailc()" onMouseOut="emailc()"  onkeypress="emailc()" onKeyUp="emailc()" value="<?=$kea['email']?>" onfocusout="emailc()"  />
              <input name="esmail" type="hidden" id="esmail" value="0" /></td>
            <td align="left" class="menu"><div class="Arial11RojoM" id="resultado3" ></div></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Direccion</strong></td>
            <td colspan="2" align="left" class="menu"><label for="direccion"></label>
              <textarea name="direccion" rows="5" id="direccion"><?=$kea['direccion']?></textarea></td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Seccion</strong></td>
            <td align="left" class="menu"><label for="secc1"></label>
              <select name="secc1" id="secc1">
			  <? 
			  $f=0;
			   $bs=$bd->ejecutar("select * from artistas_seccion order by padre asc,id asc"); 
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){ $f++; if ($rows['tipo']==1){  if ($ban==1){ ?>
               </optgroup><?  }  ?>
               <optgroup label="<?=$rows['nombre'];?>">
               <? $ban=1; } else { ?>
               <option value="<?=$rows['id']?>" <? if ($rows['id']==$kea['seccion']) { echo ' selected="selected"'; } ?>><?=$rows['nombre'];?></option>
               <? }  if ($f==$total) { ?>
               </optgroup><?  }   }  ?>
              </select></td>
            <td align="left" class="menu">&nbsp;</td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="verdana14negro"><strong>Sitio Personal</strong></td>
            <td colspan="2" align="left" class="menu"><label for="sitio"></label>
              <input name="sitio" type="text" id="sitio" value="<?=$kea['sitiopersonal']?>" /></td>
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
  </td>
  </tr>  <tr style="border: 0px; background: #000">
        <td height="37" align="left" class="bcoabajo" ><? include "footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
<? } ?>