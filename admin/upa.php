<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }  else {


require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();

if (isset($_GET['id'])){$id=$_GET['id'];}
else{$id=$_POST['id'];}

$n=$_GET['n'];
$f=$_GET['f'];

if ($n==1){
	$bd->ejecutar("update autor set nota=0 where id=$id");
}
if ($n==0){
	$bd->ejecutar("update autor set nota=1 where id=$id");
}

if ($f==1){
	$bd->ejecutar("update autor set foto=0 where id=$id");
}
if ($f==0){
	$bd->ejecutar("update autor set foto=1 where id=$id");
}

		?>
        <script type="text/javascript">
			document.location="AdminAutor.php"
		</script>
<? 
$bd->liberarawilly();
} ?>