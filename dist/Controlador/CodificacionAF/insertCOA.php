<?php
include("../../Confi/conexion.php");
    $conexion = con();

    $id_asignacion_activos  = intval($_POST["id_asignacion"] ?? '');
    $fecha_asignacion       = $_POST["fechaA"];
    $codigo_institucional   = $_POST["cod"];
    $encargado_bien         = $_POST["encar"];
    $fk_ingreso_entradas    = $_POST["_id"];
    $fk_usuarios            = $_POST["nombreC"];


    $sql = "CAll TRASLADO_DEFINITIVO_MOVIMIENTO(
        $id_asignacion_activos,
        '$fecha_asignacion',
        '$codigo_institucional',
        '$encargado_bien',
        $fk_ingreso_entradas,
        $fk_usuarios
    )";

    try{
        $resultado = mysqli_query($conexion, $sql);
    }catch(Exception $e){
        echo $e;
    }finally{
        mysqli_close($conexion);
    }    
    
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
            'mensaje'=>"Algo salió mal, no se pudo guardar!"
          );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
?>

