<?php
//include_once './dist/Confi/conexion.php';
include("../../Confi/conexion.php");
$con = con();

$sql = "SELECT *, unidades.id AS idpr FROM unidades  ORDER BY nombre_unidad ASC";
$result = mysqli_query($con, $sql);

$json = array();
$i = 0;

while ($row = mysqli_fetch_array($result)) {
    $i++;
    $json[] = array(
        'id' => $row['idpr'],
        'nomb' => $row['nombre_unidad'],
        'botones' => '<td>
            <button type="button" id="ver" class="btn btn-light rounded-pill verun-item" id-item-verun="'.$row['idpr'].'" title="Ver">
            <i class="fas fa-eye" data-coreui-toggle="modal" data-coreui-target="#modalVerU" style="color:#2E96B0"></i></button>
            <button type="button" id="edit" class="btn btn-light rounded-pill editu-item" id-item-u="'.$row['idpr'].'" title="Modificar">
            <i class="fas fa-edit" style="color:#2E96B0"></i>
            </button>
        </td>',
        'i' => $i
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;
?>
