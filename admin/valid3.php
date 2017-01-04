<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();


$idf=$_SESSION['theidfoto'];
$rs3=$bd->ejecutar("select * from foto where id=$idf order by id desc limit 1");
			$row2=$bd->obtener_fila($rs3,0);
			$nompic1=$row2['id'];
			$url=$row2['url'].'thumbs/'.$row2['id'].'_ev-thumb.jpg';
			$dir=$row2['url'];
			$nompic1=$row2['id'];
			$dirs=$row2['path'];
			$extension='.jpg';
			
			
			
			$file=$dir.$nompic1.'_56'.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($url);
			$IF->resize(355,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); 
			
			
			/*$file=$dir.$nompic1.'_57'.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($url);
			$IF->resize(112,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); */
			
			
			
			$file=$dir.$nompic1.'_x'.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($dir.$nompic1.$extension);
			$IF->resize(500,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); 
			
			$file=$dir.$nompic1.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($dir.$nompic1.'_x'.$extension);			
			$IF->resize(355,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); 
			@unlink ($dir.$nompic1.'_x'.$extension);
			
			$idnota=$_SESSION['theidnotaok'];
			$_SESSION['theidnotaok']='';			
			$_SESSION['theurl']='';
			$_SESSION['theidfoto']='';
			$ird=$_SESSION['notaofoto'];
			$r=$_SESSION['rrr'];
			$la=$_SESSION['iradonde'];
			if ($la=='foton.php')
			{
				
				$_SESSION['iradonde']='';
				?><script language="javascript"> top.location="verfoton.php" </script><?
			
				}
			else {
			if ($r=='galeriaadmin.php'){
				$_SESSION['rrr']='';
				?><script language="javascript"> top.location="galeriaadmin.php" </script><?
			}
			else {
			if ($ird==$nompic1)
			{
				?><script language="javascript"> top.location="verfoto.php" </script><?
			}
			else
			{
				?><script language="javascript"> top.location="vernota.php" </script><?
			} } } }
	?>