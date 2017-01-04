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
#resultados a { color:#B60016; }
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
    <td height="64" align="left" bgcolor="#B60016" class="recintos" style="color:#FFF; padding-left:8px">Organigrama</td>
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
              <td class="Arial50C666">
                
                </td>
              </tr>
            <tr>
              <td> 
                
                
                
                
                </td>
              </tr>
            <tr>
              <td height="1" align="center" bgcolor="#FFFFFF"><div style="margin: auto; height: 1px; width: 920px; background-color: #CCC"></div></td>
              </tr>
            <tr>
              <td align="left" bgcolor="#FFFFFF" class="negro14">
              
              <? 
			  $bor=$bd->ejecutar("select * from organigrama order by id desc limit 1");
			  $row=$bd->obtener_fila($bor,0);
			  
			  ?>
              <img src="admin/<?=$row['url']?>" width="920" height="632" />
              <!--<p><a href="img/Organigrama autorizado 2011.pdf" target="_blank"><img src="img/Organigrama.jpg" width="920" height="632" /></a></p>--></td>
              </tr>
            <tr>
              <td align="left" bgcolor="#FFFFFF" class="Arial23Gris">&nbsp;</td></tr>
            
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