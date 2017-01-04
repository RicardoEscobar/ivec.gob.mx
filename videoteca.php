<? session_start();
require 'db.class.php';
require 'conf.class.php';
require 'fecha.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$toy=0;
function replace($cadena){
$cadena=str_replace("select","",$cadena);
$cadena=str_replace("delete","",$cadena);
$cadena=str_replace("drop","",$cadena);
$cadena=str_replace("'","",$cadena);
$cadena=str_replace("*","",$cadena);
$cadena=str_replace(";","",$cadena);
$cadena=str_replace("?","",$cadena);
$cadena=str_replace(">","",$cadena);
$cadena=str_replace("<","",$cadena);
$cadena=str_replace("script","",$cadena);
return $cadena;
}

include ("admin/Paginated.php");
include ("admin/DoubleBarLayout.php") ;
$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];
$secc=$_GET['secc'];
if ($secc!=''){ $_SESSION['lasecces']=$secc; }
$secc=$_SESSION['lasecces'];
$secc1=$_GET['secc1'];
if ($secc1>0){ $cad=' and id='.$secc1.' ';  }
$abcd=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");

$rsx= $bd->ejecutar("select Id from videos order by Id desc ");	

$names= array();
while ($arra=@$bd->obtener_fila($rsx,0))
{
	$names[]=$arra['Id'];

}


  $id=replace($_GET['id']);
  if (is_numeric($id)){
	  $vid2=$bd->ejecutar("select * from videos where Id=$id order by Id desc limit 1");
	  
	  } else if ($verp>0) 
	  {  $vid2=$bd->ejecutar("select * from videos where posicion=$verp order by Id desc limit 1"); }
	  else
	  {
  $vid2=$bd->ejecutar("select * from videos order by vp desc, Id desc limit 1"); }
  
  $row2=$bd->obtener_fila($vid2,0); 
  $le=$row2['Id'];
  $bd->ejecutar("update videos set conta=conta+1 where Id=$le");
  $pos=$row2['posicion'];
  $gns=$bd->ejecutar("select * from seccion where id=$pos");
$ro=$bd->obtener_fila($gns,0);
$nomb=$ro['nombre'];




									
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['videopagesss']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['videopagesss'];
		}
		$pagedResults = new Paginated($names, 10, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
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
</script>
<body>

<div style="width:930px; margin:auto;  ">

<?  include "headers.php"; ?>
<div style="width: 930px; float: left;"><? include "menu.php"; ?></div>
<div style="width: 930px; float: left;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="64" align="left" bgcolor="#002749" class="recintos" style="color:#FFF; padding-left:8px">Videoteca</td>
    </tr>
</table>
</div>
<div style="width: 930px; float: left; margin: 10px 0;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" bgcolor="#FFFFFF">
      <div id="resultados">
      <table width="613" border="0" align="center" cellpadding="5" cellspacing="0">
        
        <tr>
          <td colspan="2" class="Arial50C666">
   
          </td>
        </tr>
        <tr>
          <td colspan="2"> 
     
          
          
       
          </td>
        </tr>

         <tr>
           <td colspan="2" align="left" class="negro14"><div style="width: 610px; float: left">
<div style="width: 610px; float: left;">
  <div class="fecha" style="width: 610px; float: right; text-align: right; padding-bottom: 5px;"><?=fechac($row2['fecha']);?></div>
</div>
<div style="width: 610px; float: left"> 

<? $video=stripslashes($row2['thumb']);
	$video=str_replace('width','width="610" xx',$video);
	$video=str_replace('height','height="380" yy',$video);
	echo $video
?>

</div>
<div class="Arial23Gris" style= "width: 600px; float: left; /* [disabled]background-color: #000; */ padding: 5px;"><?=stripslashes($row2['resumen']);?>

</div>
<div class="resumen" style="width: 600px; margin-top: 10px; float: left; padding: 5px;">
<?=stripslashes($row2['descri']);?>
</div>
           </div></td>
         </tr>
         <tr>
           <td colspan="2" align="left" class="Arial23Gris"><div style="margin:auto; height:1px; width:603px; background-color:#CCC"></div></td></tr>
        
        </table>
      </div>
      </td>
      <td width="17">&nbsp;</td>
      <td width="300" valign="top" bgcolor="#E8E2D4"><div style="width:275px; margin:12px; float:left">
      <?  if ($aid!='' and $aid>0){ $d=''; $a='none'; } else { $d='none'; $a==''; }?>     
      <div id="entradiv" style="float: left; width: 275px; background-color: #002749; display: <?=$d;?>;" >  
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
          <tr bgcolor="#002749">
            <td>
            
            
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="33%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr bgcolor="#002749">
            <td align="right" class="Arial12Bco">Usuario:</td>
            <td><label for="user"></label>
              <input type="text" name="user" id="user" style="width:98%" /></td>
          </tr>
          <tr bgcolor="#002749">
            <td align="right" class="Arial12Bco">Contraseña:</td>
            <td><label for="passw"></label>
              <input type="password" name="passw" id="passw" style="width:98%" /></td>
          </tr>
          <tr bgcolor="#002749">
            <td>&nbsp;</td>
            <td align="right"><img src="imagenes/entra.png" width="50" height="26" style="cursor:pointer;" onclick="javascript:loggeo()" /></td>
            </tr>
          <tr bgcolor="#002749">
            <td colspan="2" align="center" class="Arial12Bco"><a href="registro.php" class="Arial12Bco"><strong>Registrarse</strong></a></td>
          </tr>
          <tr bgcolor="#002749">
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
    <tr>
      <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top" bgcolor="#E8E2D4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><div style="width: 930px; float: left; /* [disabled]background-color:#292929; */ margin-top: 10px; /* [disabled]border: 1px solid #666666; */">
<a name="resultados"></a>
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top"><table width="96%" border="0" align="left" cellpadding="0" cellspacing="4">
              <tr>
                <td width="29%" valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
       <? 
		$busq=$bd->ejecutar("select * from videos where Id in ($ids) order by Id desc ");
		while ($row5 = $bd->obtener_fila($busq,0)) { 
		$id=$row5['id'];
	    $url='admin/'.$row5['url'].$row5['Id'].'_3.jpg';
		if (!file_exists($url)){
			$url='imagenes/dv.jpg';
		}
									?>
                  <?  if ($k==0){
									               ?>
                  <tr>
                    <?   $j=1;  }?>
                    <?  if ($j<=10)  {
						
						 ?>
                    <td align="center" valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px" >
                      <tr>
                        <td height="87" align="center" valign="top" ><?
						
						$parair=$row5['id'];
					
					
						?>
                          <a href="video.php?id=<?=$row5['Id'];?>" title="Ir a Galeria">  <img src="<?=$url?>" width="145" border="0" style="max-height:110px"    /> </a></td>
                        </tr>
                      <tr>
                        <td align="center" class="Arial12Gris"> <a href="video.php?id=<?=$row5['Id'];?>" title="Ver Galeria" class="resumen"> <?  echo stripslashes($row5['resumen']);?>
                          &nbsp;</a></td>
                        </tr>
                      <tr>
                        <td class="piefoto"></td>
                        </tr>
                      </table></td>
                    <? $j=$j+1; }  
										if ($j<=5){ $k=1; }
										else { $k=0; } 
										if ($k==0){ ?>
                    </tr>
                  <?    } 
									  }  ?>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td  align="center" class="mas" style=" margin-top:10px; padding:7px; font-size:12px"><?php  $pagedResults->setLayout(new DoubleBarLayout());
	      echo $pagedResults->fetchPagedNavigation(); ?></td>
          </tr>
        </table>
</div></td>
      </tr>
    </table>
</div>
<div style="width: 930px; float: left;"></div>
<div style="width: 930px; float: left;"><? include "footer.php";?></div>
</div>
</body>
</html>