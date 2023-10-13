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

  <table align="center">
    <thead>
      <tr>
        <th colspan="4"></th>
      </tr>
    </thead>
    <tbody style="color:#00000;font-size:125%;">
      <tr>
        <td style="width: 90px;"><b>FECHA DE SOLICITUD:</b></td>
        <td style="width: 100px;">13/10/2023</td>
        <td style="width: 90px;"><b>FECHA DE DESPACHO</b></td>
        <td style="width: 100px;">19/10/2023</td>

      </tr>
    </tbody>
  </table><br>

  <table frame="box" align="center">
    <thead>
      <tr>
        <th colspan="4">VEHICULO</th>
      </tr>
    </thead>

    <tbody style="color:#00000;font-size:135%;">
      <tr>
        <td><b>No. Motor:</b></td>
        <td>num234344</td>
      </tr>
      <tr>
        <td><b>No. Chasis: </b></td>
        <td>424344</td>
      </tr>
      <tr>
        <td><b>Capacidad: </b></td>
        <td>56</td>
        <td><b>Placa: </b></td>
        <td>p56-977</td>
      </tr>
    </tbody>
  </table><br><br><br><br>

  <table align="center" width="685">
    <thead>
      <tr>
        <th colspan="2">PERSONA QUE RECIBE EL BIEN</th>
        <th colspan="2">PERSONA QUE ENTREGA EL BIEN</th>
      </tr>
    </thead>

    <tbody style="color:#00000;font-size:135%;">
      <tr>
        <td><b>Nombre:</b></td>
        <td>Harry Potter</td>
        <td><b>Nombre:</b></td>
        <td>Ronald Wesley</td>

      </tr>
      <tr>
        <td><b>Cargo: </b></td>
        <td>Jefe Unidad RRHH</td>
        <td><b>Cargo: </b></td>
        <td>Jefe Activo Fijo</td>
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
        <td>Jefe de Activo Fijo</td>
      </tr>
    </tbody>
  </table><br><br>
  <table align="right">
    <tr>
      <td>Fecha de cargo: <?php echo date("d/m/Y"); ?>
        <br>
        Hora: <?php
		date_default_timezone_set('America/El_Salvador');
		$date = new DateTime();
	     echo $date->format('h:i:s A');
		?></td>
    </tr>
  </table>


  <form name="frmTesis" method="get" action="" id="frmTesis">
    <p align="center"><input class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo"
        style="font-size:17px;" type="button" name="IM" id="IM" value="IMPRIMIR" onClick="imprimir()"></p>
  </form>
  <p>&nbsp;</p>
</body>

</html>
