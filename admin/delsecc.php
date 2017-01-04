<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();

$luser=$_SESSION['pkiduser'];

$pk=$bd->ejecutar("select * from admin where id=$luser");
$kp=$bd->obtener_fila($pk,0);
if ($kp['catalogo']==7 or $kp['catalogo']==6 or $kp['catalogo']==5 or $kp['catalogo']==4){
	
if (isset($_GET['id'])){$id=$_GET['id'];}
else{$id=$_POST['id'];}

@$bd->ejecutar("delete from seccion where id=$id");

						
						/* fin de Bitacora Espacaial*/
       ?>
        <script type="text/javascript">
			document.location="secciones.php"
		</script>
<? 
$bd->liberarawilly();
} else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; }  } ?>