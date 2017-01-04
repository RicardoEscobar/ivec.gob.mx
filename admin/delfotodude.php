<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; exit(); } 
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
$dude=$_POST['dude']; 

$busca=$bd->ejecutar("select * from  artistas_datos   where id=$dude");
$ke=$bd->obtener_fila($busca,0);
@unlink('../admina/'.$ke['foto'].$ke['id'].'.jpg');

$bd->ejecutar("update artistas_datos set foto=''  where id=$dude");
?>