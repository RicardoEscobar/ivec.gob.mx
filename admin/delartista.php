<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();

 $id=$_GET['id'];
 	$rs3=$bd->ejecutar("select * from artistas_datos where id=$id order by id desc limit 1");
	 $row2= @$bd->obtener_fila($rs3,0);
	 @unlink('../'.$row2['foto'].$row2['id'].'.jpg');
	 @unlink('../'.$row2['curriculum']);
	 
	 $bd->ejecutar("delete from artistas_datos  where id=$id"); ?>
    <script type="text/javascript">
	 	top.location="artistas.php";
	</script>
<?
}
?>