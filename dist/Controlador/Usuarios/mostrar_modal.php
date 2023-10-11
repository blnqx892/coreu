<?php

//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

$id = $_POST['id'];

$sql="SELECT *, usuarios.id as id_usuario FROM usuarios 
INNER JOIN unidades on unidades.id = usuarios.fk_unidades 
INNER JOIN roles ON roles.id = usuarios.fk_rol
WHERE usuarios.id='$id'";

 //$conexion=mysqli_connect('localhost','root', '', 'sicafi');
 //$sql="SELECT us.id as id_usuario, usuario, 
// nombre, apellido, email, rol, estado,
//un.id as id_unidad, nombre_unidad
 //FROM usuarios us
// inner join unidades un on un.id = us.fk_unidades order by us.nombre ASC ";


  $result = mysqli_query($conexion, $sql);
 // var_dump(mysqli_query($conexion, $sql));
  //var_dump($sql);//ver consulta


  $json = array();
  $i=0;

  while($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
      'id' => $row['id_usuario'],
      'nom' => $row['nombre'],
      'ape'=> $row['apellido'],
      'usu'=> $row['usuario'],
      'email'=> $row['email'],
      'rol'=> $row['fk_rol'],
      'per'=> $row['permisos'],
      'unid'=> $row['nombre_unidad'],
      'unidd'=> $row['fk_unidades'],
      
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
?>
