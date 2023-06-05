<?php
include("../../Confi/conexion.php");
$conexion = con();

    $nombre = $_POST["nombreC"];
    $apellido = $_POST["ape"];
    $usuario = $_POST["usu"];
    $rol = $_POST["rol"];
    $email = $_POST["email"];
    $contra= $_POST["contra"];

    $sql = "INSERT INTO usuarios (nombre,apellido,usuario,email,contrasena,rol) VALUES ('$nombre', '$apellido','$usuario','$email','$contra','$rol')";

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
