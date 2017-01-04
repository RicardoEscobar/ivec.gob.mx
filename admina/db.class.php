<?php
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


?> 