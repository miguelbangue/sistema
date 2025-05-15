<?php
session_start();
require "conexion.php";

// Obtener datos del formulario
$gmail = $_POST['gmail'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';

// Verificar que no estén vacíos
if (empty($gmail) || empty($contraseña)) {
    $_SESSION['error'] = "Todos los campos son obligatorios.";
    header("Location: ../index.php");
    exit();
}

// Consulta preparada para evitar inyecciones SQL
$sql = "SELECT * FROM usuarios WHERE gmail = ? ";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $gmail);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si el usuario existe
if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    
    // Comparar contraseñas hasheadas
    if (password_verify($contraseña, $fila['contraseña'])) {
        $_SESSION['gmail'] = $gmail;
        $_SESSION['rol'] = $fila['rol']; // aquí se toma el rol correcto desde la BD
        header("Location: bienvenido.php");
        exit();
    } else {
        $_SESSION['error'] = "Contraseña incorrecta.";
        header("Location: ../index.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Correo no registrado.";
    header("Location: ../index.php");
    exit();
}

$conexion->close();
?>
