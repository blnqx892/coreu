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
                <!-- JavaScript para iterar y crear filas de la tabla -->
                <script>
                let suministros = [{
                        "id": 1,
                        "código": "PS1001",
                        "unidad_medida": "Unidad",
                        "descripción_material_insumo": "Lápices HB",
                        "cantidad_solicitada": 100,
                        "cantidad_despachada": 100,
                        "precio_unitario": 0.50,
                        "costo_total": 50.00
                    },
                    {
                        "id": 2,
                        "código": "ES2002",
                        "unidad_medida": "Caja",
                        "descripción_material_insumo": "Resmas de papel A4",
                        "cantidad_solicitada": 20,
                        "cantidad_despachada": 20,
                        "precio_unitario": 5.00,
                        "costo_total": 100.00
                    },
                    {
                        "id": 3,
                        "código": "MG3003",
                        "unidad_medida": "Unidad",
                        "descripción_material_insumo": "Bolígrafos negros",
                        "cantidad_solicitada": 50,
                        "cantidad_despachada": 50,
                        "precio_unitario": 0.75,
                        "costo_total": 37.50
                    },
                    {
                        "id": 4,
                        "código": "NC4004",
                        "unidad_medida": "Caja",
                        "descripción_material_insumo": "Cuadernos",
                        "cantidad_solicitada": 10,
                        "cantidad_despachada": 10,
                        "precio_unitario": 4.50,
                        "costo_total": 45.00
                    },
                    {
                        "id": 5,
                        "código": "TP5005",
                        "unidad_medida": "Unidad",
                        "descripción_material_insumo": "Tijeras de oficina",
                        "cantidad_solicitada": 30,
                        "cantidad_despachada": 30,
                        "precio_unitario": 1.25,
                        "costo_total": 37.50
                    },
                    {
                        "id": 6,
                        "código": "RG6006",
                        "unidad_medida": "Caja",
                        "descripción_material_insumo": "Reglas de plástico",
                        "cantidad_solicitada": 25,
                        "cantidad_despachada": 25,
                        "precio_unitario": 2.00,
                        "costo_total": 50.00
                    },
                    {
                        "id": 7,
                        "código": "PA7007",
                        "unidad_medida": "Unidad",
                        "descripción_material_insumo": "Papel adhesivo",
                        "cantidad_solicitada": 40,
                        "cantidad_despachada": 40,
                        "precio_unitario": 0.80,
                        "costo_total": 32.00
                    },
                    {
                        "id": 8,
                        "código": "LC8008",
                        "unidad_medida": "Caja",
                        "descripción_material_insumo": "Lápices de colores",
                        "cantidad_solicitada": 15,
                        "cantidad_despachada": 15,
                        "precio_unitario": 3.00,
                        "costo_total": 45.00
                    },
                    {
                        "id": 9,
                        "código": "GC9009",
                        "unidad_medida": "Unidad",
                        "descripción_material_insumo": "Gomas de borrar",
                        "cantidad_solicitada": 60,
                        "cantidad_despachada": 60,
                        "precio_unitario": 0.25,
                        "costo_total": 15.00
                    },
                    {
                        "id": 10,
                        "código": "MA1010",
                        "unidad_medida": "Caja",
                        "descripción_material_insumo": "Marcadores de pizarra",
                        "cantidad_solicitada": 5,
                        "cantidad_despachada": 5,
                        "precio_unitario": 8.00,
                        "costo_total": 40.00
                    }
                ];
                for (var i = 0; i < suministros.length; i++) {
                    document.write("<tr>");
                    document.write("<td>" + suministros[i].código + "</td>");
                    document.write("<td>" + suministros[i].unidad_medida + "</td>");
                    document.write("<td>" + suministros[i].descripción_material_insumo + "</td>");
                    document.write("<td>" + suministros[i].cantidad_solicitada + "</td>");
                    document.write("<td>" + suministros[i].cantidad_despachada + "</td>");
                    document.write("<td>" + '$ ' + suministros[i].precio_unitario + "</td>");
                    document.write("<td>" + '$ ' + suministros[i].costo_total + "</td>");
                    document.write("</tr>");
                }
                </script>
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

    <table align="center" width="950">
        <thead>
            <tr>
                <td>F: </td>
                <td>F: </td>
                <td>F: </td>
                <td>F: </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pancracio Joaquin Barraza Perez </td>
                <td>Antonieta de las Nieves</td>
                <td>Wisin y Yandel los Extraterrestres </td>
                <td>El Chapulin Colorado</td>
            </tr>
            <tr>
                <td>NOMBRE QUIEN SOLICITA </td>
                <td>NOMBRE QUIEN AUTORIZA</td>
                <td>NOMBRE QUIEN RECIBE </td>
                <td>NOMBRE QUIEN DESPACHA</td>
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
