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
$bus=$bd->ejecutar("select * from foto where id=$id");
$row=@$bd->obtener_fila($bus,0);


					$idnotad=$row['id'];
					$idnotau=$row['id_nota'];
					$bud=$bd->ejecutar("select * from foto where id_nota=$idnotau");
					$tiene=@$bd->num_rows($bud);
					if ($tiene<2){
					@$bd->ejecutar("update nota set foto='no' where id_nota=$idnotau");
					}
					$titulod=$row['titulo'];					
					$acciond='Elimina Foto';
					$horaddd=date("H:i:s");
					$fechadd= date("Y-m-d");	

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
	@unlink($row['url'].'thumbs/'.$row['id'].'_e-thumb.jpg');
	@unlink($row['url'].'thumbs/'.$row['id'].'_ev-thumb.jpg');
	@unlink($row['url'].'thumbs/'.$row['id'].'_ex-thumb.jpg');

$bd->ejecutar("delete from foto  where id=$id");
	if ($r=='nota')
	{
	?> <script language="javascript">document.location='verfoton.php';</script> <?
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