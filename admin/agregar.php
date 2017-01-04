<? session_start(); 
 setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 	
$ss=$_SESSION['ivecpermiso'];
if ($ss!='PermisoOk'){ echo '<script   language="javascript"> document.location="loggeo.php"</script>'; }  else {

require 'db.class.php';
require 'conf.class.php';
$bd=Db::getInstance();
	
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
	$hora=date("H:i:s"); 
	$fecha= date("Y-m-d");
	$rs=$_POST['rs'];
	if ($rs!=1){ $rs=0; }
	
	
	
	if ($otroa!='')
	{
		$bak=$bd->ejecutar("select * from autor where nombre='$otroa'");
		$kbak=@$bd->obtener_fila($bak,0);
		$autor=$kbak['id'];
		if ($autor=='') {
			$ck=$bd->ejecutar("insert into autor values(null,'$otroa',1,1)");
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
	
	
	

				if ( ($titulo=='') or ($resumen=='')or ($texto==''))
				{
				$cad="nota.php?ref=".$ref."&ids=".$ids.'&No tiene resumen o algo'; 	
				//$vacio=1;
				}
				
				
					else{  
					
					   $link=$_POST['link']; 
					     if ($agregar==1 ) // se desea agregar foto  
						 
						 	{									
						//echo ' Inserta con foto<br/>';
		if ($bd->ejecutar("insert into nota values (NULL,'$titulo','$resumen','$texto','$fecha','$autor','$lugar','si','$posicion','$seccion','$hora',0,'$rs','$ngra','$moment','$np','$link')")){			
							
									$bn=$bd->ejecutar("select * from nota order by id_nota desc limit 1");
									$knb=@$bd->obtener_fila($bn,0);	
									$idf=$knb['id_nota'];									
									$cad="upfoto.php?idnota=".$idf;
									
									$bita=1;
								}
						else
						{
							?><script language="javascript">alert("Error al ejecutar instruccion Insert.... Nota no agregada");</script><?
							$cad="vernota.php";
						}
									
								}
					
					
						else
						{
							//echo ' Inserta sin foto<br/>';
								if ($bd->ejecutar("insert into nota values (NULL,'$titulo','$resumen','$texto','$fecha','$autor','$lugar','no','$posicion','$seccion','$hora',0,'$rs','$ngra','$moment','$np','$link')")){
						$cad="vernota.php?ref=".$ref."&ids=".$ids;
						$bita=1;
						}
						else
						{
							?><script language="javascript">alert("Error al ejecutar instruccion Insert.... Nota no agregada");</script><?
							$cad="vernota.php";
						}
						
						}
						
				
						

					}


					




?>




 <script language="javascript"> 
   document.location="<?= $cad;?>"; 
</script> 


 <? } ?>