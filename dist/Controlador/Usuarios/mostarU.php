<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 $sql="SELECT * from usuarios order by nombre ASC";


  $result = mysqli_query($conexion, $sql);
 // var_dump(mysqli_query($conexion, $sql));


  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
      'id'    => $row['id'],
      'nom' => $row['nombre'],
      'ape'=> $row['apellido'],
      'usu'=> $row['usuario'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-info rounded-pill" title="Ver"><i class="far fa-eye"></i></button>
            <button type="button" class="btn btn-warning rounded-pill" title="Editar"><i class="far fa-edit"></i></button>
            <button type="button" class="btn btn-success rounded-pill" title="Alta"><i class="fa-solid fa-arrow-up-long"></i></button>
            <button type="button" class="btn btn-danger rounded-pill" title="Baja"><i class="fa-solid fa-arrow-down-long"></i></i></button>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
