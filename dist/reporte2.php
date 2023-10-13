<!doctype html>
<html>

<head>
  <meta charset="utf-8">

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
</head>

<body>
  <table width="685" border="0" align="center">
    <tr>
      <td><img src="img/iconsv.jpg" width="120" height="120"></td>
      <td align="center"><span class="titulos">
          <p style="font-size: 18px; font-family: sans-serif">ALCALDIA MUNICIPAL DE SAN VICENTE<br>DEPARTAMENTO DE
            ACTIVO FIJO<br>UNIDAD DE REGISTROS Y CONTROL DE ACTIVOS</p>
      </td>
      <td><img src="img/iconelsv.png" width="100" height="100"></td>
    </tr>
    </tr>
    <tr>
      <td></td>
      <td align="center"><strong class="titulos">HOJA DE CARGO DE BIENES MUEBLES</strong></td>
    </tr>
  </table>
  <table frame="box" align="center" width="800">
    <thead>
      <tr>
        <th colspan="4"></th>
      </tr>
    </thead>
    <tbody style="color:#00000;font-size:125%;">
      <tr>
        <td><b>Codigo:</b></td>
        <td>00-07-234-899-99-07</td>
      </tr>
      <tr>
        <td><b>Descripción: </b></td>
        <td>Escritorio Imperial</td>
      </tr>
      <tr>
        <td><b>Marca: </b></td>
        <td>Luxur</td>
        <td><b>Modelo: </b></td>
        <td>Luxur90</td>
      </tr>
      <tr>
        <td><b>Serie: </b></td>
        <td>nlux89875</td>
        <td><b>Color: </b></td>
        <td>Gris Metalico</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><b>Proveedor: </b></td>
        <td>Omnisport</td>
      </tr>
      <tr>
        <td><b>No. Factura: </b></td>
        <td>factu4567</td>
      </tr>
      <tr>
        <td><b>Ubicación: </b></td>
        <td>Unidad de Recursos Humanos</td>
      </tr>
      <tr>
        <td><b>Jefe Responsable: </b></td>
        <td>Katherine de los Angeles Martinez Pocasandre</td>
      </tr>
      <tr>
        <td><b>Fecha Adquisición: </b></td>
        <td>12/12/2023</td>
      </tr>
      <tr>
        <td><b>Costos Adquisición: </b></td>
        <td>$ 1000.00</td>
      </tr>
    </tbody>
  </table><br>

  <table border-radius="8px" align="center" width="500">
    <thead>
      <tr>
        <th colspan="4">VEHICULO</th>
      </tr>
    </thead>

    <tbody style="color:#00000;font-size:125%;">
      <tr>
        <td><b>No. Motor:</b></td>
        <td></td>
      </tr>
      <tr>
        <td><b>No. Chasis: </b></td>
        <td></td>
      </tr>
      <tr>
        <td><b>Capacidad: </b></td>
        <td></td>
        <td><b>Placa: </b></td>
        <td></td>
      </tr>
    </tbody>
  </table><br><br><br><br>

  <table align="center" width="850">
    <thead>
      <tr>
        <th colspan="2">PERSONA QUE RECIBE EL BIEN</th>
        <th colspan="2">PERSONA QUE ENTREGA EL BIEN</th>
      </tr>
    </thead>

    <tbody style="color:#00000;font-size:135%;">
      <tr>
        <td><b>Nombre:</b></td>
        <td>Silvano de Jesús Portillo Lopez</td>
        <td><b>Nombre:</b></td>
        <td>Mariela Elizabeth Fuentes Espinoza</td>

      </tr>
      <tr>
        <td><b>Cargo: </b></td>
        <td>Jefe Unidad RRHH</td>
        <td><b>Cargo: </b></td>
        <td>Jefe de Almacen</td>
      </tr>
      <tr>
        <td><b>Firma: </b></td>
        <td>__________________</td>
        <td><b>Firma: </b></td>
        <td>__________________</td>
      </tr>
      <tr>
        <td><b></b></td>
        <td></td>
        <td><b></b></td>
        <td>Jefe de Almacen</td>
      </tr>
    </tbody>
  </table><br><br>
  <table align="right">
  <tr>
    <td>Fecha de cargo: <?php echo date("d/m/Y"); ?></td>
  </tr>
  </table>
  <form name="frmTesis" method="get" action="" id="frmTesis">
    <p align="center"><input class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo"
        style="font-size:17px;" type="button" name="IM" id="IM" value="IMPRIMIR" onClick="imprimir()"></p>
  </form>
  <p>&nbsp;</p>
</body>

</html>
