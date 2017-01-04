<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 

 
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();

$r=$_GET['r'];
 

$id=$_GET['id'];
$bus=$bd->ejecutar("select * from artistas_videos where id=$id");
$row=@$bd->obtener_fila($bus,0);

 		 

	$url=$row['url'];
	@unlink('../'.$url);
	

$bd->ejecutar("delete from artistas_videos  where id=$id");
	 
	?> <script language="javascript">document.location='suscosas.php';</script> <?
	
} ?>