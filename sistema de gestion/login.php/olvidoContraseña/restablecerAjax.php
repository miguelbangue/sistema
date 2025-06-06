<?php
include '../conexion.php'; // Asegúrate que esta ruta es correcta

if (isset($_POST['gmail'], $_POST['codigo'], $_POST['nueva_contraseña'])) {
    $gmail = $_POST['gmail'];
    $codigo = $_POST['codigo'];
    $nueva = password_hash($_POST['nueva_contraseña'], PASSWORD_DEFAULT);

    // Buscar el usuario y verificar el código y expiración
    $stmt = $conexion->prepare("SELECT codigo_recuperacion, expira_codigo FROM usuarios WHERE gmail=?");
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && $row['codigo_recuperacion'] === $codigo && strtotime($row['expira_codigo']) > time()) {
        // Actualizar la contraseña y limpiar el código
        $stmt2 = $conexion->prepare("UPDATE usuarios SET contraseña=?, codigo_recuperacion=NULL, expira_codigo=NULL WHERE gmail=?");
        $stmt2->bind_param("ss", $nueva, $gmail);
        if ($stmt2->execute()) {
            echo "¡Éxito! Contraseña restablecida.";
        } else {
            echo "Error al actualizar la contraseña.";
        }
    } else {
        echo "Código incorrecto o expirado.";
    }
} else {
    echo "Datos incompletos.";
}
?>