<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
 <script type="text/javascript" src="jquery-barcode.min.js"></script>
</head>
<body>
    <script>
        $(function() {   
 $("#barcode").barcode(
"12345670", // Valor del codigo de barras
"ean8" // tipo (cadena)
);
});
    </script>
<div id="barcode"></div>
</body>
</html>