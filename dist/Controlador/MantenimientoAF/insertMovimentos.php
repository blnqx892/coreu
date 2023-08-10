<?php
include("../../Confi/conexion.php");
$conexion = con();

   $fechaM = $_POST["fechaA"];
   $codigoM = $_POST["cod"];
   $observacionM = $_POST["encar"];
   $tipoM = $_POST["_id"];
   $ingresosM = $_POST["_id"]; 
   $unidadesM = $_POST["nombreC"];

   
   $sql = "INSERT INTO mantenimiento_activos (fecha_movimiento,tipo_movimiento,observaciones,tipo_registro,fk_ingreso_entradas,
   fk_unidades) VALUES  ('$fechaM','$observacionM',$tipoM',$ingresosM','$unidadesM')";
  
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