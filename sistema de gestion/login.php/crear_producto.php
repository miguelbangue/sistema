<?php
session_start(); // INICIA la sesión para usar $_SESSION

include "conexion.php";

// Verifica que el usuario tenga rol 1 y que se haya enviado el formulario
if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1 && $_SERVER["REQUEST_METHOD"] == "POST") {

  $nombre = $_POST['nombre'] ?? '';
  $precio = $_POST['precio'] ?? 0;
  $imagen = $_FILES['imagen']['name'] ?? '';
  $ruta_temporal = $_FILES['imagen']['tmp_name'] ?? '';

  // Verifica que todos los campos estén completos
  if (!empty($nombre) && !empty($precio) && !empty($imagen)) {
    
    // Mueve la imagen al directorio de destino
    move_uploaded_file($ruta_temporal, "../imagenes/$imagen");

    $imagenBien = "../imagenes/$imagen";
    // Inserta en la base de datos
    $sql = "INSERT INTO zapatillas (nombre, precio, imagen) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sds", $nombre, $precio, $imagenBien);
    $stmt->execute();

    header("Location: bienvenido.php#productos");
    exit();
  } else {
    echo "Todos los campos son obligatorios.";
  }
} else {
  echo "Acceso denegado o método incorrecto.";
}
?>
