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


 

$rsx=$bd->ejecutar("select id from artistas_datos order by nombre asc");	
  

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
<script language="javascript">
 	function estado(bato){
		var etdo=$("#idbato"+bato).val();
		etdo=parseInt(etdo);	
		 if (etdo==1) { etdo=0;  } else { etdo=1; }
		 $.post("cambiaedo.php", {bato:bato,etdo:etdo}, function (data) {  
	 
		 });
		
		if (etdo == 0){ //se susende 	
		 document.getElementById("laimagen"+bato).src = "imagenes/favooff.png";		 
		 $("#idbato"+bato).val("0");
		
		}  else { //se activa
		 document.getElementById("laimagen"+bato).src = "imagenes/favo.png";
		$("#idbato"+bato).val("1");
		 
		
		}
	}
	function quitafoto(dude){
		 $.post("delfotodude.php", {dude:dude}, function (data) {  
	      document.getElementById("fotodude"+dude).src = "imagenes/no.png";
		  $("#ar"+dude).css("display","none");
		 });	
	}
	function quitacurr(dude){
		 $.post("quitacurr.php", {dude:dude}, function (data) {   
		  $("#arc"+dude).css("display","none");  
		  $("#arcq"+dude).css("display","none");		  
		 });	
	}
 
</script>

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
          <td align="left"  class="negro1"><table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            <tr>
              <td colspan="8" align="center"  class="Verdana16Ngo"><strong>Administrar Artistas
                <? if ($kp['catalogo']==7 or $kp['catalogo']==5 or $kp['catalogo']==3 or $kp['catalogo']==1){ ?>
                <a href="addartista.php"><img src="imagenes/m.png" border="0"  title="Nuevo"/></a>
                <? } ?>
              </strong></td>
            </tr>
            <tr class="Hevel16Gris">
              <td width="93" align="left"  class="text2"><strong>Foto</strong></td>
              <td width="343" align="left"  class="text2"><strong>Nombre</strong></td>
              <!--<td align="left" class="text2">Grupo</td>-->
              <td colspan="5" align="center"  class="text2"><strong>Acciones</strong></td>
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
						$sqll="Select * from artistas_datos where id in ($ids) order by nombre asc";
						$resultl =@$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
						$idgrup=$rowl['id'];
						?>
            <tr class="Hevel16Gris" <? if ($wf%2==0) { echo $sty; } ?> >
              <td align="center" valign="middle"  class="Arial12Gris">
              <? if (file_exists('../admina/'.$rowl['foto'].$rowl['id'].'.jpg')){ ?>
              <img src="<?='../admina/'.$rowl['foto'].$rowl['id'].'.jpg'?>" height="60" id="fotodude<?=$rowl['id'];?>" /><br />
<a id="ar<?=$rowl['id']?>" href="javascript:quitafoto(<?=$rowl['id'];?>)" class="text1" onclick = "if (! confirm('&iquest;Quitar Foto?')) return false;"  ><img src="imagenes/del.png" height="15" title="Eliminar" border="0" /></a>
              <? } else { ?>
              <img src="imagenes/no.png" width="60" height="60" />
<? } ?>
              &nbsp;</td>
              <td align="left" valign="middle"  class="Arial12Gris"><?=$rowl['nombre']?></td>
              <td width="27" align="center" background="../imagen/back1.jpg"  class="link"><a href="suscosas.php?id=<?=$rowl['id'];?>"><img src="imagenes/Slideshow.png" width="23" height="23" border="0" /></a></td>
              <td width="11" align="center" background="../imagen/back1.jpg"  class="link">
              <? if (file_exists('../admina/'.$rowl['curriculum']) and $rowl['curriculum']!=''){ ?>
              <a href="<?='../admina/'.$rowl['curriculum']?>" id="arcq<?=$rowl['id'];?>"><img src="imagenes/pdf.png" width="27" height="31" boder="0" /></a><br />
<a id="arc<?=$rowl['id']?>" href="javascript:quitacurr(<?=$rowl['id'];?>)" class="text1" onclick = "if (! confirm('&iquest;Eliminar Curriculum?')) return false;"  ><img src="imagenes/del.png" height="15" title="Eliminar" border="0" /></a>
              <? } ?>
              </td>
              <td width="23" align="center" background="../imagen/back1.jpg"  class="link">
              <? if ($rowl['edo']==0){ $nombreimg='favooff';  } else { $nombreimg='favo';  } ?>
              <img src="imagenes/<?=$nombreimg?>.png" name="laimagen<?=$rowl['id'];?>" width="23" height="22" id="laimagen<?=$rowl['id'];?>" style="cursor:pointer" onclick="estado(<?=$rowl['id']?>)" border="0" /><input name="idbato<?=$rowl['id']?>" type="hidden" id="idbato<?=$rowl['id']?>" value="<?=$rowl['edo']?>" /></td>
              <td width="23" align="center" background="../imagen/back1.jpg"  class="link"><? if ($kp['catalogo']==7 or $kp['catalogo']==6 or $kp['catalogo']==3 or $kp['catalogo']==2){ ?>
                <a href="upartista.php?id=<?=$rowl['id'];?>" ><img src="imagenes/up.png" border="0" title="Modificar" /></a>
                <? } ?></td>
              <td width="24" align="center" background="../imagen/back1.jpg"  class="link"><? if ($kp['catalogo']==7 or $kp['catalogo']==6 or $kp['catalogo']==5 or $kp['catalogo']==4){ ?>
                <a href="delartista.php?id=<?=$rowl['id'];?>" class="text1" onclick = "if (! confirm('&iquest;Realmente desea eliminar : <?=$rowl['nombre']?>?')) return false;"><img src="imagenes/del.png" border="0" title="Eliminar" /></a>
                <? } ?></td>
            </tr>
            <?  $wf++; } ?>
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