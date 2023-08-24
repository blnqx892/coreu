<?php
include ("../../Confi/conexion.php");
$conexion = con();

$id = $_GET["id"];
$body = json_decode(file_get_contents("php://input"));

// Obtener el estado pendiente de aprobación
$q_estado = "select * from estado_requisicion where codigo = 'finalizado'";

$estado = null;
$r_estado = mysqli_query($conexion, $q_estado);

while ($e = mysqli_fetch_array($r_estado)) {
  $estado = $e["id"];
}

// Actualizar requisición
$q_req = "update requisicion_suministro set estado_id = ".$estado." where id = ".$id;

mysqli_query($conexion, $q_req);

$q_suministro = "";
// Guardar los suministros
$is_ok = true;
foreach ($body as $suministro) {
  $q_suministro = "update detalle_requisicion set cantidad_despachada = ".$suministro->cantidad." where id = ".$suministro->detalle_id;

  if (!mysqli_query($conexion, $q_suministro)) {
    $is_ok = false;
  }

  // Guardar salida de kardex requisicion
  $fechaActual = date_create();
  $fecha = date_format($fechaActual, "Y-m-d");
  $fechaCreacion = date_format($fechaActual, "Y-m-d H:i:s");
  $id2 = intval(microtime(true)*1000000);

  $q_kardex = "insert into kardex (id, fecha, concepto, movimiento, cantidad_entrada, precio_entrada, cantidad_salida, precio_salida, saldo_articulos, fondos_procedencia, fk_ingreso_suministros, fecha_creacion) values (".$id2.", '".$fecha."', 'Salida de requisicion: ".$id."', 0, 0, 0, ".$suministro->cantidad.", 0, 0, 0, ".$suministro->suministro_id.", '".$fechaCreacion."')";

  if (!mysqli_query($conexion, $q_kardex)) {
    $is_ok = false;
  }
}

if ($is_ok) {
  $response["statusCode"] = 200;
  $response["data"] = $id;
  $response["message"] = "Registro guardado";
} else {
  $response["statusCode"] = 500;
  $response["message"] = "Algo salió mal, no se pudo guardar";
}




echo json_encode($response);
