<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <!-- LLamo al css de reportes donde esta el estilo para el reporte -->
  <link rel="stylesheet" href="../css/reportesBienesMuebles.css" />
</head>

<body>
  <table class="membrete">
    <tr>
      <td><img src="../img/iconsv.jpg" class="logoAlcaldia"></td>
      <td>
        <span class="titulos">
          <div class="textoMembrete">
            <p>ALCALDIA MUNICIPAL DE SAN VICENTE</p>
            <p>DEPARTAMENTO DE ACTIVO FIJO</p>
            <p>UNIDAD DE REGISTROS Y CONTROL DE ACTIVOS</p>
          </div>

      </td>
      <td><img src="../img/iconelsv.png" class="logoNacional"></td>
    </tr>
    </tr>
    <tr>
      <td></td>
      <td><strong class="titulos">HOJA DE MOVIMIENTOS DE BIENES MUEBLES</strong></td>
    </tr>
  </table>
  <strong class="tituloG titulos">Generalidades</strong>
  <div class="posiciontabla">
    <table class="tablaCargoBienes">
      <tbody style="color:#00000;font-size:125%;">
        <tr>
          <td><b>Procedencia:</b></td>
          <td>RRHH</td>
          <td><b>Fecha: </b></td>
          <td><?php echo date("d/m/Y"); ?></td>
        </tr>
        <tr>
          <td><b>Destino: </b></td>
          <td>Informatica</td>
          <td><b>Tipo de Movimiento: </b></td>
          <td>Traslado</td>
        </tr>
        <tr>
          <td><b>Observaciones: </b></td>
          <td colspan="3">esto es una prueba de observaciones otro ejemplo mas otro ejemplo mas otro ejemplo mas</td>
        </tr>
      </tbody>
    </table>
  </div><br>
  <strong class="tituloG titulos">Caracteristicas</strong>
  <div class="posicionTC">
    <table class="bor" width="800" style="color:#00000;font-size:125%;">
      <tr>
        <th>Descripción del Bien</th>
        <th>Modelo</th>
        <th>Serie</th>
        <th>Marca</th>
        <th>Código</th>
      </tr>
      <tr>
        <td>Escritorio</td>
        <td>Imperial</td>
        <td>sadsfds</td>
        <td>Luxur</td>
        <td>0909-89-768-98-09</td>
      </tr>
    </table>
  </div><br><br><br>
  <div>
    <table align="center" text-aign="left" width="800">
      <thead>
        <tr>
          <th colspan="2">PERSONA QUE AUTORIZA EL TRASLADO</th>
          <th colspan="2">PERSONA QUE RECIBE EL BIEN</th>
        </tr>
      </thead>
      <tbody>
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
    </table><br><br>
    <table align="center" text-aign="left" width="800">
      <thead><tr>
      <th colspan="4" align="center" padding-top: 3rem;>Es conforme, Firma: _____________________________</th>
      </tr>
      </thead>
      <tbody>
        <tr>
        <th colspan="4" align="left">Jefe de Activo Fijo</th>
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
