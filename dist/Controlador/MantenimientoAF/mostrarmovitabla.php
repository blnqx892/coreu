<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
$sql= "SELECT 
ma.id as id_movimiento,
ma.fecha_movimiento as fecha_movimiento,
aa.codigo_institucional as codigo_institucional,
ie.nombre_adquisicion as nombre_adquisicion,
ma.tipo_registro as tipo_registro,
ma.tipo_movimiento as tipo_movimiento
from mantenimiento_activos ma
inner join asignacion_activo aa on ma.fk_asignacion_activo = aa.id
inner join ingreso_entradas ie on aa.fk_ingreso_entradas = ie.id
order by fecha_movimiento desc";

  $result = mysqli_query($conexion, $sql);
  //var_dump( $sql);


  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
// Convierte la fecha de MySQL en "dd-mm-aaaa"
$fechaMySQL = $row['fecha_movimiento'];
$timestamp = strtotime($fechaMySQL);
$fechaFormateada = date("d-m-Y", $timestamp);



    $json[] = array(
      'id'    => $row['id_movimiento'],
      'fech' => $fechaFormateada,
      'codi'=> $row['codigo_institucional'],
      'describien'=> $row['nombre_adquisicion'],
      'tipomo'=> $row['tipo_movimiento'],
      'tipore'=> $row['tipo_registro'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-info  verai-item" id-item-verai="'.$row['id_movimiento'].'  " title="Ver"><i 
            class="far fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVerainven"></i></button>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>