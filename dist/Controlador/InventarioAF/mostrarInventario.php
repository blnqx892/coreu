<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 $sql="SELECT asignacion_activo.id AS id_asignacion,ingreso_entradas.nombre_adquisicion,categorias.categoria,
  asignacion_activo.fecha_asignacion,asignacion_activo.codigo_institucional,unidades.nombre_unidad 
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
    $json[] = array(
      'id'    => $row['id_asignacion'],
      'fech' => $row['fecha_asignacion'],
      'codi'=> $row['codigo_institucional'],
      'nomb'=> $row['nombre_adquisicion'],
      'cate'=> $row['categoria'],
      'ubi'=> $row['nombre_unidad'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-info rounded-pill vera-item" id-item-vera="'.$row['id_asignacion'].'  " title="Ver"><i 
            class="far fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVera"></i></button>
            <button type="button" id="edit" class="btn btn-warning rounded-pill edite-item" id-item-e="'.$row['id_asignacion'].'" title="Editar">
            <i class="far fa-edit"></i></button>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>