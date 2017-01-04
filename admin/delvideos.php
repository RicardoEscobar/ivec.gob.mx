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

$luser=$_SESSION['pkiduser'];

 


$r=$_GET['r'];



$id=$_GET['id'];
$bus=$bd->ejecutar("select * from videos where Id=$id");
$row=@$bd->obtener_fila($bus,0);



	$url=$row['url'].$row['Id'];
	@unlink($url.'.jpg');
	@unlink($url.'_3.jpg');

$bd->ejecutar("delete from videos  where Id=$id");
	
	?> <script language="javascript">document.location='videos.php';</script> <?

$bd->liberarawilly();
 
} ?>