<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 //$sql="SELECT * from usuarios order by nombre ASC";
 $sql="SELECT * from asignacion_activo order by codigo_institucional ASC";
//var_dump($sql);
  $result = mysqli_query($conexion, $sql);
 // var_dump(mysqli_query($conexion, $sql));


  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
      'id'    => $row['codigo_institucional'],
      'name' => $row['codigo_institucional'],
         
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>