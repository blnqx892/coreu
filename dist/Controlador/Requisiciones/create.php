<?php
include ("../../Confi/conexion.php");
$conexion = con();

$body = json_decode(file_get_contents("php://input"));

// Obtener el estado pendiente de aprobación
$q_estado = "select * from estado_requisicion where codigo = 'pendiente.aprobacion'";

$estado = null;
$r_estado = mysqli_query($conexion, $q_estado);

while ($e = mysqli_fetch_array($r_estado)) {
  $estado = $e["id"];
}

// Guardar requisicion
$fechaId = new DateTime();
$timestamp = $fechaId->getTimestamp();
$fechaCreacion = $fechaId->format('Y-m-d H:i:s');

$q_req = "insert into requisicion_suministro (
                                    id,
                                    unidad_id,
                                    fecha_requisicion,
                                    fecha_creacion,
                                    creado_por,
                                    estado_id
) values (
          ".$timestamp.",
          ".$body->unidad.",
          '".$body->fechaPedido."',
          '".$fechaCreacion."',
          'Usuario',
          ".$estado."
)";

mysqli_query($conexion, $q_req);

$q_suministro = "";
// Guardar los suministros
foreach ($body->suministros as $suministro) {
  $id2 = intval(microtime(true)*1000000);

  $q_suministro .= "insert into detalle_requisicion (
                                 id,
                                 requisicion_id,
                                 suministro_id,
                                 cantidad_solicitada
) values (
          ".$id2.",
          ".$timestamp.",
          ".$suministro->suministroId.",
          ".$suministro->cantidad."
);";
}

echo json_encode($q_suministro);

$response["statusCode"] = 500;
$response["message"] = "Algo salió mal, no se pudo guardar";

if (mysqli_query($conexion, $q_suministro)) {
  $response["statusCode"] = 200;
  $response["data"] = $timestamp;
  $response["message"] = "Registro guardado";
}

echo json_encode($response);
