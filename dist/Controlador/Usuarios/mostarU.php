<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 $sql="SELECT * from usuarios order by nombre ASC";
 //$sql="SELECT *, usuarios.id AS idup FROM usuarios order by nombre ASC";


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
      'estado'=> $row['estado'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-light rounded-pill ver-item" id-item-ver="'.$row['id'].'  " title="Ver"><i
            class="fas fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVer" style="color:#2E96B0"></i></button>
            <button type="button" id="edit" class="btn btn-light rounded-pill edit-item" id-item="'.$row['id'].'" title="Modificar">
            <i class="fas fa-edit" style="color:#2E96B0"></i>
            </button>
            <button type="button" class="btn btn-light rounded-pill alta-item" id-item-alta="'.$row['id'].'" title="Alta"><i class="fa-solid fa-arrow-up-long" style="color:#2E96B0"></i></button>
            <button type="button" class="btn btn-light rounded-pill baja-item" id-item-baja="'.$row['id'].'" title="Baja"><i class="fa-solid fa-arrow-down-long" style="color:#2E96B0"></i></button>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
