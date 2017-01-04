<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso']; 
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
$dude=$_POST['dude'];
$lainf=utf8_decode($_POST['lainf']);
$buscar=$bd->ejecutar("select * from artistas_info where dude=$dude");
if ($bd->num_rows($buscar)>0){
$bd->ejecutar("update artistas_info set descripcion='$lainf' where dude=$dude"); }
else { $bd->ejecutar("insert into artistas_info values(null, '$dude','$lainf')");   }

?>