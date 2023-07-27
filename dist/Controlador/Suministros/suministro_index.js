$(document).ready(function() {
  $("#cats_b").click(function(e) {
    e.preventDefault();
    var categoria = $("#cats_s").val();
    window.location.href = window.location.origin + '/' + window.location.pathname + '?categoria=' + categoria;
  })
});
