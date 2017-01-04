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

if ($kp['notas']==7 or $kp['notas']==6 or $kp['notas']==5 or $kp['notas']==4){

$ids=$_GET['ids'];
$idn=$_GET['id'];


$bus=$bd->ejecutar("select * from foto where id_nota=$id");
while($row=@$bd->obtener_fila($bus,0)){
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
}


	/*Para Bitacora Espacial de Buzz Lightyear */
						$busar1=mysql_query("select * from nota where id_nota=$id order by id_nota desc limit 1 ");
						$ronb=@mysql_fetch_array($busar1);
							$idnotad=$ronb['id_nota'];
							$acciond='Elimina Nota';
							$titulo=$ronb['titulo'];
						    $horaddd=date("H:i:s");
							$fechadd= date("Y-m-d");	
							$nombred=$_SESSION['dictamenombre'];
							$iduserd=$_SESSION['pkiduser'];
							mysql_query("insert into bitacora values (null,$iduserd,$idnotad,'$acciond','$fechadd','$horaddd','$titulo','','')");
						
						/* fin de Bitacora Espacaial*/
$bd->ejecutar("delete from nota where id_nota=$idn");


	/*		$hw=$bd->ejecutar("select id_nota from nota where posicion>0 order by posicion asc");
			while($fr=@$bd->obtener_fila($hw,0)){
			$re[]=$fr['id_nota'];
			}
			
			$d=0;
			while ($d < count ($re)){
				$donde=$d+1;
				$bn=$re[$d];
				echo $bn.', ';
				$bd->ejecutar("update nota set posicion=$donde where id_nota=$bn");
				$d++;	
			}*/
			
			/*for ($i=1; $i<12; $i++)
			{
				$pr=$bd->ejecutar("select * from nota where posicion=$i order by id_nota desc limit 1");
				$kpr=@$bd->obtener_fila($pr,0);
				$leidn=$kpr['id_nota'];
				if ($leidn>0){
					@$bd->ejecutar("update nota set posicion=0 where posicion=$i and id_nota!=$leidn");
				}
				
			}*/
//fin de ordena y quita repetidos	



$bd->liberarawilly();

?>
<script language="javascript">
document.location="vernota.php";
</script>

<? 
$bd->liberarawilly();
} 
else
{ echo '<script   language="javascript"> 
alert("Acceso restringido, Por seguradidad debe iniciar secion nuevamente");
document.location="sale.php"</script>'; } 

} ?>