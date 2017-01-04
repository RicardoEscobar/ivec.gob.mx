<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=6;
$_SESSION['voyparader']='admina';
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
   function popup(url,ancho,alto) {
    var posicion_x; 
    var posicion_y;
    posicion_x=(screen.width/2)-(ancho/2); 
    posicion_y=(screen.height/2)-(alto/2); 
    posicion_y=((screen.height-alto) /2)-100; 
    window.open(url, "IVEC", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=1,resizable=no,left="+posicion_x+",top="+posicion_y+"");
    }

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
      <td width="24%" height="45" bgcolor="#333333" style="padding:10px 2px 10px 10px"><label for="buscar"></label>
        <input type="text" name="buscar" id="buscar" style="width:98%" onkeyup="busqueda()" onkeypress="busqueda()" /></td>
      <td width="76%" bgcolor="#333333" style="padding:10px 2px "><img src="imagenes/bbuscar.png" width="50" height="26" style="cursor:pointer; border-radius:7px" ondblclick="busqueda()" /></td>
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
    <td colspan="4" align="left" class="arial14Negro"><?=$ke['nombre']?>&nbsp; <a href="modificar.php"><img src="admin/imagenes/up.png" width="19" height="23" /></a></td>
    </tr>
  <tr>
    <td rowspan="2" align="center" valign="middle" class="Arial12Gris">             <? if (file_exists('admina/'.$ke['foto'].$ke['id'].'.jpg')){ ?>
              <img src="<?='admina/'.$ke['foto'].$ke['id'].'_c.jpg'?>" name="fotodude<?=$ke['id'];?>"  width="100" class="imagenborde" id="fotodude<?=$ke['id'];?>" /><br /><br />
<a href="admina/crop4.php?id=<?=$ke['id']?>"><img src="admin/imagenes/pik.png" width="21" height="21" title="Volver a Recortar" /></a>
              <? } else { ?>
              <img src="admin/imagenes/no.png" width="80" height="80" />
<? } ?>&nbsp;</td>
    <td align="left" valign="top" class="Arial12Gris">Mi Perfil</td>
    <td align="left" class="Arial12Gris">&nbsp;</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td width="350" align="left" valign="top" class="Arial12Gris">
      <div id="info" style="max-height: 200px; overflow: scroll; overflow-x: hidden;"><? $bi=$bd->ejecutar(" select * from artistas_info where dude=$aid"); $ki=@$bd->obtener_fila($bi,0); echo nl2br($ki['descripcion']); if ($ki['descripcion']==''){ echo "Acerca de mi... presione Editar"; } ?></div>
      <div id="infou" style="display:none" >
        
        
        <table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="info"></label>
              <textarea name="lainfo" rows="20
              " id="lainfo"><?=$ki['descripcion'];?></textarea></td>
            </tr>
          </table>
        </div>
    </td>
    <td align="left" class="Arial12Gris"><input type="button" name="modifica" id="modifica" value="Editar" onclick="javascript:modificar(<?=$id?>)" />
      <input type="hidden" name="id" id="id" />
      <input type="button" name="guarda" id="guarda" value="Guardar" onclick="javascript:guardar(<?=$aid;?>)" style="display:none" /></td>
    <td align="center" class="Arial12Gris"><label for="textfield"></label></td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro"><img src="imagenes/ll.png" width="610" height="1" /></td>
    </tr>
  <tr>
    <td align="left" class="arial14Negro"><strong>Video Cargado:</strong></td>
    <td align="left" class="Arial12Gris">
	
	<?
	 
	 $buaa=$bd->ejecutar("select * from artistas_videos where autor=$aid");
	$totalvide=$bd->num_rows($buaa);
	 while($kaa=$bd->obtener_fila($buaa,0)) {
		 $elvideo=$kaa['id'];
		  ?> 
     <iframe width="350" height="200" src="http://www.youtube.com/embed/<?=$kaa['url']?>" frameborder="0" allowfullscreen></iframe>
     
      <? if ($kaa['edo']==0){ ?><img src="admin/imagenes/inte.png" title="Pendiente" width="21" height="21" /><? } else  {?>   
    
     <img src="admin/imagenes/ok.png" title="Aprobado" width="21" height="21"  /><? } } 
	 if ($totalvide<1){ ?> Agregar
     <a href="addvideo.php"><img src="admin/imagenes/add.png" width="24" height="20" /></a><?  } else{ ?>
     <a href="delvideo.php?id=<?=$elvideo;?>"  onclick = "if (! confirm('¿Eliminar Video?')) return false;"><img src="admin/imagenes/del.png" width="24" height="21" /></a>
<? } ?>
     </td>
    <td align="left" class="Arial12Gris">Limite 1 Video</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro"><img src="imagenes/ll.png" width="610" height="1" /></td>
    </tr>
  <tr>
    <td align="left" class="arial14Negro"><strong>Audio:</strong></td>
    <td align="left" class="Arial12Gris">
    <? $buaa=$bd->ejecutar("select * from artistas_audios where autor=$aid");
	 while($kaa=$bd->obtener_fila($buaa,0)) {
		 
		 $elaudio=$kaa['id'];
		  ?>
    <object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3.swf" width="200" height="20">
    <param name="movie" value="player_mp3.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=<?=$kaa['url'];?>" />
</object>
    <? if ($kaa['edo']==0){ ?><img src="admin/imagenes/inte.png" title="Pendiente" width="21" height="21"  /><? } else { ?>   
    
     <img src="admin/imagenes/ok.png" title="Aprobado" width="21" height="21"  />
    <? } ?>
   
 <? } if ($bd->num_rows($buaa)<1){ ?> Agregar
     <a href="addaudio.php"><img src="admin/imagenes/add.png" width="24" height="20" /></a> <?  } else{ ?>
     <a href="delaudio.php?id=<?=$elaudio;?>" onclick = "if (! confirm('¿Eliminar Audio?')) return false;"><img src="admin/imagenes/del.png" width="24" height="21" /></a>
<? } ?>
    </td>
    <td align="left" class="Arial12Gris">Limite 1 Audio</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="arial14Negro"><img src="imagenes/ll.png" width="610" height="1" /></td>
    </tr>
  <tr>
    <td align="left" class="arial14Negro"><strong>Fotos: <br />
      <? 
	  $busq=$bd->ejecutar("SELECT  *  FROM artistas_fotos  where autor =$aid order by id desc");
	   if ($bd->num_rows($busq)<10){ ?> Agregar
      <a href="addfotos.php"><img src="admin/imagenes/add.png" width="24" height="20" /></a>     
      <?  } ?></strong></td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
    <td align="left" class="Arial12Gris">Limite 10 Fotos</td>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" class="Arial12Gris"><table cellspacing="8" width="20%">
                <tr>
                  <!--miniaturas-->
                  <td width="29%" valign="top"><table width="94%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                    <? 
							 						
									
						 $busq=$bd->ejecutar("SELECT  *  FROM artistas_fotos  where autor =$aid order by id desc");
						while ($row5 = $bd->obtener_fila($busq,0)) { 
						$id=$row5['id'];
				?>
                    <?  if ($k==0){
 				?>
                    <tr>
                      <?   $j=1;  }?>
                      <?  if ($j<=8)  {
						
						 ?>
                      <td width="100%" align="center" valign="top" height="66"><table width="97%" cellpadding="0" >
                        <tr>
                          <td width="201" height="87" valign="top" ><img src="<?=$row5['url']?><?=$row5['id']?>_55.jpg" border="0" width="130" style="max-height:90px"   /></td>
                        </tr>
                        <tr>
                          <td class="Arial12Gris"><?=substr($row5['titulo'],0,50);?></td>
                        </tr>
                        <tr>
                          <td class="piefoto"><table width="69" border="0" align="center" class="otrasnotas">
                            <tr>
                              <td >   <? if ($row5['edo']==0){ ?><img src="admin/imagenes/inte.png" title="Pendiente" width="21" height="21" /><? } else { ?>   
    
     <img src="admin/imagenes/ok.png" title="Aprobado" width="21" height="21"  /><? } ?></td>
                              <td >&nbsp;</td>
                              <td><a href="delfoto.php?id=<?=$row5['id'];?>&r=nota" class="text1"  onclick = "if (! confirm('¿Realmente desea eliminar la foto?')) return false;"><img src="admin/imagenes/del.png" border="0" title="Eliminar" /></a></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                      <? $j=$j+1; }  
										if ($j<=4){ $k=1; }
										else { $k=0; } 
										if ($k==0){ ?>
                    </tr>
                    <?    } 
									  }  ?>
                  </table></td>
                  <!-- final miniaturas-->
                  <!--foto grande-->
                  <!--final foto grande-->
                </tr>
              </table></td>
    </tr>
</table></div>
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