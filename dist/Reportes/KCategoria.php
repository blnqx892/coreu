<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <!-- LLamo al css de reportes donde esta el estilo para el reporte -->
  <link rel="stylesheet" href="../css/reportesBienesMuebles.css" />
  <link rel="stylesheet" href="../css/reportesRetiroInsumos.css" />
</head>

<body>
  <table class="membrete">
    <tr>
      <td><img src="../img/iconsv.jpg" class="logoAlcaldia"></td>
      <td>
        <span class="titulos">
          <div class="textoMembrete">
            <p>ALCALDIA MUNICIPAL DE SAN VICENTE</p>
            <p>DEPARTAMENTO DE ALMACEN</p>
          </div>

      </td>
      <td><img src="../img/iconelsv.png" class="logoNacional"></td>
    </tr>
    </tr>
    <tr>
      <td></td>
      <td><strong class="titulos">REPORTE DE SUMINISTROS POR CATEGORIA</strong></td>
    </tr>
  </table>
  <strong class="tituloG titulos">Categoria: Materiales de Oficina</strong><br>
  <div class="">
    <table  class="table_informacion" border="2" style="color:#00000;font-size:100%;" align="center">
      <thead>
      <tr>
        <th>CÓDIGO</th>
        <th>NOMBRE DEL SUMINISTRO</th>
        <th>PRESENTACIÓN</th>
        <th>STOCK</th>
      </tr>
      </thead>
      <tbody style="color:#00000;font-size:110%;" align="center">
      <tr>
        <td>98078</td>
        <td>Papel Bond</td>
        <td>Resma</td>
        <td>24</td>
      </tr>
      </tbody>
    </table>
  </div><br><br><br>
  <br><br><br><br>
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
