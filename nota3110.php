<? session_start();
require 'db.class.php';
require 'conf.class.php';
include "fecha.php";
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$ids='0';
$id=$bd->replace($_GET['id']);
if (!is_numeric($id)){ echo '<script language="javascript"> document.location="index.php"; </script>'; exit(); }
$not=$bd->ejecutar("select * from nota where id_nota=$id");
$nota=@$bd->obtener_fila($not,0);
$sec=$nota['seccion'];
$idau=$nota['id_autor'];
$idlu=$nota['id_lugar'];
$buscas=$bd->ejecutar("select * from seccion  where id=$sec");
$ksecc=$bd->obtener_fila($buscas,0);

$aut=$bd->ejecutar("select * from autor where id=$idau and id>1 limit 1");
$lug=$bd->ejecutar("select * from lugar where id=$idlu and id>1 limit 1");
$kaut=@$bd->obtener_fila($aut,0);
$klug=@$bd->obtener_fila($lug,0);

	$pidg2=$bd->ejecutar("select * from foto where id_nota='$id' order by id desc");
	while($piddg2=$bd->obtener_fila($pidg2,0)){
	 $urlf='';
	 $urlf='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
	 if (file_exists($urlf)){
	$fotc++;
	 }
	
	}

if ($fotc<2){
	$pidg2=$bd->ejecutar("select * from foto where id_nota='$id' order by id desc limit 1");
	$piddg2=$bd->obtener_fila($pidg2,0);
	 $urlf='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
	 $urlf2='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_ex.jpg';
	 if (!file_exists($urlf))
	 {		 
	 $urlf='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
	 $urlf2='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_e.jpg';
	}
					
	$foaut=$piddg2['id_autor'];
	$kfota=$bd->ejecutar("select * from autor where id=$foaut and id>1");
	$kkfa=@$bd->obtener_fila($kfota,0);
	$folug=$piddg2['id_lugar'];
	$kfolu=$bd->ejecutar("select * from lugar where id=$folug and id>1");
	$kklu=@$bd->obtener_fila($kfolu,0);
	
	}
	
	function crear_parrafos($comentario) 
{
    //$comentario=nl2br($comentario);
    $comentario=explode('<br>', $comentario); 
    $comentario=implode("</p><p>", $comentario);
 
return $comentario;
}

 $bn=$bd->ejecutar("select * from nota where id_nota=$id order by id_nota desc limit 5"); 
$i=1;
 $rownf=@$bd->obtener_fila($bn);
	$idnota1=$rownf['id_nota'];
	$ids.=','.$idnota1;
	$bfot1=$bd->ejecutar("select * from foto where id_nota=$idnota1 order by id desc limit 1");
	$kfot1=$bd->obtener_fila($bfot1,0);
	$url1='';	
	$url1='admin/'.$kfot1['url'].$kfot1['id'].'_55x.jpg';
	
	if (!file_exists($url1)){ 
	$logo=$rownf['momento'];
	$bfot1=$bd->ejecutar("select * from foto where id=$logo order by id desc limit 1");
	$kfot1=$bd->obtener_fila($bfot1,0);
	$url1='';	
	$url1='admin/'.$kfot1['url'].$kfot1['id'].'_55.jpg';
	
	}
	
	$elmenu=2;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=(stripslashes($rownf['titulo']));?> :. Instituto Veracruzano de la Cultura</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="0" rightmargin="0" leftmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<!--TOP-->

<? $bfpd=$bd->ejecutar("select * from fotosr where recinto=100 order by id desc limit 1");
	$kforec=$bd->obtener_fila($bfpd,0);
	$leurlpr='admin/'.$kforec['url'].$kforec['id'].'.jpg';
	if (!file_exists($leurlpr)){ $leurlpr='imgs/header.jpg'; }

  ?>
<div style="width:100%; background-image:url(<?=$leurlpr;?>);  background-position:top; background-repeat:no-repeat;">
	<div style="width:930px; margin:auto; height:10px;">
    </div>

	<div style="width:930px; margin:auto;  background-image:url(imgs/headivec.png); background-position:center; background-repeat:no-repeat; height:70px;"><table height="70px" align="right" cellpadding="0" cellspacing="0">

  <tr><td><input name="" type="text" style="height:25px; border:none; width:200px;" /></td><td><img src="imgs/buscar.jpg" width="50" height="26" border="0"/></td>
    <td>&nbsp;&nbsp;&nbsp;</td></tr></table>
	</div>

	<div style="width: 930px; margin: auto; margin-top: 45px; height: 25px;" class="menu"><? include "menu.php"; ?>
    </div>

	<div style="width: 930px; margin: auto; margin-top: 10px; /* [disabled]background-color:#FFFFFF; */"><table width="917" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="610" rowspan="2" valign="top" bgcolor="#FFFFFF" style="padding:5px 7px" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="39" colspan="2" class="negro11"  ><?=$kklu['nombre']?>  <?=(fechag($nota['fecha']))?></td>
        </tr>
      <tr>
        <td height="30" colspan="2" class="negro19"  style="font-size:24px"><?=(stripslashes($rownf['titulo']));?></td>
        </tr>
      <tr>
        <td height="72" colspan="2" class="gris12"><?=(stripslashes($rownf['resumen']));?></td>
        </tr>
      <tr>
        <td width="24%" height="28"><!-- AddToAny BEGIN -->
          <a class="a2a_dd" href="http://www.addtoany.com/share_save?linkurl=http%3A%2F%2Fwww.eldictamen.mx%2F&amp;linkname=El%20Dictamen.mx"><img src="imgs/pb.png" width="71" height="21" border="0" alt="Share" align="left" style="margin-right:5px"/></a>
          <script type="text/javascript">
var a2a_config = a2a_config || {};
a2a_config.linkname = "El Dictamen :.<?= $nota['titulo']; ?>";
a2a_config.linkurl = "<?="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>";
a2a_config.locale = "es";
      </script>
          <script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
          <!-- AddToAny END --></td>
        <td width="76%"><script src="http://connect.facebook.net/es_MX/all.js#appId=168784076480369&amp;xfbml=1"></script>
          <fb:like href="<?="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" send="true" width="450" show_faces="false" font="arial"></fb:like></td>
        </tr><tr>
          <td colspan="2"><?

	$idnota1=$rownf['id_nota'];
	$ids.=','.$idnota1;
	$bfot1=$bd->ejecutar("select * from foto where id_nota=$idnota1 order by id desc limit 1");
	$kfot1=$bd->obtener_fila($bfot1,0);
	$url1='';	
	$url1='admin/'.$kfot1['url'].$kfot1['id'].'_55x.jpg';
	
 
?>
            <div style="float: left; width: 100%; text-align: center; margin-bottom: 10px"><!--<div class="Helvetica12azul" style="float:left; width:470px; text-align:left; margin-top:10px; text-align:justify">
        <?=stripslashes($rownf['resumen']);?>
      </div>-->
              <div style="float: left; width: 100%; background-color: #FFF; padding-top: 7px; margin-top: 7px; margin-bottom: 7px;">
  <? if ($fotc==1 ) { 
	
		  if (file_exists($urlf)) {
			  
		 
			    $urlf='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
			  	$tam=getimagesize($urlf);
					
				$ant=$tam[0]; 
				$alto=$tam[1]+50; 
				if ($alto>$ant){
				$urlf='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
				$urlfs2='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
				$tam=getimagesize($urlf);					
				$ant=$tam[0];
				}
				else {					
					 $urlf='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
				 $urlf2='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_ex.jpg';
				 if (!file_exists($urlf))
				 {		 
				 $urlf='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_55x.jpg';
				 $urlf2='admin/fotos/'.$piddg2['fecha'].'/'.$piddg2['id'].'_e.jpg';
					}
				$tam=getimagesize($urlf);					
				$ant=$tam[0];
				}
				if ($ant>640) { $ant=640; }
				$cdcd=23; 
		  ?>
                
  <? if ($piddg2['titulo']!='') { $fr='.- '; } else { $fr=''; } ?>
                <div style="width:<?=$ant;?>px; margin-top:5px; margin-bottom:3px; margin-left: auto; margin-right: auto;">
                  <div style="float:left; width:<?=$ant;?>px; margin-bottom:0px; /* [disabled]background-color:#f2f2f2; */ text-align: center;">
                    
                    
                    <img src="<?=$urlf; ?>"  border="0" class="resumen" style="max-width:470px; max-height:260px" title="<?=($piddg2['titulo'])?>" alt="<?=($piddg2['titulo'])?>" /> </div>
                  <? if (($kkfa['nombre']!='' and $kkfa['nombre']!=' Ninguno' and $kkfa['nombre']!='&nbsp;') and ($kklu['nombre']!=' Ninguno' and $kklu['nombre']!='' and $kklu['nombre']!='&nbsp;') or $piddg2['titulo']!='' or $piddg2['pie']!=''){ ?>
                  <div class="naranja121" style="float: left; width:<?=$ant-20;?>px; margin-bottom: 5px; padding: 5px 10px 5px 10px;" align="left">
  <? if (($kkfa['nombre']!='' and $kkfa['nombre']!=' Ninguno' and $kkfa['nombre']!='&nbsp;')) { ?>
  <?= $kkfa['nombre']; ?><? } ?>
                    <? if (($kkfa['nombre']!='' and $kkfa['nombre']!=' Ninguno' and $kkfa['nombre']!='&nbsp;') and ($kklu['nombre']!=' Ninguno' and $kklu['nombre']!='' and $kklu['nombre']!='&nbsp;')){ ?>
                    / <? } ?>
                    <? if ($kklu['nombre']!=' Ninguno' and $kklu['nombre']!='' and $kklu['nombre']!='&nbsp;') {?>
                    <?=$kklu['nombre']; ?> <? } ?>
  <br />
                    
                    <strong><?= $piddg2['titulo']; ?></strong>  <?= $piddg2['pie']; ?></div>
                  <? } ?>
                  </div>
                <? } } 
		  
		  else if ($fotc>1) { 
				$cdcd=23;  ?>
                <div style="float: left; width: 600px; margin-bottom: 10px;" align="right">
                  <iframe src="galn.php?id=<?=$id;?>" scrolling="no" frameborder="0" width="610" height="360" ></iframe></div>
                <?
				   }   
				   ?>
                
                </div>
              </div>
            <?  ?></td></tr>
      <tr>
        
        <td height="60" colspan="2" class="negro12">
          <?=nl2br(((stripslashes($nota['texto']))));?> 
          </td>
        </tr>
      <tr>
        <td colspan="2"><div id="fb-root"></div>
          <script src="http://connect.facebook.net/es_MX/all.js#xfbml=1"></script>
          <fb:comments href="<?="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" num_posts="8" width="600"></fb:comments></td>
        </tr>
    </table>      <p>&nbsp;</p></td>
    <td  valign="top" bgcolor="#E2E2E2" style="padding:3px 0 0 0 "><div class="especial" style="float: left; padding: 4px 7px; min-width: 195px; border-radius: 7px 7px 0 0; background-color: #C51230;"><strong>Otras Notas</strong></div></td>
  </tr>
  <tr>
    <td width="295"  valign="top" bgcolor="#E2E2E2"><table width="96%" align="center">
      <? 
	$bn=$bd->ejecutar("select id_nota,titulo,resumen from nota where 1 order by id_nota desc limit 5");
	
	while($rownf=@$bd->obtener_fila($bn)) {
    $idnota1=$rownf['id_nota'];
	$ids.=','.$idnota1;
	$bfot1=$bd->ejecutar("select * from foto where id_nota=$idnota1 order by id desc limit 1");
	$kfot1=$bd->obtener_fila($bfot1,0);
	$url1='';	
	$url1='admin/'.$kfot1['url'].$kfot1['id'].'_3.jpg';
	  ?>
      <tr>
        <td class="azult" <? if (file_exists($url1)){ ?> <? } ?>><strong><a href="nota.php?id=<?=($rownf['id_nota'])?>" title="<?=($rownf['titulo'])?>">
          <?=($rownf['titulo'])?>
        </a></strong></td>
      </tr>
      <tr>
        <td><? if (file_exists($url1)){ ?>
          <a href="nota.php?id=<?=($rownf['id_nota'])?>" title="<?=($rownf['titulo'])?>"> <img src="<?=$url1?>" width="90" height="68" border="0" align="left" style="padding:0 5px 3px 0"  /></a>
          <? } ?>
          <span class="gris12">
            <?=substr($rownf['resumen'],0,190)?>
            ... </span></td>
      </tr>
      <tr>
        <td height="9px" <? if (file_exists($url1)){ ?> <? } ?>></td>
      </tr>
      <? } ?>
    </table></td>
  </tr>
  
 </table>

    </div>
  <div style="width:930px; margin:auto;
     height:39px;">&nbsp;
    </div>
</div>
<!--FINTOP-->
<!--MIDDLE--><!--FINMIDDLE-->
<!--PIE-->
<div style="width:100%; background-color:#FFFFFF; margin-top:20px;">

	<div style="width:930px; margin:auto; ">
    
    <? include "footer.php";  ?>
    
    </div>

</div>
<!--FINPIE-->


</body>
</html>
