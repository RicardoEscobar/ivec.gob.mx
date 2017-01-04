<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; exit(); } 
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
$bato=$_POST['bato'];
$etdo=$_POST['etdo'];

$bd->ejecutar("update artistas_datos set edo='$etdo' where id=$bato");

?>