<? session_start();
require 'db.class.php';
require 'conf.class.php';
include('admin/class.ImageFilter.php');
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 

$fecha=$_POST['fecha']; 
 
              $fini=substr($fecha,0,7).'-01';
			  $ffin=substr($fecha,0,7).'-31';
			  $bcar=$bd->ejecutar("select * from cartelera where fecha between '$fini' and '$ffin' order by id desc limit 1 ");
			  while($kcar=$bd->obtener_fila($bcar,0)){ ?>
				  
				<a href="admin/<?=$kcar['url']?>" class="Arial12Rojo" target="_blank">Descargar Cartelera del mes </a>
<? } ?>