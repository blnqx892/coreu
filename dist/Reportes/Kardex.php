<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/reportesRetiroInsumos.css" />
</head>

<body style="margin: 30px 30px 20px 20px;">
  <table width="1000" align="center" border="1" style="color:#00000;font-size:120%;">
    <tr>
      <td width=90>Codigo: </td>
      <td rowspan="4" width=70 align="center">ALCALDÍA MUNICIPAL DE SAN VICENTE <br><br>
        CATALOGO DE SUMINISTROS EN EXISTENCIAS</td>
      <td width=100>Tarjeta No.:</td>
    </tr>
    <tr>
      <td>Nombre del Articulo: </td>
      <td>Almacen: </td>
    </tr>
    <tr>
      <td>Presentación: </td>
      <td>Existencias: </td>
    </tr>
    <tr>
      <td>Unidad de Medida:</td>
      <td>Max: Min: </td>
    </tr>
    <tr>
      <td colspan="">Estante: </td>
      <td colspan="">Entrepaño: </td>
      <td colspan="">Casilla: </td>
    </tr>
  </table>
  <div class="">
    <table border="1" class="table_informacion">
      <thead>
        <tr>
          <th>FECHA</th>
          <th>CONCEPTO</th>
          <th>FONDO PROCEDENCIA</th>
          <th>ENTRADAS</th>
          <th>SALIDAS</th>
          <th>SALDO DE ARTICULOS</th>
        </tr>
      </thead>
      <tbody style="color:#00000;font-size:100%;">
        <tr>
          <td>1</td>
          <td>Escritorio negro</td>
          <td>Imperial</td>
          <td>imp1234</td>
          <td>Luxur</td>
          <td>12/08/2022</td>
        </tr>
      </tbody>
    </table>
  </div><br>
  <div>
    <table width="400" align="center" border="1" style="color:#00000;font-size:120%;">
      <tr>
        <td colspan="3" align="center">FUENTE DE FINANCIAMIENTO</td>
      </tr>

      <tr>
        <td>FONDOS PROPIOS</td>
        <td>1</td>
      </tr>
      <tr>
        <td>FONDO FONDES</td>
        <td>2</td>
      </tr>
      <tr>
        <td>DONATIVOS</td>
        <td>3</td>
      </tr>
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
