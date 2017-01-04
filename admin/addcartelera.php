<? session_start();
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
 date_default_timezone_set('America/Mexico_City');
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }   else { 

$_POST=$_POST;
include('class.ImageFilter.php');
require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
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
$guardasd=$_POST['guardass'];
if ($guardasd!=''){ 

$tituloa=$_POST['tituloa'];
$theDate2=$_POST['theDate2'];
$theDate3=$_POST['theDate3'];
$reponsable=$_POST['reponsable'];
$info=$_POST['info'];
$edo=$_POST['edo'];


$nombre_archivo2 = $_FILES['fotop']['name']; 
$tipo_archivo2 = $_FILES['fotop']['type']; 
$tamano_archivo2 = $_FILES['fotop']['size']; 
$ex=obtenerext($nombre_archivo2);




$nombre_archivor = $_FILES['fotop2']['name']; 
$tipo_archivor = $_FILES['fotop2']['type']; 
$tamano_archivor = $_FILES['fotop2']['size']; 
$exr=obtenerext($nombre_archivor);

$fec=date("Y-m-d");
$fot='cartelera';

if (!is_dir($fot)){
		  
					mkdir($fot,0777); //chmod($fot,0777);
					$dir=$fot.'/'.$fec; 
			
			  	if (!is_dir($dir)){
					mkdir($dir,0777); //chmod($dir,0777);
					} 
					$dir=$dir.'/';
			}
		  	else {
		  		$dir=$fot.'/'.$fec; 
				
				if (!is_dir($dir)){
			
					mkdir($dir,0777); //chmod($dir,0777);
					$dir=$fot.'/'.$fec.'/';
					 
				}
				else {
					$dir=$fot.'/'.$fec.'/'; 
					if (!is_dir($dir)){
			
						mkdir($dir,0777);
						//chmod($dir,0777);
					}  
				}
		  	}	 


 $bd->ejecutar("insert into cartelera values (null,'$theDate2','$tituloa','')");
	$nompic1=$bd->lastID(); 
  
 

   if  (move_uploaded_file($_FILES['fotop']['tmp_name'],$dir.$nombre_archivo2)){ 
 	rename($dir.$nombre_archivo2,$dir.$nompic1.$ex);   
		$dirz=$dir.$nompic1.$ex; 
		$bd->ejecutar("update cartelera set url='$dirz' where id=$nompic1");
 }

	
				 ?>
      
		
				<script type="text/javascript">
				top.location="cartelera.php";
				</script>

             <?		 	
			 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
<?=$pageTitle;?>
:. Admin - Convocatorias</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />

<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td bgcolor="#000000" >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; /* [disabled]background-color:#000000; */">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">


<table width="900" align="center">
  <tr>
    <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
     
    <tr>
      <td align="center" ><form action="<?=$_SERVER['php_self']?>" method="post" enctype="multipart/form-data"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" >
        <tr class="columna">
          <td align="left"  class="negro1"><table width="600" border="0" align="center" cellpadding="4" cellspacing="0" >
            <tr>
              <td colspan="5" align="center"  class="Verdana16Ngo"><strong>Agregar Cartelera</strong></td>
            </tr>
        
            <tr class="Hevel16Gris">
              <td width="15%" align="left"  class="arial13Negro">Titulo</td>
              <td colspan="2" align="left"  class="text2"><label for="tituloa"></label>
                <input type="text" name="tituloa" id="tituloa" /></td>
              <td align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro">&nbsp;</td>
              <td width="35%" align="left"  class="text2">&nbsp;</td>
              <td width="15%" align="center"  class="arial13Negro">&nbsp;</td>
              <td align="left"  class="text2">&nbsp;</td>
              </tr>
            <tr class="Hevel16Gris">
              <td align="left"  class="arial13Negro"><strong>Fecha</strong></td>
              <td align="left"  class="text2"><input name="theDate2" type="text" value="<?=date("Y-m-d");?>" size="15" readonly onClick="displayCalendar(document.forms[0].theDate2,'yyyy-mm-dd',this)" /></td>
              <td align="center"  class="arial13Negro">&nbsp;</td>
              <td align="left"  class="text2">&nbsp;</td>
              </tr>
            <tr class="Hevel16Gris">
              <td height="40" align="left"  class="arial13Negro">Documento PDF</td>
              <td align="left"  class="text2"><span class="menu">
                <input type="file" name="fotop" id="fotop" />
                </span></td>
              <td align="center"  class="text2">&nbsp;</td>
              <td align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="40" align="left"  class="arial13Negro">&nbsp;</td>
              <td align="left"  class="text2">&nbsp;</td>
              <td align="left"  class="Helvetica09Gris">&nbsp;</td>
              <td align="left"  class="text2">&nbsp;</td>
            </tr>
            <tr class="Hevel16Gris">
              <td height="40" colspan="4" align="center"  class="arial13Negro"><input type="submit" name="guardass" id="guardass" value="Guardar" /></td>
              <!--<td align="left" class="text2">Grupo</td>-->              </tr>
            <?
		$page = $_GET['page'];
		if ($page!='')
		{
			$_SESSION['artistaspage']=$page;
		}
		if ($page=='')
		{
			$page=$_SESSION['artistaspage'];
		}
		$pagedResults = new Paginated($names, 12, $page);
		$ids='0';
		while($row = $pagedResults->fetchPagedRow()) {
			$ids.=','.$row;
		}				
						$sqll="Select * from artistas_datos where id in ($ids) order by nombre asc";
						$resultl =@$bd->ejecutar($sqll); 
						$wf=0;
						$sty='style=" background-color:#F0F0F0" ';
						while ($rowl =@$bd->obtener_fila($resultl, 0)){
						$idgrup=$rowl['id'];
						?>
            <?  $wf++; } ?>
          </table></td>
        </tr>
      </table></form></td>
    </tr></table>
      </td>
  </tr>
  <tr>
    <td align="center" class="Arial12Gris">&nbsp;</td>
  </tr>
</table>


           </td>
</tr>  <tr style="border: 0px; background: #000">
      <td height="37" align="left" class="bcoabajo" >
      <? include "footer.php"; ?> 
      </td>
</table>
</body>
</html>
<? 
$bd->liberarawilly();
} ?>