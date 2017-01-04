<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 

require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();





$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);

if ($luser==1 or $luser==19){

$id=$_GET['id'];



		@$bd->ejecutar("delete from admin  where id=$id"); 
		
}
else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; } 

		
		
		
		 }
		?>
        <script type="text/javascript">
		  document.location="AdminAdmin.php";
		</script>


