<?php
include ("../../Confi/conexion.php");
$conexion = con();

$body = json_decode(file_get_contents("php://input"));

$fechaId = new DateTime();
$timestamp = $fechaId->getTimestamp();

$query = "insert
into ingreso_suministros (
                          id,
                          codigo_barra,
                          nombre_suministro
) values (
          ".$timestamp.",
          '".$body->codigo_barra."',
          '".$body->nombre_suministro."'
)";

$response["statusCode"] = 500;
$response["message"] = "Algo salió mal, no se pudo guardar";

if (mysqli_query($conexion, $query)) {
  $response["statusCode"] = 200;
  $response["data"] = $timestamp;
  $response["message"] = "Registro guardado";
}

echo json_encode($response);
