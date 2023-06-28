<?php
include("../../Confi/conexion.php");
$conexion = con();

$fecha = $_POST["fechaC"];
$factura = $_POST["facturaC"];
$costo = $_POST["costo"];
$prov = $_POST["prove"];
$nombre = $_POST["nombreC"];
$serie = $_POST["serie"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$color = $_POST["color"];
$cargo = $_POST["cargo"];
$vida= $_POST["vida"];
$cate = $_POST["cate"];
$descrip = $_POST["descri"];
$numerom = $_POST["numeromo"];
$numerocha = $_POST["numerochasis"];
$numerop = $_POST["numeropla"];
$capaci = $_POST["capa"];
$id    = $_POST["_id"];
    

    $sql= " UPDATE ingreso_entradas SET fecha_adquisicion='$fecha',numero_factura='$factura',costo_adquisicion='$costo',
    fk_proveedores='$prov',nombre_adquisicion='$nombre',serie_adquisicion='$serie',marca='$marca',modelo='$modelo',
    color='$color',cargo='$cargo',vida_util='$vida',fk_categorias='$cate',dscripcion_adquisicio='$descrip',numero_motor='$numerom',
    numero_chasis='$numerocha',numero_placa='$numerop',capacidad='$capaci' WHERE id = '$id'";

      //var_dump($sql); /*para que proves porq el error */
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