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
$bus=$bd->ejecutar("select * from artistas_audios where id=$id");
$row=@$bd->obtener_fila($bus,0);

   
	if ($aid==$row['autor']){			 

	$url=$row['url'];
	@unlink($url);
	

$bd->ejecutar("delete from artistas_audios  where id=$id");
	}
	else {
	?> <script language="javascript">document.location='sale.php';</script> <?
	}
	?> <script language="javascript">document.location='admina.php';</script> <?
	
} ?>