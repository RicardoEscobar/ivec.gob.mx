<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=2;

$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
$secc1=$_GET['secc1'];
if ($secc1>0){ $cad=' and id='.$secc1.' ';  }
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
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
</style>
</head>
<script language="javascript" src="jquery.js"></script>
<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
 
	
	function  busqueda(){
		var buscar=$("#buscar").val();
		$.post("buscara.php", {buscar:buscar}, function (data) {
			$("#resultados").html(data);
			
		});
	}
	function checa(que){
	var edo = $("#oculto"+que).val();
	if (edo==0){
		$("#oculto"+que).val(1);
		$("#info"+que).toggle("slow");
		$("#img"+que).attr("src","imagenes/del.png");
	} else{
		$("#oculto"+que).val(0);
		$("#info"+que).toggle("fast");
		$("#img"+que).attr("src","imagenes/add.png");
	}
	
	for (a=1; a<32; a++){
	if (a==que){ } else {
		$("#oculto"+a).val(0);
		$("#info"+a).css("display","none");
		$("#img"+a).attr("src","imagenes/add.png");
	}
		
	}
		
	}
	
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#FF8F32" class="recintos" style="color:#FFF; padding-left:8px">Directorio del IVEC</td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <table width="613" border="0" cellspacing="0" cellpadding="5">
        
        <tr>
          <td class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td> 
     
          
          
       
          </td>
        </tr>
        <tr>
          <td height="1" align="center"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td>
        </tr>

         <tr>
           <td align="left" class="negro14">
           <? $control=1; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px"><strong>Lic. Rodolfo Mendoza Rosendo </strong> <br />
Director General del Instituto Veracruzano de la Cultura <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76 <br />
Extensión :&nbsp;&nbsp;S/E <br />
Correo :&nbsp;&nbsp; rmendozar@ivec.gob.mx<br />
Curriculum :&nbsp;&nbsp;<a href="CV/Semblanza_DG.pdf">CURRICULUM</a></div>
           </td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong> 
  Mtro. Miguel Ángel Aburto Campos</strong> <br />
             Responsable de la Unidad de Acceso a la Información Pública 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
            Domicilio :&nbsp;&nbsp;Xalapeños Ilustres No. 135, Centro Histórico, Xalapa,  Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 818 91 98, 818 04 12 <br />
             Extensión :&nbsp;&nbsp;105 <br />
             Correo :&nbsp;&nbsp;miguel_aburto@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20Depto%20de%20Planeacion%20y%20Seguimiento.pdf">CURRICULUM</a> 
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           
             <strong>Lic. Enrique Becerra Ramos</strong> <br />
Jefe del Departamento  Jurídico <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" />
<input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
                Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Col. Centro, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76 <br />
             Extensión :&nbsp;&nbsp;125 <br />
             Correo :&nbsp;&nbsp;ebecerrar@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20Enrique%20Becerra.pdf">CURRICULUM</a> 
            
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>Lic. Jorge Duarte Bouchez</strong> <br />
             Subdirector de Artes y Patrimonio, Director de la Pinacoteca Diego Rivera 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
            Domicilio :&nbsp;&nbsp;J.J. Herrera No. 5, Centro Histórico, Xalapa, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 818 18 19 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;jduarteb@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV Jorge Duarte.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>Lic. Sergio Agustín Rosete Xotlanihua</strong> <br />
             Jefe del Departamento de Museografía
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
            Domicilio :&nbsp;&nbsp;J.J. Herrera No. 5, Centro Histórico, Xalapa, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 818 18 19 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;museografia@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV Depto Museografía.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>DEPARTAMENTO</strong> <br />
             Ejecutivo de Proyectos Culturales 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;J.J. Herrera No. 5, Centro Histórico, Xalapa, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 818 18 19 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;Sin Correo <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a> 
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Mtra. Hilda Milena Koprivitza Acuña</strong> <br />
             Directora del Museo de Arte del Estado de Veracruz.
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
             Domicilio :&nbsp;&nbsp;Oriente 4 s/n Esquina Sur 25 y 23, Col. Centro, Orizaba,  Ver. <br />
             Teléfono :&nbsp;&nbsp;01(272) 724 32 00 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;mkoprivitza@yahoo.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Mtro. Alejandro Schwartz Hernández</strong> <br />
             Director del Centro Cultural Atarazanas 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;Julio S. Montero s/n Esq. Esteban Morales, Centro  Histórico, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 932 89 21 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;aschswartz@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20Alejandro%20Schwartz.pdf">CURRICULUM</a> 
            
            
            </div></td>
         </tr>
    	 	<tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>Lic. César Segura Gómez</strong> <br />
             Director del Centro Cultural Casa Principal
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
            
             Domicilio :&nbsp;&nbsp;Mario Molina No. 315 entre 5 de Mayo e Independencia,  Centro Histórico, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 932 69 31 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;cesarseguragomez@gmail.com<br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CVCesarS.pdf">CURRICULUM</a>
            
            </div></td>
         </tr> 
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>Mtro. Miguel Ángel Zamudio Abdalá</strong> <br />
             Director del Teatro de la Reforma 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" />
            <input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;Rayón esq. 5 de mayo, C.P. 91700, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 7999 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;teatrodelareforma@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20Miguel%20A%20Zamudio.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Austin Morgan Montes </strong> <br />
             Director del Ex Convento Betlehemita (Recinto Sede del IVEC) 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" />
            <input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Col. Centro, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76 <br />
             Extensión :&nbsp;&nbsp;210 <br />
             Correo :&nbsp;&nbsp;marjapin@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>C. Rolando Torres Hernández</strong> <br />
             Director de la Casa Museo Agustín Lara
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
            Domicilio :&nbsp;&nbsp;Blvd. Ruiz Cortines s/n Esq. Ávila Camacho, Boca del  Rio, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 9370209 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;casamuseoagustinlara@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>C. Rosa María López Martínez</strong> <br />
             Directora del Espacio Cultural Fototeca
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;Callejón el Portal de Miranda No. 9, C.P. 91700, Centro  Histórico, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 932 87 67 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;fototecaveracruzivec@yahoo.com.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20Fototeca.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Arq. Silvia Alejandre Prado</strong> <br />
             Directora de la Galería de Arte Contemporáneo de Xalapa 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
             Domicilio :&nbsp;&nbsp;Xalapeños Ilustres No. 135, Centro Histórico, Xalapa,  Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 817 03 86 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;salejandre@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CVSilviaAlejandre2013.pdf">CURRICULUM</a> 
            
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>Roberto Rodríguez Hernández</strong> <br />
             Director del Jardín de las Esculturas 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">

             Domicilio :&nbsp;&nbsp;Av. Rafael Murillo Vidal s/n Col. Cuauhtémoc, Xalapa,  Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 813 77 53 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;mvelazquezt@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Héctor Herrera Martínez</strong> <br />
             Director del Teatro del Estado &quot;Gral. Ignacio de la Llave&quot;
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
            
            Domicilio :&nbsp;&nbsp;Ignacio de la Llave Esq. Rubén Bouchez s/n, Col.  Tamborrell, C.P. 91000, Xalapa, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 817 41 77, 817 31 10, 818 43 52, Fax. 817 31 10 <br />
             Extensión :&nbsp;&nbsp;13 <br />
             Correo :&nbsp;&nbsp;heherrera@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20Hector%20Herrera.pdf">CURRICULUM</a> 
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Oscar Hernández Beltrán</strong> <br />
             Subdirector de Desarrollo Cultural Regional
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;"> Domicilio :&nbsp;&nbsp;Domicilio de Oficina: Canal s/n Esq. Zaragoza, Centro  Histórico, C.P. 91700, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;114 <br />
             Correo :&nbsp;&nbsp;subdirector.desarrollocultural@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_Desarrollo_Cultural_Regional.pdf">CURRICULUM</a> </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
                       <br />
  <strong>Mtro. Álvaro Alcántara López</strong> <br />
             Jefe del Departamento de Culturas Populares 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            <input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;"> Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             /*Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;113 <br />
             Correo :&nbsp;&nbsp;programasestatalesivec2013@gmail.com <br />*/
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_Culturas_populares.pdf">CURRICULUM</a> 
             </div></td                     
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Mtro. Álvaro Alcántara López</strong> <br />
             Jefe del Departamento de Desarrollo Regional Zona Norte
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" />
            <input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;"> Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;113 <br />
             Correo :&nbsp;&nbsp;programasestatalesivec2013@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a> </div></td>
         </tr>
          <tr>
          <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Mtro. Marco Darío García Franco</strong> <br />
             Jefe del Departamento de Desarrollo Regional Zonar Sur
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
             Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;113 <br />
             Correo :&nbsp;&nbsp;marcodariogarcia.ivec@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_Marco_Dario.pdf">CURRICULUM</a>
            
            </div></td> 
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Josué Martínez Rodríguez </strong> <br />
             Subdirector de Educación e Investigación Artística
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;209 <br />
             Correo :&nbsp;&nbsp;ameza.ivec@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_Educacion_artistica.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Silvia Díaz Sánchez</strong> <br />
             Directora de la Escuela Libre de Música
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;138 <br />
             Correo :&nbsp;&nbsp;elmivec@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20EdM.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Mtra. Ma. Luisa González Maroño</strong> <br />
             Directora del Centro Veracruzano de las Artes
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;"> Domicilio :&nbsp;&nbsp;Independencia No. 929 Esq. Emparan, Centro Histórico,  C.P. 91700, Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 932 74 22 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;marglez19@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20CEVARTM.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong></strong> <br />
             Encargada del Centro para el Desarrollo Artístico Integral
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;"> Domicilio :&nbsp;&nbsp;Fidencio Ocaña No. 46, Col. Ferrer Guardia, C.P. 91020,  Xalapa, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 840 67 96 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp;adrianaduran.cedai@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Mtro. Manuel de Jesús Velázquez Torres</strong> <br />
             Subdirector de Planeación, Seguimiento y Evaluación
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Xalapeños Ilustres No. 135, Centro Histórico, Xalapa,  Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 818 91 98, 818 04 12 <br />
             Extensión :&nbsp;&nbsp;S/E <br />
             Correo :&nbsp;&nbsp; mvelazquezt@ivec.gob.mx <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SemblanzaManuelVelzquez.pdf">CURRICULUM</a> </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Edith Bueno Martínez</strong> <br />
             Jefa del Departamento de Evaluación
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;281 <br />
             Correo :&nbsp;&nbsp;edith_bueno7@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>Mtro. Miguel Ángel Aburto Campos</strong> <br />
             Jefe del Departamento de Planeación y Seguimiento 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Xalapeños Ilustres No. 135, Centro Histórico, Xalapa,  Ver. <br />
             Teléfono :&nbsp;&nbsp;01(228) 818 91 98, 818 04 12 <br />
             Extensión :&nbsp;&nbsp;110 <br />
             Correo :&nbsp;&nbsp;miguel_aburto@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV%20Depto%20de%20Planeacion%20y%20Seguimiento.pdf">CURRICULUM</a>  </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Fabián Eduardo Rivera Texón</strong> <br />
             Subdirector  Administrativo
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" />
            <input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;132 <br />
             Correo :&nbsp;&nbsp;<br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_Administrativo_2.pdf">CURRICULUM</a> </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>L.C. José López Lendechy</strong> <br />
             Jefe del Departamento de Recursos Humanos 
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;"> Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;139 <br />
             Correo :&nbsp;&nbsp;aminperedo@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_RH.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
            <strong>María Guadalupe Moreno Utrera</strong> <br />
             Jefe del Departamento de Recursos Financieros
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;127 <br />
             Correo :&nbsp;&nbsp;samuel_a_macias@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_Recursos_Financieros.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
             <strong>Ing. Joel Ruíz Vásquez</strong> <br />
             Jefe del Departamento de Recursos Materiales y Servicios Generales
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;"> Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;120 <br />
             Correo :&nbsp;&nbsp;jesus.ec@gmail.com<br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_Recursos_Materiales.pdf">CURRICULUM</a></div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>I.S.C Marco Giovanni Turcios Calderón</strong> <br />
             Jefe del Departamento de Tecnologías de la Información
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
             Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp;01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76, <br />
             Extensión :&nbsp;&nbsp;118 <br />
             Correo :&nbsp;&nbsp;sistemas.ivec@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/CV_TI.pdf">CURRICULUM</a> </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Oved Contreras González</strong> <br />
             Enlace de Comunicación Social
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;Canal s/n Esq. Zaragoza, Centro Histórico, C.P. 91700,  Veracruz, Ver. <br />
             Teléfono :&nbsp;&nbsp; 01(229) 931 69 62, 931 69 94, 931 43 96, 932 43 76 <br />
             Extensión :&nbsp;&nbsp;210 <br />
             Correo :&nbsp;&nbsp;violepachecog@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Lic. Gustavo Fox Rivera</strong> <br />
            Director de el Ágora de la ciudad
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" />
            <input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;Bajos de Parque Juárez S/n  Jalapa Enríquez Centro, 91000 Xalapa Enríquez, Veracruz-Llave <br />
             Teléfono :&nbsp;&nbsp; 01 (228) 8 18 57 30 – 8 12 22 03 <br />
             Extensión :&nbsp;&nbsp;s/e <br />
             Correo :&nbsp;&nbsp;tavofox02@gmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Antrop. Erick Ali Castillo Cerecedo</strong> <br />
            Director del Museo Teodoro Cano
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;Calle Rodolfo Curti, No. 101 Centro Barrio de Santa Cruz <br />
             Teléfono :&nbsp;&nbsp; 01 (784) 8 42 47 51  <br />
             Extensión :&nbsp;&nbsp;s/e <br />
             Correo :&nbsp;&nbsp; museoteoc@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         <tr>
           <td align="left" class="negro14">  <? $control++; ?>
           <div style="float:left; width:600px; padding:6px 6px 0 6px">
           <strong>Mtra. Rosa Aurora Palmero Andrade</strong> <br />
            Titular de la Unidad de Género
            <img src="imagenes/add.png" alt="Mas/Menos Info" title="Mas/Menos Info"  id="img<?=$control;?>" style="cursor:pointer" onclick="checa(<?=$control;?>)" /><input name="oculto<?=$control;?>" id="oculto<?=$control;?>" type="hidden" value="0" /></div> <div id="info<?=$control;?>" style="float:left; width:600px; padding:6px 6px 0 6px; display:none;">
            
             Domicilio :&nbsp;&nbsp;Av. Murillo Vidal S/N Colonia Cuauhtemoc Xalapa Ver. <br />
             Teléfono :&nbsp;&nbsp; 01 (228) 8 13 77 53  <br />
             Extensión :&nbsp;&nbsp;s/e <br />
             Correo :&nbsp;&nbsp; ra.palmero@hotmail.com <br />
             Curriculum :&nbsp;&nbsp;<a href="CV/SCV.pdf">CURRICULUM</a>
            
            </div></td>
         </tr>
         
         <tr>
           <td align="left" class="negro14"><p>&nbsp;</p></td>
         </tr>
         <tr>
           <td align="left" class="Arial23Gris">&nbsp;</td></tr>
        
        </table>
      </div>
      </td>
      <td width="17">&nbsp;</td>
      <td width="300" valign="top" bgcolor="#E8E2D4">&nbsp;</td>
    </tr>
    </table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>