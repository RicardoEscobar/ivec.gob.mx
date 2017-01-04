<? require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
$_POST =$bd->decodeUTF8($_POST);

$elegido=$_POST['elegido'];
$idbato=$_POST['idbato'];
if ($idbato!='' and $idbato>0){ $cad=' and id!='.$idbato.' ';}
$bus=$bd->ejecutar("select * from artistas_datos where usuario like '$elegido' $cad ");
echo $bd->num_rows($bus);


?>