<?php
error_reporting(0);
$pageTitle='IVEC';
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
date_default_timezone_set('America/Mexico_City'); 	
/* Clase encargada de gestionar las conexiones a la base de datos */
class Db{

   private $servidor;
   private $usuario;
   private $password;
   private $base_datos;
   private $link;
   private $stmt;
   private $cierra;
   private $liberar;
   private $array;

   static $_instance;

   /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
   private function __construct(){
      $this->setConexion();
      $this->conectar();
   }

   /*Método para establecer los parámetros de la conexión*/
   private function setConexion(){
      $conf = Conf::getInstance();
      $this->servidor=$conf->getHostDB();
      $this->base_datos=$conf->getDB();
      $this->usuario=$conf->getUserDB();
      $this->password=$conf->getPassDB();
   }

   /*Evitamos el clonaje del objeto. Patrón Singleton*/
   private function __clone(){ }

   /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
   public static function getInstance(){
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
         return self::$_instance;
   }

   /*Realiza la conexión a la base de datos.*/
   private function conectar(){
      $this->link=@mysql_connect($this->servidor, $this->usuario, $this->password);
     @mysql_select_db($this->base_datos,$this->link);
      //@mysql_query("SET NAMES 'utf8'");
   }

   /*Método para ejecutar una sentencia sql*/
   public function ejecutar($sql){
      $this->stmt=mysql_query($sql,$this->link);
      return $this->stmt;
   }

  /*Método para Cerrar la DB sql*/
   public function cerrar(){
      $this->cierra=mysql_close($this->link);
      return $this->cierra;
   }

       /*Método para Liberar la memoria o a willy la ballena*/
	  public function fechacp($fecha){ 
$fecha= strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
$diasemana=date("w", $fecha);// optiene el número del dia de la semana. El 0 es domingo 
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
$ano=substr($ano,2,2);
$fecha= $dia."/".$mes."/".$ano; // unimos el resultado en una unica cadena 
return $fecha; //enviamos la fecha al programa
} 
   public function liberarawilly(){
      $this->liberar=@mysql_free_result($this->stmt);
      return $this->liberar;
   }
   /*numero de lineas*/
 public function num_rows($stmt){ 
  return @mysql_num_rows($stmt);
  }

   /*Método para obtener una fila de resultados de la sentencia sql*/
   public function obtener_fila($stmt,$fila){
      if ($fila==0){
         $this->array=mysql_fetch_array($stmt);
      }else{
         @mysql_data_seek($stmt,$fila);
         $this->array=@mysql_fetch_array($stmt);
      }
      return $this->array;
   }

   //Devuelve el último id del insert introducido
   public function lastID(){
      return @mysql_insert_id($this->link);
   }
   public function replace($cadena){
$cadena=str_replace("select","",$cadena);
$cadena=str_replace("delete","",$cadena);
$cadena=str_replace("drop","",$cadena);
$cadena=str_replace("'","",$cadena);
$cadena=str_replace("*","",$cadena);
$cadena=str_replace(";","",$cadena);
$cadena=str_replace("?","",$cadena);
$cadena=str_replace(">","",$cadena);
$cadena=str_replace("<","",$cadena);
$cadena=str_replace("script","",$cadena);
return $cadena;
}

    public function comprobaremail($email){
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
	public 	function rarosr($cad){    
$cad=str_replace('%coma%',"'",$cad);
$cad=stripslashes($cad);

 
return $cad;

}

public function decodeUTF8($array) {
        foreach ($array as $k => $postTmp) {
			if (is_array($postTmp)) {
				$array[$k]= decodeUTF8($postTmp);
				}else{
					 $array[$k] = utf8_decode($postTmp);
			}
	 }
	  return $array;
}


public function decimal_romano($numero)
{
	$numero=floor($numero);
	if($numero<0)
	{
		$var="-";
		$numero=abs($numero);
	}
	# Definición de arrays
	$numerosromanos=array(1000,500,100,50,10,5,1);
	$numeroletrasromanas=array("M"=>1000,"D"=>500,"C"=>100,"L"=>50,"X"=>10,"V"=>5,"I"=>1);
	$letrasromanas=array_keys($numeroletrasromanas);
	
	while($numero)
	{
		for($pos=0;$pos<=6;$pos++)
		{
			$dividendo=$numero/$numerosromanos[$pos];
			if($dividendo>=1)
			{
				$var.=str_repeat($letrasromanas[$pos],floor($dividendo));
				$numero-=floor($dividendo)*$numerosromanos[$pos];
			}
		}
	}
	$numcambios=1;
	while($numcambios)
	{
		$numcambios=0;
		for($inicio=0;$inicio<strlen($var);$inicio++)
		{
			$parcial=substr($var,$inicio,1);
			if($parcial==$parcialfinal&&$parcial!="M")
			{
				$apariencia++;
			}else{
				$parcialfinal=$parcial;
				$apariencia=1;
			}
			# Caso en que encuentre cuatro carácteres seguidos iguales.
			if($apariencia==4)
			{
				$primeraletra=substr($var,$inicio-4,1);
				$letra=$parcial;
				$sum=$primernumero+$letternumero*4;
				$pos=busqueda($letra,$letrasromanas);
				if($letrasromanas[$pos-1]==$primeraletra)
				{
					$cadenaant=$primeraletra.str_repeat($letra,4);
					$cadenanueva=$letra.$letrasromanas[$pos-2];
				}else{
					$cadenaant=str_repeat($letra,4);
					$cadenanueva=$letra.$letrasromanas[$pos-1];
				}
				$numcambios++;
				$var=str_replace($cadenaant,$cadenanueva,$var);
			}
		}
	}
	return $var;
}

private function busqueda($cadenanueva,$array)
{
	foreach($array as $contenido)
	{
		if($contenido==$cadenanueva)
		{
			return $pos;
		}
		$pos++;
	}
}

}

/**
 * Clase NumerosRomanos.
 * Realiza conversiones entre numeros romanos y decimales.
 * Compatible con error_reporting(E_ALL | E_STRICT).
 *
 * @package     matematicas creado para forosdelweb.
 * @copyright   2010 - ObjetivoPHP
 * @license     Gratuito (Free) http://www.opensource.org/licenses/gpl-license.html
 * @author      Marcelo Castro (ObjetivoPHP)
 * @link        objetivophp@******.***.**
 * @version     0.2.2 (16/08/2010 - 21/08/2010)
 */
abstract class NumerosRomanos
{
    /**
     * Contiene las equivalencias de numeros romanos para unidades, decimales,
     * centenas y miles.
     * @var array
     */
    private static  $_romanos =     array(0   =>    array(0 => '',
                                                          1 => 'I',
                                                          2 => 'II',
                                                          3 => 'III',
                                                          4 => 'IV',
                                                          5 => 'V',
                                                          6 => 'VI',
                                                          7 => 'VII',
                                                          8 => 'VIII',
                                                          9 => 'IX'),
                                          1    =>   array(0 => '',
                                                          1 => 'X',
                                                          2 => 'XX',
                                                          3 => 'XXX',
                                                          4 => 'XL',
                                                          5 => 'L',
                                                          6 => 'LX',
                                                          7 => 'LXX',
                                                          8 => 'LXXX',
                                                          9 => 'XC'),
                                          2   =>    array(0 => '',
                                                          1 => 'C',
                                                          2 => 'CC',
                                                          3 => 'CCC',
                                                          4 => 'CD',
                                                          5 => 'D',
                                                          6 => 'DC',
                                                          7 => 'DCC',
                                                          8 => 'DCCC',
                                                          9 => 'CM'),
                                          3 =>      array(0 => '',
                                                          1 => 'M',
                                                          2 => 'MM',
                                                          3 => 'MMM'));
 
    /**
     * Contiene los divisores para identificar por donde comenzar la conversion.
     * @var array
     */
    private static $_divisores =    array(1, 10, 100, 1000);
 
    /**
     * Contiene las equivalencias entre romano y decimal.
     * @var array
     */
    private static $_decimal =      array('.'   => 0,
                                          'I'   => 1,
                                          'V'   => 5,
                                          'X'   => 10,
                                          'L'   => 50,
                                          'C'   => 100,
                                          'D'   => 500,
                                          'M'   => 1000);
 
    /**
     * Convierte un numero expresado en decimal a notacion Romana.
     * @param   integer $numero Numero que se desea convertir en romano.
     *                  desde 0 a 3999.-
     * @return  string
     */
    public static function decimalRomano($numero)
    {
        $retorno = '';
        for ($div = 3; $div > -1; $div--) {
            $aux     =  (int)($numero/self::$_divisores[$div]);
                $retorno.= self::$_romanos[$div][$aux];
                $numero -=self::$_divisores[$div]*$aux;
        }
        return $retorno;
    }
 
    /**
     * Convierte un numero expresado en romanos a notacion decimal.
     * @param   string $romano  Numero de tipo romano Ej.DCCCLXXXVIII.
     * @return  integer
     */
    public static function romanoDecimal($romano)
    {
        $decimal    = 0;
        $letras     = strlen($romano);
        $romano    .= '.';
        for ($r = 0; $r < $letras; $r++) {
            $valorI     = self::$_decimal[$romano[$r]];
            $valorII    = self::$_decimal[$romano[$r+1]];
            $decimal += ($valorI < $valorII)? - $valorI : $valorI;
        }
        return $decimal;
    }
}

?> 