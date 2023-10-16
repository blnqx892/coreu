<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reportesRetiroInsumos.css" />
</head>

<body>
  <table width="1000" border="0" align="center">
    <tr>
      <td><img src="img/iconsv.jpg" width="120" height="120"></td>
      <td align="center"><span class="titulos">
          <p style="font-size: 18px; font-family: sans-serif">ALCALDIA MUNICIPAL DE SAN VICENTE<br>
            HOJA DE REQUISICIÓN PARA ENTREGA Y RETIRO DE INSUMOS O MATERIALES</p>
      </td>
      <td><img src="img/iconelsv.png" width="100" height="100"></td>
    </tr>
  </table><br>

  <table width="950" align="center">
    <thead>
      <tr>
        <th colspan="4"></th>
      </tr>
    </thead>
    <tbody style="color:#00000;font-size:125%;">
      <tr>
        <td><b>FECHA DE SOLICITUD:</b></td>
        <td> 13/10/2023 </td>
        <td><b>FECHA DE DESPACHO: </b></td>
        <td> <?php echo date("d/m/Y"); ?> </td>
      </tr>
      <tr>
        <td><b>UNIDAD SOLICITADA: </b></td>
        <td>UNIDAD DE CARNET DE MINORIDAD</td>
      </tr>
    </tbody>
  </table><br>
<div class="position_table">
  <table border="1" class="table_informacion">
    <thead>
      <tr>
        <th>NÚMERO</th>
        <th>CÓDIGO</th>
        <th>U/MEDIDA</th>
        <th>DESCRIPCIÓN DE MATERIAL O INSUMO</th>
        <th>CANTIDAD SOLICITADA</th>
        <th>CANTIDAD DESPACHADA</th>
        <th>PRECIO UNITARIO</th>
        <th>COSTO TOTAL</th>
      </tr>
    </thead>
    <tbody style="color:#00000;font-size:135%;">
    <tr>
      <td>1</td>
      <td>0989</td>
      <td>Caja</td>
      <td>Lapiceros Facela Color Azul</td>
      <td>2</td>
      <td>2</td>
      <td>$ 6.00</td>
      <td>$ 12.00</td>
    </tr>
    </tbody>
  </table>
  </div>
  <table frame="box" align="center" width="950">
    <thead>
      <tr>
        <td colspan="4">OBSERVACIONES: </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="4">Ahi van unas observaciones </td>
      </tr>
    </tbody>
  </table><br>

  <table  align="center" width="950">
    <thead>
      <tr>
        <td>F:  </td>
        <td>F:  </td>
        <td>F:  </td>
        <td>F:  </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td >Pancracio Joaquin Barraza Perez </td>
        <td >Antonieta de las Nieves</td>
        <td >Wisin y Yandel los Extraterrestres </td>
        <td >El Chapulin Colorado</td>
      </tr>
      <tr>
        <td >NOMBRE QUIEN SOLICITA </td>
        <td >NOMBRE QUIEN AUTORIZA</td>
        <td >NOMBRE QUIEN RECIBE </td>
        <td >NOMBRE QUIEN DESPACHA</td>
      </tr>
    </tbody>
  </table>
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
