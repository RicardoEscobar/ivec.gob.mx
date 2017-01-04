<? session_start();
require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 
$user=$_POST['eluser'];
$passw=$_POST['elpass'];
$ok=$_POST['ok'];
$busca=$bd->ejecutar("select * from artistas_datos where usuario='$user' and password='$passw'");
if ($bd->num_rows($busca)>0){
	$kus=$bd->obtener_fila($busca,0);
	if ($ok!=1){ 
	echo "ok"; }
	
	else { ?>
<table width="275" border="0" cellspacing="0" cellpadding="7">
          <tr>
            <td rowspan="3" align="center" class="Arial12Bco">
            <?  
					$url1='';	
					$url1='admina/'.$kus['foto'].$kus['id'].'_s.jpg';
					if (!file_exists($url1)){
					$url1='admina/'.$kus['foto'].$kus['id'].'.jpg'; }
					if (!file_exists($url1)){
					$url1="admin/imagenes/no.png"; }
			 ?>
            <img src="<?=$url1?>" width="60" style="background-color:#666;" class="imagenborde" />
            </td>
            <td class="Arial12Bco">Bienvenido: <br><strong>
              <?=$kus['nombre'];?>
            </strong></td>
          </tr>
          <tr>
            <td class="Arial12Bco"><a href="admina.php?id=<?=$kus['id'];?>" class="Arial12Bco"><strong>Administrar mis datos</strong></a></td>
            </tr>
          <tr>
            <td><a href="sale.php" class="Arial12Bco"><strong>salir</strong></a></td>
            </tr>
        </table>

    <?
	}
	$_SESSION['anombre']=$kus['nombre'];
	$_SESSION['aid']=$kus['id'];
	$_SESSION['permisoUA']='ok'; 
}
else { echo "Datos erroneos"; }

?>