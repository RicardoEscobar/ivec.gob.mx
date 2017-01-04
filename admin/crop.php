<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();

$id=$_GET['id'];
$r=$_GET['r'];
if ($r!=''){ $_SESSION['rrr']=$r; } 
$rs3=$bd->ejecutar("select * from foto where id=$id order by id desc limit 1");
			$row2=$bd->obtener_fila($rs3,0);
			$nompic1=$row2['id'];
			$url=$row2['url'].$row2['id'].'_e.jpg';
			if (!file_exists($url))
			{
				$url=$row2['url'].$row2['id'].'.png';
			}
			$_SESSION['theurl']=$row2['url'];
			$_SESSION['theidfoto']=$row2['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<title><?=$pageTitle;?>:. Admin - Crop Foto</title>
    
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<style>   
body {	background-image: url(imagenes/barra2.png);
	background-repeat: repeat-x;
	background-color: #ededed;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #666;
}
a
{
	font-family:Arial, Helvetica, sans-serif;
	color:#000;
	text-decoration:none;
}
a:hover{
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	text-decoration: underline;
}
a:visited {
	color: #333;
}
a:link{
	 color: #000;
	 text-decoration: none;	
}

</style>
	<script type="text/javascript" src="js/mootools-for-crop.js"> </script>
	<script type="text/javascript" src="js/UvumiCrop-compressed.js"> </script>
	
	<link rel="stylesheet" type="text/css" media="screen" href="css/uvumi-crop.css" />
	<style type="text/css">
		body,html{
	background-color:#ECECEC;
	margin:0;
	padding:0;
	font-family:Trebuchet MS, Helvetica, sans-serif;
		}
		
		hr{
			margin:20px 0;
		}
		
		#main{
	margin:5px;
	position:relative;
	overflow:auto;
	color:#aaa;
	padding:0px;
	border:1px solid #888;
	background-color:#000;
	text-align:center;
		}

		#resize_coords{
			width:300px;
		}
		
		#previewExample3{
			margin:10px;
		}

		.yellowSelection{
			border: 2px dotted #FFB82F;
		}

		.blueMask{
			background-color:#00f;
			cursor:pointer;
		}
	</style>
	<script type="text/javascript">
		exampleCropper1 = new uvumiCropper('example1',{
			coordinates:true,
			preview:false,
			handles:['left', 'right' ],
			downloadButton:false,
			saveButton:true
		});
	</script>
<style type="text/css">
body {
	background-image: url(../imagenes/back.png);
	background-repeat: repeat-x;
	margin-top: 0px;
	background-color: #E2E2E2;
}
</style>
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body><table width="960" border="0" align="center" cellpadding="0" cellspacing="0"  >
<tr><td >

<? include "header.php"; ?>
</td></tr>
<tr>
  <td bgcolor="#FFFFFF" > &nbsp; &nbsp; Puedes usar <img src="imagenes/crop.jpg" width="17" height="18" border="0" /> para acoplar el encuadre al m&aacute;ximo tama&ntilde;o, este encuadre aparecer&aacute; en el diaporama principal</td>
</tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
      
      <div id="main">
        <div>
          <p>
            <img id="example1" src="<?=$url;?>" alt="cropping test" style="max-width:600px"/>
            </p>
        </div>
      </div>
  </td>
  </tr>  <tr style="border:0px; background:#000000">
        <td height="37" align="left" class="bcoabajo" ><? include "footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
<? } ?>