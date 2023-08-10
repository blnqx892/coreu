<!DOCTYPE html>
<html lang="en">

<!-- IMPORTAR ARCHIVO CABECERA-->
<?php include("head/headejem.php"); ?>


<body>
  <input class="form-control" type="text" id="codigoA" required="" data-inputmask="'alias': 'phonebe'">
  <!-- ... -->

  <script>
  $(document).ready(function(){
    $(":input").inputmask();
    
    $("#codigoA").inputmask({
  mask: '99-99-99-99-99',
  placeholder: ' ',
  showMaskOnHover: false,
  showMaskOnFocus: false,
  onBeforePaste: function (pastedValue, opts) {
    var processedValue = pastedValue;

    //do something with it

    return processedValue;
  }
});
});
</script>


</body>
</html>