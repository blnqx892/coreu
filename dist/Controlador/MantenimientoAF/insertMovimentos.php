<?php
include("../../Confi/conexion.php");
$conexion = con();

   $fechaM               = $_POST["fechaMovimiento"];
   $observacionM         = $_POST["observa"];
   $tipoM                = $_POST["tipomovi"];
   $tipoR                = $_POST["tiporegis"];
   $fk_asignacion_activo = $_POST["_id_asigna"];
   $fk_unidades          = $_POST["nombre_u"];


   
   $sql = "INSERT INTO mantenimiento_activos (
    fechaMovimiento,
    observa,
    tipomovi,
    tiporegis,
    fk_asignacion_activo,
    fk_unidades) VALUES  (
    '$fechaM',
    '$observacionM',
    '$tipoM',
    '$tipoR',
    '$fk_asignacion_activo',
    '$fk_unidades'
    )";
  
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
                    'mensaje'=>"Algo salió mal, no se pudo guardar!"
                  );
            }
           $jsonstring = json_encode($json[0]);
           echo $jsonstring;
?>