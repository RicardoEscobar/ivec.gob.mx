<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");


require 'db.class.php';
require 'conf.class.php';
include('admin/class.ImageFilter.php');
$bd=Db::getInstance();

$aid=$_SESSION['aid'];


$buscar=$bd->ejecutar("select * from  artistas_datos where id=$aid");
$kea=$bd->obtener_fila($buscar,0);


function obtenerext($archivo)
{  $ext='';
	for ($i=1;$i<=strlen($archivo);$i++)
	{   if ($archivo[$i]=='.'){
		for ($j=$i;$j<=strlen($archivo);$j++)
		{ $ext=$ext.$archivo[$j];			
		}
		}} 
		$ext = strtolower($ext); 
		return $ext;	
}

 
 
	

$enviar2=$_POST['Agregar'];
		if (!empty($enviar2)) {

       
 $nombre=$_POST['nombre'];
 $usuario=$_POST['usuario'];
 $elpass1=$_POST['elpass1'];
 $elpass2=$_POST['elpass2'];
 $telefono=$_POST['telefono'];
 $correo=$_POST['correo'];
 $direccion=$_POST['direccion'];
 $secc1=$_POST['secc1'];
 $sitio=$_POST['sitio'];

$nombre_archivo2 = $_FILES['fotop']['name']; 
$tipo_archivo2 = $_FILES['fotop']['type']; 
$tamano_archivo2 = $_FILES['fotop']['size']; 
 

$nombre_curr = $_FILES['curri']['name']; 
$tipo_cur = $_FILES['curri']['type']; 
$tamano_cur = $_FILES['curri']['size']; 

$ex=obtenerext($nombre_archivo2);
$ex2=obtenerext($nombre_curr);
 

$msj='';

$fec=date("Y-m-d");
$fot='admina/artistas';
$laurlo='artistas/'.$fec.'/';

			if (!is_dir($fot)){
		  
					mkdir($fot,0777); //chmod($fot,0777);
					$dir=$fot.'/'.$fec.'/'; 
					$dir2=$fot.'/'.$fec.'/thumbs'.'/';
			
			  	if (!is_dir($dir)){
					mkdir($dir,0777); //chmod($dir,0777);
					}
			  	if (!is_dir($dir2)){
					mkdir($dir2,0777); //chmod($dir,0777);
					}
			}
		  	else {
		  		$dir=$fot.'/'.$fec; 
				
				if (!is_dir($dir)){
					$dir2=$fot.'/'.$fec.'/thumbs';
			
					mkdir($dir,0777); //chmod($dir,0777);
					$dir=$fot.'/'.$fec.'/';					
					$dir2=$fot.'/'.$fec.'/thumbs'.'/';
					if (!is_dir($dir)){
			
					mkdir($dir,0777); // chmod($dir,0777);
					}  
			  	if (!is_dir($dir2)){
					mkdir($dir2,0777); //chmod($dir,0777);
					}
				}
				else {
					$dir=$fot.'/'.$fec.'/';					
					$dir2=$fot.'/'.$fec.'/thumbs'.'/';
					if (!is_dir($dir)){
			
						mkdir($dir,0777);
						//chmod($dir,0777);
					}  
			  	if (!is_dir($dir2)){
					mkdir($dir2,0777); //chmod($dir,0777);
					}
				}
		  	}	 

 
$bd->ejecutar("update artistas_datos set usuario='$usuario', password='$elpass1', nombre='$nombre', email='$correo', direccion='$direccion', telefono='$telefono', seccion='$secc1', sitiopersonal='$sitio' where id=$aid");
	$nompic1=$aid; 
  
 $docto=$laurlo.$nompic1.$ex2;
	 $bd->ejecutar("");
 if  (move_uploaded_file($_FILES['curri']['tmp_name'],$dir.$nombre_curr)){ 
 	rename($dir.$nombre_curr,$dir.$nompic1.$ex2);   
	@unlink('admina/'.$kea['curriculum']);
	
	$bd->ejecutar("update artistas_datos set  curriculum='$docto' where id=$nompic1");
 }
  if  (move_uploaded_file($_FILES['fotop']['tmp_name'],$dir.$nombre_archivo2)){ 
 
	
	@unlink('admina/'.$kea['foto'].$kea['id'].'.jpg');
	@unlink('admina/'.$kea['foto'].$kea['id'].'_3.jpg');
	@unlink('admina/'.$kea['foto'].$kea['id'].'_c.jpg');
	@unlink('admina/'.$kea['foto'].$kea['id'].'_s.jpg');
	@unlink('admina/'.$kea['foto'].'thumbs/'.$kea['id'].'_3-thumb.jpg');  
	@unlink('admina/'.$kea['foto'].'thumbs/'.$kea['id'].'-thumb.jpg');  
		rename($dir.$nombre_archivo2,$dir.$nompic1.$ex); 
			$file=$dir.$nompic1.'_3'.$ex;
			if (file_exists($file)){
			unlink($file);
			}
			if(!file_exists($file))
			{
		
			$IF = new ImageFilter;
			$IF->loadImage($dir.$nompic1.$ex);
			$IF->resize('ratio',200);
			$IF->output('JPEG',$file);
			}
			
	$bd->ejecutar("update artistas_datos set foto='$laurlo' where id=$nompic1");
	?> <script type="text/javascript">
				top.location="admina/crop4.php?id=<?=$nompic1?>";
	   </script> <?
 } else {
	?> <script type="text/javascript">
				top.location="admina.php";
	   </script> <? 
 }
	
	}
 
?>