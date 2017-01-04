<?php
error_reporting(0);
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
      @mysql_query("SET NAMES 'utf8'");
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
 