$(document).ready(function() {
  // Obtener parametro en url
  const params = new URLSearchParams(document.location.search);
  const id = params.get('id');

  $("#codigo_barra").on('keyup', function (e) {
    let valor = $(this).val();
    // Prueba del codigo de barras
    valor = valor === '' ? 'vacio' : valor;
    valor = valor.match(/^[a-zA-Z0-9 ]+$/gu);
    valor = valor === null ? 'Caracter incorrecto' : valor;
    JsBarcode("#barcode", valor, {
      width: 1,
      height: 50,
      fontSize: 12
    });
  });

  // Variables globales
  const host = window.location.origin;    // Dirección url actual
  let nuevo = true;                       // Indica si el registro es nuevo o edición
  let saldo = 0;                          // Saldo acumulado de suministros

  // Elementos del DOM
  const save_item = $("#save_item");      // Botón para guardar items
  const toast = new coreui.Toast(document.getElementById('liveToast'));

  // Ocultar elementos por defecto (nuevo)
  $("#kardex_tabla").hide();
  $("#add_kardex").hide();

  // Obtener variable local para ver si anteriormente habiamos guardado un registro
  const is_save = localStorage.getItem('is_save');

  // Mostrar mensaje de elementos guardados
  if (is_save !== null) {
    show_toast('success', 'Registro guardado', 'Acción exitosa');
    localStorage.removeItem('is_save');
  }

  // Nos encontramos en el modo edición debe llenar el formulario
  if (id != null) {
    const url = host + '/Coreu/dist/Controlador/Suministros/find.php?id=' + id;

    fetch(url).then(
      res => res.json()
    )
      .catch(error => console.error('Error:', error))
      .then(response => {
        if (response != null) {
          nuevo = false;
          $("#id").val(response.id);
          $("#codigo_barra").val(response.codigo_barra);
          $("#nombre_suministro").val(response.nombre_suministro);
          $("#presentacion").val(response.presentacion);
          $("#unidad_medida").val(response.unidad_medida);
          $("#existencia_minima").val(response.existencia_minima);
          $("#existencia_maxima").val(response.existencia_maxima);
          $("#almacen").val(response.almacen);
          $("#estante").val(response.estante);
          $("#entrepano").val(response.entrepano);
          $("#casilla").val(response.casilla);
          $("#save_record").html("Editar <i class=\'far fa-check-square\'>");

          $("#kardex_tabla").show();
          $("#add_kardex").show();

          load_kardex();
        } else {
          nuevo = true;
        }
      });
  }

  // Botón guardar suministro
  $("#save_record").click(function(e) {
    e.preventDefault();

    // Cargar las datos del DOM en una estructura JSON
    const data = {
      codigo_barra: $("#codigo_barra").val(),
      nombre_suministro: $("#nombre_suministro").val(),
      presentacion: $("#presentacion").val(),
      unidad_medida: $("#unidad_medida").val(),
      existencia_minima: parseInt($("#existencia_minima").val(), 10),
      existencia_maxima: parseInt($("#existencia_maxima").val(), 10),
      almacen: $("#almacen").val(),
      estante: $("#estante").val(),
      entrepano: $("#entrepano").val(),
      casilla: $("#casilla").val(),
    };

    // Validaciones
    let all_ok = validation(1);

    if (all_ok) {
      if (nuevo) {
        // Es un nuevo elemento
        const url = host + '/Coreu/dist/Controlador/Suministros/create.php';
        fetch(url, {
          method: 'POST',
          body: JSON.stringify(data)
        }).then(
          res => res.json()
        )
          .catch(error => console.error('Error:', error))
          .then(response => {
            if (response.statusCode === 200) {
              localStorage.setItem('is_save', true);
              window.location.href = window.location.origin + '/' + window.location.pathname + '?id=' + response.data;
            }
          });
      } else {
        // Está editando un elemento existente
        const url = host + '/Coreu/dist/Controlador/Suministros/update.php?id=' + id;
        fetch(url, {
          method: 'POST',
          body: JSON.stringify(data)
        }).then(
          res => res.json()
        )
          .catch(error => console.error('Error:', error))
          .then(response => {
            if (response.statusCode === 200) {
              localStorage.setItem('is_save', true);
              window.location.reload();
            }
          });
      }
    } else {
      show_toast('danger', 'Error de validación', 'Debe llenar todos los campos requeridos');
    }

  });

  // Botón guardar un item (kardex)
  save_item.click(function(e) {
    e.preventDefault();

    const data = {
      fecha: $("#fechaC").val(),
      concepto: $("#concepto").val(),
      tipo_movimiento: $("#tipo_movimiento").val(),
      fondos_procedencia: $("#fondo_procedencia").val(),
      cantidad: $("#cantidad").val(),
      precio: $("#precio").val()
    }

    const all_ok = validation(2);

    if (all_ok) {
      // Evaluar que no puedan salir más elementos que los que se encuentran disponibles en saldo
      if (data.tipo_movimiento === "salida" ? parseInt(data.cantidad, 10) <= saldo : true) {
        const url = host + '/Coreu/dist/Controlador/Kardex/create.php?suministro=' + id;
        fetch(url, {
          method: 'POST',
          body: JSON.stringify(data)
        }).then(
          res => res.json()
        )
          .catch(error => console.error('Error:', error))
          .then(response => {
            if (response.statusCode === 200) {
              $("#modalAgg").modal('toggle');
              show_toast('success', 'Registro guardado', 'Acción exitosa');
              load_kardex();
              clear_kardex();
            }
          });
      } else {
        validation_each('#cantidad', 'El valor mínimo de salida es: ' + saldo);
        show_toast('danger', 'Error de validación', 'No pueden salir más suministros de los disponibles');
      }

    } else {
      show_toast('danger', 'Error de validación', 'Debe llenar todos los campos requeridos');
    }
  });

  // Limpiar modal
  function clear_kardex() {
    $("#fechaC").val(moment().format('YYYY-MM-DD'));
    $("#concepto").val('');
    $("#tipo_movimiento").val('-1');
    $("#fondo_procedencia").val('-1');
    $("#cantidad").val('');
    $("#precio").val('');

    validation(2);
  }

  // Cargar/actualizar tabla del kardex
  function load_kardex() {
    const url2 = host + '/Coreu/dist/Controlador/Kardex/index.php?suministro=' + id

    fetch(url2).then(
      res2 => res2.json()
    )
      .catch(error => console.error('Error:', error))
      .then(response2 => {
        var k_body = $("#kardex_body")
        k_body.empty();
        if (response2 !== undefined && response2.length > 0) {
          let html = '';
          saldo = 0;
          response2.forEach((v, k) => {
            saldo = parseInt(saldo, 10) + parseInt(v.tipo_movimiento === "entrada" ? v.cantidad : (v.cantidad * -1), 10);
            html += '<tr>';
            html += '<td>' + moment(v.fecha).format('DD/MM/YYYY') +'</td>';
            html += '<td>' + v.concepto +'</td>';
            html += '<td>' + v.fondos_procedencia +'</td>';
            html += '<td>' + (v.tipo_movimiento === 'entrada' ? '<span class="badge bg-success col-12">Entrada</span>' : '<span class="badge bg-danger col-12">Salida</span>') +'</td>';
            html += '<td>' + v.cantidad +'</td>';
            html += '<td>' + v.precio +'</td>';
            html += '<td>' + saldo +'</td>';
            html += '</tr>';
          });
          k_body.append(html);
        } else {
          const html = '<tr><td colspan="7"><i>No hay registros de este suministro</i></td></tr>'
          k_body.append(html);
        }
      });
  }

  // Mostrar mensaje toast
  function show_toast(severity, title, body) {
    $("#liveToast").removeClass('text-bg-success text-bg-danger').addClass('text-bg-' + severity);
    $("#toast_title").html(title);
    $("#toast_body").html(body);
    toast.show();
  }

  // Función para validar
  function validation (index) {
    let validate = true;

    // Validación de requeridos
    $(".v-required-" + index).each(function (k, v) {
      if ($(v).val() != null && $(v).val() !== undefined && $(v).val() !== '') {
        $(v).removeClass('is-invalid').addClass('is-valid');
        $(v).parent().find('.msg-error').remove();
      } else {
        $(v).removeClass('is-valid').addClass('is-invalid');
        const html = '<small class="text-danger msg-error">El campo es requerido</small>';
        $(v).parent().find('.msg-error').remove();
        $(v).parent().append(html);
        validate = false;
      }
    });

    // Validación de valores mínimos
    $(".v-min-" + index).each(function (k, v) {
      const min = parseInt($(v).data('min'), 10)
      const minThan = $(v).data('minthan');

      const minThanVal = minThan !== undefined ? parseInt($("#" + minThan).val(), 10) : null;

      if (parseInt($(v).val(), 10) >= min && (minThan !== undefined ? parseInt($(v).val(), 10) >= minThanVal : true)) {
        $(v).removeClass('is-invalid').addClass('is-valid');
        $(v).parent().find('.msg-error').remove();
      } else {
        $(v).removeClass('is-valid').addClass('is-invalid');
        const html = '<small class="text-danger msg-error">El campo debe ser mayor o igual a: ' + (minThan !== undefined ? (isNaN(minThanVal) ? min : minThanVal) : min) + '</small>';
        $(v).parent().find('.msg-error').remove();
        $(v).parent().append(html);
        validate = false;
      }
    });
    return validate;
  }

  // Función para validar un único elemento
  function validation_each (v, mensaje) {
    $(v).removeClass('is-valid').addClass('is-invalid');
    const html = '<small class="text-danger msg-error">' + mensaje + '</small>';
    $(v).parent().find('.msg-error').remove();
    $(v).parent().append(html);
  }
});
