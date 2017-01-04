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

$idnota=$_GET['idnota'];
$bfoto=$bd->ejecutar("select * from foto where id=$idnota order by id desc limit 1 ");
$rofo=@$bd->obtener_fila($bfoto,0);
$idfotook=$rofo['id'];

 $r=$_GET['r'];
$pnid=$_POST['pnid'];
 $titulo=$_POST['titulo'];
  $titulo1=$_POST['titulo1'];
 $autor=$_POST['autor']; 
 $lugar=$_POST['lugar'];
$notaid=$idnota;

  $gpoid=$_GET['idgpo'];

  if ($gpoid==''){$gpoid=0;}
 
// Autor//
$autorq=$bd->ejecutar("select * from autor where tipo=1");

// Lugar//
$lugarq=$bd->ejecutar("select * from lugar");


$enviar2=$_POST['Agregar'];
if (!empty($enviar2)) {
	
	$title=$_POST['titulo'];
	$titulo1=$_POST['titulo1'];
	$lug=$_POST['lugar'];
	$fotog=$_POST['autor'];
	$principal=$_POST['principal'];
	$mark=$_POST['marca'];
	$knota=$_POST['knota'];

if ($ex=='')
{
	//echo "update foto set titulo='$titulo1', pie='$title',id_autor='$fotog',id_lugar='$lug' where id=$idfotook";
	$secddc=$_POST['secc'];
$dia=$_POST['dia'];
$lugar=$_POST['lugar'];
$autor=$_POST['autor'];

$otroa=$_POST['otroa'];
	$otrolug=$_POST['otrolug'];
	if ($otroa!='')
	{
		$bak=$bd->ejecutar("select * from autor where nombre='$otroa'");
		$kbak=@$bd->obtener_fila($bak,0);
		$autor=$kbak['id'];
		if ($autor=='') {
		@$bd->ejecutar("insert into autor values(null,'$otroa',0,1)");
		$idau=$bd->ejecutar("select * from autor order by id desc limit 1");
		$kau9=@$bd->obtener_fila($idau,0);
		$autor=$kau9['id']; }
	}
	if($otrolug!='')
	{
		$blk=$bd->ejecutar("select * from lugar where nombre='$otrolug'");
		$kblk=@$bd->obtener_fila($blk,0);
		$lugar=$kblk['id'];
		if ($lugar=='') {
	@$bd->ejecutar("insert into lugar values(null,'$otrolug')");
	$idauw=$bd->ejecutar("select * from lugar order by id desc limit 1");
	$kauww=@$bd->obtener_fila($idauw,0);
	$lugar=$kauww['id']; }
	}

	 if ($dia==2)
	 {
		 $bd->ejecutar("update foto set dia=1 where dia=2");
		 }
		 if ($secddc>0)
		 {
			$bd->ejecutar("update foto set diapo=0 where diapo=$secddc"); 
			 }
	//echo "update foto set titulo='$titulo1', pie='$title',id_autor='$fotog',id_lugar='$lug',diapo='$secddc',dia='$dia' where id=$idfotook";
	$bd->ejecutar("update foto set titulo='$titulo1', pie='$title',id_autor='$autor',id_lugar='$lugar',diapo='$secddc',dia='$dia' where id=$idfotook");
	
	if ($r!='')
	{
	?> <script language="javascript">document.location='verfoton.php';</script> <?
	}
	else if ($r=='galeriaadmin.php') {
	?> <script language="javascript">document.location='galeriaadmin.php';</script> <?
	}
	else
	{
	?> <script language="javascript">document.location='verfoto.php';</script> <?
	}
	
}
}
$aut=$bd->ejecutar("select * from autor where foto=1 order by nombre asc");
$lug=$bd->ejecutar("select * from lugar order by nombre asc");

	
	 if ($r=='galeriaadmin.php') {
	$ddd='galeriaadmin.php';
	}
	else if ($r!='')
	{
	$ddd='verfoton.php';
	}
	else
	{
	$ddd='verfoto.php';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Galerias</title>
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
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float:left; width:960px; background-color:#000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">

<form name="reduce" method="post" action="<?=$_SERVER['PHP_SELF'];?>?r=<?=$r?>&ids=<?=$ids;?>&idnota=<?=$idnota;?>" enctype="multipart/form-data">
    <table align="center" cellpadding="4" cellspacing="4">
      <tr>
        <td colspan="2" align="center" class="encuesta"><span class="Verdana16Ngo"><strong>Modificar Foto</strong></span> </td>
        </tr>
      <tr>
        <td height="38" align="left" valign="top" class="Hevel16Gris"><strong>Titulo</strong></td>
        <td align="left" class="menu"><span class="titulo1">
          <input name="titulo1" type="text" class="titulo1" value="<?=str_replace('"','&quot;',stripslashes($rofo['titulo']));?>" size="60" />
          </span></td>
      </tr>
      <tr>
        <td height="38" align="left" valign="top" class="Hevel16Gris"><strong>Pie</strong></strong><span class="Arial12Azul"><br />
          *caracteres restantes</span><strong><span class="titulo1"><br /> 
          </em>          <input name="cont" type="text" disabled="disabled" value="200" size="7" readonly>
          </span></strong></td>
        <td class="menu" align="left"><span class="titulo1">
          <textarea name="titulo" cols="50" rows="3" class="titulo1" onKeyDown="limite(this,200)" onKeyUp="limite(this,200)"><?=$rofo['pie'];?></textarea>
        </span></td>
      </tr>
 <tr>
        <td height="7" align="left" class="Hevel16Gris"><strong>Autor</strong></td>
        <td align="left" class="menu"><label for="autor"></label>
          <select name="autor" class="titulo1" id="autor">
            <option value="1">Ninguno</option>
            <?php while($rtr=@$bd->obtener_fila($aut,0)){?>
            <?php if ($rofo['id_autor']==$rtr['id']){?>
            <option value="<?=$rtr['id'];?>" selected="selected"><?php echo $rtr['nombre']; ?></option>
            <?php } else{?>
             <option value="<?=$rtr['id'];?>"><?php echo $rtr['nombre']; ?></option>
            <?php }?>
            <?php }?>
          </select><span class="tex"> &oacute;
          <label for="otroa"></label>
          <input name="otroa" type="text" id="otroa" size="40" />
          </span></td>
      </tr>
      <tr>
        <td height="8" align="left" class="Hevel16Gris"><strong>Lugar</strong></td>
        <td align="left" class="menu"><label for="lugar"></label>
          <select name="lugar" class="titulo1" id="lugar">
            <option value="1">Ninguno</option>
            <?php while($rt1=@$bd->obtener_fila($lug,0)){?>
            <?php if ($rofo['id_lugar']==$rt1['id']){?>
            <option value="<?=$rt1['id'];?>" selected="selected"><?php echo $rt1['nombre']; ?></option>
            <?php } else{?>
             <option value="<?=$rt1['id'];?>"><?php echo $rt1['nombre']; ?></option>
            <?php }?>
            <?php }?>
          </select> <span class="tex">&oacute;
          <label for="otrolug"></label>
          <input name="otrolug" type="text" id="otrolug" size="40" />
          <input type="hidden" name="secc" value="0" />
          <input type="hidden" name="dia" value="0" />
          </span></td>
      </tr>
      <tr class="titulo-3">
        <td colspan="2" align="center"><label for="pnid"></label>
          <input type="hidden" name="pnid" id="pnid" value="<?=$gpoid?>">         <input type="submit" name="Agregar" value="Agregar" class="titulo1" />
          <input name="can" type="button" class="titulo1" id="can" onClick="javascript:document.location='<?=$ddd;?>'" value="Cancelar" /></td>
      </tr>
    </table>
  </form>           </td>
</tr>  <tr style="border:0px; background:#000000">
      <td height="37" align="left" class="bcoabajo" >
      <? include "footer.php"; ?> 
      </td>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} ?>