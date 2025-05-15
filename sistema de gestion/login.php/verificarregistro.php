<?php
session_start();
require 'conexion.php'; // Asegúrate de tener tu conexión configurada

$nombre = $_POST['nombre'] ?? null;
$gmail = $_POST['gmail'] ?? null;
$contraseña = $_POST['contraseña'] ?? null;

if (isset($nombre, $gmail, $contraseña)) {
    // Validar que sea un correo de Gmail
    if (str_ends_with($gmail, '@gmail.com')) {

        // Verificar si el dominio puede recibir correos
        $domain = substr(strrchr($gmail, "@"), 1);
        if (!checkdnsrr($domain, "MX")) {
            $_SESSION['error'] = "El dominio del correo no puede recibir correos.";
            header("Location: registro.php");
            exit();
        }

        // Verificar si ya existe ese correo
        $sqlVerifica = "SELECT id FROM usuarios WHERE gmail = ?";
        $stmtVerifica = $conexion->prepare($sqlVerifica);
        $stmtVerifica->bind_param("s", $gmail);
        $stmtVerifica->execute();
        $resultado = $stmtVerifica->get_result();

        if ($resultado->num_rows > 0) {
            $_SESSION['error'] = "El correo ya está registrado.";
            header("Location: registro.php");
            exit();
        }

        // Encriptar la contraseña de forma segura con password_hash
        $hash = password_hash($contraseña, PASSWORD_DEFAULT);

        // Insertar datos de forma segura
        $rol = 2; // rol fijo
        $sqlInsert = "INSERT INTO usuarios (nombre, gmail, contraseña,rol) VALUES (?, ?, ?, ?)";
        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->bind_param("ssss", $nombre, $gmail, $hash,$rol);

        if ($stmtInsert->execute()) {
            $_SESSION['mensaje'] = "Usuario creado correctamente. Inicie sesión.";
            header("Location: ../index.php");
            exit();
        } else {
            if ($conexion->errno == 1062) {
                $_SESSION['error'] = "El correo ya está registrado.";
                header("Location: registro.php");
                exit();
            } else {
                echo "Error al insertar: " . $conexion->error;
            }
        }
    } else {
        $_SESSION['error'] = "El correo debe ser de tipo @gmail.com";
        header("Location: registro.php");
        exit();
    }
} else {
    
    $_SESSION['error'] = "Faltan datos del formulario.";
    header("Location: registro.php");
    exit();
}
?>

