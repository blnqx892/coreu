<?php
include ("../../Confi/conexion.php");
$conexion = con();

$body = json_decode(file_get_contents("php://input"));

$id = $_GET["id"];

$query = "update ingreso_suministros set
                               codigo_barra = '".$body->codigo_barra."',
                               nombre_suministro = '".$body->nombre_suministro."',
                               presentacion = '".$body->presentacion."',
                               unidad_medida = '".$body->unidad_medida."',
                               existencia_minima = ".$body->existencia_minima.",
                               existencia_maxima = ".$body->existencia_maxima.",
                               almacen = '".$body->almacen."',
                               estante = '".$body->estante."',
                               entrepaño = '".$body->entrepano."',
                               casilla = '".$body->casilla."',
                               categoria_id = '".$body->categoria_id."'
 where id = ".$id;

$response["statusCode"] = 500;
$response["message"] = "Algo salió mal, no se pudo editar";

if (mysqli_query($conexion, $query)) {
  $response["statusCode"] = 200;
  $response["data"] = $id;
  $response["message"] = "Registro editado";
}

echo json_encode($response);
