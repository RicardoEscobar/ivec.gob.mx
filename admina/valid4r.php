<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 
require 'db.class.php';
require 'conf.class.php';
include('../admin/class.ImageFilter.php');
$bd=Db::getInstance();


$idf=$_SESSION['theidfoto'];

$rs3=$bd->ejecutar("select * from artistas_datos where id=$idf order by id desc limit 1");
			$row2=$bd->obtener_fila($rs3,0);
			$nompic1=$row2['id'];
			$url=$row2['foto'].'thumbs/'.$row2['id'].'_3-thumb.jpg';
			if (!file_exists($url)){ $url=$row2['foto'].'thumbs/'.$row2['id'].'-thumb.jpg'; }
			$dir=$row2['foto'];
			$nompic1=$row2['id'];
			$dirs=$row2['path'];
			$extension='.jpg';
			
			$file=$dir.$nompic1.'_c'.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($url);
			$IF->resize(150,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); 
			
			
			$file=$dir.$nompic1.'_s'.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($url);
			$IF->resize(100,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); 
			
					
			
			
			$idnota=$_SESSION['theidnotaok'];
			$_SESSION['theidnotaok']='';			
			$_SESSION['theurl']='';
			$_SESSION['theidfoto']='';
			$ird=$_SESSION['notaofoto']; 
			if ($_SESSION['voyparader']=="admina"){
				?><script language="javascript">document.location="../admina.php"</script><?
				
			} else {
				?><script language="javascript">document.location="../artistas.php"</script><?
			}
  ?>