<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
include('class.ImageFilter.php');
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

 $id=$_GET['id'];
 $busca=$bd->ejecutar("select * from fracc_contenido where id=$id");
 $rowf=$bd->obtener_fila($busca,0);
 
 
$fracc=$_SESSION['iddelafraccion'];
if ($fracc==''){ echo '<script language="javascript"> document.location="fracciones.php"; </script>'; exit();  }
 

$enviar2=$_POST['Agregar'];
		if (!empty($enviar2)) {

       
 

$nombre_archivo2 = $_FILES['userfile2']['name']; 
$tipo_archivo2 = $_FILES['userfile2']['type']; 
$tamano_archivo2 = $_FILES['userfile2']['size']; 

$ex=obtenerext($nombre_archivo2);
$titulo1=$_POST['titulo1'];
$mes=$_POST['mes'];
$numero=$_POST['numero'];
  
	 $bd->ejecutar("update fracc_contenido set titulo='$titulo1', mes='$mes', ano='$numero' where id='$id'");	
			 
			 	
			 
			 	 
		
           
				 ?>
      
		
				<script type="text/javascript">
				top.location="datosf.php";
				</script>

             <?
	
			
			
 
		}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pageTitle;?>:. Admin - Agregar Foto</title>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
 <script language="JavaScript"> 
 function limite(que,cuanto) 
 { 
 var v=que.value 
 if(v.length>cuanto) que.value=v.substring(0,cuanto) 
 else 
 document.reduce.cont.value=cuanto-v.length 
 } 
 </script>
 <script language="javascript">
 function cambia(){
	 var mes=$("#mes").val();
	 if (mes==0){ 
	 	$("#anx").html("");
		$("#numero").css("display","none");
	 }
	 else {
	 	$("#anx").html("<strong>Año</strong>");
		$("#numero").css("display","block");
		$("#numero").val("<?=$rowf["ano"];?>");
	 }

	 
 }
</script> 
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body onLoad="cambia()"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<div  style="float:left; width:960px; ">
    	
        
      	<? include "header.php"; ?> <div style="float: left; width: 960px; background-color: #000000">
    <? include ('menu.php'); ?>
  </div>
</div>
</td></tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style=" padding:10px 0">
      
  <table align="center">
    <tr>
      <td><span class="Verdana16Ngo"><strong>Modificar  Documento</strong></span></td>
      </tr>
    <tr>
      <td align="center"><form name="reduce" method="post" action="upddocf.php?id=<?=$id?>" enctype="multipart/form-data">
        <table align="center" cellpadding="4" cellspacing="4">
          <tr>
            <td height="38" align="left" valign="top" class="Hevel16Gris"><p><strong><span class="titulo1">Ti</span></strong><strong><span class="titulo1">tulo</span></strong></p></td>
            <td align="left" class="menu"><textarea name="titulo1" cols="60" rows="3" class="titulo1"><?=$rowf['titulo']?></textarea>            </td>
          </tr>
          <tr>
            <td height="15" align="left" valign="top" class="Hevel16Gris"><strong><span class="titulo1">Mes<br />
               
                </span></strong></td>
            <td class="menu" align="left"> 
              <select name="mes" id="mes" onChange="cambia()"> 
                <option value="0"  <? if($rowf['mes']==0) { ?> selected="selected" <? } ?>>General</option>
                <option value="1"  <? if($rowf['mes']==1) { ?> selected="selected" <? } ?>>Enero</option>
                <option value="2"  <? if($rowf['mes']==2) { ?> selected="selected" <? } ?>>Febrero</option>
                <option value="3"  <? if($rowf['mes']==3) { ?> selected="selected" <? } ?>>Marzo</option>
                <option value="4" <? if($rowf['mes']==4) { ?> selected="selected" <? } ?>>Abril</option>
                <option value="5" <? if($rowf['mes']==5) { ?> selected="selected" <? } ?>>Mayo</option>
                <option value="6" <? if($rowf['mes']==6) { ?> selected="selected" <? } ?>>Junio</option>
                <option value="7" <? if($rowf['mes']==7) { ?> selected="selected" <? } ?>>Julio</option>
                <option value="8" <? if($rowf['mes']==8) { ?> selected="selected" <? } ?>>Agosto</option>
                <option value="9" <? if($rowf['mes']==9) { ?> selected="selected" <? } ?>>Septiembre</option>
                <option value="10" <? if($rowf['mes']==10) { ?> selected="selected" <? } ?>>Octubre</option>
                <option value="11" <? if($rowf['mes']==11) { ?> selected="selected" <? } ?>>Noviembre</option>
                <option value="12" <? if($rowf['mes']==12) { ?> selected="selected" <? } ?>>Diciembre</option>
              </select> </td>
            </tr>
          <tr>
            <td height="19" align="left" valign="top" class="Hevel16Gris" id="anx"><strong>A&ntilde;o</strong></td>
            <td class="menu" align="left"><span class="Arial12Gris">
              <input name="numero" type="text" id="numero" style="width:40px" autocomplete="off" onKeyUp="buscar(this.value)" value="<?=$rowf['ano'];?>" />
            </span></td>
          </tr>
          <tr class="titulo-3">
            <td colspan="2" align="center"><label for="pnid"></label>
              <input type="submit" name="Agregar" value="Guardar" class="titulo1" />
              <!--<input name="can" type="button" class="titulo1" id="can" onClick="cancelar()" value="Cancelar" />--></td>
          </tr>
          </table>
        </form></td>
      </tr>
  </table>
  </td>
  </tr>  <tr style="border: 0px; background: #000">
        <td height="37" align="left" class="bcoabajo" ><? include "footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
<? } ?>