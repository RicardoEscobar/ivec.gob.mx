<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];

if ($atiene!='ok') {  echo '<script language="javascript"> document.location="artistas.php" </script>'; exit(); } 

require 'db.class.php';
require 'conf.class.php';
include('admin/class.ImageFilter.php');
$bd=Db::getInstance();


$idf=$_SESSION['theidfoto']; 
$rs3=$bd->ejecutar("select * from artistas_fotos where id=$idf order by id desc limit 1");
			$row2=$bd->obtener_fila($rs3,0);
			$nompic1=$row2['id'];
			$url=$row2['url'].'thumbs/'.$row2['id'].'_3-thumb.jpg';
			$dir=$row2['url'];
			$nompic1=$row2['id'];
			$dirs=$row2['path'];
			$extension='.jpg';
			
			$file=$dir.$nompic1.'_55'.$extension;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($url);
			$IF->resize(87,'ratio');
			$IF->output('JPEG',$file);
			}
			chmod($file,0777); 
			
			 
			
			
	 
			
				?><script language="javascript">document.location="admina.php"</script><?
			
  ?>