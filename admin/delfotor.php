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

$r=$_GET['r'];



$id=$_GET['id'];
$bus=$bd->ejecutar("select * from fotosr where id=$id");
$row=@$bd->obtener_fila($bus,0);
  	

	$url=$row['url'].$row['id'];
	@unlink($url.'.jpg');
	@unlink($url.'.png');
	@unlink($url.'_2.jpg'); 
	@unlink($url.'_c.jpg');
	@unlink($url.'_g.jpg'); 
	@unlink($url.'_ex.jpg'); 
	@unlink($row['url'].'thumbs/'.$row['id'].'_ex-thumb.jpg');

$bd->ejecutar("delete from fotosr  where id=$id");
	if ($r=='nota')
	{
	?> <script language="javascript">document.location='verfotor.php';</script> <?
	}
	else if ($r=='col') {
	?> <script language="javascript">document.location='verfotonc.php';</script> <?
	}
	else if ($r=='galeriaadmin.php') {
	?> <script language="javascript">document.location='galeriaadmin.php';</script> <?
	}
	else {
	?> <script language="javascript">document.location='verfoto.php';</script> <?
	}
} ?>