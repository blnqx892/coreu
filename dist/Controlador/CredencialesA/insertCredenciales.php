<?php
include("../../Confi/conexion.php");
$conexion = con();

    $nombreUnid = $_POST["nombreUnid"];
    
    $sql = "INSERT INTO unidades (nombre_unidad) VALUES ('$nombreUnid')";

    // Ejecutar la consulta SQL
    $resultado    = mysqli_query($conexion, $sql);
    //echo "Los datos se han insertado correctamente";
    // Cerrar la conexión
    mysqli_close($conexion);
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