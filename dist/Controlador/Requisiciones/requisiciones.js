// Variables globales document
let listado_suministros = null;
let all_items_ok = [];
validate();

$(document).ready(function() {
  // Variables globales ready
  const host = window.location.origin;
  let items = 0;

  // Ejecutar funciones init
  cargar_suministros();
  $('.js2').select2();
  const toast = new coreui.Toast(document.getElementById('liveToast'));

  // Obtener variable local para ver si anteriormente habiamos guardado un registro
  const is_save = localStorage.getItem('is_save');

  // Mostrar mensaje de elementos guardados
  if (is_save !== null) {
    show_toast('success', 'Registro guardado', 'Acción exitosa');
    localStorage.removeItem('is_save');
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
      index: items,
      allOk: false
    });
    items++;
    validate();
  });

  $("#save_req").click(function (e) {
    e.preventDefault();

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
});

function disponibilidad(index) {
  const row = $('#r' + index);
  const badge = row.find('.bdg-amount');
  const item = row.find('select').val()
  const cantidad = row.find('input').val();
  const it = all_items_ok.find(e => e.index === index);
  it.id = item;

  const stock = listado_suministros.find(e => e.id === item)?.stock;
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
        if (parseInt(stock, 10) < parseInt(cantidad, 10)) {
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
  const indice = all_items_ok.findIndex(e => e.index === index);
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
