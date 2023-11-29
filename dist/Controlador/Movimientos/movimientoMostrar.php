<?php

include("../../Confi/conexion.php");
$con = con();

 $sql="SELECT * from mantenimiento_activos order by tipo_movimiento ASC";

  $result = mysqli_query($conexion, $sql);
 // var_dump(mysqli_query($conexion, $sql));

  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
      'id'    => $row['id'],
      'name' => $row['tipo_movimiento']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
