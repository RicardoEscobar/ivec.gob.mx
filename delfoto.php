<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$aid=$_SESSION['aid'];
$anombre=$_SESSION['anombre'];
$atiene=$_SESSION['permisoUA'];

if ($atiene!='ok') {  echo '<script language="javascript"> document.location="artistas.php" </script>'; exit(); }   else { 

 
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();

$r=$_GET['r'];

$aid=$_SESSION['aid'];

$id=$_GET['id'];
$bus=$bd->ejecutar("select * from artistas_fotos where id=$id");
$row=@$bd->obtener_fila($bus,0);

   
	if ($aid==$row['autor']){			 

	$url=$row['url'].$row['id'];
	@unlink($url.'.jpg');
	@unlink($url.'.png');
	@unlink($url.'_3.jpg'); 
	@unlink($url.'_4z.jpg');
	@unlink($url.'_55.jpg');
	@unlink($url.'_55x.jpg');
	@unlink($url.'_56.jpg');
	@unlink($url.'_57.jpg');
	@unlink($url.'_58.jpg');
	@unlink($url.'_e.jpg');
	@unlink($url.'_ev.jpg');
	@unlink($url.'_ex.jpg');
	@unlink($row['url'].'thumbs/'.$row['id'].'_3-thumb.jpg');  

$bd->ejecutar("delete from artistas_fotos  where id=$id");
	}
	else {
	?> <script language="javascript">document.location='sale.php';</script> <?
	}
	?> <script language="javascript">document.location='admina.php';</script> <?
	
} ?>