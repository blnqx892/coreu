<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 $sql="SELECT * from mobiliario_otros order by nombre ASC";
 //$sql="SELECT *, usuarios.id AS idup FROM usuarios order by nombre ASC";


  $result = mysqli_query($conexion, $sql);
 // var_dump(mysqli_query($conexion, $sql));


  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
      'id'    => $row['id'],
      'fecha' => $row['fecha'],
      'nombre'=> $row['nombre'],
      'modelo'=> $row['modelo'],
      'valor' => $row['valor'],
      'estado'=> $row['estado_mobi'],
      'botones'=>'<td>
            <button type="button" id="ver" class="btn btn-info  vermo-item" id-item-vermo="'.$row['id'].'  " title="Ver"><i 
            class="far fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVermo"></i></button>
            <button type="button" id="edit" class="btn btn-warning  editmo-item" id-item-mo="'.$row['id'].'" title="Editar">
            <i class="far fa-edit"></i>
            </button>
      </td>',
      'i'=>$i
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
