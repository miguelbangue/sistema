<?php
session_start();
require "../conexion.php";

if (!isset($_SESSION['gmail'])) {
  header("Location: ../../index.php");
  exit();
}

$total = 0;
$SID = session_id();
$correo = $_SESSION['gmail'];

// Calcular el total desde el carrito
if (!empty($_SESSION['carrito'])) {
  foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['cantidad'] * $producto['precio'];
  }
}

// Insertar venta si viene por POST (para evitar repetir con F5)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $conexion->prepare("INSERT INTO pagospaypal (ClaveTransaccion, PaypalDatos, fecha, correo, total, status) VALUES (?, '', NOW(), ?, ?, 'pendiente')");
  $stmt->bind_param("ssd", $SID, $correo, $total);
  $stmt->execute();
  $idVenta = $conexion->insert_id;
  $stmt->close();

  foreach ($_SESSION['carrito'] as $producto) {
    $stmt = $conexion->prepare("INSERT INTO tbldetalleventa (IDVENTA, IDPRODUCTO, PRECIO, CANTIDAD, descargado) VALUES (?, ?, ?, ?, '0')");
    $stmt->bind_param("iidd", $idVenta, $producto['id'], $producto['precio'], $producto['cantidad']);
    $stmt->execute();
    $stmt->close();
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Último paso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../../imagenes/Flux_Dev_A_stylish_urban_sneaker_store_front_named_UrbanStep_w_2.jpg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/footer.css?v=2">
  <link rel="stylesheet" href="../../css/header.css?v=2">
  <link rel="stylesheet" href="../../css/bienvenido.css?v=2">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body { background: #f9f9f9; }
    .checkmark { font-size: 4rem; color: #28a745; }
    .card-final { border-radius: 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); }
    .producto { border-bottom: 1px solid #ddd; padding: 10px 0; }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-final p-4">
        <div class="text-center">
          <div class="checkmark">✔</div>
          <h2 class="my-3">¡Estás por completar tu compra!</h2>
          <p class="text-muted">Revisa los detalles de tu pedido antes de finalizar el pago.</p>
        </div>

        <hr>

        <div>
          <h5>Resumen de productos</h5>
          <?php if (!empty($_SESSION['carrito'])): ?>
            <?php foreach ($_SESSION['carrito'] as $producto): ?>
              <div class="producto d-flex justify-content-between align-items-center">
                <div>
                  <strong><?= htmlspecialchars($producto['nombre']) ?></strong><br>
                  <small><?= $producto['cantidad'] ?> × €<?= number_format($producto['precio'], 2) ?></small>
                </div>
                <div class="text-end fw-bold">€<?= number_format($producto['cantidad'] * $producto['precio'], 2) ?></div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No hay productos en el carrito.</p>
          <?php endif; ?>
        </div>

        <hr>
        <div class="d-flex justify-content-between">
          <h5>Total a pagar:</h5>
          <h5 class="text-success">€<?= number_format($total, 2) ?></h5>
        </div>

        <!-- PayPal SDK -->
        <script src="https://www.paypal.com/sdk/js?client-id=AcM5OkyvADGiCyt3DM4ak6VGSKT8fnknqX8p4_FMhpfV9tkrLrjyPCDSbJZVhyERTVn6H5qLGhDhFgwV&currency=USD"></script>

        <div class="text-center mt-4">
          <div id="paypal-button-container"></div>
        </div>

       
        <script>
        paypal.Buttons({
            style: {
                layout: 'vertical',
                color: 'gold',
                shape: 'pill',
                label: 'paypal'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?= number_format($total, 2, '.', '') ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    window.location.href = 'captura_pago.php?orderID=' + data.orderID;
                });
            }
        }).render('#paypal-button-container');
        </script>

      </div>
    </div>
  </div>
</div>

</body>
</html>
