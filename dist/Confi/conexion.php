<?php
$conexion = mysqli_connect("localhost", "root", "", "sicafi");

 function con(){
     $server = "localhost";
     $user = "root";
     $pass = "";
     $db = "sicafi";

     $con = mysqli_connect($server,$user,$pass) or die ("Error a Conectar en la BD".mysqli_connect_error());
     mysqli_select_db($con, $db) or die ("Error a Conectar en la BD".mysqli_connect_error());
     return $con;
}
// Variables de conexión
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sicafi";

// Conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conexión exitosa";   */

/*class Conexion {

  private static $conexion;

  public static function abrir_conexion() {
      if (!isset(self::$conexion)) {
          try {
              $nombre_servidor = 'localhost';
              $nombre_usuario = 'root';
              $password = '';
              $nombre_base_datos = 'sicafi';
              self::$conexion = new PDO("mysql:host=$nombre_servidor; dbname=$nombre_base_datos", $nombre_usuario, $password);
              self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              self::$conexion->exec("SET CHARACTER SET utf8");
              //print 'conexion abierta';
              //echo '<br>';
          } catch (PDOException $ex) {
              print 'ERROR: ' . $ex->getMessage() . "<br>";
              die();
          }
      }
  }

  public static function cerrar_conexion() {
      if (isset(self::$conexion)) {
          self::$conexion = null;
          //print 'conexion cerrada';
      }
  }

  public static function obtener_conexion(){
      return self::$conexion;
  }

  
}*/
?>
