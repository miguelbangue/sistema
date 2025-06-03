<?php
session_start();
require "conexion.php";

// Validar rol de administrador
if (!(isset($_SESSION['rol']) && $_SESSION['rol'] == 1)) {
    header("Location: bienvenido.php");
    exit();
}

// Validar existencia del ID en GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Error: ID no proporcionado.";
    exit();
}

/* $id = intval($_GET['id']); */ // Asegurar que sea número
$id = intval(preg_replace('/\D/', '', $_GET['id']));


// Consultar el producto
$sentencia = "SELECT id, nombre, precio, imagen FROM zapatillas WHERE id = $id";
$sqlEditar = $conexion->query($sentencia);

if ($sqlEditar && $sqlEditar->num_rows > 0) {
    $datos = $sqlEditar->fetch_assoc();
} else {
    echo "<h3 class='alert alert-danger'>Error: no se encontró el producto con ese ID.</h3>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar</title>
  <link rel="icon" type="image/png" href="../imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg">
  <link rel="stylesheet" href="../css/footer.css?v=2">
  <link rel="stylesheet" href="../css/header.css?v=2">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/bienvenido.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<?php require "../plantillas/header.html"; ?>

<div class="crear_producto">
  <h1><strong>Formulario para Editar</strong></h1>
  <br>
  <form action="edit.php" method="post" enctype="multipart/form-data">
    <?php
      if (isset($_SESSION['error'])) {
          echo "<label style='border-radius: 15px; background: rgba(255, 0, 0, 0.5); color: white; padding:5px; display: block; margin-bottom: 10px;'>".$_SESSION['error']."</label>";
          unset($_SESSION['error']);
      }
    ?>

    <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($datos['nombre']); ?>" maxlength="14" required>
    <input type="text" step="0.01" name="precio" value="<?php echo htmlspecialchars($datos['precio']); ?>" maxlength="6" required>
    
    <img src="<?php echo htmlspecialchars($datos['imagen']); ?>" alt="Imagen actual" style="width:25%; margin: auto;">
    <input type="file" name="imagen" required>
    
    <input type="submit" name="presonar" value="Editar Producto">
  </form>
</div>

<?php $conexion->close(); ?>
<script src="../js/header.js"></script>
</body>
</html>
