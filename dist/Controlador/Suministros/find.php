<?php
include "../../Confi/conexion.php";
$conexion = con();

$id = $_GET["id"];

$query = "select * from ingreso_suministros where id = ".$id;

$result = mysqli_query($conexion, $query);

$response = null;

while ($item = mysqli_fetch_array($result)) {
  $response = array(
    'id' => $item['id'],
    "codigo_barra" => $item["codigo_barra"],
    "nombre_suministro" => $item["nombre_suministro"]
  );
}

echo json_encode($response);
