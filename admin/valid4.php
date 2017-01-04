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
			$url=$row2['url'].'thumbs/'.$row2['id'].'_ex-thumb.jpg';
			$dir=$row2['url'];
			$nompic1=$row2['id'];
			$dirs=$row2['path'];
			$extension='.jpg';
			
			$file=$dir.$nompic1.'_55x'.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($url);
			$IF->resize(470,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); 
			
					
			
			
			$idnota=$_SESSION['theidnotaok'];
			$_SESSION['theidnotaok']='';			
			$_SESSION['theurl']='';
			$_SESSION['theidfoto']='';
			$ird=$_SESSION['notaofoto'];
			
				?><script language="javascript">document.location="crop.php?id=<?=$nompic1;?>"</script><?
			
} ?>