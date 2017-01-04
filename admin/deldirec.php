<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
$bd=Db::getInstance();
$id=$_GET['id'];
$bdirs=$bd->ejecutar("select * from directorio where id=$id");
$kdire=@$bd->obtener_fila($bdirs,0);

 
  @unlink($kdire['url']);   
   $bd->ejecutar("delete from directorio where id='$id'");	
			 
			 	
 }	 ?>
      
		
				<script type="text/javascript">
				top.location="directorio.php";
				</script>

             <?
	
			
			
 
 