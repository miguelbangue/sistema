<?php
session_start();
require "../conexion.php";

// Verificamos si viene la orden desde PayPal
if (!isset($_GET['orderID'])) {
    die("Acceso no autorizado.");
}

$orderID = $_GET['orderID'];
$SID = session_id();
$correo = $_SESSION['gmail'];
$total = 0;

// Calcular el total nuevamente por seguridad
foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['cantidad'] * $producto['precio'];
}

// Actualizar el estado del pago
$actualizarVenta = $conexion->prepare("UPDATE pagospaypal SET ClaveTransaccion=?, PaypalDatos='Pago aprobado', status='completo' WHERE ClaveTransaccion=? AND correo=?");
$actualizarVenta->bind_param("sss", $orderID, $SID, $correo);
$actualizarVenta->execute();

if ($actualizarVenta->affected_rows > 0) {
    // Vaciar carrito
    unset($_SESSION['carrito']);

    // Cerrar la sesión completamente
    session_unset();      // Elimina todas las variables de sesión
    session_destroy();    // Destruye la sesión actual

    echo "<h2>✅ ¡Pago completado con éxito!</h2>";
    echo "<p>Gracias por tu compra, {$correo}. Tu ID de orden es: <strong>{$orderID}</strong></p>";
    echo '<a href="../../index.php">Volver a la tienda</a>';
} else {
    echo "<h2>⚠ Error al procesar el pago</h2>";
    echo "<p>No se encontró una transacción pendiente que coincida.</p>";
}
?>
