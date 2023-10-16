<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');



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
      'id'    => $row['id_movimientos'],
      'fech' => $fechaFormateada,
      'codi'=> $row['codigo_institucional'],
      'describien'=> $row['nombre_adquisicion'],
      'tipomo'=> $row['tipo_movimiento'],
      'tipore'=> $row['tipo_registro'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-info  verai-item" id-item-verai="'.$row['id_asignacion'].'  " title="Ver"><i 
            class="far fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVerainven"></i></button>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>