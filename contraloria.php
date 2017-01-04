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
#resultados a { color:#005D47; }
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
    <td height="64" align="left" bgcolor="#005D47" class="recintos" style="color:#FFF; padding-left:8px">Cómite de Contraloría Ciudadana del IVEC</td>
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
           <td align="left" class="negro14"><table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0">
             <tbody>
               <tr>
                 <td colspan="3"><div align="justify">
                   <p><strong>&ldquo;Los Comités de  Contraloría Ciudadana, son organismos autónomos de las dependencias y entidades  de la Administración Pública Estatal, cuyo objetivo será colaborar en las  acciones de control y vigilancia de las obras, acciones y servicios que proporciona  la Administración Pública Estatal&rdquo;.</strong></p>
                 </div></td>
               </tr>
               <tr>
                 <td colspan="3">   </td>
                 </tr>
               <tr>
                 <td colspan="3"><a href="img/Gaceta25Jul2005.pdf" target="_blank">Decreto publicado en la Gaceta Oficial del Estado de Veracruz el 25 de julio de 2005</a> &lt;--- Descargalo</td>
               </tr>
               <tr>
                 <td colspan="3">   </td>
                 </tr>
               <tr>
                 <td height="17" colspan="3"><p><strong>Creadores, académicos, promotores  culturales, representantes de la iniciativa privada y de la sociedad civil  integran el Comité de Contraloría Ciudadana &ldquo;Adelante&rdquo; del Instituto  Veracruzano de la Cultura (IVEC), con el objetivo de fortalecer las acciones  orientadas a la transparencia de la gestión del gobernador Javier Duarte de  Ochoa y contar con la opinión de la sociedad sobre la calidad de los servicios  que recibe.</strong><br />
                   <strong>La constitución del CCCA-Xalapa, se  llevó a cabo el 3 de diciembre de 2012 en una reunión encabezada por el titular  del IVEC Mtro. Alejandro Mariano Pérez, quien reconoció el interés y compromiso  de los integrantes por sumarse a una empresa que favorece a toda la comunidad  veracruzana, tanto artística, cultural y académica, como a empleados, usuarios  y beneficiarios directos de las diversas actividades que permanentemente se  llevan a cabo en los espacios culturales del Instituto.</strong><br />
                   <strong>Dicho Comité tiene como tareas  prioritarias vigilar la calidad, eficiencia y transparencia de los servicios  que ofrece la institución cultural en todas las áreas de su responsabilidad. </strong><br />
                   <strong>Durante el presente año 2013, se  instalará un nuevo Comité de Contraloría Ciudadana &ldquo;Adelante&rdquo; que atienda y  verifique los servicios que ofrecen los espacios culturales del IVEC en la  ciudad de Veracruz. </strong></p></td>
               </tr>
               <tr>
                 <td colspan="3">   </td>
                 </tr>
                  <tr>
                 <td colspan="3">   <strong>INTEGRANTES DEL COMITÉ DE CONTRALORÍA CIUDADANA &ldquo;ADELANTE&rdquo;:</strong></td>
                 </tr>
                  <tr>
                 <td colspan="3">   </td>
                 </tr>
               <tr>
                 <td><div align="center"><strong>RAFAEL BLANCO APARICIO</strong></div></td>
                 <td> </td>
                 <td><div align="center">
                   <p>PRESIDENTE</p>
                 </div></td>
               </tr>
               <tr>
                 <td><div align="center"><img src="http://www.culturaveracruz.ivec.gob.mx/portal%20ivec/img/lineagris.png" border="1" height="164" width="150" /></div></td>
                 <td><div align="right"><img src="http://www.culturaveracruz.ivec.gob.mx/portal%20ivec/img/lineagris.png" border="0" height="165" width="2" /></div></td>
                 <td><div align="justify">
                   <p>                     ACTIVIDAD: EMPRESARIO<br />
                     CORREO: <a href="mailto:blancoaparicio@yahoo.com.mx">blancoaparicio@yahoo.com.mx</a></p>
                 </div></td>
               </tr>
               <tr>
                 <td> </td>
                 <td colspan="2"><div align="justify"></div></td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td colspan="3">&nbsp;</td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td><div align="center">
                   <p><strong>JUSTO  FERNÁNDEZ GARIBAY</strong></p>
                 </div></td>
                 <td> </td>
                 <td><div align="center">
                   <p>SECRETARIO</p>
                 </div></td>
               </tr>
               <tr>
                 <td><div align="center"><img src="img/Mar%C3%ADa%20de%20Lourdes%20Azpiri%20Avenda%C3%B1o.jpg" border="1" height="164" width="150" /></div></td>
                 <td><div align="right"><img src="http://www.culturaveracruz.ivec.gob.mx/portal%20ivec/img/lineagris.png" border="0" height="165" width="2" /></div></td>
                 <td><div align="justify">
                   <p>ACTIVIDAD: ARQUITECTO, EMPRESARIO<br />
                     CORREO: <a href="mailto:justofg@gmail.com">justofg@gmail.com</a></p>
                 </div></td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td colspan="3">&nbsp;</td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td><div align="center"><strong>MARTHA HUERTA MONTANO</strong></div></td>
                 <td> </td>
                 <td><div align="center">
                   <p>VOCAL &ldquo;A&rdquo;</p>
                 </div></td>
               </tr>
               <tr>
                 <td><div align="center"><img src="img/Justo%20Fern%C3%A1ndez%20Garibay.jpg" border="1" height="164" width="150" /></div></td>
                 <td><div align="right"><img src="http://www.culturaveracruz.ivec.gob.mx/portal%20ivec/img/lineagris.png" border="0" height="165" width="2" /></div></td>
                 <td><div align="justify">
                   <p>ACTIVIDAD: ARTISTA ARTES ESCÉNICAS<br />
                     CORREO: <a href="mailto:huertamontano@hotmail.com">huertamontano@hotmail.com</a></p>
                 </div></td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td colspan="3">&nbsp;</td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td><div align="center">
                   <p><strong>MIGUEL  ÁNGEL DELGADO CALDERÓN</strong></p>
                 </div></td>
                 <td> </td>
                 <td><div align="center">
                   <p>VOCAL &ldquo;B&rdquo;</p>
                 </div></td>
               </tr>
               <tr>
                 <td><div align="center"><img src="img/Maria%20Pilar%20Caro%20S%C3%A1nchez.jpg" border="1" height="164" width="150" /></div></td>
                 <td><div align="right"><img src="http://www.culturaveracruz.ivec.gob.mx/portal%20ivec/img/lineagris.png" border="0" height="165" width="2" /></div></td>
                 <td><div align="justify">
                   <p>ACTIVIDAD: ARTISTA MÚSICO<br />
                     CORREO: <a href="mailto:macoles1@hotmail.com">macoles1@hotmail.com</a></p>
                 </div></td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td colspan="3">&nbsp;</td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td><div align="center">
                   <p><strong>ANTONIO  OCHOA ACOSTA</strong></p>
                 </div></td>
                 <td> </td>
                 <td><div align="center">
                   <p>VOCAL &ldquo;C&rdquo;</p>
                 </div></td>
               </tr>
               <tr>
                 <td><div align="center"><img src="img/Sergio%20V%C3%A1squez%20Z%C3%A1rate.jpg" border="1" height="164" width="150" /></div></td>
                 <td><div align="right"><img src="http://www.culturaveracruz.ivec.gob.mx/portal%20ivec/img/lineagris.png" border="0" height="165" width="2" /></div></td>
                 <td><div align="justify">
                   <p>ACTIVIDAD: ARQUITECTO, FUNCIONARIO PÚBLICO <br />
                     CORREO: <a href="mailto:urbanoxalapa@hotmail.com">urbanoxalapa@hotmail.com</a></p>
                 </div></td>
               </tr>
               <tr>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>
               <tr>
                 <td colspan="3">&nbsp;</td>
               </tr>
               
               
               <tr>
                 <td colspan="3">&nbsp;</td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
             </tbody>
           </table>             <p>&nbsp;</p></td>
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