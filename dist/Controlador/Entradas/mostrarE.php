<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 $sql="SELECT *, ingreso_entradas.id AS principal
 FROM ingreso_entradas
 INNER JOIN categorias on categorias.id = ingreso_entradas.fk_categoria
 where ingreso_entradas.id not in (select aa.fk_ingreso_entradas from asignacion_activo aa)
 ORDER BY nombre_adquisicion ASC";

  $result = mysqli_query($conexion, $sql);//
 // var_dump(mysqli_query($conexion, $sql));

  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
// Convierte la fecha de MySQL en "dd-mm-aaaa"
    $fechaMySQL = $row['fecha_adquisicion'];
    $timestamp = strtotime($fechaMySQL);
    $fechaFormateada = date("d-m-Y", $timestamp);

    $json[] = array(
      'id'    => $row['principal'],//ojo que no se t olovide qe si no te miesttra esto tenes malo
      'fechaC' => $fechaFormateada, // Ahora es en formato "dd-mm-aaaa"
      'facturaC'=> $row['numero_factura'],
      'nombreC'=> $row['nombre_adquisicion'],
      'marca'=> $row['marca'],
      'cate'=> $row['categoria'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-light rounded-pill  vere-item" id-item-vere="'.$row['principal'].'" title="Ver"><i
            class="fas fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVer" style="color:#2E96B0"></i>
            </button>
            <button type="button" id="edit" class="btn btn-light rounded-pill  edite-item" id-item-e="'.$row['principal'].'" title="Modificar">
            <i class="fas fa-edit" style="color:#2E96B0"></i></button>
            <a  href="../dist/AsignaciondeActivo.php?a='.$row['principal'].'">
            <button type="button"  class="btn btn-light rounded-pill  alta-item"  title="Codificar"><i
            class="	fas fa-barcode" style="color:#2E96B0"></i></button></a>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
