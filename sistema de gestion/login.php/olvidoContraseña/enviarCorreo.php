<?php
include '../conexion.php'; // Ajusta la ruta según tu estructura

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['gmail'])) {
    $gmail = filter_var(trim($_POST['gmail']), FILTER_VALIDATE_EMAIL);
    $codigo = rand(100000, 999999); // Código de 6 dígitos
    $asunto = "Recuperación de contraseña";
    $mensaje = "Tu código de recuperación es: $codigo";
    $headers = "From: bangueromiguel08@gmail.com\r\n";
    $headers .= "Reply-To: bangueromiguel08@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if ($gmail) {
        // Guarda el código y expiración en la base de datos
        $expira = date("Y-m-d H:i:s", strtotime("+15 minutes"));
        $stmt = $conexion->prepare("UPDATE usuarios SET codigo_recuperacion=?, expira_codigo=? WHERE gmail=?");
        $stmt->bind_param("sss", $codigo, $expira, $gmail);
        $stmt->execute();

        // Envía el correo
        if (mail($gmail, $asunto, $mensaje, $headers)) {
            echo "ok"; // Indica que el correo se envió correctamente
        } else {
            echo "No se pudo enviar el correo.";
        }
    } else {
        echo "Correo electrónico no válido.";
    }
}
?>