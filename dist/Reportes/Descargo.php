<!doctype html>
<html>
<?php
include("../Confi/conexion.php");
$id = $_GET["id"]; ?>

<head>
  <meta charset="utf-8">
  <!-- LLamo al css de reportes donde esta el estilo para el reporte -->
  <link rel="stylesheet" href="../css/reportesBienesMuebles.css" />
</head>

<body>
  <table class="membrete">
    <tr>
      <td><img src="../img/iconamsv.png" width="80" height="80"></td>
      <td>
        <span class="titulos" style="color:#00000;font-size:80%;">
          <div class="textoMembrete">
            <p>ALCALDIA MUNICIPAL DE SAN VICENTE</p>
            <p>DEPARTAMENTO DE ACTIVO FIJO</p>
            <p>UNIDAD DE REGISTROS Y CONTROL DE ACTIVOS</p>
          </div>

      </td>
      <td><img src="../img/iconesv.png"  width="80" height="80"></td>
    </tr>
    </tr>
    <tr>
      <td></td>
      <td><strong class="titulos" style="color:#00000;font-size:80%;">HOJA DE DESCARGO DE BIENES MUEBLES</strong></td>
    </tr>
  </table>
  <?php
     $sql="SELECT mantenimiento_activos.id AS id_descargo,
     ingreso_entradas.nombre_adquisicion,
     ingreso_entradas.color,
     ingreso_entradas.modelo,
     ingreso_entradas.serie_adquisicion,
     ingreso_entradas.marca,
     asignacion_activo.codigo_institucional,
     mantenimiento_activos.tipo_movimiento,
     mantenimiento_activos.tipo_registro,
     unidades.nombre_unidad,
     mantenimiento_activos.fecha_movimiento,
     mantenimiento_activos.observaciones
    FROM mantenimiento_activos
    INNER JOIN asignacion_activo ON asignacion_activo.id = mantenimiento_activos.fk_asignacion_activo
    INNER JOIN ingreso_entradas on ingreso_entradas.id = asignacion_activo.fk_ingreso_entradas
    INNER JOIN usuarios ON usuarios.id = asignacion_activo.fk_usuarios
    INNER JOIN unidades ON unidades.id = usuarios.fk_unidades
    WHERE mantenimiento_activos.id =$id";


$result = mysqli_query($conexion, $sql);
if ($result === false) {
  die("Error en la consulta: " . mysqli_error($conexion));
}

while($row = mysqli_fetch_array($result)) {
  ?>
  <strong class="tituloG titulos" style="color:#00000;font-size:80%;">Generalidades</strong>
  <div class="posiciontabla">
    <table class="tablaDescargo" >
      <tbody style="color:#00000;font-size:80%;">
        <tr>
          <td><b>Procedencia:</b></td>
          <td><?php echo $row["nombre_unidad"];?></td>
        </tr>
        <tr>
          <td><b>Fecha: </b></td>
          <td width="285"><?php $timestamp = strtotime($row["fecha_movimiento"]);
                echo strftime('%d/%m/%Y', $timestamp);?></td>
          <td width="186"><b>Tipo de Movimiento: </b></td>
          <td><?php echo $row["tipo_movimiento"];?></td>
        </tr>
        <tr>
          <td><b>Observaciones: </b></td>
          <td colspan="3"><?php echo $row["observaciones"];?></td>
        </tr>
      </tbody>
    </table>
  </div><br>
  <strong class="tituloG titulos" style="color:#00000;font-size:80%;">Características</strong>
  <div class="posicionTC">
    <table class="bor" width="800" style="color:#00000;font-size:80%;">
      <tr>
        <th>Descripción del Bien</th>
        <th>Modelo</th>
        <th>Serie</th>
        <th>Marca</th>
        <th>Código</th>
      </tr>
      <tr>
        <td align="center"><?php echo $row["nombre_adquisicion"].' '.$row["color"]?></td>
        <td align="center"><?php echo $row["modelo"]?></td>
        <td align="center"><?php echo $row["serie_adquisicion"]?></td>
        <td align="center"><?php echo $row["marca"]?></td>
        <td align="center"><?php echo $row["codigo_institucional"]?></td>
      </tr>
    </table>
  </div><br><br><br>
  <div>
    <table align="center" text-aign="left" width="700" style="color:#00000;font-size:75%;">
      <thead>
        <tr>
          <th colspan="2">AUTORIZA EL DESCARGO</th>
          <th colspan="2">PERSONA QUE REALIZA EL DESCARGO</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td><b>Nombre:</b></td>
          <td width="60%">_____________________________</td>
          <td><b>Nombre:</b></td>
          <td width="60%">_____________________________</td>
        </tr>
        <tr>
          <td><b>Cargo: </b></td>
          <td>_____________________________</td>
          <td><b>Cargo: </b></td>
          <td>_____________________________</td>
        </tr>
        <tr>
          <td><b>Firma: </b></td>
          <td>_____________________________</td>
          <td><b>Firma: </b></td>
          <td>_____________________________</td>
        </tr>
        <tr>
        </tr>
      </tbody>
      <?php  } ?>
    </table><br><br>
    <table align="center" text-aign="left" width="800" style="color:#00000;font-size:80%;">
      <thead>
        <tr>
          <th colspan="4" align="center" padding-top: 3rem;>Es conforme, Firma: _____________________________</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="4" align="left">&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;Jefe de Activo Fijo</th>
        </tr>
      </tbody>
    </table>
  </div><br><br><br><br>
  <form name="frmTesis" method="get" action="" id="frmTesis">
    <p align="center"><input class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo"
        style="font-size:17px;" type="button" name="IM" id="IM" value="IMPRIMIR" onClick="imprimir()"></p>
  </form>
  <p>&nbsp;</p>
</body>

</html>

<script language="javascript">
  function imprimir() {
    if (!window.print) {
      alert("El navegador no permite la impresion..");
      return;
    } else {
      document.frmTesis.IM.style.visibility = "hidden";
      window.print();
      document.frmTesis.IM.style.visibility = "visible";
    }
  }

</script>
