<?php

// Validar los datos del formulario
if (!isset($_FILES["archivo"]["tmp_name"]) || !is_uploaded_file($_FILES["archivo"]["tmp_name"])) {
  die("Debe seleccionar un archivo de copia de seguridad");
}

// Obtener los datos de la conexión a la base de datos
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sicafi";

// Conectarse a la base de datos
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Restaurar la base de datos
$error = "";
$lines = file($_FILES["archivo"]["tmp_name"]);
$templine = "";  // Inicializa la variable $templine
foreach ($lines as $line) {
  // Skip it if it's a comment
  if (substr($line, 0, 2) == '--' || $line == '') {
    continue;
  }

  // Add this line to the current segment
  $templine .= $line;

  // If it has a semicolon at the end, it's the end of the query
  if (substr(trim($line), -1, 1) == ';') {
    // Perform the query
    if (!$db->query($templine)) {
      $error .= $db->errors;
    }

    // Reset temp variable to empty
    $templine = '';
  }
}

// Comprobar el resultado
if (!empty($error)) {
  // La restauración falló
  die($error);
} else {
  // La restauración se realizó con éxito
  echo "<script language='javascript'>
    alert('Restauración Exitosa')
    type: 'succes'
    window.location='../../Back.php'
    </script>";
}

?>
