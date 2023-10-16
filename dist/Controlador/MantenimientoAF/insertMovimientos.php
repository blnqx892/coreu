<?php
include("../../Confi/conexion.php");
$conexion = con();

   $fechaM               = $_POST["fechaMovimiento"];
   $observacionM         = $_POST["observa"] ;
   $tipoMovimiento       = $_POST["tipomovi"] ;
   $fk_asignacion_activo = $_POST["_id_asigna"] ?? 'null';
   $fk_unidades          = $_POST["nombre_u"] ?? 'null';

   $tipoRegistro         = $_POST["tiporegis"] ?? null;
   
   $sql = "call INSERT_MANTENIMIENTO_DESCARGO(
    '$fechaM',
    '$observacionM',
    '$tipoMovimiento',
    '$tipoRegistro',
    $fk_asignacion_activo,
    $fk_unidades
   );";
echo $sql;
    // Ejecutar la consulta SQL
    $resultado = mysqli_query($conexion, $sql);
    
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