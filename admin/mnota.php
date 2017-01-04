<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
//$_POST =$bd->decodeUTF8($_POST);

	$idd=$_POST['idd'];	
	$titulo=addslashes($_POST['titulo']);
	$resumen=addslashes($_POST['resumen']);
	$texto=addslashes($_POST['texto']);
	$agregar=$_POST['agregar'];	
	$autor=$_POST['autor'];	
	$otroa=$_POST['otroa'];	
	$lugar=$_POST['lugar'];		
	$lugaq=$_POST['lugaq'];
	$posicion=$_POST['posi']; //notas principales		
	$seccion=$_POST['seccion'];	
	$moment=$_POST['moment2'];//al momento
	$np=$_POST['np']; //aparece en ultimas noticias
	//$hora=date("H:i:s"); 
	//$fecha= date("Y-m-d");
	$logo=$_POST['logo'];
	$hora=$_POST['hhh'].':'.$_POST['mmm'].':00';
	$fecha=$_POST['theDate'];
$subsecc=$_POST['subsecc'];
$convenio=$_POST['convenio'];
$destaca=$_POST['destaca'];
	$rs=$_POST['rs'];
	$muni=$_POST['muni'];
	if ($rs!=1 or $seccion!=19){ $rs=0; }
	
	
	
	
	if ($otroa!='')
	{
		$bak=$bd->ejecutar("select * from autor where nombre='$otroa'");
		$kbak=@$bd->obtener_fila($bak,0);
		$autor=$kbak['id'];
		if ($autor=='') {
			$ck=$bd->ejecutar("insert into autor values(null,'$otroa',1,1,'')");
			$idau=$bd->ejecutar("select * from autor order by id desc limit 1");
			$kau9=@$bd->obtener_fila($idau,0);
			$autor=$kau9['id']; }
	}
	if ($lugaq!='')
	{
		$blk=$bd->ejecutar("select * from lugar where nombre='$otrolug'");
		$kblk=@$bd->obtener_fila($blk,0);
		$lugar=$kblk['id'];
		if ($lugar=='') {
			$ck=$bd->ejecutar("insert into lugar values(null,'$lugaq')");
			$idl=$bd->ejecutar("select * from lugar order by id desc limit 1");
			$kl9=@$bd->obtener_fila($idl,0);
			$lugar=$kl9['id']; }						
	}
	
	//$np=0;
	if ($posicion==1)
	{
		$np=1;
	}

				if ( ($titulo=='') or ($resumen=='')or ($texto==''))
				{
			echo '<script language="javascript"> alert ("Se debe introducir un Titulo, el Resumen y el Texto de la Nota para poder continuar"); </script>';//$vacio=1;
echo '<script language="javascript"> document.location="nota.php"; </script>';
				}
				else{
		 
							
 
 $link=$_POST['link'];
		 
						if ($agregar==1 ) // se desea agregar foto  
						{	
															               																							
							$ck=@$bd->ejecutar("update nota set titulo='$titulo', resumen='$resumen', texto='$texto', id_autor='$autor', id_lugar='$lugar', seccion='$seccion',  fecha='$fecha', hora='$hora', link='$link' where id_nota=$idd");
							echo '
							<script type="text/javascript">
							document.location="upfoto.php?idnota='.$idd.'";
							</script>';
							 	
						}	
						
					
						else if ($agregar==0)
						{
																		               																							
							$ck=@$bd->ejecutar("update nota set titulo='$titulo', resumen='$resumen', texto='$texto', id_autor='$autor', id_lugar='$lugar', seccion='$seccion',  fecha='$fecha', hora='$hora', link='$link' where id_nota=$idd");
							echo '
							<script type="text/javascript">
							document.location="vernota.php";
							</script>';
								
							
						}
 
						
	


			}
@$bd->liberarawilly();

}
?>

 
