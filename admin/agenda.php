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
$secc=$_POST['secc1'];
if ($secc!=''){ $_SESSION['laseccderec']=$secc; }
$secc=$_SESSION['laseccderec'];
if ($secc>0){ $lacad=' and secc1='.$secc;  }  else { $lacad==''; } 
$rsx=$bd->ejecutar("select id from mynews where 1 $lacad order by newsdate desc");	
  

$names= array();
while ($arra=@$bd->obtener_fila($rsx,0))
{
	$names[]=$arra['id'];

}

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
          <td align="left"  class="negro1">
          <form action="agenda.php" method="post" enctype="multipart/form-data" name="form1">
          <table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            <tr>
              <td colspan="8" align="center"  class="Verdana16Ngo"><strong>Administrar Agenda
                <? if ($kp['catalogo']==7 or $kp['catalogo']==5 or $kp['catalogo']==3 or $kp['catalogo']==1){ ?>
                <a href="addagenda.php"><img src="imagenes/m.png" border="0"  title="Nuevo"/></a>
                <? } ?>
              </strong></td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="5" colspan="7" align="left"  class="text2"></td>
              </tr>
            <tr class="Hevel16Gris">
              <td colspan="2" align="left"  class="text2">Organizar:</td>
              <td colspan="3" align="left"  class="text2"><select name="secc1" id="secc1" onchange="document.forms[0].submit()">
             <option value="0" <? if (0==$secc){ echo 'selected="selected"'; } ?> >Todos</option>
               
                <?  $bs=$bd->ejecutar("select * from recintos where edo=1 order by id asc");  
					$bs2=$bd->ejecutar("select * from recintos where edo!=1 order by id asc"); 
			
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
               
              </select></td>
              <td align="center"  class="text2"></td>
              <td align="center"  class="text2"></td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="5" colspan="7" align="left"  class="text2"></td>
              </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="text2"><strong>Nombre</strong></td>
              <td align="left"  class="text2"><strong>Organiza</strong></td>
              <td align="left"  class="text2"><strong>Inicio</strong></td>
              <td align="left"  class="text2"><strong>Fin</strong></td>
              <!--<td align="left" class="text2">Grupo</td>-->
              <td colspan="3" align="center"  class="text2"><strong>Acciones</strong></td>
            </tr>
            <?
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['artistaspage']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['artistaspage'];
		}
		$pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}				
						$sqll="Select * from mynews where id in ($ids) order by newsdate desc";
						$resultl =@$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
						$idgrup=$rowl['id'];
						?>
            <tr class="Hevel16Gris" <? if ($wf%2==0) { echo $sty; } ?> >
              <td align="left" valign="middle"  class="Arial12Gris"><strong>
                <?=$rowl['newstitle']?>
              </strong></td>
              <td align="left" valign="middle"  class="Arial12Gris"><?php 
		$idsecc=$rowl['secc1'];
		$secc="select * from  recintos where id=$idsecc";
		$ksecc=$bd->ejecutar($secc);
	    $sef=@$bd->obtener_fila($ksecc,0);
		echo ($sef['nombre']); ?></td>
              <td align="left" valign="middle"  class="Arial12Gris">
               <?  $f1=explode(" ",$rowl['inicio']);
				echo $bd->fechacp($f1[0]); ?> 
                <?  echo ($f1[1]); ?>
              </td>
              <td align="left" valign="middle"  class="Arial12Gris">
               <?  $f1=explode(" ",$rowl['fin']);
				echo $bd->fechacp($f1[0]); ?> 
                <?  echo ($f1[1]); ?>
              </td>
              <td align="center" background="../imagen/back1.jpg"  class="link"> <?  if (file_exists($rowl['url'].$rowl['id'].'.jpg')){ ?>
                <a href="<?=$rowl['url'].$rowl['id'].'.jpg'?>" target="new"><img src="imagenes/Slideshow.png" width="23" height="23" border="0" /></a>
                <? } ?></td>
              <td align="center" background="../imagen/back1.jpg"  class="link">
	<? if ($kp['permiso']>=99 or ($kp['permiso']==80 and $rowl['secc1']>13) or ($kp['permiso']==70 and $rowl['secc1']<12) or $kp['permiso']==$rowl['secc1']){ ?>
                <a href="upagenda.php?id=<?=$rowl['id'];?>" ><img src="imagenes/up.png" border="0" title="Modificar" /></a>
                <? } ?></td>
              <td align="center" background="../imagen/back1.jpg"  class="link">
			  
			  <? 
			  //echo $kp['permiso'].' '.$rowl['secc1'].'<br>';
			  if ($kp['permiso']>=99 or ($kp['permiso']==80 and $rowl['secc1']<13) or ($kp['permiso']==70 and $rowl['secc1']>12) or $kp['permiso']==$rowl['secc1']){ ?>
                <a href="delagenda.php?id=<?=$rowl['id'];?>" class="text1" onclick = "if (! confirm('&iquest;Realmente desea eliminar : <?=$rowl['nombre']?>?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a>
                <? } ?></td>
            </tr>
            <?  $wf++; } ?>
          </table></form></td>
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