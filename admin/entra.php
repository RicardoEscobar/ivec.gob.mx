<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();

$user=$_POST['user'];
$pass=$_POST['pass'];

function replace($cadena){
$cadena=str_replace("select","",$cadena);
$cadena=str_replace("delete","",$cadena);
$cadena=str_replace("drop","",$cadena);
$cadena=str_replace("'","",$cadena);
$cadena=str_replace("*","",$cadena);
$cadena=str_replace(";","",$cadena);
$cadena=str_replace("?","",$cadena);
$cadena=str_replace(">","",$cadena);
$cadena=str_replace("<","",$cadena);
$cadena=str_replace("script","",$cadena);
return $cadena;
}

$user=replace($user);
$pass=(replace($pass));

$bus=$bd->ejecutar("select * from admin where log='$user' and pass='$pass'");

$tiene=$bd->num_rows($bus);

if ($tiene==1 or $tiene>0){
	$row=$bd->obtener_fila($bus,0);
	
	$_SESSION['ivecpermiso']='PermisoOk';
	$_SESSION['dictamenombre']=$row['nombre'];
	$_SESSION['pkiduser']=$row['id'];
	
	$luser=$_SESSION['pkiduser'];

  

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);

     if ($kp['permiso']==100)         { $donde='vernota.php?ids=r'; }
else      { $donde='agenda.php'; }

	
	?>
    <script language="javascript"> document.location='<?=$donde;?>';</script>
    <?
}
else
{
	
?>
    <script language="javascript"> document.location='loggeo.php';</script>
    <?
}

?>