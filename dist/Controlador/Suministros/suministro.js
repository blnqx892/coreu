$(document).ready(function() {
  // Obtener parametro en url
  const params = new URLSearchParams(document.location.search);
  const id = params.get('id');
  const host = window.location.origin;
  let nuevo = true;

  const is_save = localStorage.getItem('is_save');

  // Mensaje de elementos guardados
  if (is_save !== null) {
    const toast = new coreui.Toast(document.getElementById('liveToast'));
    toast.show();
    localStorage.removeItem('is_save');
  }

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
          $("#save_record").html("Editar <i class=\'far fa-check-square\'>");
        } else {
          nuevo = true;
        }
      });
  }

  $("#save_record").click(function(e) {
    e.preventDefault();

    const data = {
      codigo_barra: $("#codigo_barra").val(),
      nombre_suministro: $("#nombre_suministro").val()
    };


    if (nuevo) {
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
            window.location.href = window.location.href + '?id=' + response.data;
          }
        });
    } else {
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

  });

  $("#save_item").click(function(e) {
    e.preventDefault();

    const data = {
      fecha: $("#fechaC").val(),
      concepto: $("#concepto").val(),
      tipo_movimiento: $("#tipo_movimiento").val(),
      fondos_procedencia: $("#fondo_procedencia").val(),
      cantidad: $("#cantidad").val(),
      precio: $("#precio").val()
    }

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
          localStorage.setItem('is_save', true);
          window.location.reload();
        }
      });
  });
});
