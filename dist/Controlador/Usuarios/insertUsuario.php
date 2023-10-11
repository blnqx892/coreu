<?php
include("../../Confi/conexion.php");
$conexion = con();

    $nombre = $_POST["nombreC"];
    $apellido = $_POST["ape"];
    $usuario = $_POST["usu"];
    $rol = $_POST["rol"];
    $per = $_POST["per"];
    $uni = $_POST["unid"];
    $email = $_POST["email"];
    $contra= $_POST["contra"];

    

    $sql = "INSERT INTO usuarios (nombre,apellido,usuario,email,contrasena,permisos,fk_unidades,fk_rol) VALUES
     ('$nombre','$apellido','$usuario','$email',md5('$contra'),'$per','$uni','$rol')";

    // Ejecutar la consulta SQL
    
    $resultado = mysqli_query($conexion, $sql);
   
    //echo "Los datos se han insertado correctamente";
    //$json = array();
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
            'mensaje'=> mysqli_error($conexion)
            );
    }
    
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
?>
