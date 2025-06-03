<?php
session_start();
require "conexion.php";

// Verificamos si se enviaron los datos obligatorios
if (
    isset($_POST['nombre']) &&
    isset($_POST['precio']) &&
    isset($_FILES['imagen']) &&
    isset($_GET['id']) || isset($_POST['id'])
) {
    $id = isset($_GET['id']) ? intval($_GET['id']) : intval($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $precio = floatval($_POST['precio']);

    // Procesar imagen nueva
    if ($_FILES['imagen']['error'] === 0) {
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaDestino = "../imagenes/" . $nombreArchivo;
        $tipoArchivo = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        // Validar tipo de imagen
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($tipoArchivo, $tiposPermitidos)) {
            $_SESSION['error'] = "Solo se permiten imágenes JPG, PNG, GIF o WEBP.";
            header("Location: editar_producto.php?id=$id");
            exit();
        }

        // Mover imagen subida
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            $rutaFinal = $rutaDestino;
        } else {
            $_SESSION['error'] = "Error al subir la imagen.";
            header("Location: editar_producto.php?id=$id");
            exit();
        }
    } else {
        // Si no se subió nueva imagen
        $_SESSION['error'] = "Debes seleccionar una imagen válida.";
        header("Location: editar_producto.php?id=$id");
        exit();
    }

    // Actualizar en la base de datos
    $stmt = $conexion->prepare("UPDATE zapatillas SET nombre = ?, precio = ?, imagen = ? WHERE id = ?");
    $stmt->bind_param("sdsi", $nombre, $precio, $rutaFinal, $id);

    if ($stmt->execute()) {
        header("Location: bienvenido.php#productos");
        exit();
    } else {
        $_SESSION['error'] = "Error al actualizar el producto.";
        header("Location: editar_producto.php?id=$id");
        exit();
    }

} else {
    $_SESSION['error'] = "Todos los campos son obligatorios.";
    header("Location: editar_producto.php");
    exit();
}
?>
