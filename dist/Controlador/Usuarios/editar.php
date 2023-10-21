<?php
include("../../Confi/conexion.php");
$conexion = con();

    $nombre = $_POST["nombreC"];
    $apellido = $_POST["ape"];
    $usuario = $_POST["usu"];
    $rol = $_POST["rol"];
    $uni  = $_POST["unid"];
    $email = $_POST["email"];
   // $contra= $_POST["contra"];
    $id    = $_POST["_id"];
    


    $sql= " UPDATE usuarios SET nombre='$nombre',apellido='$apellido',usuario='$usuario', fk_rol='$rol',email='$email',
     fk_unidades='$uni' WHERE id = '$id'";
    //var_dump($sql); /*para que proves porq el error */
    //contrasena='$contra',
    // Ejecutar la consulta SQL
    $resultado    = mysqli_query($conexion, $sql);
  
    //echo "Los datos se han insertado correctamente";
    $json = array();
            if ($resultado) {
                $json[] = array(
                    'success'=>1,
                    'title' => 'Exito',
                    'mensaje'=>'Registro Guardado con exito!'
                  );
                 // echo 1;
            } else {
                $json[] = array(
                    'title' => "Error",
                    'mensaje'=>"Surgió un error!"
                  );
}
 $jsonstring = json_encode($json[0]);
echo $jsonstring;
?>
