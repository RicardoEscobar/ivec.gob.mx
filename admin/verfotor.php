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


 
$seccdr=$_POST['secc1'];
if ($seccdr!=''){ $_SESSION['laseccderecsd']=$seccdr; }
$seccdr=$_SESSION['laseccderecsd'];

 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Notas</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td bgcolor="#000000" >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; /* [disabled]background-color:#000000; */">
    <? include ('menu.php'); ?>
    
    
    <? 
	
	
	if ($kp['permiso']<70){
      $seccdr=$kp['permiso'];
	  $_SESSION['laseccderecsd']=$seccdr;
	  $agrega='';  } 
	else {  
	
	if ($cadenax)
	$agrega='<option value="-1" '.$cadenax.'>Seleccione</option> ';  }
	
$rsx=$bd->ejecutar("select id from  fotosr where recinto=$seccdr order by id desc");	
 

$names= array();
while ($arra=@$bd->obtener_fila($rsx,0))
{
	$names[]=$arra['id'];

}
	 ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">


<table width="900" align="center">
  <tr>
    <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
     
    <tr>
      <td align="center" ><table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" >
        <tr class="columna">
          <td align="left"  class="negro1"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" >
            <tr>
              <td align="center" class="tituloNota">  <form method="post" action="<?=$_SERVER['php_self']; ?>"><span class="Verdana16Ngo"><strong>Fotos del Recinto  :. 
		
            
              <select name="secc1" id="secc1" onchange="document.forms[0].submit()" style="max-width:200px">
           
             <?=$agrega;?>
                  <option value="100" <? if ($secc==100){ echo 'selected="selected"'; } ?>>Portada</option>
                <?  
				$secc=$seccdr;
				if ($kp['permiso']>=99) {
					$bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
					}
				if ($kp['permiso']==80) {
					$bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo>100 order by id asc"); 
					
				}
				if ($kp['permiso']==70) {
					$bs=$bd->ejecutar("select * from recintos where edo>100 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
				}
				if ($kp['permiso']<70) {
					$tipo=$kp['permiso'];
					$bs=$bd->ejecutar("select * from recintos where edo=1 and id=$tipo order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1  and id=$tipo order by id asc"); 
				}
			
					 ?>
                     <optgroup label="RECINTOS CULTURALES">
			 
                <? 
			  $f=0;
			   $total=$bd->num_rows($bs);
			  	while($rows=$bd->obtener_fila($bs,0)){  ?>
               
               <option value="<?=$rows['id']?>" <? if ($rows['id']==$secc){ echo 'selected="selected"'; } ?> ><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup> <optgroup label="SUBDIRECCIONES">
                 <? 
			  $f=0;
			  
			 
			   $total=$bd->num_rows($bs2);
			  	while($rows=$bd->obtener_fila($bs2,0)){  ?>
              
               
               
               <option value="<?=$rows['id']?>" <? if ($rows['id']==$secc){ echo 'selected="selected"'; } ?>><?=$rows['nombre'];?></option>
                
               <?     }  ?></optgroup>
               
              </select>
              
                <? 
				if ($seccdr>0){ ?>
                <a href="upfotor.php?rec=<?=$seccdr;?>"><img src="imagenes/m.png" width="24" height="20" border="0" /></a><? } ?></strong></span>
                <? if ($secc>0 and $secc<100){ ?>
                 <a href="uprecinto.php?id=<?=$secc?>"><img src="imagenes/up.png" alt="mODIFICAR iNFO" width="19" height="23" /></a><? } ?>
              </form></td>
              </tr>
           
              <tr>
                <td align="left" class="resumenNota"> </td>
              </tr>
           
            <tr class="columna">
              <td align="left"  class="negro1"><table cellspacing="8" width="20%">
                <tr>
                  <!--miniaturas-->
                  <td width="29%" valign="top"><table width="94%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                    <? 
									
									$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['pageparagaladmin']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['pageparagaladmin'];
		}
		$pagedResults = new Paginated($names, 18, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}
									
									
						$busq=$bd->ejecutar("SELECT  *  FROM fotosr  where id in ($ids) order by id desc");
						while ($row5 = $bd->obtener_fila($busq,0)) { 
						$id=$row5['id'];
				?>
                    <?  if ($k==0){
 				?>
                    <tr>
                      <?   $j=1;  }?>
                      <?  if ($j<=12)  {
						
						 ?>
                      <td width="100%" align="center" valign="top" height="66"><table width="97%" cellpadding="0" >
                        <tr>
                          <td width="201" height="87" valign="top" ><img src="<?=$row5['url']?><?=$row5['id']?>_c.jpg" border="0" width="130" style="max-height:90px"   /></td>
                        </tr>
                        <tr>
                          <td class="Arial12Gris"><?=substr($row5['titulo'],0,50);?></td>
                        </tr>
                        <tr>
                          <td class="piefoto"><table width="69" border="0" align="center" class="otrasnotas">
                            <tr>
                              <td ><a href="crop4.php?id=<?=$row5['id'];?>&ir=gal" title="Volver a Recortar"><img src="imagenes/pik.png" width="21" height="21" border="0" /></a></td>
                              <td >&nbsp;</td>
                              <td><a href="delfotor.php?id=<?=$row5['id'];?>&r=nota" class="text1"  onclick = "if (! confirm('¿Realmente desea eliminar la foto?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a></td>
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
                  <!--foto grande-->
                  <!--final foto grande-->
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr></table>
      </td>
  </tr>
  <tr>
    <td align="center" class="Arial12Gris">
    <form id="form1" name="form1" method="get" action="<? $_SERVER['php_self']; ?>">
      <p>
        <?php  $pagedResults->setLayout(new DoubleBarLayout());
	      echo $pagedResults->fetchPagedNavigation(); ?>
        ir a pagina
        <input name="page" type="text"  id="page" size="5" style="width:50px" />
        <input type="submit" name="ir" value="ir" />
      </p>
    </form>
    </td>
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