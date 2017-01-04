<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 


include ("Paginated.php");
include ("DoubleBarLayout.php") ;
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();

 
	


$verp=$_GET['verp'];
if ($verp=='')
{
	$verp=$_SESSION['verpgal'];
}
if ($verp!='')
{
	$_SESSION['verpgal']=$verp;
}
if ($verp=='')
{
	$verp='t';
	$_SESSION['verpgal']=$verp;
	
}

if ($verp=='t'){
$rsx= mysql_query("select Id from videos  order by Id desc ");	
}
if ($verp=='n'){
$rsx= mysql_query("select Id from videos where id_nota>1 order by Id desc ");	
}
if ($verp=='g'){
$rsx= mysql_query("select Id from videos where id_nota<1 or id_nota is null order by Id desc ");	
}
if ($verp>0){
$rsx= mysql_query("select Id from videos where posicion=$verp order by Id desc ");		
}

$names= array();
while ($arra=@mysql_fetch_array($rsx))
{
	$names[]=$arra['Id'];

}

 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?=$pageTitle;?>
:. Admin - Videos</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<script language="javascript">
function buscar(dato){ 
	$.post("buscaf.php", {dato:dato}, function(data){
		$("#resultado").html(data);
	});
}

</script>


<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
 

</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td bgcolor="#000000" >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; /* [disabled]background-color:#000000; */">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
     
    <tr>
      <td align="center" >
    <table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" >
      <tr>
        <td width="207" colspan="2" align="center" class="tituloNota"><span class="Verdana16Ngo"><strong>Videos</strong></span> <strong><a href="addvideo.php"><img src="imagenes/m.png" border="0"  title="Nuevo"/></a></strong> &nbsp;&nbsp;</td>
      </tr>
      <form method="get" action="<?=$_SERVER['php_self']; ?>">
              <tr>
                <td colspan="2" align="left" class="Arial12Gris">&nbsp;
                  </td>
                </tr>
              </form>

      <tr class="columna">
        <td align="left"  class="negro1">
          <table width="96%" border="0" cellpadding="0" cellspacing="4">
            <tr>
              <!--miniaturas-->
              <td width="29%" valign="top"><table width="94%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                <? 
				$page = $_GET['page'];
				if ($page!='')
				{
					$_SESSION['pageparagaladminvv']=$page;
				}
				if ($page=='')
				{
					$page=$_SESSION['pageparagaladminvv'];
				}
				$pagedResults = new Paginated($names, 18, $page);
				$ids='0';
				while($row = $pagedResults->fetchPagedRow()) {
					$ids.=','.$row;
				}
									
									
						$busq=mysql_query("SELECT  *  FROM videos  where Id in ($ids) order by Id desc");

									while ($row5 = $bd->obtener_fila($busq,0)) { 
									   $id=$row5['Id'];
									   $url=$row5['url'].$row5['Id'].'_3.jpg';
									   if (!file_exists($url))
									   { $url=$row5['url'].$row5['Id'].'_56.jpg'; }
									   if (!file_exists($url))
									   { $url=$row5['url'].$row5['Id'].'_3.jpg'; }
									?>
                <?  if ($k==0){
					?>
                <tr>
                  <?   $j=1;  }?>
                  <?  if ($j<=12)  {
						
						 ?>
                  <td width="100%" align="center" valign="top" height="66"><table width="20%" cellpadding="0" >
                    <tr>
                      <td width="201" height="87" align="center" valign="top" > <img src="<?=$row5['url']?><?=$row5['Id']?>_3.jpg" border="0" width="130" style="max-height:90px"   /> </td>
                      </tr>
                    <tr>
                      <td class="arial11Gris"><?=substr($row5['resumen'],0,50);?></td>
                      </tr>
                    <tr>
                      <td class="piefoto"><table width="67" border="0" align="center" class="otrasnotas">
                        <tr>
                          <td width="28" ><a href="upvideo.php?id=<?=$row5['Id'];?>" class="text1"><img src="imagenes/up.png" border="0" title="Modificar" /></a></td>
                          <td width="29"><a href="delvideos.php?id=<?=$row5['Id'];?>" class="text1" onClick = "if (! confirm('¿Eliminar?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  <? $j=$j+1; }  
										if ($j<=6){ $k=1; }
										else { $k=0; } 
										if ($k==0){ ?>
                  </tr>
                <?    } 
									  }  ?>
                </table></td>
              <!-- final miniaturas-->
              <!--videos grande-->
              <!--final videos grande-->
              </tr>
            </table>
          
          </td>
      </tr>
    </table>
    </td>
    </tr></table>
      </td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="get" action="<? $_SERVER['php_self']; ?>">
      <?php  $pagedResults->setLayout(new DoubleBarLayout());
	      echo $pagedResults->fetchPagedNavigation(); ?>
      <span class="copy">ir a pagina</span>
      <input name="page" type="text" style="max-width:50px"  id="page" size="5" />
      <input type="submit" name="ir" value="ir" />
    </form></td>
  </tr>
</table>
 


           </td>
</tr>  <tr style="border: 0px; background: #000">
      <td height="37" align="left" class="bcoabajo" >
      <? include "footer.php"; ?> 
      </td>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} ?>