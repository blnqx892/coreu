<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Incluir los archivos necesarios de SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>
<body>
    <?php 
    function showNotification($title, $message, $type) {
        echo "<script>";
        echo "swal('$title', '$message', '$type');";
        echo "</script>";
    }

    // Ejemplo de uso de la función showNotification()
showNotification("Registro exitoso", "El registro se ha realizado correctamente.", "success");
    ?>
</body>
</html>