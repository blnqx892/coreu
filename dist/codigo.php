<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form method="post">
    <div class="row">
      <label>Nombre del producto</label>
      <input type="text" name="barcodeText" class="form-control">
    </div>
    <div class="row">
      <label>Tipo de código de barra</label>
      <select name="barcodeType" id="barcodeType" class="form-control">
        <option value="codabar">Codabar</option>
        <option value="code128">Code128</option>
        <option value="code39">Code39</option>
      </select> </div>
    <div class="row"> <label>Orientación</label> <select name="barcodeDisplay" class="form-control" required>
        <option value="horizontal">Horizontal</option>
        <option value="vertical">Vertical</option>
      </select> </div>
    <div class="row"> <input type="hidden" name="barcodeSize" id="barcodeSize" value="20"> <input type="hidden"
        name="printText" id="printText" value="true"> <input type="submit" name="generateBarcode"
        value="Generar Código"> </div>
  </form>

  <?php 
    if(isset($_POST['generateBarcode'])) {   $barcodeText = trim($_POST['barcodeText']);   
        $barcodeType=$_POST['barcodeType'];   $barcodeDisplay=$_POST['barcodeDisplay'];   
        $barcodeSize=$_POST['barcodeSize'];   $printText=$_POST['printText'];    if($barcodeText != '') {     
        echo '<h4>Barcode:</h4>';     echo '<img class="barcode" alt="'.$barcodeText.'"  
        src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
        '&size='.$barcodeSize.'&print='.$printText.'"/>';   }else{     
        echo '<div class="alert alert-danger">Introduzca el nombre del producto para generar el código</div>';   } } 
    ?>
</body>
</html>