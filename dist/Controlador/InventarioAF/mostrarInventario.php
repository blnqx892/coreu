<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 $sql="SELECT asignacion_activo.id AS id_asignacion,ingreso_entradas.nombre_adquisicion,categorias.categoria,
  asignacion_activo.fecha_asignacion,asignacion_activo.codigo_institucional,asignacion_activo.estado_bien,unidades.nombre_unidad
  FROM asignacion_activo 
  INNER JOIN ingreso_entradas on ingreso_entradas.id = asignacion_activo.fk_ingreso_entradas 
  INNER JOIN usuarios ON usuarios.id = asignacion_activo.fk_usuarios 
  INNER JOIN unidades ON unidades.id = usuarios.fk_unidades 
  INNER JOIN categorias on categorias.id = ingreso_entradas.fk_categoria 
  ORDER BY ingreso_entradas.nombre_adquisicion ASC";



  $result = mysqli_query($conexion, $sql);
  //var_dump( $sql);


  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
// Convierte la fecha de MySQL en "dd-mm-aaaa"
$fechaMySQL = $row['fecha_asignacion'];
$timestamp = strtotime($fechaMySQL);
$fechaFormateada = date("d-m-Y", $timestamp);



    $json[] = array(
      'id'    => $row['id_asignacion'],
      'fech' => $fechaFormateada,
      'codi'=> $row['codigo_institucional'],
      'nomb'=> $row['nombre_adquisicion'],
      'cate'=> $row['categoria'],
      'ubi'=> $row['nombre_unidad'],
      'estbien'=> $row['estado_bien'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-info  verai-item" id-item-verai="'.$row['id_asignacion'].'  " title="Ver"><i 
            class="far fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVerainven"></i></button>
            <button type="button" id="edit" class="btn btn-warning  editein-item" id-item-ei="'.$row['id_asignacion'].'" title="Editar">
            <i class="far fa-edit"></i></button>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>