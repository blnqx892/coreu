<?php
session_start();
include ("../../Confi/conexion.php");
$conexion = con();

$body = json_decode(file_get_contents("php://input"));

$fechaId = new DateTime();
$timestamp = $fechaId->getTimestamp();

$suministro = $_GET["suministro"];

$query = "insert
into kardex (
                          id,
                          fecha,
                          concepto,
                          cantidad_entrada,
                          precio_entrada,
                          cantidad_salida,
                          precio_salida,
                          fondos_procedencia,
                          fk_ingreso_suministros
) values (
          ".$timestamp.",
          '".$body->fecha."',
          '".$body->concepto."',
          ".($body->tipo_movimiento == 'entrada' ? $body->cantidad : 0).",
          ".($body->tipo_movimiento == 'entrada' ? $body->precio : 0).",
          ".($body->tipo_movimiento == 'salida' ? $body->cantidad : 0).",
          ".($body->tipo_movimiento == 'salida' ? $body->precio : 0).",
          ".$body->fondos_procedencia.",
          ".$suministro."
)";

 //////////CAPTURA DATOS PARA BITACORA
 $conexion = con();
 $usuari=$_SESSION['usuarioActivo'];
 $nom=$usuari['nombre']. ' ' .$usuari['apellido'];
 $sql1 = "INSERT INTO bitacora (evento,usuario,fecha_creacion) VALUES ('Se ejecuto movimiento en el stock de Almacén','$nom',now())";
 mysqli_query($conexion,$sql1) or die ("Error a Conectar en la BD guardo bita".mysqli_connect_error());
 //////////////////////////////////////////

$response["statusCode"] = 500;
$response["message"] = "Algo salió mal, no se pudo guardar";

if (mysqli_query($conexion, $query)) {
  $response["statusCode"] = 200;
  $response["data"] = $timestamp;
  $response["message"] = "Registro guardado";
}

echo json_encode($response);
mysqli_close($conexion);
?>
