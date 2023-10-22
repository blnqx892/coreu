// Variables globales document
const host = window.location.origin;
let listado_suministros = null;
let all_items_ok = [];
let kind_save = null;
let identify = null;
validate();

$(document).ready(function() {
  // Variables globales ready
  let items = 0;

  // Ejecutar funciones init
  cargar_suministros();
  $('.js2').select2();
  const toast = new coreui.Toast(document.getElementById('liveToast'));

  // Obtener variable local para ver si anteriormente habiamos guardado un registro
  const is_save = localStorage.getItem('is_save');
  const is_remove = localStorage.getItem('is_remove');

  // Mostrar mensaje de elementos guardados
  if (is_save !== null) {
    show_toast('success', 'Registro guardado', 'Acción exitosa');
    localStorage.removeItem('is_save');
  }

  if (is_remove !== null) {
    show_toast('success', 'Registro eliminado', 'Acción exitosa');
    localStorage.removeItem('is_remove');
  }

  // Eventos
  $("#add_sumi").click(function (e) {
    e.preventDefault();
    let html = '<div class="row" id="r' + items + '">';
    // Suministros
    const listado = JSON.stringify(listado_suministros);
    html += '<div class="col-6 mb-4">'
    html += '<select class="js2 form-select form-select-sm" name="suministros" onchange="disponibilidad(' + items + ')">';
    html += '<option value="-1">Seleccione un suministro</option>';
    listado_suministros.forEach(function(suministro) {
      html += '<option value="' + suministro.id +'">' + suministro.nombre_suministro + ' (' + suministro.stock + ')' +'</option>';
    });
    html += '</select>';
    html += '</div>';
    // Cantidades
    html += '<div class="col-2">'
    html += '<input type="number" min="0" placeholder="Cantidad" step="1" name="cantidades" class="form-control form-control-sm" oninput="disponibilidad(' + items + ')">';
    html += '</div>';
    // Disponibilidad
    html += '<div class="col-2">'
    html += '<span class="badge border border-secondary text-secondary bdg-amount py-2 col-12">Sin selección</span>';
    html += '</div>'
    // Acciones
    html += '<div class="col-2">'
    html += '<button class="btn btn-sm btn-danger text-light" type="button" onclick="remove_item(' + items + ')"><i class="fas fa-times"></i></button>'
    html += '</div>';
    html += '</div>';
    $("#body_req").append(html);
    $('.js2').select2({
      dropdownParent: $('#modalAgg')
    });
    all_items_ok.push({
      id: null,
      index: items.toString(),
      allOk: false
    });
    items++;
    validate();
  });

  $("#save_req").click(function (e) {
    e.preventDefault();

    switch (kind_save) {
      case 'create': save_f(); break;
      case 'approve': approve_f(); break;
      case 'service': service_f(); break;
      default: break;
    }
  });

  $("#unidad").change(function() {
    validate();
  });

  $("#fechaP").on('input', function() {
    validate();
  });

  // Funciones
  function cargar_suministros() {
    const url = host + '/Coreu/dist/Controlador/Suministros/all.php';

    fetch(url).then(
      res => res.json()
    )
      .catch(error => console.error('Error:', error))
      .then(response => {
        if (response != null) {
          listado_suministros = response;
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

  function save_f() {
    // Construir la estructura para guardar
    data = {
      fechaPedido: $("#fechaP").val(),
      unidad: $("#unidad").val(),
      suministros: []
    };

    // Agregar los suministros
    all_items_ok.forEach((item) => {
      const row = $('#r' + item.index);
      data.suministros.push({
        suministroId: row.find('select').val(),
        cantidad: row.find('input').val()
      });
    });

    // Almacenar la información
    const url = host + '/Coreu/dist/Controlador/Requisiciones/create.php';

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
          window.location.href = window.location.origin + window.location.pathname + '?id=' + response.data;
        }
      });
  }

  function approve_f() {
    const data = [];
    // Agregar los suministros
    all_items_ok.forEach((item) => {
      const row = $('#r' + item.index);
      data.push({
        detalle_id: item.index,
        cantidad: row.find('input').val()
      });
    });

    // Almacenar la información
    const url = host + '/Coreu/dist/Controlador/Requisiciones/approve.php?id=' + identify;

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
          window.location.href = window.location.origin + window.location.pathname + '?id=' + response.data;
        }
      });
  }

  function service_f() {
    const data = [];
    // Agregar los suministros
    all_items_ok.forEach((item) => {
      const row = $('#r' + item.index);
      data.push({
        detalle_id: item.index,
        suministro_id: item.id,
        cantidad: row.find('input').val()
      });
    });

    // Almacenar la información
    const url = host + '/Coreu/dist/Controlador/Requisiciones/service.php?id=' + identify;

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
          window.location.href = window.location.origin + window.location.pathname + '?id=' + response.data;
        }
      });
  }
});

function disponibilidad(index, suministro_id = null, existencia = null) {
  const row = $('#r' + index);
  const badge = row.find('.bdg-amount');
  const item = suministro_id == null ? row.find('select').val() : suministro_id;
  const cantidad = row.find('input').val();
  const it = all_items_ok.find(e => e.index === index.toString(10));
  it.id = item;

  const stock = existencia == null ? listado_suministros.find(e => e.id === item)?.stock : existencia;
  const exist = all_items_ok.filter(e => e.id === item);

  const iFirst = exist.findIndex(e => e.index === index);

  if (exist.length < 2 || iFirst < 1) {
    if (stock !== undefined) {
      // Medir las cantidades
      if (cantidad === '') {
        it.allOk = false;
        $(badge).removeClass('border-secondary text-secondary bg-success bg-danger').addClass('border-secondary text-secondary');
        $(badge).text(stock);
      } else {
        if (parseFloat(stock) < parseFloat(cantidad)) {
          it.allOk = false;
          $(badge).removeClass('border-secondary text-secondary bg-success bg-danger').addClass('bg-danger');
          $(badge).text(stock);
        } else {
          it.allOk = true;
          $(badge).removeClass('border-secondary text-secondary bg-success bg-danger').addClass('bg-success');
          $(badge).text(stock);
        }
      }
    } else {
      // Colocar sin seleccionar
      it.allOk = false;
      $(badge).removeClass('border-secondary text-secondary bg-success bg-danger').addClass('border-secondary text-secondary');
      $(badge).text('Sin seleccionar');
    }
  } else {
    it.allOk = false;
    $(badge).removeClass('border-secondary text-secondary bg-success bg-danger').addClass('bg-danger');
    $(badge).text('Duplicado');
  }

  validate();
}

function remove_item(index) {
  $("#r" + index).remove();
  const indice = all_items_ok.findIndex(e => e.index === index.toString(10));
  if (indice > -1) {
    all_items_ok.splice(indice, 1);
  }

  all_items_ok.forEach(el => {
    disponibilidad(el.index);
  })
}

function validate() {
  const enable =  !($("#fechaP").val() !== '' && $("#unidad").val() !== null && (all_items_ok.filter(e => e.allOk === false).length === 0 && all_items_ok.length > 0));
  if (enable) {
    $("#save_req").attr('disabled', 'disabled');
  } else {
    $("#save_req").removeAttr('disabled');
  }
}

function create_n() {
  kind_save = 'create';
  all_items_ok = [];
  $("#fechaP").removeAttr('disabled');
  $("#unidad").removeAttr('disabled');
  $("#add_sumi").show();
  $("#req").show();
  $("#req_approve").hide();
  $("#req_service").hide();

  document.getElementById('fechaP').valueAsDate = new Date();
  $("#unidad").attr('disabled', 'disabled');

  validate();
}

function approve_n(id) {
  identify = id;
  kind_save = 'approve';
  all_items_ok = [];
  $("#fechaP").attr('disabled', 'disabled');
  $("#unidad").attr('disabled', 'disabled');
  $("#add_sumi").hide();
  $("#req").hide();
  $("#req_service").hide();
  $("save_req").show();
  $("#body_req_approve").empty();
  $("#req_approve").show();

  const url = host + '/Coreu/dist/Controlador/Requisiciones/find.php?id=' + id;

  fetch(url).then(
    res => res.json()
  )
    .catch(error => console.error('Error:', error))
    .then(response => {
      if (response != null) {
        document.getElementById('fechaP').valueAsDate = new Date(response.fecha_requisicion);
        $("#unidad").val(response.unidad_id);
        response.suministros.forEach((detalle) => {
          let html = '<div class="row" id="r' + detalle.id + '">';
          // Suministros
          html += '<div class="col-6 mb-4">'
          html += '<span>' + detalle.nombre_suministro + '</span>';
          html += '</div>';
          // Cantidad solicitada
          html += '<div class="col-2">'
          html += '<span class="badge border border-secondary text-secondary py-2 col-12">' + detalle.cantidad_solicitada + '</span>';
          html += '</div>';
          // Cantidad aprobada
          html += '<div class="col-2">'
          html += '<input type="number" min="0" placeholder="Cantidad" step="1" name="cantidades_aprobadas" class="form-control form-control-sm" oninput="disponibilidad(' + detalle.id + ', ' + detalle.suministro_id + ',' + detalle.stock +')" value="' + detalle.cantidad_solicitada + '">';
          html += '</div>'
          // Disponibilidad
          html += '<div class="col-2">'
          html += '<span class="badge border border-secondary text-secondary bdg-amount py-2 col-12">Sin selección</span>'
          html += '</div>';
          html += '</div>';
          $("#body_req_approve").append(html);
          all_items_ok.push({
            id: detalle.suministro_id,
            index: detalle.id,
            allOk: true
          });
          disponibilidad(detalle.id, detalle.suministro_id, detalle.stock);
        });
      }
    });
}

function show_n(id, estado) {
  identify = id;
  kind_save = 'none';
  all_items_ok = [];
  $("#fechaP").attr('disabled', 'disabled');
  $("#unidad").attr('disabled', 'disabled');
  $("#add_sumi").hide();
  $("#req").hide();
  $("#req_service").hide();
  $("save_req").hide();
  $("#body_req_approve").empty();
  $("#req_approve").show();

  const url = host + '/Coreu/dist/Controlador/Requisiciones/find.php?id=' + id;

  fetch(url).then(
    res => res.json()
  )
    .catch(error => console.error('Error:', error))
    .then(response => {
      if (response != null) {
        document.getElementById('fechaP').valueAsDate = new Date(response.fecha_requisicion);
        $("#unidad").val(response.unidad_id);
        response.suministros.forEach((detalle) => {
          let html = '<div class="row" id="r' + detalle.id + '">';
          // Suministros
          html += '<div class="col-6 mb-4">'
          html += '<span>' + detalle.nombre_suministro + '</span>';
          html += '</div>';
          // Cantidad solicitada
          html += '<div class="col-2">'
          html += '<span class="badge border border-secondary text-secondary py-2 col-12">' + detalle.cantidad_solicitada + '</span>';
          html += '</div>';
          // Cantidad aprobada
          html += '<div class="col-2">'
          if (estado == 'pendiente.aprobacion') {
            html += '<span class="badge border border-secondary text-secondary py-2 col-12">Pendiente</span>';
          } else {
            html += '<span class="badge border border-secondary text-secondary py-2 col-12">' + detalle.cantidad_aprobada + '</span>';
          }
          html += '</div>'
          // Disponibilidad
          html += '<div class="col-2">'
          html += '<span class="badge border border-secondary text-secondary bdg-amount py-2 col-12">Sin selección</span>'
          html += '</div>';
          html += '</div>';
          $("#body_req_approve").append(html);
          all_items_ok.push({
            id: detalle.suministro_id,
            index: detalle.id,
            allOk: true
          });
          disponibilidad(detalle.id, detalle.suministro_id, detalle.stock);
        });
      }
    });
}

function service_n(id) {
  identify = id;
  kind_save = 'service';
  all_items_ok = [];
  $("#fechaP").attr('disabled', 'disabled');
  $("#unidad").attr('disabled', 'disabled');
  $("#add_sumi").hide();
  $("#req").hide();
  $("#req_approve").hide();
  $("save_req").show();
  $("#body_req_service").empty();
  $("#req_service").show();

  const url = host + '/Coreu/dist/Controlador/Requisiciones/find.php?id=' + id;

  fetch(url).then(
    res => res.json()
  )
    .catch(error => console.error('Error:', error))
    .then(response => {
      if (response != null) {
        document.getElementById('fechaP').valueAsDate = new Date(response.fecha_requisicion);
        $("#unidad").val(response.unidad_id);
        response.suministros.forEach((detalle) => {
          let html = '<div class="row" id="r' + detalle.id + '">';
          // Suministros
          html += '<div class="col-5 mb-4">'
          html += '<span>' + detalle.nombre_suministro + '</span>';
          html += '</div>';
          // Cantidad solicitada
          html += '<div class="col-5">';
          html += '<div class="row">';
          html += '<div class="col-4">'
          html += '<span class="badge border border-secondary text-secondary py-2 col-12">' + detalle.cantidad_solicitada + '</span>';
          html += '</div>';
          // Cantidad aprobada
          html += '<div class="col-4">'
          html += '<span class="badge border border-secondary text-secondary py-2 col-12">' + detalle.cantidad_aprobada + '</span>';
          html += '</div>'
          // Cantidad despachada
          html += '<div class="col-4">'
          html += '<input type="number" min="0" placeholder="Cantidad" step="1" name="cantidades_despachadas" class="form-control form-control-sm" oninput="disponibilidad(' + detalle.id + ', ' + detalle.suministro_id + ',' + detalle.stock +')" value="' + detalle.cantidad_aprobada + '">';
          html += '</div>';
          html += '</div>';
          html += '</div>';
          // Disponibilidad
          html += '<div class="col-2">'
          html += '<span class="badge border border-secondary text-secondary bdg-amount py-2 col-12">Sin selección</span>'
          html += '</div>';
          html += '</div>';
          $("#body_req_service").append(html);
          all_items_ok.push({
            id: detalle.suministro_id,
            index: detalle.id,
            allOk: true
          });
          disponibilidad(detalle.id, detalle.suministro_id, detalle.stock);
        });
      }
    });
}

function remove(id) {
  swal({
    title: "Eliminar la requisición",
    text: "¿Está seguro que desea eliminar la requisición?",
    icon: "warning",
    buttons: ["No", "Si"],
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        const host = window.location.origin;    // Dirección url actual
        const url = host + '/Coreu/dist/Controlador/Requisiciones/delete.php';
        fetch(url, {
          method: 'POST',
          body: JSON.stringify({id})
        }).then(
          res => res.json()
        )
          .catch(error => console.error('Error:', error))
          .then(response => {
            if (response.statusCode === 200) {
              localStorage.setItem('is_remove', true);
              window.location.reload();
            } else {
              show_toast('danger', 'Error', response.message);
            }
          });
      }
    });
}
