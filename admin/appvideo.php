<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 

 
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();

$r=$_GET['r'];

$aid=$_SESSION['aid'];

$id=$_GET['id'];
$edo=$_GET['edo'];	

$bd->ejecutar("update artistas_videos set edo=$edo  where id=$id");
	 
	 
	?> <script language="javascript">document.location='suscosas.php';</script> <?
	
} ?>