$(document).ready(function() {
  const is_save = localStorage.getItem('is_remove');
  // Mostrar mensaje de elementos eliminados
  if (is_save !== null) {
    show_toast('success', 'Registro eliminado', 'Acción exitosa');
    localStorage.removeItem('is_remove');
  }

  $("#cats_b").click(function(e) {
    e.preventDefault();
    var categoria = $("#cats_s").val();
    window.location.href = window.location.origin + window.location.pathname + '?categoria=' + categoria;
  });

});

const toast = new coreui.Toast(document.getElementById('liveToast'));

function remove(id) {
  swal({
    title: "Eliminar suministro",
    text: "¿Está seguro que desea eliminar el suministro?",
    icon: "warning",
    buttons: ["No", "Si"],
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        const host = window.location.origin;    // Dirección url actual
        const url = host + '/Coreu/dist/Controlador/Suministros/delete.php';
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

function show_toast(severity, title, body) {
  $("#liveToast").removeClass('text-bg-success text-bg-danger').addClass('text-bg-' + severity);
  $("#toast_title").html(title);
  $("#toast_body").html(body);
  toast.show();
}
