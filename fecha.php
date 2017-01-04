 <?
function fechac($fecha){ 
 $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
    $diasemana=date("w", $fecha);// optiene el número del dia de la semana. El 0 es domingo 
       switch ($diasemana) 
       { 
       case "0": 
          $diasemana="Dom"; 
          break; 
       case "1": 
          $diasemana="Lun"; 
          break; 
       case "2": 
          $diasemana="Mar"; 
          break; 
       case "3": 
          $diasemana="Mié"; 
          break; 
       case "4": 
          $diasemana="Jue"; 
          break; 
       case "5": 
          $diasemana="Vie"; 
          break; 
       case "6": 
          $diasemana="Sáb"; 
          break; 
       } 
    $dia=date("d",$fecha); // día del mes en número 
    $mes=date("m",$fecha); // número del mes de 01 a 12 
       switch($mes) 
       { 
       case "01": 
          $mes="Enero"; 
          break; 
       case "02": 
          $mes="Febrero"; 
          break; 
       case "03": 
          $mes="Marzo"; 
          break; 
       case "04": 
          $mes="Abril"; 
          break; 
       case "05": 
          $mes="Mayo"; 
          break; 
       case "06": 
          $mes="Junio"; 
          break; 
       case "07": 
          $mes="Julio"; 
          break; 
       case "08": 
          $mes="Agosto"; 
          break; 
       case "09": 
          $mes="Septiembre"; 
          break; 
       case "10": 
          $mes="Octubre"; 
          break; 
       case "11": 
          $mes="Noviembre"; 
          break; 
       case "12": 
          $mes="Diciembre"; 
          break; 
       } 
    $ano=date("Y",$fecha); // optenemos el año en formato 4 digitos 
    $fecha= $diasemana." ".$dia." de ".$mes; // unimos el resultado en una unica cadena
 return htmlentities($fecha);  //enviamos la fecha al programa
} 


function fechamc($fecha){ 
 $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
    $diasemana=date("w", $fecha);// optiene el número del dia de la semana. El 0 es domingo 
       switch ($diasemana) 
       { 
       case "0": 
          $diasemana="Dom"; 
          break; 
       case "1": 
          $diasemana="Lun"; 
          break; 
       case "2": 
          $diasemana="Mar"; 
          break; 
       case "3": 
          $diasemana="Mié"; 
          break; 
       case "4": 
          $diasemana="Jue"; 
          break; 
       case "5": 
          $diasemana="Vie"; 
          break; 
       case "6": 
          $diasemana="Sáb"; 
          break; 
       } 
    $dia=date("d",$fecha); // día del mes en número 
    $mes=date("m",$fecha); // número del mes de 01 a 12 
       switch($mes) 
       { 
       case "01": 
          $mes="Enero"; 
          break; 
       case "02": 
          $mes="Febrero"; 
          break; 
       case "03": 
          $mes="Marzo"; 
          break; 
       case "04": 
          $mes="Abril"; 
          break; 
       case "05": 
          $mes="Mayo"; 
          break; 
       case "06": 
          $mes="Junio"; 
          break; 
       case "07": 
          $mes="Julio"; 
          break; 
       case "08": 
          $mes="Agosto"; 
          break; 
       case "09": 
          $mes="Septiembre"; 
          break; 
       case "10": 
          $mes="Octubre"; 
          break; 
       case "11": 
          $mes="Noviembre"; 
          break; 
       case "12": 
          $mes="Diciembre"; 
          break; 
       } 
    $ano=date("Y",$fecha); // optenemos el año en formato 4 digitos 
    $fecha= $dia." / ".$mes. ' / '.$ano; // unimos el resultado en una unica cadena
 return htmlentities($fecha);  //enviamos la fecha al programa
} 


function fechag($fecha){ 
 $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
    $diasemana=date("w", $fecha);// optiene el número del dia de la semana. El 0 es domingo 
       switch ($diasemana) 
       { 
       case "0": 
          $diasemana="Domingo"; 
          break; 
       case "1": 
          $diasemana="Lunes"; 
          break; 
       case "2": 
          $diasemana="Martes"; 
          break; 
       case "3": 
          $diasemana="Miércoles"; 
          break; 
       case "4": 
          $diasemana="Jueves"; 
          break; 
       case "5": 
          $diasemana="Viernes"; 
          break; 
       case "6": 
          $diasemana="Sábado"; 
          break; 
       } 
    $dia=date("d",$fecha); // día del mes en número 
    $mes=date("m",$fecha); // número del mes de 01 a 12 
       switch($mes) 
       { 
       case "01": 
          $mes="Enero"; 
          break; 
       case "02": 
          $mes="Febrero"; 
          break; 
       case "03": 
          $mes="Marzo"; 
          break; 
       case "04": 
          $mes="Abril"; 
          break; 
       case "05": 
          $mes="Mayo"; 
          break; 
       case "06": 
          $mes="Junio"; 
          break; 
       case "07": 
          $mes="Julio"; 
          break; 
       case "08": 
          $mes="Agosto"; 
          break; 
       case "09": 
          $mes="Septiembre"; 
          break; 
       case "10": 
          $mes="Octubre"; 
          break; 
       case "11": 
          $mes="Noviembre"; 
          break; 
       case "12": 
          $mes="Diciembre"; 
          break; 
       } 
    $ano=date("Y",$fecha); // optenemos el año en formato 4 digitos 
    $fecha= $diasemana." ".$dia." de ".$mes." de ".$ano; // unimos el resultado en una unica cadena
 return htmlentities($fecha);  //enviamos la fecha al programa
} 




function hora($fecha)
{
if ($fecha)
{
//$p=split(" ",$fecha);
//$f=split("-",$p[0]);
$h=split(":",$fecha);
//$h=$fecha;
//cambio de fecha
//$nummes=(int)$f[1];
//$mes1="0-Ene-Feb-Mar-Abr-May-Jun-Jul-Agos-Sept-Oct-Nov-Dic";
//$mes1=split("-",$mes1);

//cambio de hora

$numhora=(int)$h[0];
$momento = 'a.m.';
if ($numhora >= 12)
{
$numhora = $numhora - 12;
$momento = 'p.m.';
}
if ($numhora==0)
{
	$numhora=12;
}

$desfechahora="$numhora:$h[1] $momento";
return $desfechahora;
}
}

function horavc($fecha)
{
if ($fecha)
{
$h=split(":",$fecha);
$numhora=(int)$h[0];
if ($numhora<10)
{ $numhora='0'.$numhora; }
$desfechahora="$numhora:$h[1]";
return $desfechahora;
}
}




function fechacp($fecha){ 
 $fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
    $diasemana=date("w", $fecha);// optiene el número del dia de la semana. El 0 es domingo 
       switch ($diasemana) 
       { 
       case "0": 
          $diasemana="Dom"; 
          break; 
       case "1": 
          $diasemana="Lun"; 
          break; 
       case "2": 
          $diasemana="Mar"; 
          break; 
       case "3": 
          $diasemana="Mié"; 
          break; 
       case "4": 
          $diasemana="Jue"; 
          break; 
       case "5": 
          $diasemana="Vie"; 
          break; 
       case "6": 
          $diasemana="Sáb"; 
          break; 
       } 
    $dia=date("d",$fecha); // día del mes en número 
    $mes=date("m",$fecha); // número del mes de 01 a 12 
       switch($mes) 
       { 
       case "01": 
          $mes="Ene"; 
          break; 
       case "02": 
          $mes="Feb"; 
          break; 
       case "03": 
          $mes="Mar"; 
          break; 
       case "04": 
          $mes="Abr"; 
          break; 
       case "05": 
          $mes="May"; 
          break; 
       case "06": 
          $mes="Jun"; 
          break; 
       case "07": 
          $mes="Jul"; 
          break; 
       case "08": 
          $mes="Ago"; 
          break; 
       case "09": 
          $mes="Sep"; 
          break; 
       case "10": 
          $mes="Oct"; 
          break; 
       case "11": 
          $mes="Nov"; 
          break; 
       case "12": 
          $mes="Dic"; 
          break; 
       } 
    $ano=date("Y",$fecha); // optenemos el año en formato 4 digitos 
    $fecha= $dia."/".$mes."/".$ano; // unimos el resultado en una unica cadena
 return htmlentities($fecha);  //enviamos la fecha al programa
} 

function comprobar_email($email){
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminación del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if ($mail_correcto)
       return 1;
    else
       return 0;
}
?>