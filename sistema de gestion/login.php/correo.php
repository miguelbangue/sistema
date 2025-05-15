<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['ggmail']) && !empty($_POST['receña'])) {
    $ggmail = filter_var(trim($_POST['ggmail']), FILTER_VALIDATE_EMAIL);
    $receña = trim($_POST['receña']);
    $asunto = "Enviar reseña";

    if ($ggmail) {
        $headers = "From: bangueromiguel08@gmail.com\r\n";
        $headers .= "Reply-To: bangueromiguel08@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($ggmail, $asunto, $receña, $headers)) {
            echo "<script>alert('Reseña enviada con éxito.'); window.location.href = 'bienvenido.php';</script>";
        } else {
            echo "<script>alert('Error al enviar la reseña.'); window.location.href = 'bienvenido.php';</script>";
        }
    } else {
        echo "<script>alert('Correo electrónico no válido.'); window.location.href = 'bienvenido.php';</script>";
    }
}
?>
