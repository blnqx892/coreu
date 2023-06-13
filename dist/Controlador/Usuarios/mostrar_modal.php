<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

$id = $_POST['id'];

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 $sql="SELECT * from usuarios where id='$id'";


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
      'email'=> $row['email'],
      'rol'=> $row['rol'],
      'contra'=> $row['contrasena'],
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
?>
